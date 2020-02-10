<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Players extends Authenticatable
{
    use Notifiable;
    protected $table = 'players';
    protected $guard = 'players';

    /*****This function is used to get team name via team id*******/
    public function team()
    {
      return $this->hasOne('App\Models\Teams','id','team_id');
    }
    /*****This function is used to get country name via country id*******/
    public function country()
    {
      return $this->hasOne('App\Models\Country','id','country_id');
    }
    /*******This function is get to maches playing by palyers*******/
    public function matches()
    {
      return $this->hasMany('App\Models\Playersquads','player_id','id')->with('runhistory');
    }

}
