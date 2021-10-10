<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('buyer_id')->nullable();
            $table->string('section')->default("Not-specified")->nullable();
            $table->string('row')->default("Not-specified")->nullable();
            $table->string('event_id');
            $table->string('ticket_id')->nullable();
            $table->string('sc_id')->nullable();
            $table->float('amount');
            $table->integer('quatity');
            $table->string('ticket_nos')->nullable();
            $table->float('total');

            $table->string('idorclass')->nullable();
            $table->string('idorclassval')->nullable();
            $table->string('gaselectedseats')->nullable();




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
        Schema::dropIfExists('carts');
    }
}
