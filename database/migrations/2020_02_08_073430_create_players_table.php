<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('team_id')->nullable()->comment('Team Name id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profile_pic')->nullable();
            $table->integer('jersey_number');
            $table->unsignedBigInteger('country_id')->nullable()->comment('Country Name id');
            $table->enum('role_type',['1','2','3','4'])->default('1')->comment('1=BATSMEN,2=ALL ROUNDER ,3=WICKET KEEPER ,4=BOWLER');
            $table->enum('is_active',['0','1'])->default('1')->comment('0=inactive,1=active');
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
        Schema::dropIfExists('players');
    }
}
