<?php

use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Auth\LoginController;
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
Route::post('/login', [LoginController::class, 'login']);
Route::post('/form', [FormController::class, 'apply']);
Route::post('/candidate', [FormController::class, 'downloadDoc']);

Route::post('/candidate/zip', [FormController::class, 'downloadDocZip']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/forms', [FormController::class, 'retrieveForms']);
    Route::delete('/form/{id}', [FormController::class, 'deleteCandidate']);
    Route::post('/logout', [LoginController::class, 'logout']);
});