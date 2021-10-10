<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(2)->nullable();
            $table->string('slug')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('married')->nullable();
            $table->date('marriage_date')->nullable();
            $table->longtext('address')->nullable();
            $table->string('street_name')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('alerts')->nullable();
            $table->string('country_id')->nullable();
            $table->integer('pincode')->nullable();
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
        Schema::dropIfExists('buyers');
    }
}
