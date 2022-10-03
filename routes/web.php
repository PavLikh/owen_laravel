<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomePageController@index')->name('home');
Route::get('/article/{articleId}', 'ArticlePageController@index')->name('article');
Route::post('/article/edit', 'ArticlePageController@edit')->name('article.edit');

Route::name('user.')->group(function(){
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route());
        }
        return view('login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('registration', function(){
        if(Auth::check()) {
            return redirect(route('home'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);
});
