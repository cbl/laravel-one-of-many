<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function logins(): HasMany
    {
        return $this->hasMany(Login::class);
    }

    public function latest_login(): HasOne
    {
        return $this->hasOne(Login::class)->ofMany()->orderByDesc('id');
    }

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    public function current_state(): HasOne
    {
        return $this->hasOne(State::class)->ofMany()->orderByDesc('id');
    }
}
