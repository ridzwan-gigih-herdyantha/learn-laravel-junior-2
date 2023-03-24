<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middlewar  e group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',[
        'active' => 'home',
        'title' => 'Home',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{categories}', [CategoryController::class, 'show',]);

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('create-user' , function(){
    Post::create([
        'title' => 'Ini adalah title 2' , 
        'excerpt' => 'Ini adalah excerpt 2',
        'body' => 'iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2'
    ]);
    
    Post::create([
        'title' => 'Ini adalah title 2' , 
        'excerpt' => 'Ini adalah excerpt 2',
        'body' => 'iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2'
    ]);
});


require __DIR__.'/auth.php';