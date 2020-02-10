<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Points extends Authenticatable
{
    use Notifiable;
    protected $table = 'match_point_table';
    protected $guard = 'match_point_table';
}
