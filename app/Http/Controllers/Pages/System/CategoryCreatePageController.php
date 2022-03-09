<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\Categories\CategoryCreateController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryCreatePageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Ekle";
        $data["categoryTypes"] = CategoryTypesListController::getAllOnlyNotDeleted();
        $data["categories"] = CategoriesListController::getAllOnlyNotDeletedAllRelationShips();
        return view("system.pages.category_create", ["data" => $data]);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "name" => $request->name,
            "type" => $request->type,
            "main_category" => $request->mainCategory
        ];

        $created = CategoryCreateController::get($data);

        if (isset($created["errors"])) {
            return $this->index($created);
        }

        $created["createdDataName"] = "Kategori";

        $created["createdData"] = [
            [
                "column" => "No",
                "value" => $created["createdData"]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $created["createdData"]["name"]
            ],
            [
                "column" => "Tipi",
                "value" => $created["createdData"]["type"]["name"]
            ],
            [
                "column" => "Ana Kategori",
                "value" => $created["createdData"]['main_category']['name'] ?? "-"
            ],
            [
                "column" => "Link Metni",
                "value" => $created["createdData"]['link_url']
            ]
        ];

        return $this->index($created);
    }
}
