<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name',
        'category',
        'product_price',
        'description',
        'point',
        'activation',
        'photo',
];
}
