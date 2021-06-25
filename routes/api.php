<?php

use App\Http\Controllers\KomikController;
use App\Http\Controllers\AuthController;
// use App\Models\Komik;
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

// Route::resource('komik', KomikController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/komik', [KomikController::class, 'index']);
Route::get('/komik/{id}', [KomikController::class, 'show']);
Route::get('/komik/search/{judul}', [KomikController::class, 'search']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('/komik', [KomikController::class, 'store']);
    Route::put('/komik/{id}', [KomikController::class, 'update']);
    Route::delete('/komik/{id}', [KomikController::class, 'detroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
// Route::get('/komik', [KomikController::class, 'index']);
// Route::post('/komik', [KomikController::class, 'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
