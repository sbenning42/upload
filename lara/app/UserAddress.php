<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        'valid',
        'name',
        'type',
        'street_1',
        'street_2',
        'complement',
        'city',
        'postcode',
        'country_id',
        'longitude',
        'latitude',
        'phone_1',
        'phone_2',
        'state_id',
    ];
}
