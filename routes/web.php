<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\controllers\Admin\HomeController;
use App\Http\controllers\Admin\PostController;
use App\Http\Controllers\PostController as usepost;


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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard',  [usepost::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/addpost',  [usepost::class, 'addPost'])->middleware(['auth', 'verified'])->name('addpost');
Route::post('/store',  [usepost::class, 'store'])->name('store');
// deletes a post
Route::delete('/deletepost/{id}', [usepost::class,'destroy'])->name('deletepost');
Route::get('/editpost/{id}', [usepost::class,'edit'])->name('editpost');
Route::put('/editpostsave/{id}', [usepost::class,'update'])->name('editpostsave');
Route::get('/showpost/{id}', [usepost::class,'show'])->name('showpost');

require __DIR__.'/auth.php';

//admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
        //Route::get('login','AuthenticatedSessionController@create')->name('login');
    });
    Route::middleware('admin')->group(function(){
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('/post', [PostController::class, 'index'])->name('post');
        Route::get('/post/list', [PostController::class, 'getPost'])->name('post.list');

    });
    //Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});



