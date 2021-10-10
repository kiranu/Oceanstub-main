<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPackageImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event__package__images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')
                    ->references('id')
                    ->on('event__packages')
                    ->onDelete('cascade');
            $table->string('image_url')->nullable();
            $table->string('image')->nullable();

            $table->integer('status')->default('0')->nullable()->comment('1=>Active ,0=>Inactive');
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
        Schema::dropIfExists('event__package__images');
    }
}
