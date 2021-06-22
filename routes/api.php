<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/products','ProductsController');
Route::group(['prefix'=>'products'],function(){

    Route::apiResource('/{products}/reviews','ReviewController');
});
