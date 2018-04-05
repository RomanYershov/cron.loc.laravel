<?php

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
use App\User;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'HomeController@create');

Route::post('/create', 'HomeController@store');

Route::get('/news/{id}', function ($id){
    $n=App\News::find($id);
    return view("news")->with(compact("n"));
});

Route::get('/home/{sign_code}', function ($signCode){
    $user=User::where("signCode", $signCode )->first();
    $user->signature=0;
    $user->signCode=null;
    $user->save();
    return "Вы успешно отписались от рассылки на новости";
});

Route::get('/export', 'HomeController@export')->name("export");
