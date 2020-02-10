<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teams extends Authenticatable
{
    use Notifiable;
    protected $table = 'teams';
    protected $guard = 'teams';
    /*****This function is used to get playest name via team id*******/
    public function player()
    {
      return $this->hasMany('App\Models\Players','team_id');
    }
}
