<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserState extends Model
{
    protected $fillable = [
        'name', 'valid',
    ];
}
