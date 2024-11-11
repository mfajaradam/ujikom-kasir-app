<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class Customer extends Model
{
    protected $fillable = [
        'CustomerID',
        'name_customer',
        'address',
        'phone',
        'role'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'CustomerID');
    }
}
