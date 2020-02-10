<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Matchscore extends Authenticatable
{
    use Notifiable;
    protected $table = 'match_score';
    protected $guard = 'match_score';

}
