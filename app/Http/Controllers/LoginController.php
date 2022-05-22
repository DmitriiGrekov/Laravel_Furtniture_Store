<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function login(){
        return view('auth/login');
    }

    public function login_confirmed(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials, $request->input('remember'))){
            $request -> session()->regenerate();
            return redirect()->route("main.index");
        }

        // return back()->withErrors([
        //     'email' => 'Вы ввели не верный логин или пароль'
        // ]);
        return redirect()->route('login')->withErrors([
            'email' => 'Вы ввели неверный логин или пароль'
        ]);
    }

}
