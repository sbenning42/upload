<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPicture extends Model
{
    protected $fillable = [
        'user_id', 'valid', 'public_path'
    ];
}
