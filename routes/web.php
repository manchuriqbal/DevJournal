<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

// Frontend routes
Route::middleware('guest')->group(function () {
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
    Route::get('category', [App\Http\Controllers\Frontend\CategoryController::class, 'index'])->name('category.index');
    Route::get('posts', [App\Http\Controllers\Frontend\PostController::class, 'index'])->name('post.index');
    Route::get('posts/{slug}', [App\Http\Controllers\Frontend\PostController::class, 'show'])->name('post.show');
    Route::get('profile/username', [App\Http\Controllers\Frontend\ProfileController::class, 'index'])->name('profile.me');
    Route::get('about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');
    Route::get('contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
});


// Admin routes

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.admin'], function () 
{
    Route::get('dashboard', [App\Http\Controllers\Admin\DashbordController::class, 'index'])->name('dashboard');
    Route::get('profile/me', [App\Http\Controllers\Admin\ProfileController::class, 'me'])->name('profile.me');
    Route::get('profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::patch('posts/{post}/status', [App\Http\Controllers\Admin\PostController::class, 'status'])
        ->name('manchur');
    Route::get('posts/pending', [App\Http\Controllers\Admin\PostController::class, 'pending'])
        ->name('posts.pending');

    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);

    Route::get('users', [App\Http\Controllers\Admin\Users\UserController::class, 'index'])->name('users.index');
    Route::resource('creators', App\Http\Controllers\Admin\Users\CreatorController::class);
    Route::resource('admins', App\Http\Controllers\Admin\Users\AdminController::class);
    
});


Route::group(['prefix' => 'creator', 'as' => 'creator.', 'middleware' => 'auth.creator'], function () 
{
    Route::get('dashboard', [App\Http\Controllers\Creator\DashbordController::class, 'index'])->name('dashboard');

    Route::get('profile/me', [App\Http\Controllers\Admin\ProfileController::class, 'me'])->name('profile.me');
    Route::get('profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::resource('categories', App\Http\Controllers\Creator\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\Creator\PostController::class);
    
});

// // // Authentication routes
// // Route::middleware(['guest'])->group(function () {
// //     Route::get('login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
// //     Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login'])->name('login.store');
// //     Route::get('register', [App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');
// //     Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'store'])->name('register.store');
// // });
// // Route::post('logout', [App\Http\Controllers\Auth\LogoutController::class,'logout'])->name('logout');

