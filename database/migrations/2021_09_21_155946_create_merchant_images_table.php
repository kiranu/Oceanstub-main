<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchand_id');
            $table->foreign('merchand_id')
                    ->references('id')
                    ->on('merchandises')
                    ->onDelete('cascade');
            $table->string('filenames')->nullable();
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
        Schema::dropIfExists('merchant_images');
    }
}
