<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    protected $fillable = [
        // 'DetailID',
        'Product_ID',
        'Sales_ID',
        'quantity',
        // 'subtotal',
    ];

    public function sales()
    {
        return $this->belongsTo(Sale::class, 'Sales_ID', 'id'); // pastikan 'id' adalah primary key di Sale
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID', 'id'); // pastikan 'id' adalah primary key di Product
    }
}
