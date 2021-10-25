<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ContactController;
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

 Route::get('/contact', function () {
    return view("contact");
 })->middleware('check');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   $users = user::all();
    return view('dashboard',compact('users'));
})->name('dashboard');
