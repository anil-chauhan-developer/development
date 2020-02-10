<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('series_id')->nullable()->comment('Series  id');
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
            $table->unsignedBigInteger('first_team_id')->nullable()->comment('Team id');
            $table->foreign('first_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('second_team_id')->nullable()->comment('Team id');
            $table->foreign('second_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->date('match_date')->nullable();
            $table->time('match_time')->nullable();
            $table->longText('venue_details')->nullable();
            $table->enum('is_result',['1','2','3'])->default('1')->comment('1=pending,2=complete,3=withdrow');
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
        Schema::dropIfExists('match_schedule');
    }
}
