<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ListController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\QuoteController;
use App\Http\Controllers\Api\v1\UserPastQuoteController;

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

Route::group(
    [
        'prefix' => 'v1/auth',
        'name' => 'auth.'
    ],
    function() {
        Route::post('/check-device', [AuthController::class, 'checkDevice'])->name('checkDevice');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    }
);

Route::group(
    [
        'prefix' => 'v1/list',
        'name' => 'list.'
    ],
    function() {
        Route::get('/styles', [ListController::class, 'styles'])->name('styles');
        Route::get('/feels', [ListController::class, 'feels'])->name('feels');
        Route::get('/ways', [ListController::class, 'ways'])->name('ways');
        Route::get('/areas', [ListController::class, 'areas'])->name('areas');
        Route::get('/themes', [ListController::class, 'themes'])->name('themes');
        Route::get('/groups', [ListController::class, 'groups'])->name('groups');
        Route::get('/categories', [ListController::class, 'categories'])->name('categories');
    }
);

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'prefix' => 'v1/quote',
        'name' => 'quote.'
    ],
    function() {
        Route::get('/', [QuoteController::class, 'index'])->name('index');
    }
);

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'prefix' => 'v1/user',
        'name' => 'user.'
    ],
    function() {
        Route::get('/profile', [UserController::class, 'showProfile'])->name('showProfile');
        Route::patch('/profile', [UserController::class, 'updateProfile'])->name('updateProfile');

        Route::post('/save-quote/{id}', [UserController::class, 'quote'])->name('quote');
        Route::patch('/update-theme/{id}', [UserController::class, 'updateTheme'])->name('updateTheme');
        Route::patch('/update-category', [UserController::class, 'updateCategory'])->name('updateCategory');
        
        Route::get('/collection', [UserController::class, 'myCollection'])->name('myCollection');
        Route::get('/collection/{id}', [UserController::class, 'myCollectionDetail'])->name('myCollectionDetail');
        Route::post('/collection', [UserController::class, 'addCollection'])->name('addCollection');
        Route::patch('/collection/{id}', [UserController::class, 'updateCollection'])->name('updateCollection');
        
        Route::post('/add-quote/{collection}/{quote}', [UserController::class, 'addQuoteToCollection'])
            ->name('addQuoteToCollection');
        Route::post('/del-quote/{collection}/{quote}', [UserController::class, 'delQuoteFromCollection'])
            ->name('delQuoteFromCollection');

        Route::get('/like-quote', [UserController::class, 'listLikeQuote'])->name('listLikeQuote');
        Route::delete('/like-quote/{id}', [UserController::class, 'deleteLikeQuote'])->name('deleteLikeQuote');
    }
);

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'prefix' => 'v1/past-quote',
        'name' => 'past-quote.'
    ],
    function() {
        Route::get('/', [UserPastQuoteController::class, 'index'])->name('index');
        Route::post('/{id}', [UserPastQuoteController::class, 'store'])->name('store');
        Route::delete('/{id}', [UserPastQuoteController::class, 'destroy'])->name('destroy');
    }
);
