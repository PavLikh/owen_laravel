<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        if(Auth::check()){
            // return redirect(route('user.private'));
            return redirect(route('home'));
       }

        $formFields = $request->only(['email','password']);

        if(Auth::attempt($formFields)){
            // return redirect()->intended(route('user.private'));
            return redirect()->intended(route('home'));
            // return redirect()->intended('/');
        }
        return redirect()->intended(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
