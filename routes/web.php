<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\controllers\Admin\HomeController;
use App\Http\controllers\Admin\PostController;
use App\Http\Controllers\PostController as usepost;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


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
    $posts = DB::table('posts')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->where('posts.status', '1')
    ->select('posts.*', 'users.name')
    ->get();
    
    return view('welcome',compact('posts'));
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
        //delete
        Route::delete('/admindeletepost/{id}', [PostController::class,'destroy'])->name('admindeletepost');
        Route::get('/adminshowpost/{id}', [PostController::class,'show'])->name('adminshowpost');
        Route::get('/statusupdateyes/{id}', [PostController::class,'statusyes'])->name('statusupdateyes');
        Route::get('/statusupdateno/{id}', [PostController::class,'statusno'])->name('statusupdateno');
        

    });
    //Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});



