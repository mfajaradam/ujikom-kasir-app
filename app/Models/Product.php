<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'ProductID',
        'image',
        'name_product',
        'category',
        'price',
        'stock',
    ];
}
