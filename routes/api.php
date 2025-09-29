<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\TokenAuthController;
use Laravel\Ui\Presets\React;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'v1'], function () {
    
    Route::post('authenticate', [TokenAuthController::class, 'authenticate']);
    Route::post('logout', [TokenAuthController::class, 'logout']);
    Route::post('refresh', [TokenAuthController::class, 'refresh']);
    Route::get('me', [TokenAuthController::class, 'me']);

    Route::get('test',[TokenAuthController::class, 'test'])->middleware('auth:api');
});
