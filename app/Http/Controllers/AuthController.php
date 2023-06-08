<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => "Login"
        ]);
    }

    public function authLogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validate)) {
            return redirect('/')->with('success', 'Login Berhasil!!');
        } else {
            return redirect('/login')->with('error', 'Login Gagal!!');
        }
    }

    public function register()
    {
        return view('auth.register', [
            'title' => "Register"
        ]);
    }

    public function authRegister(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'password1' => 'required|same:password'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        try {
            User::create($validate);
            return redirect('/login')->with('success', 'Registrasi Berhasil Silahkan Login!!');
        } catch (\Exception $e) {
            return redirect('/daftar')->with('error', 'Registrasi Gagal, Silahkan Coba Lagi!!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
