<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\FooterController;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutPageController;

Route::group(['prefix' => '{language?}'], function () {

    Route::get('/sliders', [SliderController::class, 'index']);
    Route::post('/sliders', [SliderController::class, 'store']);
    Route::put('/sliders/{id}', [SliderController::class, 'update']);
    Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);

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

Route::get('/mediaUpload', [MediaController::class, 'showMediaUploadForm'])->name('media.upload');
Route::post('/mediaUpload', [MediaController::class, 'store'])->name('media.store');

Route::get('/cards', [CardController::class, 'indexView'])->name('cards.index.view');
Route::get('/sliders', [SliderController::class, 'indexView'])->name('sliders.index.view');
Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');

Route::get('/navbar', [NavbarController::class, 'indexView'])->name('navbar.indexView');
Route::get('/footer', [FooterController::class, 'indexView'])->name('footer.indexView');


// ----------- Pages ----------------
Route::get('/home', [HomepageController::class, 'indexView'])->name('home.indexView');
Route::get('/about', [AboutPageController::class, 'indexView'])->name('about.indexView');