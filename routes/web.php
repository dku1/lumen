<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;

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
Route::get('post{post}', [MainController::class, 'post'])->name('post');

Route::group([
    'prefix' => 'personal',
    'as' => 'personal.',
    'middleware' => ['auth'],
    ], function (){
    Route::get('/', [PersonalController::class, 'index'])->name('index');
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

});

require __DIR__ . '/auth.php';
