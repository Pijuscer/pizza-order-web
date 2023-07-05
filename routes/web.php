<?php

use App\Models\Attachment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\SizePriceController;

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

Route::get('/attachments', [AttachmentController::class, 'viewForm']);
Route::post('/attachments', [AttachmentController::class, 'store']);
Route::get('/all_attachments', [AttachmentController::class, 'index']);
Route::get('/edit_attachments/edit/{id}', [AttachmentController::class, 'editForm']);
Route::post('/edit_attachments/edit/{id}', [AttachmentController::class, 'edit']);
Route::get('/all_attachments/remove/ask/{id}', [AttachmentController::class, 'removeForm']);
Route::get('/all_attachments/remove/{id}', [AttachmentController::class, 'remove']);

Route::get('/sizes_prices', [SizePriceController::class, 'viewForm']);
Route::post('/sizes_prices', [SizePriceController::class, 'store']);
Route::get('/all_sizes_prices', [SizePriceController::class, 'index']);
Route::get('/edit_sizes_prices/edit/{id}', [SizePriceController::class, 'editForm']);
Route::post('/edit_sizes_prices/edit/{id}', [SizePriceController::class, 'edit']);
Route::get('/all_sizes_prices/remove/ask/{id}', [SizePriceController::class, 'removeForm']);
Route::get('/all_sizes_prices/remove/{id}', [SizePriceController::class, 'remove']);

Route::get('/pizzas', [PizzaController::class, 'viewForm']);
Route::post('/pizzas', [PizzaController::class, 'store']);
Route::get('/all_pizzas', [PizzaController::class, 'index']);
Route::get('/edit_pizzas/edit/{id}', [PizzaController::class, 'editForm']);
Route::post('/edit_pizzas/edit/{id}', [PizzaController::class, 'edit']);
Route::get('/all_pizzas/remove/ask/{id}', [PizzaController::class, 'removeForm']);
Route::get('/all_pizzas/remove/{id}', [PizzaController::class, 'remove']);

Route::get('/orders', [OrderController::class, 'viewForm']);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [PizzaController::class, "pizzaAll"]
    )->name('dashboard');
});
