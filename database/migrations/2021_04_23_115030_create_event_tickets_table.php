<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
            $table->decimal('tax')->nullable()->comment('in percentage(%');
            $table->string('note')->comment('Notes on the tickets')->nullable();
            $table->string('color')->nullable();
          
            $table->unsignedBigInteger('cap_capacity')->nullable();
            $table->integer('hide_buyer')->default('0')->nullable()->comment('1=>yus ,0=>not');
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
        Schema::dropIfExists('event_tickets');
    }
}
