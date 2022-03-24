<?php

namespace App\Http\Controllers\Pages\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsEditController;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformsListController;

class MyNewsEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Haberlerim Düzenle";
        $data["categoryGroups"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscMainSub1Sub2Sub3Sub4Sub5();
        $data["resourcePlatforms"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByAscName();;

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            $data["data"] = NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($data["data"]["no"]);
            return view("author.pages.my_news_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);

        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }
        return view("author.pages.my_news_edit")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "content" => $request->content,
            "category" => $request->category,
            "publish_date" => $request->publishDate,
            "spe_date" => $request->speDate,
            "spe_time" => $request->speTime,
            "resource_platform" => $request->resourcePlatform,
            "resource_url" => $request->resourceUrl
        ];

        $edited = NewsEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Haber";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "İçerik",
                "value" => $edited["editedData"]["content"]
            ],
            [
                "column" => "Yazar",
                "value" => $edited["editedData"]["author"]["username"] . " [" . $edited["editedData"]["author"]["full_name"] . "]"
            ],
            [
                "column" => "Kategori",
                "value" => CategoryGroupToText::single($edited["editedData"]["category"]["no"])
            ],
            [
                "column" => "Kaynak Site",
                "value" => $edited["editedData"]["resource_platform"]["name"]
            ],
            [
                "column" => "Kaynak Linki",
                "value" => $edited["editedData"]["resource_url"]["url"]
            ],
            [
                "column" => "Yayın Tarihi",
                "value" => date("Y-m-d - H:i", $edited["editedData"]["publish_date"])
            ],
            [
                "column" => "Yazılma Tarihi",
                "value" => date("Y-m-d - H:i", $edited["editedData"]["write_time"])
            ],
            [
                "column" => "Listelenme",
                "value" => $edited["editedData"]["listing"]
            ],
            [
                "column" => "Okunma",
                "value" => $edited["editedData"]["reading"]
            ],
            [
                "column" => "Link Metni",
                "value" => $edited["editedData"]["link_url"]
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
