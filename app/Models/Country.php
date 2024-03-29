<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Country extends Authenticatable
{
    use Notifiable;
    protected $table = 'countries';
    protected $guard = 'countries';
}
