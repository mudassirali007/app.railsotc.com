<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagicController;
use App\Http\Controllers\WyreController;

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

// Route::get('/', function () {
//     return view('home');
// });
//Route::get('/', [MagicController::class, 'index']);
Route::get('/', [MagicController::class, 'index'])->name('home');
Route::post('/webhook', [WyreController::class, 'webhook'])->name('webhook');
Route::any('/wallet', [WyreController::class, 'wallet'])->name('wallet');


Route::middleware(['magic'])->group(function () {
    Route::get('/orders', [MagicController::class, 'orders'])->name('orders');
    Route::get('/logout', [MagicController::class, 'logout'])->name('logout');
    
    Route::get('/order', [WyreController::class, 'order'])->name('order');
    Route::get('/fail', [WyreController::class, 'fail'])->name('fail');
    Route::get('/nice', [WyreController::class, 'nice'])->name('nice');
    });
// ->middleware('magic')