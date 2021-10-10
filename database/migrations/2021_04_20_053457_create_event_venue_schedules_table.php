<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventVenueSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_venue_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
            $table->integer('venue_list');
            $table->date('start_date');
            $table->time('start_time');
             $table->date('end_date');
            $table->time('end_time');
            $table->integer('days');
         $table->integer('hours');
         $table->integer('minuts');
            $table->string('show_time')->default(0)->comment('0=>show,1 => not')
            ->nullable();
            $table->string('show_date')->default(0)->comment('0=>show,1 => not')
            ->nullable();
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
        Schema::dropIfExists('event_venue_schedules');
    }
}
