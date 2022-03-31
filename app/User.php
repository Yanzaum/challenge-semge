<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'birthday', 'profile',
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }

    public function phones()
    {
        return $this->hasMany(Phone::class, 'user_id');
    }
}
