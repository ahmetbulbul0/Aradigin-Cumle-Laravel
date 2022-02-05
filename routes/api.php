<?php

use App\Http\Controllers\Api\Categories\CategoryCreateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/category-create", [CategoryCreateController::class, "get"]);
