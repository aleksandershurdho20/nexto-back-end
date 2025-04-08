<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\RepliesController;

use App\Http\Controllers\Frontend\PostShowController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', PostShowController::class);
Route::apiResource("/comments", CommentsController::class);
Route::apiResource("/replies", RepliesController::class);

Route::apiResource("/dashboard/posts", PostController::class)
    ->middleware(['auth:sanctum'])
    ->except(['create','edit']);