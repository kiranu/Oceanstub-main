<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatingChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seating_charts', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')
                    ->references('id')
                    ->on('sellers')
                    ->onDelete('cascade');
            $table->string('seating_chart_name')->nullable();
            $table->integer('publish_type')->comment("1 => private, 0 => public");
            $table->longtext('seating_chart_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seating_charts');
    }
}
