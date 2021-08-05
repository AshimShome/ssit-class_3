<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sideController;
use App\Http\Controllers\postController;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\adminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',[sideController::class,'index'])->name('home');
Route::get('/category/{slug}',[sideController::class,'category_post'])->name('category.post');
Route::get('/sign-up',[sideController::class,'signUp'])->name('signUp');
Route::post('/sign-up',[sideController::class,'register'])->name('register');

Route::get('/login',[sideController::class,'login_form'])->name('login_form');
Route::post('/login',[sideController::class,'login'])->name('login');



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (){

    Route::get('/',[adminController::class,'index'])->name('index');
    Route::post('/logout',[sideController::class,'logout'])->name('logout');

   // Route::resource('category',CategoriesController::class);
    //Route::resource('posts',PostController::class);
    Route::resources([
        'category'=>CategoriesController::class,
        'posts'=>PostController::class,


   ] );

});


