<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Model
{
    use HasFactory, Notifiable;
    // use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
