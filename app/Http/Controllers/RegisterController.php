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
            return redirect(route('user.private'));
        }
        // dd($request);
        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);
        // dd($user);
        if($user) {
            auth()->login($user);
            // Auth::login($user); //same

            // return redirect()->to(route('user.private'));
            return redirect(route('user.private')); //same
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Something went wrong'
        ]);
    }
}
