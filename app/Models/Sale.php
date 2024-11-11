<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'SalesID',
        'sale_date',
        'total_price',
        'status',
        'Customer_ID'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customer_ID', 'id');
    }

    public function sales_details() {
        return $this->hasMany(SalesDetail::class);
    }
}
