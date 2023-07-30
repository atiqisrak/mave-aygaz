<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '{language?}'], function () {
    // Common routes for both languages
    Route::get('/navbar', [NavbarController::class, 'index']);
    Route::post('/navbar', [NavbarController::class, 'store']);
    Route::put('/navbar/{id}', [NavbarController::class, 'update']);
    Route::delete('/navbar/{id}', [NavbarController::class, 'destroy']);

    Route::get('/sliders', [SliderController::class, 'index']);
    Route::post('/sliders', [SliderController::class, 'store']);
    Route::put('/sliders/{id}', [SliderController::class, 'update']);
    Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);

    // Add more common routes here...

    // Bengali specific routes
    Route::group(['prefix' => 'bn'], function () {
        Route::get('/about-us', [AboutUsController::class, 'index']);
        Route::post('/about-us', [AboutUsController::class, 'store']);
        Route::put('/about-us/{id}', [AboutUsController::class, 'update']);
        Route::delete('/about-us/{id}', [AboutUsController::class, 'destroy']);

        // Add more Bengali routes as needed
    });

    // English specific routes
    Route::group(['prefix' => 'en'], function () {
        Route::get('/about-us', [AboutUsController::class, 'index']);
        Route::post('/about-us', [AboutUsController::class, 'store']);
        Route::put('/about-us/{id}', [AboutUsController::class, 'update']);
        Route::delete('/about-us/{id}', [AboutUsController::class, 'destroy']);

        // Add more English routes as needed
    });
});


Route::get('/', function () {
    return view('welcome');
});
