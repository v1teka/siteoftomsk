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
    Route::get('/create', 'ProjectController@create')->name('projects.create')->middleware('can:create,App\Project');
    Route::post('/', 'ProjectController@store')->name('projects.store')->middleware('can:create,App\Project');
    Route::get('/{project}/edit', 'ProjectController@edit')->name('projects.edit')->middleware('can:update,project');
    Route::patch('/{project}', 'ProjectController@update')->name('projects.update')->middleware('can:update,project');
    Route::delete('/{project}', 'ProjectController@destroy')->name('projects.destroy')->middleware('can:update,project');
    Route::post('/{project}/rate', 'ProjectController@rate')->name('projects.rate')->middleware('auth');
    Route::get('/{project}', 'ProjectController@show')->name('projects.show');
    Route::get('/', 'ProjectController@index')->name('projects.index');
});

// Рубрики
Route::get('/rubrics/create', 'RubricController@create')->name('rubrics.create')->middleware('can:create,App\Rubric');;
Route::post('/rubrics', 'RubricController@store')->name('rubrics.store')->middleware('can:create,App\Rubric');;
Route::get('/rubrics/{rubric}/edit', 'RubricController@edit')->name('rubrics.edit')->middleware('can:update,rubric');
Route::patch('/rubrics/{rubric}', 'RubricController@update')->name('rubrics.update')->middleware('can:update,rubric');
Route::get('/rubrics/{rubric}', 'RubricController@show')->name('rubrics.show');
Route::get('/rubrics', 'RubricController@index')->name('rubrics.index');

// Администрирование
Route::get('/admin/projects', 'ProjectController@adminIndex')->name('projects.admin.index')->middleware('can:administrate,App\Project');
Route::get('/admin/projects/{project}', 'ProjectController@adminShow')->name('projects.admin.show')->middleware('can:administrate,App\Project');
Route::patch('/admin/projects/{project}', 'ProjectController@adminUpdate')->name('projects.admin.update')->middleware('can:administrate,App\Project');

Route::get('/admin/users', 'UserController@adminIndex')->name('users.admin.index')->middleware('can:administrate,App\User');
Route::get('/admin/users/{user}', 'UserController@adminShow')->name('users.admin.show')->middleware('can:administrate,App\User');
Route::patch('/admin/users/{user}', 'UserController@adminUpdate')->name('users.admin.update')->middleware('can:update,user');

Route::get('/admin/rubrics', 'RubricController@adminIndex')->name('rubrics.admin.index')->middleware('can:administrate,App\Rubric');



Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
