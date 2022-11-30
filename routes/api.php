<?php

use App\Http\Controllers\Api\WineBottleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/wine-bottles')->group(function () {
    Route::get('', [WineBottleController::class, 'index'])->name('wine-bottle.index');
    Route::get('/{wine_bottle}', [WineBottleController::class, 'show'])->name('wine-bottle.show');
    Route::delete('/{wine_bottle}', [WineBottleController::class, 'delete'])->name('wine-bottle.delete');
    Route::post('', [WineBottleController::class, 'create'])->name('wine-bottle.create');
});
