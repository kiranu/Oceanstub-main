<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScBuyTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sc_buy_tickets', function (Blueprint $table) {
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
            $table->decimal('price');
            $table->string('row')->nullable();
            $table->string('seats')->nullable();
            $table->string('no_of_seats')->nullable();
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
        Schema::dropIfExists('sc_buy_tickets');
    }
}
