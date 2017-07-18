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

Route::get('/', 'PageController@index')->name('pages.index');
Route::get('/about', 'PageController@about')->name('pages.about');
Route::get('/profile', 'ProfileController@show')->name('profile.show')->middleware('auth');
Route::patch('/profile', 'ProfileController@update')->name('profile.update')->middleware('auth');

// Проекты
Route::prefix('projects')->group(function() {
    Route::get('/create', 'ProjectController@create')->name('projects.create')->middleware('auth');
    Route::post('/', 'ProjectController@store')->name('projects.store')->middleware('auth');
    Route::get('/{project}/edit', 'ProjectController@edit')->name('projects.edit')->middleware('can:update,project');
    Route::patch('/{project}', 'ProjectController@update')->name('projects.update')->middleware('can:update,project');
    Route::patch('/{project}/moderate', 'ProjectController@moderate')->name('projects.moderate')->middleware('can:moderate,project');
    Route::patch('/{project}/publish', 'ProjectController@publish')->name('projects.publish')->middleware('can:publish,project');
    Route::get('/{project}', 'ProjectController@show')->name('projects.show');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
