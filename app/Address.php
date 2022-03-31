<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street', 'complement', 'number', 'city', 'state', 'country', 'zipcode', 'user_id'
    ];
}