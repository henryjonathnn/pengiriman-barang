<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }


    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
                'terms' => 'required',
            ],
            [
                'terms.required' => 'Anda harus menyetujui persyaratan dan ketentuan.',
            ]
        );

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->intended('/login')->with('toast_success', 'Akun anda berhasil dibuat!');
        ;
    }

    public function login_check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (auth()->user()->can('data_pengiriman')) {
                return redirect()->intended('/pengiriman')->with('success', 'Login Berhasil!');
            } else {
                return redirect()->intended('/user/home')->with('success', 'Login Berhasil!');
            }
        }

        return back()->withErrors([
            'email' => 'Maaf email atau password yang anda masukkan salah!',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
