<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function register_submit(RegisterRequest $request){
        $name = $request->input('name');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_repeat = $request->input('password_confirmation');

        if($password != $password_repeat){
            return back()->withErrors([
                'password'=>'Пароли не совпадают'
            ]);
        }

        if (User::where('name', '=', $name)->count() > 0) {
            return back()->withErrors([
                'name'=>'Данный логин уже существует'
            ]);
        }

        if (User::where('email', '=', $email)->count() > 0) {
            return back()->withErrors([
                'email'=>'Данная почта уже существует'
            ]);
        }

        $user = User::create([
            'name' => $name,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);


        if($user){
            event(new Registered($user));
            auth('web')->login($user);
            return redirect(route('verification.notice'));
        }

        return redirect('/');
    }
}
