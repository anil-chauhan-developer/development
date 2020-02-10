<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchPointTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_point_table', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('series_id')->nullable()->comment('Series Name id');
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
            $table->unsignedBigInteger('team_id')->nullable()->comment('Team id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->enum('is_result',['1','2','3'])->default('1')->comment('1=win,2=lost,3=tied');
            $table->integer('points')->default(0);
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
        Schema::dropIfExists('match_point_table');
    }
}
