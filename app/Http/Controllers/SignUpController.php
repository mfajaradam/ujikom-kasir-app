<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignUpController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sign Up',
            'route' => route('signUp.store'),
            'method' => 'POST'
        ];
        return view('user.sign-up', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required|min:5|numeric',
            'name' => 'required|min:4',
            'email' => 'required|email',
            'phone' => 'required|min:12',
            'password' => 'required|min:5',
            'role' => 'required'
        ]);

        User::create([
            'UserID' => $request->userId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'role' => $request->role,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        notify()->success('Successfully Sign Up');
        return redirect()->route('signIn')->with(['success']);
    }
}
