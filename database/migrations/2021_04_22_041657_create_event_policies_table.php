<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
            $table->integer('return_policy');

            $table->integer('rp_upto_hours')->nullable()->comment("Returns policy Up to
                                                                 hours before the event");
            $table->integer('cc_deduction')->nullable()->comment("Deduction
                                                                % if returned to credit cardt");
            $table->integer('sc_deduction')->nullable()->comment("Deduction
                                                                    % if returned for store credit.
                                                                    ");

            $table->integer('exchange_upgrade');

            $table->integer('eu_upto_hours')->nullable()->comment("Exchange/upgrade  
                                                                       policy 
                                                                      Up to
                                                                 hours before the event");
            $table->string('eu_category')->nullable();


       

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
        Schema::dropIfExists('event_policies');
    }
}
