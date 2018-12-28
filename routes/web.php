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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () 
{
    //Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/export/{number}', 'TransacoesController@apresentaHistorico')->name('exportShow');
    Route::get('/export/file/{projeto}', 'TransacoesController@export')->name('retornoFile');
    Route::get('/home', 'TransacoesController@homeTransacoes')->name('home');
    Route::get('/transacoes/adicionar', 'TransacoesController@homeAdicionar')->name('adicionar');
    Route::get('/transacoes/remover', 'TransacoesController@homeRemover')->name('remover');
    //Route::get('/transacoes/remover', 'TransacoesController@removerTransacoes')->name('remover');
    Route::post('/transacoes/criar', 'TransacoesController@adicionarTransacoes')->name('criar');
});



