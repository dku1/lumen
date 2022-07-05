<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\LikedController as AdminLikedController;
use App\Http\Controllers\LikedController;
use App\Http\Controllers\PostController;

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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('categories', [MainController::class, 'categories'])->name('categories');



Route::group([
    'prefix' => 'posts',
    'as' => 'posts.',
], function (){
    Route::get('show/{post}', [PostController::class, 'show'])->name('show');
    Route::get('discussed', [PostController::class, 'discussed'])->name('discussed');
    Route::get('top', [PostController::class, 'top'])->name('top');
    Route::get('weeks', [PostController::class, 'week'])->name('week');
    Route::get('category/{category}', [PostController::class, 'category'])->name('category');

});


Route::group([
    'prefix' => 'comments',
    'as' => 'comments.',
    'middleware' => ['auth'],
], function (){
   Route::post('{post}', [CommentController::class, 'store'])->name('store');
   Route::get('edit/{comment}', [CommentController::class, 'edit'])->name('edit');
   Route::patch('update/{comment}', [CommentController::class, 'update'])->name('update');
   Route::delete('delete/{comment}', [CommentController::class, 'delete'])->name('delete');
});

Route::get('liked/{post}', [LikedController::class, 'liked'])->name('liked')->middleware('auth');

Route::group([
    'prefix' => 'personal',
    'as' => 'personal.',
    'middleware' => ['auth'],
    ], function (){
    Route::get('/', [PersonalController::class, 'index'])->name('index');
    Route::get('comments', [PersonalController::class, 'comments'])->name('comments');
    Route::get('edit', [PersonalController::class, 'edit'])->name('edit');
    Route::get('liked', [PersonalController::class, 'liked'])->name('liked');
    Route::patch('update/{user}', [PersonalController::class, 'update'])->name('update');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => [
        'auth',
        'is.admin',
    ],
], function () {

    Route::get('/', 'MainController')->name('main');

    Route::resource('categories', AdminCategoryController::class);

    Route::resource('posts', AdminPostController::class);

    Route::resource('tags', AdminTagController::class)->except(['show']);

    Route::resource('users', AdminUserController::class)->except(['show']);

    Route::get('post/top', [AdminLikedController::class, 'popularPosts'])->name('post.top');

    Route::get('comments/index', [AdminCommentController::class, 'index'])->name('comments.index');
    Route::delete('comments/delete/{comment}', [AdminCommentController::class, 'delete'])->name('comments.delete');

});

require __DIR__ . '/auth.php';
