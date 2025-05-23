<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ListController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\AdmobController;
use App\Http\Controllers\Api\v1\QuoteController;
use App\Http\Controllers\Api\v1\StripeController;
use App\Http\Controllers\Api\v1\SettingController;
use App\Http\Controllers\Api\v1\UserLikeController;
use App\Http\Controllers\Api\v1\PurchaselyController;
use App\Http\Controllers\Api\v1\SubscriptionsController;
use App\Http\Controllers\Api\v1\UserPastQuoteController;
use App\Http\Controllers\Api\v1\UserCollectionController;

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
        Route::post('/register', [AuthController::class, 'register'])
            ->middleware(['throttle:register'])
            ->name('register');
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
        Route::get('/links', [ListController::class, 'links'])->name('links');
        Route::get('/fonts', [ListController::class, 'fonts'])->name('fonts');
        Route::get('/backgrounds', [ListController::class, 'backgrounds'])->name('backgrounds');
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
        Route::post('/share/{id}', [QuoteController::class, 'share'])->name('share');
    }
);

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'prefix' => 'v1/user',
        'name' => 'user.'
    ],
    function() {
        Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
        Route::patch('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

        Route::patch('/update-theme', [UserController::class, 'updateTheme'])->name('theme.update');
        Route::patch('/update-category', [UserController::class, 'updateCategory'])->name('category.update.');

        Route::get('/rating', [UserController::class, 'getRating'])->name('rating.show');
        Route::post('/rating', [UserController::class, 'postRating'])->name('rating.store');
        
        Route::get('/collection', [UserCollectionController::class, 'index'])->name('collection.index');
        Route::get('/collection/{id}', [UserCollectionController::class, 'show'])->name('collection.show');
        Route::post('/collection', [UserCollectionController::class, 'store'])->name('collection.store');
        Route::patch('/collection/{id}', [UserCollectionController::class, 'update'])
            ->name('collection.update');
        Route::delete('/collection/{id}', [UserCollectionController::class, 'destroy'])
            ->name('collection.destroy');
        Route::post('/add-quote/{collection}/{quote}', [UserCollectionController::class, 'storeQuote'])
            ->name('collection.quote.store');
        Route::post('/del-quote/{collection}/{quote}', [UserCollectionController::class, 'destroyQuote'])
            ->name('collection.quote.destroy');

        Route::get('/like-quote', [UserLikeController::class, 'index'])->name('like.index');
        Route::post('/save-quote/{id}', [UserLikeController::class, 'store'])->name('like.store');
        Route::delete('/like-quote/{id}', [UserLikeController::class, 'destroy'])->name('like.destroy');

        Route::get('/notif', [UserController::class, 'notif'])->name('notif.show');

        Route::post('/custome-theme', [UserController::class, 'storeCustomeTheme'])->name('customeTheme.store');
        Route::patch('/custome-theme/{id}', [UserController::class, 'updateCustomeTheme'])->name('customeTheme.update');
    }
);

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'prefix' => 'v1/setting',
        'name' => 'setting.'
    ],
    function() {
        Route::get('/paywall', [SettingController::class, 'paywall'])->name('paywall');
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

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'prefix' => 'v1/stripe',
        'name' => 'stripe.'
    ],
    function() {
        Route::get('/free', [StripeController::class, 'free'])->name('free');
        Route::get('/plan', [StripeController::class, 'index'])->name('index');
        Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
        Route::post('/webhook', [StripeController::class, 'webhook'])
            ->withoutMiddleware('auth:sanctum')
            ->name('webhook');
        Route::get('/success', [StripeController::class, 'success'])
            ->withoutMiddleware('auth:sanctum')
            ->name('success');
        Route::get('/cancel', [StripeController::class, 'cancel'])
            ->withoutMiddleware('auth:sanctum')
            ->name('cancel');

        Route::post('/webhooks', [StripeController::class, 'webhooks'])
            ->withoutMiddleware('auth:sanctum')
            ->name('webhooks');
    }
);

Route::group(
    [
        'middleware' => 'auth:sanctum',
        'prefix' => 'v1/subscription',
        'name' => 'subscription.'
    ],
    function() {
        Route::get('/', [SubscriptionsController::class, 'index'])->name('index');
        Route::post('/update', [SubscriptionsController::class, 'subscribe'])->name('subscribe');
    }
);

Route::group(
    [
        'prefix' => 'v1/purchasely',
        'name' => 'purchasely.'
    ],
    function() {
        Route::post('/', [PurchaselyController::class, 'index'])->name('purchasely');
    }
);

Route::group(
    [
        'prefix' => 'v1/admob',
        'name' => 'admob.'
    ],
    function() {
        Route::get('/', [AdmobController::class, 'callback'])->name('callback');
    }
);
