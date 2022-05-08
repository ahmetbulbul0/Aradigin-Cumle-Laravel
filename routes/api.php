<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Common\WebSiteSetupPageController;
use App\Http\Controllers\RestApi\UsersController;

//  OLD APİ ROUTES
Route::post("/kurulum", [WebSiteSetupPageController::class, "form"])->name("api_website_kurulum");

Route::prefix("/kurulum")->group(function () {
        Route::post("/asama-1", [WebSiteSetupPageController::class, "formStage1"])->name("api_website_kurulum_asama_1");
        Route::post("/asama-2", [WebSiteSetupPageController::class, "formStage2"])->name("api_website_kurulum_asama_2");
        Route::post("/asama-3", [WebSiteSetupPageController::class, "formStage3"])->name("api_website_kurulum_asama_3");
        Route::post("/asama-4", [WebSiteSetupPageController::class, "formStage4"])->name("api_website_kurulum_asama_4");
});
//  OLD APİ ROUTES

Route::apiResource("users", UsersController::class);
