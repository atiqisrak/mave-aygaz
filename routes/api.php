<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PageCardController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ImageLibraryController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AboutCylinderGasController;

Route::get('/navbar', [NavbarController::class, 'index']);
Route::post('/navbar', [NavbarController::class, 'store']);
Route::put('/navbar/{id}', [NavbarController::class, 'update']);
Route::delete('/navbar/{id}', [NavbarController::class, 'destroy']);

Route::get('/sliders', [SliderController::class, 'index']);
Route::post('/sliders', [SliderController::class, 'store']);
Route::put('/sliders/{id}', [SliderController::class, 'update']);
Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);

Route::get('/page-cards', [PageCardController::class, 'index']);
Route::post('/page-cards', [PageCardController::class, 'store']);
Route::put('/page-cards/{id}', [PageCardController::class, 'update']);
Route::delete('/page-cards/{id}', [PageCardController::class, 'destroy']);

Route::get('/about-us', [AboutUsController::class, 'index']);
Route::post('/about-us', [AboutUsController::class, 'store']);
Route::put('/about-us/{id}', [AboutUsController::class, 'update']);
Route::delete('/about-us/{id}', [AboutUsController::class, 'destroy']);

Route::get('/carousels', [CarouselController::class, 'index']);
Route::post('/carousels', [CarouselController::class, 'store']);
Route::put('/carousels/{id}', [CarouselController::class, 'update']);
Route::delete('/carousels/{id}', [CarouselController::class, 'destroy']);

Route::get('/cards', [CardController::class, 'index']);
Route::post('/cards', [CardController::class, 'store']);
Route::put('/cards/{id}', [CardController::class, 'update']);
Route::delete('/cards/{id}', [CardController::class, 'destroy']);

Route::get('/videos', [VideoController::class, 'index']);
Route::post('/videos', [VideoController::class, 'store']);
Route::put('/videos/{id}', [VideoController::class, 'update']);
Route::delete('/videos/{id}', [VideoController::class, 'destroy']);

Route::get('/image-library', [ImageLibraryController::class, 'index']);
Route::post('/image-library/upload', [ImageLibraryController::class, 'store']);
Route::post('/image-library/bulk-upload', [ImageLibraryController::class, 'bulkUpload']);
Route::delete('/image-library/bulk-delete', [ImageLibraryController::class, 'bulkDelete']);
Route::put('/image-library/{id}', [ImageLibraryController::class, 'update']);
Route::delete('/image-library/{id}', [ImageLibraryController::class, 'destroy']);

Route::get('/footers', [FooterController::class, 'index']);
// Route::get('/footers', function () {
//     return "Hello footer";
// });
Route::post('/footers', [FooterController::class, 'store']);
Route::put('/footers/{id}', [FooterController::class, 'update']);
Route::delete('/footers/{id}', [FooterController::class, 'destroy']);

Route::get('/forms', [FormController::class, 'index']);
Route::post('/forms', [FormController::class, 'store']);
Route::get('/forms/{id}', [FormController::class, 'show']);
Route::put('/forms/{id}', [FormController::class, 'update']);
Route::delete('/forms/{id}', [FormController::class, 'destroy']);

Route::get('/about-cylinder-gas', [AboutCylinderGasController::class, 'index']);
Route::post('/about-cylinder-gas', [AboutCylinderGasController::class, 'store']);
Route::put('/about-cylinder-gas/{id}', [AboutCylinderGasController::class, 'update']);
Route::delete('/about-cylinder-gas/{id}', [AboutCylinderGasController::class, 'destroy']);

