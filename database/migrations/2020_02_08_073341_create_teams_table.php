<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('club')->nullable();
            $table->string('state')->nullable();
            $table->string('logo')->nullable();
            $table->enum('team_type',['1','2','3','4'])->default('1')->comment('1=international,2=domestic,3=league,4=women');
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
        Schema::dropIfExists('teams');
    }
}
