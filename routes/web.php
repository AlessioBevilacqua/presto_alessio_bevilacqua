<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/index/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/byCategory/article/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');