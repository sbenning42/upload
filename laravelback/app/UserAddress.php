<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        'state_id',
        'valid',
        'type',
        'name',
        'street_1',
        'street_2',
        'complement',
        'floor',
        'elevator',
        'phone_1',
        'phone_2',
        'postcode',
        'city',
        'country_id',
        'longitude',
        'latitude',
    ];
}
