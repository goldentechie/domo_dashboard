<?php

use App\Http\Controllers\RegisterController;
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

// Front-end api
Route::prefix('dashboard')->group(function () {
    Route::post("refresh", [SlackDashboardAPIController::class, 'refresh']);
    Route::post("getEvents", [SlackDashboardAPIController::class, 'getEvents']);
    Route::post("getChannels", [SlackDashboardAPIController::class, 'getChannels']);
    Route::post("getMessages", [SlackDashboardAPIController::class, 'getMessages']);
    Route::post("getFiles", [SlackDashboardAPIController::class, 'getFiles']);
    Route::post("getTeams", [SlackDashboardAPIController::class, 'getTeams']);
    Route::post("test", [SlackDashboardAPIController::class, 'test']);

    // redirecting api for register team
    Route::get('redirect', [RegisterController::class, 'index']);
});

// slack interactive api when a new lead is claimed on slack channel
Route::prefix('slack')->group(function () {
    Route::post("event", [SlackAPIController::class, 'index']);
});

// sierra triggerd event when a new lead created
Route::prefix('sierra')->group(function () {
    Route::post("event", [SierraAPIController::class, 'index']);
});
