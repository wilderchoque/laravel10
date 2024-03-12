<?php

use App\Http\Controllers\ProductoController;
use App\Models\producto;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Route::resource('producto', ProductoController::class)->middleware('auth');
Auth::routes(['register' => true, 'reset' => true]);



Route::get('/home', [ProductoController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {

Route::get('/home', [ProductoController::class, 'index'])->name('home');
});




// Route::resource('tieda', ProductoController::class)->middleware('auth');
// Route::get('/home', [ProductoController::class, 'index'])->name('home');
