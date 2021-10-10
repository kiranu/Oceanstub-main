<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')
                    ->references('id')
                    ->on('sellers')
                    ->onDelete('cascade');
            $table->string('type');
            $table->string('name');
            $table->string('code');
            $table->string('filenames')->nullable();
            $table->string('keyword');
            $table->decimal('price');
            $table->decimal('sale_price');
            
            $table->integer('sortorder')->nullable();
            $table->integer('tax')->comment('in %')->nullable();
            $table->string('event_orgainizer');
            $table->longText('description')->nullable();
            $table->string('active')->default('off')->nullable();
            $table->string('sold_out')->default('no')->nullable();
            $table->string('featured')->default('off')->nullable();

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
        Schema::dropIfExists('merchandises');
    }
}
