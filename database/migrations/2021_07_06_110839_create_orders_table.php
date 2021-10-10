<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('buyer_id')
                    ->references('id')
                    ->on('buyers')
                    ->onDelete('cascade');
            $table->decimal('amount');
            $table->decimal('offer_amount')->nullable();;
            $table->string('promo_code')->nullable();
            $table->string('referrer_code')->nullable();

            $table->string('address_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('delivery_method')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->default(2);
            $table->text('notes')->nullable();
            $table->string('PayerID')->nullable();
            $table->string('token')->nullable();
            $table->string('payment_id')->nullable();




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
        Schema::dropIfExists('orders');
    }
}
