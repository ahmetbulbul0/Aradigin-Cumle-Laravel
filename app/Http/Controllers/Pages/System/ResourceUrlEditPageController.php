<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformsListController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlEditController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceUrlEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kaynak Linki Düzenle";
        $data['resourcePlatforms'] = ResourcePlatformsListController::getAllOnlyNotDeleted();

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            $data["data"] = ResourceUrlsListController::getFirstDataWithNoOnlyNotDeletedAllRelationships($data["data"]["no"]);
            return view("system.pages.resource_url_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = ResourceUrlsListController::getFirstDataWithNoOnlyNotDeletedAllRelationships($no);
        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }

        return view("system.pages.resource_url_edit")->with("data", $data);
    }

    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "resource_platform" => $request->resourcePlatform,
            "url" => $request->url,
        ];

        $edited = ResourceUrlEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kaynak Linki";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "Haber",
                "value" => $edited["editedData"]["news_no"]["content"]
            ],
            [
                "column" => "Kaynak Platform",
                "value" => $edited["editedData"]["resource_platform"]["name"]
            ],
            [
                "column" => "Url",
                "value" => $edited["editedData"]["url"]
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
