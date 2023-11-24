<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; // Import Hash

class SessionController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password, // Do not hash the password here
        ];

        if (Auth::attempt($credentials)) {
            // If authentication succeeds
            return redirect("proyek")->with("success", "Login Berhasil!");
        } else {
            // If authentication fails
            return redirect("session")->withErrors('Username atau password tidak valid');
        }
    }
}
