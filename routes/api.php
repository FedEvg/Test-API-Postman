<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'jwt.auth'], function () {
    Route::group(['namespace' => 'Company', 'prefix' => 'companies'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{company}', 'ShowController');
        Route::patch('/{company}', 'UpdateController');
        Route::delete('/{company}/', 'DestroyController');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{user}', 'ShowController');
        Route::patch('/{user}', 'UpdateController');
        Route::delete('/{user}/', 'DestroyController');
    });
});
