<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'ref',
        'valid',
        'address_id',
        'state_id',
        'category_id',
        'designer_id',
        'brand_id',
        'material_id',
        'condition_id',
        'color_id',
        'style_id',
        'period_id',
        'quantity',
        'price',
        'description',
    ];
}
