<?php

namespace App\Http\Controllers\Pages\Author;

use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use Illuminate\Http\Request;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsCreateController;
use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformsListController;
use Illuminate\Support\Facades\Session;

class NewsCreatePageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Haber Ekle";
        $data["categoryGroups"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscMainSub1Sub2Sub3Sub4Sub5();
        $data["resourcePlatforms"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByAscName();
        return view("author.pages.news_create")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "content" => $request->content,
            "category" => $request->category,
            "publish_date" => $request->publishDate,
            "spe_date" => $request->speDate,
            "spe_time" => $request->speTime,
            "resource_platform" => $request->resourcePlatform,
            "resource_url" => $request->resourceUrl,
            "author" => Session::get("userData.no")
        ];

        $created = NewsCreateController::get($data);

        if (isset($created["errors"])) {
            return $this->index($created);
        }

        $created["createdDataName"] = "Haber";

        $created["createdData"] = [
            [
                "dataName" => "Haber",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdNewsData"]["no"]
                    ],
                    [
                        "column" => "İçerik",
                        "value" => $created["createdNewsData"]["content"]
                    ],
                    [
                        "column" => "Yazar",
                        "value" => $created["createdNewsData"]["author"]["username"] . " [" . $created["createdNewsData"]["author"]["full_name"] . "]"
                    ],
                    [
                        "column" => "Kategori",
                        "value" => CategoryGroupToText::single($created["createdNewsData"]["category"]["no"])
                    ],
                    [
                        "column" => "Kaynak Site",
                        "value" => $created["createdNewsData"]["resource_platform"]["name"]
                    ],
                    [
                        "column" => "Kaynak Linki:",
                        "value" => $created["createdNewsData"]["resource_url"]["no"]
                    ],
                    [
                        "column" => "Yayın Tarihi",
                        "value" => date("Y-m-d - H:i", $created["createdNewsData"]["publish_date"])
                    ],
                    [
                        "column" => "Yazılma Tarihi",
                        "value" => date("Y-m-d - H:i", $created["createdNewsData"]["write_time"])
                    ],
                    [
                        "column" => "Listelenme",
                        "value" => $created["createdNewsData"]["listing"]
                    ],
                    [
                        "column" => "Okunma",
                        "value" => $created["createdNewsData"]["reading"]
                    ],
                    [
                        "column" => "Haber Linki",
                        "value" => $created["createdNewsData"]["link_url"]
                    ]
                ]
            ],
            [
                "dataName" => "Haber Kaynak Linki",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdResourceUrlData"]["no"]
                    ],
                    [
                        "column" => "Haber No",
                        "value" => $created["createdResourceUrlData"]["news_no"]["no"]
                    ],
                    [
                        "column" => "Kaynak Platform Adı",
                        "value" => $created["createdResourceUrlData"]["resource_platform"]["name"]
                    ],
                    [
                        "column" => "Kaynak Linki",
                        "value" => $created["createdResourceUrlData"]["url"]
                    ]
                ]
            ]
        ];

        return $this->index($created);
    }
}
