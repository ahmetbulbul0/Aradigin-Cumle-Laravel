<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupEditController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryGroupEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kategori Grubu Düzenle";

        $data["categories"] = CategoriesListController::getAllOnlyNotDeletedAllRelationShips();

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            $data["data"] = CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($data["data"]["no"]);
            return view("system.pages.category_group_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);

        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }

        return view("system.pages.category_group_edit")->with("data", $data);
    }

    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "main" => $request->main,
            "sub1" => $request->sub1,
            "sub2" => $request->sub2,
            "sub3" => $request->sub3,
            "sub4" => $request->sub4,
            "sub5" => $request->sub5
        ];

        $edited = CategoryGroupEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kategori Grubu";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "Ana Kategori",
                "value" => $edited["editedData"]["main"]["name"]
            ],
            [
                "column" => "1.Alt Kategori",
                "value" => $edited["editedData"]["sub1"]["name"] ?? "-"
            ],
            [
                "column" => "2.Alt Kategori",
                "value" => $edited["editedData"]["sub2"]["name"] ?? "-"
            ],
            [
                "column" => "3.Alt Kategori",
                "value" => $edited["editedData"]["sub3"]["name"] ?? "-"
            ],
            [
                "column" => "4.Alt Kategori",
                "value" => $edited["editedData"]["sub4"]["name"] ?? "-"
            ],
            [
                "column" => "5.Alt Kategori",
                "value" => $edited["editedData"]["sub5"]["name"] ?? "-"
            ],
            [
                "column" => "Url Metni:",
                "value" => $edited["editedData"]["link_url"]["link_url"]
            ],
        ];

        $data["data"] = CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($data["data"]["no"]);

        return $this->index(NULL, $edited);
    }
}
