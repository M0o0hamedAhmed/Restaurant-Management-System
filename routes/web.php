<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\MenuItemController;
use App\Http\Controllers\dashboard\OrderController;
use App\Http\Controllers\dashboard\OrderItemController;
use App\Http\Controllers\dashboard\PermissionController;
use App\Http\Controllers\dashboard\RoleController;
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
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('menu_items', MenuItemController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order_items', OrderItemController::class);


    Route::get('orders/get_products_not_in_order/{order_id}', [OrderController::class, 'getProductsNotInOrder'])->name('orders.get_products_not_in_order');
    Route::post('orders/set_new_item_in_order', [OrderController::class, 'setNewItemInOrder'])->name('orders.set_new_item_in_order');

});


require __DIR__ . '/auth.php';
