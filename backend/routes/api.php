<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlackAPIController;

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
Route::prefix('slack')->group(function () {
    Route::post("refresh", [SlackAPIController::class, 'refresh']);
    Route::post("getEvents", [SlackAPIController::class, 'getEvents']);
    Route::post("getChannels", [SlackAPIController::class, 'getChannels']);
    Route::post("getMessages", [SlackAPIController::class, 'getMessages']);
    Route::post("getFiles", [SlackAPIController::class, 'getFiles']);
});