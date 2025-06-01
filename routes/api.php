<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\PostActions;
use App\Http\Controllers\FavorePost;

use App\Http\Controllers\ListFavoritePosts;
use App\Http\Controllers\FavoritePostsController;

use App\Http\Controllers\Frontend\PostShowController;
use App\Http\Controllers\CategoryController;

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

Route::middleware('auth:sanctum')->post('/post-insights', PostActions::class);
Route::middleware('auth:sanctum')->post('/favorite', FavorePost::class);
Route::middleware('auth:sanctum')->get('/favorite-posts', ListFavoritePosts::class);
Route::middleware('auth:sanctum')->get('/search/favorite-posts', [FavoritePostsController::class, 'SearchFavoritePosts']);
Route::middleware('auth:sanctum')->get('/favorite-posts/filter', [FavoritePostsController::class, 'filterPosts']);

Route::middleware('auth:sanctum')->post('/category',[CategoryController::class,'CreateCategory']);
Route::delete('/category/{id}',[CategoryController::class,'DeleteCategory']);
Route::apiResource("/dashboard/posts", PostController::class)
    ->middleware(['auth:sanctum'])
    ->except(['create','edit']);