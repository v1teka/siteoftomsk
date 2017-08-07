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
Route::post('upload-image', 'ImgUploadController@upload');

// Проекты
Route::prefix('projects')->group(function() {
    Route::get('/', 'ProjectController@index')->name('projects.index');
    Route::post('/', 'ProjectController@store')->name('projects.store')->middleware('auth');
    Route::get('/create', 'ProjectController@create')->name('projects.create')->middleware('auth');
    Route::get('/{project}', 'ProjectController@show')->name('projects.show');
    Route::patch('/{project}', 'ProjectController@update')->name('projects.update')->middleware('can:update,project');
    Route::get('/{project}/edit', 'ProjectController@edit')->name('projects.edit')->middleware('can:update,project');
});

// Рубрики
Route::prefix('rubrics')->group(function() {
    Route::get('/', 'RubricController@index')->name('rubrics.index');
    Route::post('/', 'RubricController@store')->name('rubrics.store')->middleware('can:create,App\Rubric');;
    Route::get('/create', 'RubricController@create')->name('rubrics.create')->middleware('can:create,App\Rubric');;
    Route::get('/{rubric}', 'RubricController@show')->name('rubrics.show');
    Route::patch('/{rubric}', 'RubricController@update')->name('rubrics.update')->middleware('can:update,rubric');
    Route::get('/{rubric}/edit', 'RubricController@edit')->name('rubrics.edit')->middleware('can:update,rubric');
});

// Администрирование
Route::prefix('admin')->group(function() {
    Route::get('/projects', 'ProjectController@adminIndex')->name('projects.admin.index')->middleware('can:administrate,App\Project');
    Route::get('/projects/{project}', 'ProjectController@adminShow')->name('projects.admin.show')->middleware('can:administrate,App\Project');
    Route::patch('/projects/{project}', 'ProjectController@adminUpdate')->name('projects.admin.update')->middleware('can:administrate,App\Project');
    Route::get('/projects/create', 'ProjectController@adminCreate')->name('projects.admin.create')->middleware('can:administrate,App\Project');

    Route::get('/users', 'UserController@adminIndex')->name('users.admin.index')->middleware('can:administrate,App\User');
    Route::get('/users/{user}', 'UserController@adminShow')->name('users.admin.show')->middleware('can:administrate,App\User');
    Route::patch('/users/{user}', 'UserController@adminUpdate')->name('users.admin.update')->middleware('can:update,user');

    Route::get('/rubrics', 'RubricController@adminIndex')->name('rubrics.admin.index')->middleware('can:administrate,App\Rubric');

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
