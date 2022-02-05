<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\Categories\CategoryEditController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kategori Düzenle";
        $data["categoryTypes"] = CategoryTypesListController::getAllOnlyNotDeleted();
        $data["categories"] = CategoriesListController::getAllOnlyNotDeletedAllRelationShips();

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            return view("system.pages.category_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);
        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }
        return view("system.pages.category_edit")->with("data", $data);
    }

    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "name" => $request->name,
            "type" => $request->type,
            "main_category" => $request->mainCategory,
            "link_url" => $request->linkUrl
        ];

        $edited = CategoryEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kategori";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $edited["editedData"]["name"]
            ],
            [
                "column" => "Tipi",
                "value" => $edited["editedData"]["type"]["name"]
            ],
            [
                "column" => "Ana Kategori",
                "value" => $edited["editedData"]["main_category"]["name"] ?? "-"
            ],
            [
                "column" => "Url Metni",
                "value" => $edited["editedData"]['link_url']
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
