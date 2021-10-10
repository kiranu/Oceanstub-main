<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_ticket_id');
            $table->foreign('event_ticket_id')
                  ->references('id')
                  ->on('event_tickets')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('parent_id')->nullable();        
            $table->string('name');
             $table->string('color')->nullable();
            $table->string('description')->nullable(); 
            $table->decimal('face_price');
            $table->decimal('service_charge')->nullable();
           
            $table->integer('capacity')->nullable();;

            $table->integer('sort_order')
                  ->nullable();  
            $table->string('price_password')->nullable();
            $table->decimal('buy_price')
                  ->nullable();  
          
          
            $table->date('start_sale_date')->nullable();
            $table->time('start_sale_time')->nullable();    
           
            $table->date('end_sale_date')->nullable();
            $table->time('end_sale_time')->nullable();          
            $table->integer('min_trans')
                  ->nullable()
                  ->comment('min tiket per transaction'); 
            $table->integer('max_trans')
                  ->nullable()
                  ->comment('max tiket per transaction');   
            $table->integer('available_inc')
                  ->nullable()
                  ->comment('tiket avilable increment'); 
            $table->integer('sold')
                  ->default(0)
                  ->nullable();
                   $table->integer('ticket_return')
                  ->default(0)
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
        Schema::dropIfExists('ticket_prices');
    }
}
