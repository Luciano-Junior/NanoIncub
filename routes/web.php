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
// Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');
// });

Route::resource('/funcionario', Funcionario\FuncionarioController::class);

Route::get('/login', function () {
    return view('login.login');
})->name('sign-in');
Route::post('/login', 'Auth\AuthController@login')->name('login');
