<?php

use App\Http\Controllers\AuthController;
use App\Models\Post;
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


Route::get('/prueba',[AuthController::class,'prueba'])->name('prueba');
Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
});
