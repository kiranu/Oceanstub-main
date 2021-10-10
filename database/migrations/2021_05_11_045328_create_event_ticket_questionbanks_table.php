<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTicketQuestionbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_ticket_questionbanks', function (Blueprint $table) {
            $table->id();
              $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
            $table->string('qus_per_ticket')->nullable();
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
        Schema::dropIfExists('event_ticket_questionbanks');
    }
}
