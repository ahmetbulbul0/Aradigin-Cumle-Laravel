<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestApi\UsersController;
use App\Http\Controllers\RestApi\VisitorsController;
use App\Http\Controllers\RestApi\UserTypesController;
use App\Http\Controllers\RestApi\ResourceUrlsController;
use App\Http\Controllers\RestApi\CategoryTypesController;
use App\Http\Controllers\RestApi\UsersSettingsController;
use App\Http\Controllers\RestApi\ResourcePlatformsController;
use App\Http\Controllers\Pages\Common\WebSiteSetupPageController;
use App\Http\Controllers\RestApi\CategoriesController;
use App\Http\Controllers\RestApi\CategoryGroupsController;
use App\Http\Controllers\RestApi\CategoryGroupUrlsController;

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
Route::apiResource("user-types", UserTypesController::class);
Route::apiResource("users-settings", UsersSettingsController::class);
Route::apiResource("visitors", VisitorsController::class);
Route::apiResource("category-types", CategoryTypesController::class);
Route::apiResource("resource-platforms", ResourcePlatformsController::class);
Route::apiResource("resource-urls", ResourceUrlsController::class);
Route::apiResource("categories", CategoriesController::class);
Route::apiResource("category-groups", CategoryGroupsController::class);
Route::apiResource("category-group-urls", CategoryGroupUrlsController::class);
