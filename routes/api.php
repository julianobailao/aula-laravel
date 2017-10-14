<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// // listagem de donkeys
// Route::get('/donkeys', 'HomeController@index');
// // detalhes
// Route::get('/donkeys/{donkey}', 'HomeController@show');
// // criar
// Route::post('/donkeys', 'HomeController@store');
// // atualizar / editar
// Route::put('/donkeys/{donkey}', 'HomeController@update');
// // excluir
// Route::delete('/donkeys/{donkey}', 'HomeController@delete');
//
// Route::get('/donkeys/create', 'HomeController@create');
// Route::get('/donkeys/edit', 'HomeController@edit');

Route::resource('donkeys', 'DonkeyController', ['except' => ['create', 'edit']]);
