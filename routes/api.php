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
Route::group([ "prefix" => "/tags"], function () {
    Route::get("/", "Tags\TagController@index");
    Route::post("/", "Tags\TagController@store");
    Route::delete("/{tag}", "Tags\TagController@delete");
});
Route::group(["prefix" => "/photos"], function () {
    Route::get("/", "Photos\PhotoController@index");
    Route::post("/", "Photos\PhotoController@store");
});
