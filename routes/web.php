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

//homepage pubblica
Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

//creo un gruppo di rotte con prefisso 'admin.'(rotte che mostrano le views non pubbliche ma dell'autente loggato)
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    //middleware controlla che sia avvenuta l'autenticazione login prima di completare la rotta
    //la rotta home di un utente loggato(admin) è la dashboard
    Route::get('/home', 'Admin\HomeController@index')->name('dashboard');

});
