<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('home'));
        }
        $validateFields = $request->validate([
            'login' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);
        if($user) {
            auth()->login($user);
            return redirect(route('home')); //same
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Something went wrong'
        ]);
    }
}
