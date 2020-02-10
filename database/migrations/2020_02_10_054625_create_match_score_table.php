<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_score', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('match_schedule_id')->nullable()->comment('Match schedule id');
          $table->foreign('match_schedule_id')->references('id')->on('match_schedule')->onDelete('cascade');
          $table->unsignedBigInteger('player_squads_id')->nullable()->comment('Player squad id');
          $table->foreign('player_squads_id')->references('id')->on('player_squads')->onDelete('cascade');
          $table->integer('runs')->default(0);
          $table->integer('fours')->default(0);
          $table->integer('sixes')->default(0);
          $table->integer('dual')->default(0);
          $table->integer('single')->default(0);
          $table->integer('overs')->default(0);
          $table->integer('wickets')->default(0);
          $table->integer('hat_trick')->default(0);
          $table->integer('fifties')->default(0);
          $table->integer('hundreds')->default(0);
          $table->enum('is_play',['1','2'])->default('1')->comment('1=batting,2=bolling');
          $table->enum('is_delete',['0','1'])->default('0')->comment('1=delete');
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
        Schema::dropIfExists('match_score');
    }
}
