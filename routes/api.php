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
 
Route::get('/', function () {
    return 'test';
});

// Вареант 1

Route::get('/test',  function  (Request $request)  {
    return response()->json(['CORS']);
});

// Вареант 2

Route::middleware(['cors'])->group(function () {
    Route::get('/test2',  function  (Request $request)  {
        return response()->json(['CORS 2']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
