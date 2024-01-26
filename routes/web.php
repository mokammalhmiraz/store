<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('send-mail', [MailController::class, 'index']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/create', [ProductController::class, 'create']);
Route::post("/product/insert", [ProductController::class, 'store']);
Route::get("/edit/{id}", [ProductController::class, 'edit']);
Route::post("/product/update", [ProductController::class, 'update']);
Route::get("product/delete/{id}", [ProductController::class, 'destroy']);

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get("/category/delete/{category_id}", [CategoryController::class, 'delete']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
