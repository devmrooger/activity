<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get   ('atividades'     , 'AtividadeController@index');
Route::get   ('atividades/{id}', 'AtividadeController@show');
Route::post  ('atividades'     , 'AtividadeController@store');
Route::put   ('atividades/{id}', 'AtividadeController@update');
Route::delete('atividades/{id}', 'AtividadeController@deletar');

