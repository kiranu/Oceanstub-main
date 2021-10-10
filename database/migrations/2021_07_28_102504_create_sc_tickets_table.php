<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sc_tickets', function (Blueprint $table) {
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
            
            $table->longtext('sc_assigned_data')->nullable();
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
        Schema::dropIfExists('sc_tickets');
    }
}
