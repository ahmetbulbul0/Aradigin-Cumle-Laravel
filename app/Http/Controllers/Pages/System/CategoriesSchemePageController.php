<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesSchemePageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "Kategori Şeması";

        $data["categories"]["mainCategories"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereTypeMain();
        $data["categories"]["subCategories"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereTypeSub();

        return view("system.pages.categories_scheme")->with("data", $data);
    }
}
