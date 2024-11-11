<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'CustomerID',
        'name_customer',
        'address',
        'phone',
    ];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'CustomerID');
    }
}
