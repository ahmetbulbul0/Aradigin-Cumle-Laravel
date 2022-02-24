<?php

namespace App\Http\Controllers\Pages\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlEditController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;

class CategoryGroupUrlEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kategori Grubu Link Metni Düzenle";

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            return view("system.pages.category_group_url_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = CategoryGroupUrlsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);
        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }
        return view("system.pages.category_group_url_edit")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "link_url" => $request->linkUrl
        ];

        $edited = CategoryGroupUrlEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kategori Grubu Link Metni";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "Kategori Grubu",
                "value" => CategoryGroupToText::single($edited["editedData"]["group_no"]),
            ],
            [
                "column" => "Link Metni",
                "value" => $edited["editedData"]["link_url"]
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
