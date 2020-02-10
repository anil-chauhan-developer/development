<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerSquadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_squads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('match_schedule_id')->nullable()->comment('Match schedule id');
            $table->foreign('match_schedule_id')->references('id')->on('match_schedule')->onDelete('cascade');
            $table->unsignedBigInteger('team_id')->nullable()->comment('Team id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('player_id')->nullable()->comment('Player id');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
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
        Schema::dropIfExists('player_squads');
    }
}
