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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');
});

Route::resource('/funcionario', Funcionario\FuncionarioController::class);
Route::get('/funcionario/delete/{id}', 'Funcionario\FuncionarioController@destroy')->name('funcionario.delete');
Route::get('/funcionario/extrato/{id}', 'Funcionario\FuncionarioController@extrato')->name('funcionario.extrato');
Route::post('/funcionario/filter', 'Funcionario\FuncionarioController@filter')->name('funcionario.filter');

Route::get('/movimentacao', 'Movimentacao\MovimentacaoController@index')->name('movimentacao.index');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
