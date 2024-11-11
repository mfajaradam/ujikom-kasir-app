<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'totalProduct' => Product::count(),
            'doneSalesCount' => Sale::where('status', 'done')->count(),
            'pendingSalesCount' => Sale::where('status', 'pending')->count(),
            'customerCount' => Customer::count(),
        ];
        return view('dashboard', $data);
    }

    public function print()
    {
        $saleAll = Sale::where('status', 'done')->get();
        return view('print', compact('saleAll' ));
    }
}
