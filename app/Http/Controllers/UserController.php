<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'User',
            'users' => User::all()
        ];
        return view('user.index', $data);
    }
}
