<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/books');
        }

        return back()->with('error_login', 'Username atau password salah');
    }

    public function register(Request $request)
    {
        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return back()->with('success_register', 'Registrasi berhasil, silakan login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}