<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('organizer_id');
            $table->string('eventshown_id')->nullable();
            $table->string('merchshown_id')->nullable();
            $table->string('categories')->nullable();
            $table->string('sub_categories')->nullable();
            $table->longText('event_descriptions')->nullable();
            $table->longText('purchase_notes')->nullable();
            $table->string('check_group')->default("false")->nullable();
            $table->string('group_name')->nullable();
            $table->string('check_password')->default("false")->nullable();
            $table->string('ticket_passworsd')->nullable();
            $table->string('check_limit')->default("false")->nullable();
            $table->string('limit')->nullable();
            $table->string('remining_ticket')->nullable();
            $table->integer('remining_no')->nullable();
            $table->string('tax_service')->nullable();
            $table->string('price_level')->nullable();
            $table->string('mark_as')->nullable();
            $table->string('ticket_btn_text')->nullable();
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
        Schema::dropIfExists('event_details');
    }
}
