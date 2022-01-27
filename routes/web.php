<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
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
Route::get('outlet/getData', [OutletController::class, 'getData']);
Route::post('outlet/store', [OutletController::class, 'store'])->name('outlet.store');
Route::post('outlet/update', [OutletController::class, 'update'])->name('outlet.update');
Route::post('outlet/destroy', [OutletController::class, 'destroy'])->name('outlet.destroy');
Route::get('member', [MemberController::class, 'index']);
Route::post('member/store', [MemberController::class, 'store'])->name('member.store');
Route::post('member/update', [MemberController::class, 'update'])->name('member.update');
Route::post('member/destroy', [MemberController::class, 'destroy'])->name('member.destroy');
Route::get('package', [PaketController::class, 'index']);
Route::post('package/store', [PaketController::class, 'store'])->name('package.store');
Route::post('package/update', [PaketController::class, 'update'])->name('package.update');
Route::post('package/destroy', [PaketController::class, 'destroy'])->name('package.destroy');
