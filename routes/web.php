<?php

use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home.index');
Route::get('outlet', [OutletController::class, 'index']);
Route::post('outlet/store', [OutletController::class, 'store'])->name('outlet.store');
Route::post('outlet/update', [OutletController::class, 'update'])->name('outlet.update');
Route::post('outlet/destroy', [OutletController::class, 'destroy'])->name('outlet.destroy');
