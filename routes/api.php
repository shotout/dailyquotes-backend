<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ListController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\QuoteController;

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
        Route::post('/save-quote/{id}', [UserController::class, 'saveQuote'])->name('saveQuote');
        Route::patch('/update-theme/{id}', [UserController::class, 'updateTheme'])->name('updateTheme');
        Route::patch('/update-category', [UserController::class, 'updateCategory'])->name('updateCategory');
    }
);
