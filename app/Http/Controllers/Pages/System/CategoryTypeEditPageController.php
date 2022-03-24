<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\CategoryTypes\CategoryTypeEditController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryTypeEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kategori Tipi Düzenle";

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            return view("system.pages.category_type_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = CategoryTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo($no);
        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }
        return view("system.pages.category_type_edit")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "name" => $request->name
        ];

        $edited = CategoryTypeEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kategori Tipi";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $edited["editedData"]["name"]
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
