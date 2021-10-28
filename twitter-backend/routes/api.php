<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::apiResource('/client', ClientController::class);
Route::apiResource('/like', LikeController::class);
Route::apiResource('/post', PostController::class);
Route::apiResource('/comment', CommentController::class);
