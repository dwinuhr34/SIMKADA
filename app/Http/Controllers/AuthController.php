<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // halaman login
    public function login()
    {
        return view('auth.login');
    }

    // proses login
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // username dan password
        if (
            $request->username === 'admin' &&
            $request->password === 'admin123'
        ) {

            session([
                'login' => true,
                'username' => 'Admin'
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    // logout
    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}