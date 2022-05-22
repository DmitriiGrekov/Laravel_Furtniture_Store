<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::prefix('auth/')->group(function(){
    Route::get('profile/main/', [ProfileController::class, 'index'])->middleware('auth')->name('profile');

    Route::get('login/', [LoginController::class, 'login'])->name('login.user');
    Route::post('login/', [LoginController::class, 'login_confirmed'])->name('login');
    Route::post('logout/', [LogoutController::class, 'logout'])->name('logout');

    Route::get('register/', [RegisterController::class, 'register'])->name('register');
    Route::post('register/', [RegisterController::class, 'register_submit'])->name('register.submit');

    Route::get('register/verify', function(){
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('register/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('main.index')->with('success', 'Ваша почта подтверждена');
    })->middleware('signed')->name('verification.verify');


    Route::post('register/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Письмо отправлено');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    // Отображение формы с вводом почты для сброса пароля
    Route::get('password/reset/', function(){
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');


    //  Отправка письма с сылкой на сброс пароля
    Route::post('password/reset/', function(Request $request){

        $request->validate(['email'=> 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT ? back()->with(['status'=>__($status)]) : back()->withErrors(['email'=>__($status)]);
    })->middleware('guest')->name('password.email');

    // Отображение формы сброса пароля
    Route::get('password/reset/{token}', function($token){
        return view('auth.reset-password', ['token'=>$token]);
    })->middleware('guest')->name('password.reset');


    // Сброс пароля
    Route::post('password/reset/confirmed', function(Request $request){
        $request -> validate([
            'token'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password){
                $user -> forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET ? redirect()->route('login.user')->with('status', __($status)) : back()->withErrors(['email'=>[__($status)]]);
    })->middleware('guest')->name('password.update');
});
