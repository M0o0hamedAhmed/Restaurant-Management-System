<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\MenuItemController;
use App\Http\Controllers\dashboard\OrderController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users',UserController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('menu_items',MenuItemController::class);
    Route::resource('orders',OrderController::class);
});



require __DIR__.'/auth.php';
