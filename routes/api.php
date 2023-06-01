<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
// Route::post('register', [AuthController::class, 'register'])->middleware('api.key');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('save', [CustomerController::class, 'store']);
Route::get('customers', [CustomerController::class, 'get']);
Route::get('customers/{id}', [CustomerController::class, 'show']);
// Route::middleware(['api.key'])->group(function () {
//     Route::get('customers/{id}', [CustomerController::class, 'show']);
// });

