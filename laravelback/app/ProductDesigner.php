<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDesigner extends Model
{
    protected $fillable = [
        'name', 'valid', 'surname'
    ];
}
