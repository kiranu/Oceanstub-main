<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')
                    ->references('id')
                    ->on('sellers')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('event_id');        
            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
            $table->string('holder_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_no')->nullable();
            $table->string('ifsc')->nullable();    
            $table->string('paypal_id')->nullable();                  
            $table->string('active')->nullable(); 
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
        Schema::dropIfExists('event_payment_methods');
    }
}
