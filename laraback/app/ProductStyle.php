<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStyle extends Model
{
    protected $fillable = [
        'name', 'valid',
    ];
}
