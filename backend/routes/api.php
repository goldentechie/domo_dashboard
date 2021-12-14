<?php

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

// rescan whole data from slack
Route::post("refresh", "SlackAPIController@refresh");

Route::post("getEvents", "SlackAPIController@getEvents");
Route::post("getChannels", "SlackAPIController@getChannels");
Route::post("getMessages", "SlackAPIController@getMessages");
Route::post("getFiles", "SlackAPIController@getFiles");