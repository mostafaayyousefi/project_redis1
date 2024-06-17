<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index\StaticController;
use App\Http\Controllers\User\LinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/site/{random}', [StaticController::class, 'site'])->name('site');


Route::prefix('user')->name('user.')->group(function () {
Route::prefix('link')->name('link.')->group(function () {

Route::get('/create', [LinkController::class, 'create'])->name('create');
Route::post('/', [LinkController::class, 'store'])->name('store');
Route::get('/index/{orderby?}', [LinkController::class, 'index'])->name('index');
Route::post('/search', [LinkController::class, 'search'])->name('search');

});
});
