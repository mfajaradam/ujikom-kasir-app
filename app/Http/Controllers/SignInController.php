<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SignInController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sign In',
        ];
        return view('user.sign-in', $data);
    }

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            // Jika validasi gagal, kembalikan ke halaman login dengan error
            return redirect()->route('signIn')
                ->withInput()
                ->withErrors($validator);
        }

        // Coba autentikasi pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autentikasi berhasil, arahkan ke dashboard
            notify()->success('Successfully Login');
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } else {
            // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->route('signIn')->with('error', 'Either email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        notify()->success('Successfully logout');
        return redirect()->route('signIn');
    }
}
