<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogpostsController;

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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::prefix('/')->group(function () {
    Route::get('/', [BlogpostsController::class, 'list']);
    Route::get('/{postId}', [BlogpostsController::class, 'detail']);
});
