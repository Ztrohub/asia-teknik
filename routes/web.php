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
    return redirect('/pekerjaans');
});

Route::resource('pekerjaans', 'PekerjaansController');

Route::put('pekerjaans/{id}/done', 'NewController@done');

Route::put('pekerjaans/{id}/cash', 'NewController@cash');
Route::put('pekerjaans/{id}/tf', 'NewController@tf');

Route::get('today', 'NewController@today');

Route::get('bayar', 'NewController@bayar');

Route::get('teknisi/{id}', 'NewController@teknisi');

Route::get('/teknisi', 'NewController@bikinTeknisi');

Route::post('/teknisi', 'NewController@buatTeknisi');