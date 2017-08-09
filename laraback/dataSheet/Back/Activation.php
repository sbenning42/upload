<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $fillable = [
       'user_id', 'token', 'completed'
    ];
}
