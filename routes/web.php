<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/create', function () {
//     return view('create');
// });

// Route::get('project/create' , [ProjectController::class, 'create']);
// Route::post('project/{project}/create' , [ProjectController::class, 'store']);
Route::resource('project', ProjectController::class);

// Route::get('/project/{id}', [ProjectController::class, 'show'])->name('view');
Route::post('project-update',[ProjectController::class, 'update']);
Route::post('del-project',[ProjectController::class,'delete']);

Route::post('projects/{project}/comments', [CommentController::class, 'storeComment'])->name('projects.storeComment');
Route::put('/comments/{comment}', [CommentController::class, 'updateComment'])->name('comments.update');
Route::post('/comment-delete',[CommentController::class,'delete']);
Route::post('comments-update',[CommentController::class,'update']);
// Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
// Route::put('/profile/update', 'ProfileController@update')->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class,'update'])->name('profile.update');
});