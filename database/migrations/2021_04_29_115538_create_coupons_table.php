<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')
                    ->references('id')
                    ->on('sellers')
                    ->onDelete('cascade');
            $table->integer('event_type');
            $table->string('event_category')->nullable();
            $table->string('event_package')->nullable();
            $table->string('event_name')->nullable();
            $table->string('promo_type');
            $table->string('discount')->nullable();
            $table->string('promo_code');
            $table->date('effective_date');
            $table->time('effective_time');
            $table->date('expire_date');
            $table->time('expire_time');
            $table->string('timezone');
            $table->integer('event_count')->nullable();
            $table->decimal('min_pur_amt');
            $table->decimal('max_pur_amt');
            $table->decimal('min_ticket_price');
            $table->decimal('max_ticket_price');
            $table->integer('min_no_ticket');
            $table->integer('max_no_ticket');
            $table->integer('max_no_usage');
            $table->string('must_buy')->default('no');
            $table->string('merchandise')->default('on')->nullable()->comment('on=>yus ,off=>not');
            $table->string('auto_checkout')->default('off')->nullable()->comment('on=>yus ,off=>not');

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
        Schema::dropIfExists('coupons');
    }
}
