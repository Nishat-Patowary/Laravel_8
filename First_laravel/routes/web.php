<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Categorycontroller;

use App\Models\user;
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

Route::get('/home', function () {
    echo "This is home page";
});

Route::get('/about', function () {
   return view("about");
});

Route::get('/blog', function () {
    return view("blog");
 });

 Route::get('/service', function () {
    return view("service");
 });

Route::get('/contact', [ContactController::class, 'index'])->middleware('check');







 //category controller 
 Route::get('/category/all', [Categorycontroller::class, 'AllCat'])->name('all.category');

 Route::post('/category/add', [Categorycontroller::class, 'AddCat'])->name('store.category');

 Route::get('category/edit/{id}', [Categorycontroller::class, 'Edit'])->name('all.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   $users = user::all();
    return view('dashboard',compact('users'));
})->name('dashboard');
