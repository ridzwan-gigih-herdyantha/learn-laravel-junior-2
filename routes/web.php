<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductLogActivity;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Spatie\Permission\Models\Permission;
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

// Route::get('give-permission-to-role' , function(){
   
//     $role = Role::findOrFail(3); //moderator    
//     // dd($role);
//     $permission1 = Permission::findOrFail(1); //create article
//     $permission2 = Permission::findOrFail(2); //edit article
//     $permission3 = Permission::findOrFail(3); //delete article

//     $role->givePermissionTo([$permission1, $permission2, $permission3]);

// });

// Route::get('assign-role-to-user' , function(){
   
//     $user = User::create([
//         'uuid'=> 'uuid23uuid1212',
//         'name' => 'admin',
//         'email' => 'admin@gmail.com',
//         'password' => '$2y$10$VC3X4oNWsQG0M0qauVsHVutGdJ4HqPllO.0jMf4vpBBMzaac6djoS'
//     ]);

//     // $role1 = Role::findOrFail(1);    
//     // $role2 = Role::findOrFail(2);    
//     $role3 = Role::findOrFail(3);    

//     $user->assignRole($role3);

// });

// Route::get('spatie-method' , function() {
//     $user = User::findOrFail(1);
//     dd($user->getPermissionsViaRoles());
    
// });

Route::get('create-article' , function(){
    dd('Ini adalah fitur create article. Hanya bisa diakses oleh author atau moderator');
})->middleware('role:author|moderator');

Route::get('edit-article' , function(){
    dd('Ini adalah fitur edit article. Hanya bisa diakses oleh editor atau moderator');
})->middleware('role:editor|moderator');

Route::get('delete-article' , function(){
    dd('Ini adalah fitur delete article. Hanya bisa diakses oleh moderator');
})->middleware('role:moderator');

Route::get('add-product' , function() {
    try {

        DB::beginTransaction();

        Product::create([
            'name' => 'Minyak Sayur'
        ]);
    
        ProductLogActivity::create([
            'description' => 'Item Minyak Sayur diinput oleh staff BA'
        ]);

        DB::commit();
    } catch (\Throwable $e) {
        throw $e;
        DB::rollBack();
    }

});


require __DIR__.'/auth.php';