<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instagram_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ig_id');
            $table->string('ig_code');
            $table->string('ig_username');
            $table->string('ig_user_image_url')->nullable();
            $table->integer('ig_like_count');
            $table->string('ig_image_url');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instagram_images');
    }
}
