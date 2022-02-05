<?php

namespace App\Http\Controllers\Pages\Author;

use Illuminate\Http\Request;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsCreateController;

class NewsCreatePageController extends Controller
{
    public function index($data = NULL) {
        $data["page_title"] = "Haber Ekle";
        $data["categoryGroups"] = CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5")->orderBy("main")->orderBy("sub1")->orderBy("sub2")->orderBy("sub3")->orderBy("sub4")->orderBy("sub5")->get()->toArray();
        $data["resourcePlatforms"] = ResourcePlatformsModel::where("is_deleted", false)->orderBy("name")->get();
        return view("author.pages.news_create")->with("data", $data);
    }

    public function form(Request $request) {
        $data["data"] = [
            "content" => $request->content,
            "category" => $request->category,
            "publish_date" => $request->publish_date,
            "spe_date" => $request->spe_date,
            "spe_time" => $request->spe_time,
            "resource_platform" => $request->resource_platform,
            "resource_url" => $request->resource_url,
            "author" => "371699"
        ];

        $created = NewsCreateController::get($data);

        if (isset($created["errors"])) {return $this->index($created);}

        $created["createdDataName"] = "Haber";

        $created["createdData"] = [
            [
                "column" => "No",
                "value" => $created["createdData"]["no"]
            ],
            [
                "column" => "İçerik",
                "value" => $created["createdData"]["content"]
            ],
            [
                "column" => "Yazar",
                "value" => $created["createdData"]["author"]["username"] . " [" . $created["createdData"]["author"]["full_name"] . "]"
            ],
            [
                "column" => "category",
                "value" => CategoryGroupToText::single($created["createdData"]["category"]["no"])
            ],
            [
                "column" => "Kaynak Site",
                "value" => $created["createdData"]["resource_platform"]["name"]
            ],
            [
                "column" => "Kaynak Linki:",
                "value" => $created["createdData"]["resource_url"]["url"]
            ],
            [
                "column" => "Yayın Tarihi",
                "value" => date("Y-m-d - H:i", $created["createdData"]["publish_date"])
            ],
            [
                "column" => "Yazılma Tarihi",
                "value" => date("Y-m-d - H:i", $created["createdData"]["write_time"])
            ],
            [
                "column" => "Listelenme",
                "value" => $created["createdData"]["listing"]
            ],
            [
                "column" => "Okunma",
                "value" => $created["createdData"]["reading"]
            ],
            [
                "column" => "Haber Linki",
                "value" => $created["createdData"]["link_url"]
            ]
        ];

        return $this->index($created);
    }
}
