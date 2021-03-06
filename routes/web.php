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
//homepage pubblica
Route::get('/alternativeView', 'HomeController@alternativeView')->name('alternativeView');
//visualizzazione posts nel frontoffice
Route::get('/posts', 'PostController@index')->name('public_posts.index');
//visualizzazione posts nel frontoffice
Route::get('/posts/{slug}', 'PostController@show')->name('public_posts.show');
//visualizzazione posts associati ad una categoria nel frontoffice
Route::get('/category-posts/{slug}', 'CategoryController@show')->name('category_posts.show');
//visualizzazione posts associati ad una categoria nel frontoffice
Route::get('/tag-posts/{slug}', 'TagController@show')->name('tag_posts.show');



//registrazione disponibile a tutti
//Auth::routes();

//registrazione non disponibile per i visitatori
Auth::routes(['register' => false]);

//creo un gruppo di rotte con prefisso 'admin.'(rotte che mostrano le views non pubbliche ma dell'autente loggato)
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    //middleware controlla che sia avvenuta l'autenticazione login prima di completare la rotta
    //la rotta home di un utente loggato(admin) è la dashboard
    Route::get('/', 'HomeController@index')->name('dashboard');
    //rotte del CRUD di posts
    Route::resource('/posts', 'PostController');
    //rotte del CRUD di categories
    Route::resource('/categories', 'CategoryController');
    //rotta per info account con bottone per generazione api_token
    Route::get('/account-info', 'HomeController@accountInfo')->name('account_info');
    //rotta del bottone che genera l'api_token
    Route::post('/account-info/token-generator', 'HomeController@tokenGenerator')->name('token_generator');

});
