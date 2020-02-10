<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Playersquads extends Authenticatable
{
    use Notifiable;
    protected $table = 'player_squads';
    protected $guard = 'player_squads';
    
    public function runhistory(){
        return $this->hasOne('App\Models\Matchscore','player_squads_id','id');
    }
}
