<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformEditController;
use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourcePlatformEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kaynak Site Düzenle";

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            return view("system.pages.resource_platform_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = ResourcePlatformsListController::getFirstDataWithNoOnlyNotDeleted($no);
        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }
        return view("system.pages.resource_platform_edit")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "name" => $request->name,
            "main_url" => $request->mainUrl,
            "link_url" => $request->linkUrl
        ];

        $edited = ResourcePlatformEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kaynak Site";

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
                "column" => "Site Linki",
                "value" => $edited["editedData"]["main_url"]
            ],
            [
                "column" => "Link Metni",
                "value" => $edited["editedData"]["link_url"]
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
