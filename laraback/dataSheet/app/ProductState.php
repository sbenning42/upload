<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductState extends Model
{
    protected $fillable = [
        'name', 'valid',
    ];
}
