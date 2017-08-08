<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPeriod extends Model
{
    protected $fillable = [
        'name', 'valid',
    ];
}
