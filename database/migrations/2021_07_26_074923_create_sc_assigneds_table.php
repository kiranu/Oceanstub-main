<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScAssignedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sc_assigneds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('sc_id');
            $table->foreign('sc_id')
                    ->references('id')
                    ->on('seating_charts')
                    ->onDelete('cascade');
            $table->string('section');
            $table->string('section_name');
            $table->string('rows')->nullable();
            $table->string('seats')->nullable();
            $table->string('blocked')->nullable();
            $table->string('wheel_chair')->nullable();
            $table->string('pricelevel_id');
            $table->string('capacity');
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
        Schema::dropIfExists('sc_assigneds');
    }
}
