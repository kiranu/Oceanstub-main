<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('buyer_id')->nullable();
            $table->string('event_id');
            $table->string('order_id');
            $table->string('ticket_id');
            $table->string('sc_id')->nullable();

            $table->float('amount');
            $table->integer('quatity');
            $table->string('ticket_nos')->nullable();
            $table->float('total');
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
        Schema::dropIfExists('order_lists');
    }
}
