<?php

use App\Http\Controllers\SierraAPIController;
use App\Http\Controllers\SlackAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlackDashboardAPIController;

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

// rescan whole data from slack
// Route::post("refresh", function() {
//     return "A";
// });
Route::prefix('dashboard')->group(function () {
    Route::post("refresh", [SlackDashboardAPIController::class, 'refresh']);
    Route::post("getEvents", [SlackDashboardAPIController::class, 'getEvents']);
    Route::post("getChannels", [SlackDashboardAPIController::class, 'getChannels']);
    Route::post("getMessages", [SlackDashboardAPIController::class, 'getMessages']);
    Route::post("getFiles", [SlackDashboardAPIController::class, 'getFiles']);
    Route::post("test", [SlackDashboardAPIController::class, 'test']);
});

Route::prefix('slack')->group(function () {
    Route::post("event", [SlackAPIController::class, 'index']);
});

Route::prefix('sierra')->group(function () {
    Route::post("event", [SierraAPIController::class, 'index']);
});