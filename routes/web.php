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

Route::get('mobile', function() {return view('errors.indeveloping');})->name('mobile');

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
    Route::get('/{project}/edit', 'ProjectController@edit')->name('projects.edit')->middleware('can:update,project');
    Route::post('/{project}', 'ProjectController@update')->name('projects.update')->middleware('can:update,project');
    Route::delete('/{project}', 'ProjectController@destroy')->name('projects.destroy')->middleware('can:update,project');
    Route::post('/{project}/delete', 'ProjectController@destroy')->name('projects.destroy')->middleware('can:update,project');
    Route::get('/{project}/delete', 'ProjectController@destroy')->name('projects.destroy')->middleware('can:update,project');
    Route::post('/{project}/rate', 'ProjectController@rate')->name('projects.rate')->middleware('auth');
    Route::post('/{project}/addcomment', 'CommentController@store')->name('projects.addcomment')->middleware('auth');
});

// Рубрики
Route::prefix('rubrics')->group(function() {
    Route::get('/', 'RubricController@index')->name('rubrics.index');
    Route::post('/', 'RubricController@store')->name('rubrics.store')->middleware('can:create,App\Rubric');;
    Route::get('/create', 'RubricController@create')->name('rubrics.create')->middleware('can:create,App\Rubric');;
    Route::get('/{rubric}', 'RubricController@show')->name('rubrics.show');
    Route::patch('/{rubric}', 'RubricController@update')->name('rubrics.update')->middleware('can:update,rubric');
    Route::delete('/{rubric}', 'RubricController@destroy')->name('rubrics.destroy')->middleware('can:delete,rubric');
    Route::get('/{rubric}/edit', 'RubricController@edit')->name('rubrics.edit')->middleware('can:update,rubric');
});

// Администрирование
Route::prefix('admin')->group(function() {
    Route::get('/comment', 'CommentController@adminIndex')->name('comments.admin.index')->middleware('can:administrate,App\Comment');
    Route::post('/comment/update/ajax', 'CommentController@editAjax')->name('comment.admin.update.ajax')->middleware('can:update,App\Comment');
    Route::post('/comment/process/update/ajax', 'CommentController@editProcessAjax')->name('comment.process.admin.update.ajax')->middleware('can:update,App\Comment');
    Route::post('/comment/publish/update/ajax', 'CommentController@editPublishAjax')->name('comment.publish.admin.update.ajax')->middleware('can:update,App\Comment');
    
    Route::get('/projects', 'ProjectController@adminIndex')->name('projects.admin.index')->middleware('can:administrate,App\Project');
    Route::get('/projects/{project}', 'ProjectController@adminShow')->name('projects.admin.show')->middleware('can:administrate,App\Project');
    Route::patch('/projects/{project}', 'ProjectController@adminUpdate')->name('projects.admin.update')->middleware('can:administrate,App\Project');
    Route::get('/create/projects/', 'ProjectController@adminCreate')->name('projects.admin.create')->middleware('can:administrate,App\Project');

    Route::get('/users', 'UserController@adminIndex')->name('users.admin.index')->middleware('can:administrate,App\User');
    Route::get('/users/{user}', 'UserController@adminShow')->name('users.admin.show')->middleware('can:administrate,App\User');
    Route::patch('/users/{user}', 'UserController@adminUpdate')->name('users.admin.update')->middleware('can:update,user');

    Route::get('/rubrics', 'RubricController@adminIndex')->name('rubrics.admin.index')->middleware('can:administrate,App\Rubric');

    Route::prefix('smart')->group(function() {
        Route::get('/sections', 'SmartSectionController@adminIndex')->name('smart.sections.admin.index')->middleware('can:administrate,App\SmartSection');
        Route::get('/sections/create', 'SmartSectionController@create')->name('smart.sections.create.admin.index')->middleware('can:create,App\SmartSection');
        Route::post('/sections/store', 'SmartSectionController@store')->name('smart.sections.store.admin.index')->middleware('can:create,App\SmartSection');
        Route::get('/sections/edit/{smartSection}', 'SmartSectionController@edit')->name('smart.sections.edit.admin.index');//->middleware('can:update,App\SmartSection');
        Route::post('/sections/update/{smartSection}', 'SmartSectionController@update')->name('smart.sections.update.admin.index');//->middleware('can:update,App\SmartSection');

        Route::get('/solutions', 'SmartSolutionController@adminIndex')->name('smart.solutions.admin.index')->middleware('can:administrate,App\SmartSolution');
        Route::get('/solutions/create', 'SmartSolutionController@create')->name('smart.solutions.create.admin.index')->middleware('can:create,App\SmartSolution');
        Route::post('/solutions/store', 'SmartSolutionController@store')->name('smart.solutions.store.admin.index')->middleware('can:create,App\SmartSolution');
        Route::get('/solutions/edit/{smartSolution}', 'SmartSolutionController@edit')->name('smart.solutions.edit.admin.index');//->middleware('can:update,App\SmartSection');
        Route::post('/solutions/update/{smartSolution}', 'SmartSolutionController@update')->name('smart.solutions.update.admin.index');//->middleware('can:update,App\SmartSection');
    });
});

Route::prefix('smart')->group(function() {
    Route::get('/', 'SmartSectionController@index')->name('smart.index');
    Route::post('/{smartSolution}/rate', 'SmartSolutionController@rate')->name('smartsolution.rate')->middleware('auth');
});

Route::post('uploads/ckeditor/image', 'UploadController@storeCKEditorImage')->name('uploads.ckeditor.image');

// Форум
Route::prefix('forum')->group(function() {
    Route::get('/', 'ForumController@index')->name('forum.index')->middleware('auth')->middleware('forum.accessVerify');
    Route::get('/accessDenied', 'ForumController@forumAccessDenied')->name('forum.accesDenied');
    // Форум разделы
    Route::post('/sections', 'ForumController@storeSection')->name('forum.sections.store')->middleware('can:moderate,App\ForumSection');
    Route::patch('/sections/{section}', 'ForumController@updateSection')->name('forum.sections.update')->middleware('can:moderate,App\ForumSection');
    Route::get('/sections/create', 'ForumController@createSection')->name('forum.sections.create')->middleware('can:moderate,App\ForumSection');
    Route::get('/sections/{section}/edit', 'ForumController@editSection')->name('forum.sections.edit')->middleware('can:moderate,App\ForumSection');
    // Форум темы
    Route::post('/topics', 'ForumController@storeTopic')->name('forum.topics.store')->middleware('can:create,App\ForumTopic');
    Route::get('/topics/create', 'ForumController@createTopic')->name('forum.topics.create')->middleware('can:create,App\ForumTopic');
    Route::get('/topics/{topic}/edit', 'ForumController@editTopic')->name('forum.topics.edit')->middleware('can:update,topic');
    Route::patch('/topics/{topic}', 'ForumController@updateTopic')->name('forum.topics.update')->middleware('can:update,topic');
    Route::get('/topics/{topic}', 'ForumController@showTopic')->name('forum.topics.show')->middleware('auth');
    // Форум сообщения
    Route::post('/messages/{topic}', 'ForumController@sendMessage')->name('forum.messages.send')->middleware('can:send,App\ForumMessage');
    Route::delete('/messages/{message}', 'ForumController@deleteMessage')->name('forum.messages.delete')->middleware('can:delete,message');
});

Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

