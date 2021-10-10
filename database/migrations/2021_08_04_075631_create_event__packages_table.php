<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event__packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')
                    ->references('id')
                    ->on('sellers')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->string('first_title');
            $table->string('second_title')->nullable();
            $table->string('currency')->nullable();
            $table->string('event_type')->nullable();
            $table->string('event_genre')->nullable();
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->string('image')->nullable();
            $table->string('video_link_type')->nullable()->comment('F=>Facebook ,Y=>Youtube');
            $table->string('facebook_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('organiser')->nullable();
            $table->string('button_name')->nullable();
            $table->string('category_id')->nullable();
            $table->string('link')->nullable();
            $table->string('short_link')->nullable();
            $table->integer('status')->default('0')->nullable()->comment('1=>Active ,0=>Inactive');
            $table->integer('private')->default('0')->nullable()->comment('1=>yes ,0=>no');
            $table->dateTime('published_at')->nullable();

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
        Schema::dropIfExists('event__packages');
    }
}
