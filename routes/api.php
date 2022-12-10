<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register',[AuthController::class,'create_acount'])->name('create_acount');
Route::post('/login',[AuthController::class,'access'])->name('access');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
   Route::controller(PostController::class)->group(function(){
    Route::get('/posts','index');
    Route::get('/posts/{post}/comments','comments');
    Route::post('/posts/question','storePostQuestion');
    Route::post('/posts/{post}/like/{user}','toggleLike');
    Route::post('/posts/{post}/comment','storeComment');
    Route::put('/posts/{post}','update');
    Route::delete('/posts/{post}','destroy');
   });

   Route::controller(CommentController::class)->group(function(){
    Route::post('/comments/{comment}/like/{user}','toggleLike');
    Route::post('/comments/{comment}/comment','storeComment');
    Route::put('/comments/{comment}','update');
    Route::delete('/comments/{comment}','destroy');
   });
});
