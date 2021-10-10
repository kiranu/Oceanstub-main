<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_payments', function (Blueprint $table) {
            $table->id();
            $table->string('purpose')->nullable();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('buyer_id')
                    ->references('id')
                    ->on('buyers')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders')
                    ->onDelete('cascade');
            $table->integer('status')->nullable();
            $table->string('payment_method');
            $table->string('PayerID')->nullable();
            $table->string('token')->nullable();
            $table->string('payment_id')->nullable();
            $table->decimal('amount');
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
        Schema::dropIfExists('buyer_payments');
    }
}
