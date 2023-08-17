<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

    // Common routes for both languages
    Route::get('/carousels', [CarouselController::class, 'index']);
    Route::post('/carousels', [CarouselController::class, 'store']);
    Route::put('/carousels/{id}', [CarouselController::class, 'update']);
    Route::delete('/carousels/{id}', [CarouselController::class, 'destroy']);

    Route::get('/cards', [CardController::class, 'index']);
    Route::post('/cards', [CardController::class, 'store']);
    Route::put('/cards/{id}', [CardController::class, 'update']);
    Route::delete('/cards/{id}', [CardController::class, 'destroy']);
});

Route::get('/', function () {
    return view('welcome');
});


// Route::controller(ImageController::class)->group(function(){
//     Route::get('image-upload', 'index');
//     Route::post('image-upload', 'store')->name('image.store');
// });
// Route::controller(ImageController::class)->group(function(){
//     Route::get('image-upload', 'index');
//     Route::post('image-upload', 'store')->name('image.store');
// });
Route::get('/image-upload', [ImageController::class, 'showImageUploadForm'])->name('image.upload');
Route::post('/image-upload', [ImageController::class, 'store'])->name('image.store');