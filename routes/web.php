<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/edit/article/{article}', [ArticleController::class, 'edit'])->name('edit.article');
Route::get('/index/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/byCategory/article/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');
Route::get('/index/revisor', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::get('/request/revisor', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/revisor/make/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('/search/article', [ArticleController::class, 'searchArticles'])->name('article.search');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
