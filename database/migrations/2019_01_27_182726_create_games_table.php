<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->unsigned();
            $table->integer('round_id')->unsigned();
            $table->integer('home_id')->unsigned();
            $table->integer('guest_id')->unsigned();
            $table->integer('home_score')->unsigned()->nullable();
            $table->integer('guest_score')->unsigned()->nullable();
            $table->integer('home_score_penalty')->unsigned()->nullable();
            $table->integer('guest_score_penalty')->unsigned()->nullable();
            $table->string('stadium_name')->nullable();
            $table->timestamp('match_time')->nullable();
            $table->timestamps();

            $table->foreign('round_id')->references('id')->on('rounds');
            $table->foreign('home_id')->references('id')->on('teams');
            $table->foreign('guest_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
