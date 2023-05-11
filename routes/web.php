<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Events\Login;
use App\Models\ProductLogActivity;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\SendEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;

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

// Laravel Spatie

Route::get('create-article' , function(){
    dd('Ini adalah fitur create article. Hanya bisa diakses oleh author atau moderator');
})->middleware('role:author|moderator');

Route::get('edit-article' , function(){
    dd('Ini adalah fitur edit article. Hanya bisa diakses oleh editor atau moderator');
})->middleware('role:editor|moderator');

Route::get('delete-article' , function(){
    dd('Ini adalah fitur delete article. Hanya bisa diakses oleh moderator');
})->middleware('role:moderator');

// Rollback data on Error

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

// Model Binding

Route::get('/users', function () {
    $users = User::all();
});

Route::get('/users/{id}', function (User $id) {
    // $users = User::findOrFail($request->id)->toArray();
    // dd($user->toArray());
    // $users = User::all(); 
    // dd($id);
});

Route::get('/users/edit/{user}', function (User $user) {
    $user->name = 'Kequeen';
    $user->email = 'keqing@gmail.com';
    $user->save();
    // dd($user->toArray());
});

Route::get('/users/delete/{user}', function (User $user) {
    $user->delete();
    // dd($user->toArray());
});

Route::get('/users-detail/{user}',[UserController::class , 'detailWithModelBinding']);

// Getter & Setter / Accessor & Mutator

Route::get('/accessor', function() {
    $user = User::first();
    $fullName = $user->full_name;
    // dd($fullName);
});

Route::get('/mutator', function () {
    $user = User::create([
        'uuid' => 'okwoka89a8978',
        'first_name' =>  'ridzwan',
        'last_name' => 'herdyantha',
        'email' => 'ridzwan@gmail.com' ,
        'password' => bcrypt('password') ,
    ]);

    // dd($user);

});

Route::get('/video', [VideoController::class , 'index']);

Route::get('send-email', [SendEmail::class , 'index']);

Route::get('create-product-event', [ProductController::class , 'store']);

Route::get('/send-newsletter', [SendEmail::class, 'sendNewsLetter']);


//Multiple Guards Authentication
Route::get('/login' , [AuthController::class, 'login'])->name('login');
Route::post('/login' , [AuthController::class, 'processLogin']);
Route::get('/logout' , [AuthController::class, 'logout']);
Route::get('/home', function() {
    return 'kamu berhasil login';
})->middleware('auth:author,web');


// Route Laravel Breeze
// require __DIR__.'/auth.php';