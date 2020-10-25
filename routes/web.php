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

Route::get('/', 'IndexController@signin')->name("enter");

Route::get('/login', 'AuthController@goLogin')->name("login");

Route::get('/game', 'GameController@enterGame')->name("game");

Route::post('/result', 'GameController@game');

Route::get('/guess', 'MagicianController@guessView')->name("guess");

Route::post('/chek-magician', 'MagicianController@checkGuess');

Route::post('/check-upload', 'MagicianController@store');

Route::get('/magician-upload', 'MagicianController@upload')->name("magician-upload");

Auth::routes();
