<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Matchchedule extends Authenticatable
{
    use Notifiable;
    protected $table = 'match_schedule';
    protected $guard = 'match_schedule';

    /*****This function is used to get team name via team id*******/
    public function teamone()
    {
      return $this->hasOne('App\Models\Teams','id','first_team_id');
    }
    /*****This function is used to get team name via team id*******/
    public function teamtwo()
    {
      return $this->hasOne('App\Models\Teams','id','second_team_id');
    }


    public function points()
    {
      return $this->hasMany('App\Models\Points','series_id')->with('team');
    }
}
