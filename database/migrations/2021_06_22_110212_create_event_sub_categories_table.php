<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_sub_cat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_category_id');
            $table->foreign('event_category_id')
                    ->references('id')
                    ->on('event_cat')
                    ->onDelete('cascade');
                     
              $table->string('sub');
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
        Schema::dropIfExists('event_sub_categories');
    }
}
