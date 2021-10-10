<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
            $table->string('online')->default("off")->nullable();
            $table->string('streaming')->nullable();
            $table->string('embed_code')->nullable();
         $table->string('allow_reentry')->default("no")->nullable();
            $table->string('on_demand')->nullable();
            
            $table->string('seating_type')->default(0)->comment('0=>general,1 => Assigned');
            $table->string('event_type');
            $table->string('event_genre');
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
        Schema::dropIfExists('event_types');
    }
}
