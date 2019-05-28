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
Route::group(['middleware' => ['auth']], function () { 

    Route::get('/', function () {
        return redirect('/dashboard');
    });
    
    Route::resource('usuarios', 'UsuarioController');
    Route::resource('users', 'UserController');
    Route::patch('/users/{id}/reset',[
        'as' => 'users.reset',
        'uses' => 'UserController@reset'
    ]);
    Route::resource('dashboard', 'DashBoardController');
    Route::resource('tag', 'TagController');
    Route::resource('brand', 'BrandController');
    Route::resource('milestone', 'MilestoneController');
    
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
