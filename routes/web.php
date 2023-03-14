<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GroupCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\ThemeController;
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

Route::get('/', function () {
    return view('auth.login');
    // return view('stripe');
    // \App\Jobs\QuoteNotif::dispatch()->onQueue(env('SUPERVISOR'));
    // \App\Jobs\ResetNotif::dispatch()->onQueue(env('SUPERVISOR'));
    // \App\Jobs\UpdatePool::dispatch('area', 1)->onQueue(env('SUPERVISOR'));
    // \App\Jobs\RandomQuote::dispatch()->onQueue(env('SUPERVISOR'));
    // \App\Jobs\GenerateTimerAds::dispatch(1)->onQueue(env('SUPERVISOR'));
    // \App\Jobs\AdsNotif::dispatch()->onQueue(env('SUPERVISOR'));
    // return 'success ...';
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/authenticate',  [LoginController::class, 'authenticate'])->name('login.post');

Route::prefix('admin')->middleware('auth:web')->group(function () {
    Route::get('/list', [AdminController::class, 'index'])->name('admin');
    Route::post('/change-status', [AdminController::class, 'changeStatus']);
    Route::get('/create-admin', [AdminController::class, 'create']);
    Route::post('save-admin', [AdminController::class, 'store']);
    Route::get('edit/{id}', [AdminController::class, 'edit']);
});

Route::prefix('categories')->middleware('auth:web')->group(function () {
    Route::get('/list', [CategoriesController::class, 'index'])->name('bc.list');
    Route::get('/create', [CategoriesController::class, 'create'])->name('bc.create');
    Route::post('/save', [CategoriesController::class, 'store'])->name('bc.save');
    Route::post('/delete/{id}', [CategoriesController::class, 'destroy'])->name('bc.delete');
    Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('bc.edit');
    Route::post('/update/{id}', [CategoriesController::class, 'update'])->name('bc.update');
});

Route::prefix('group')->middleware('auth:web')->group(function () {
    Route::get('/list', [GroupCategoryController::class, 'index'])->name('gp.list');
    Route::get('/create', [GroupCategoryController::class, 'create'])->name('gp.create');
    Route::post('/save', [GroupCategoryController::class, 'store'])->name('gp.save');
    Route::post('/delete/{id}', [GroupCategoryController::class, 'destroy'])->name('gp.delete');
    Route::get('/edit/{id}', [GroupCategoryController::class, 'edit'])->name('gp.edit');
    Route::post('/update', [GroupCategoryController::class, 'update'])->name('gp.update');
});

Route::prefix('quotes')->middleware('auth:web')->group(function () {
    Route::get('/list', [QuotesController::class, 'index'])->name('qt.list');
    Route::get('/create', [QuotesController::class, 'create'])->name('qt.create');
    Route::post('/save', [QuotesController::class, 'store'])->name('qt.save');
    Route::post('/delete/{id}', [QuotesController::class, 'destroy'])->name('qt.delete');
    Route::get('/edit/{id}', [QuotesController::class, 'edit'])->name('qt.edit');
    Route::post('/update', [QuotesController::class, 'update'])->name('qt.update');
    Route::get('/import-quotes', [QuotesController::class, 'import'])->name('qt.import');
    Route::post('/importcsv', [QuotesController::class, 'importcsv'])->name('qt.import');
});

Route::prefix('pool')->middleware('auth:web')->group(function () {
    Route::get('/list', [PoolController::class, 'index'])->name('pl.list');
    Route::post('/update-area', [PoolController::class, 'area'])->name('pl.area');
    Route::get('/feels', [PoolController::class, 'feels'])->name('pl.list');
    Route::post('/update-feels', [PoolController::class, 'feel'])->name('pl.feels');
    Route::get('/ways', [PoolController::class, 'ways'])->name('pl.ways');
    Route::post('/update-ways', [PoolController::class, 'way'])->name('pl.ways');
});

Route::prefix('themes')->middleware('auth:web')->group(function () {
    Route::get('/list', [ThemeController::class, 'index'])->name('tm.list');
});

