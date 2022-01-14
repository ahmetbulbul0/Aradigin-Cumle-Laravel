<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use App\Constants\Constants;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\CategoryGroupsModel;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "page_title" => "AnaSayfa",
            "menu" => [
                "categories" => CategoriesModel::where([["is_deleted", false], ["type", Constants::MAİN_CATEGORY_TYPE]])->get()->toArray()
            ],
            "smallList2One" => [
                0 => [
                    "title" => "Son Yayınlananlar",
                    "data" => NewsModel::where("is_deleted", false)->orderByDesc("publish_date")->limit(2)->get(),
                    "allListLink" => "/haberler/son-yayinlananlar"
                ],
                1 => [
                    "title" => "Çok Okunanlar",
                    "data" => NewsModel::where("is_deleted", false)->orderByDesc("reading")->limit(2)->get(),
                    "allListLink" => "/haberler/cok-okunanlar"
                ]
            ],
            "middle2List" => [
                0 => [
                    "title" => "Teknoloji",
                    "data" => NewsModel::where([["is_deleted", false]])->limit(5)->orderByDesc("publish_date")->get(),
                    "allListLink" => "/haberler/son-yayinlananlar"
                ],
                1 => [
                    "title" => "Siyaset",
                    "data" => NewsModel::where([["is_deleted", false]])->limit(5)->orderByDesc("publish_date")->get(),
                    "allListLink" => "/haberler/cok-okunanlar"
                ]
            ],
            "bigList" => [
                "title" => "Son Yayınlananlar",
                "data" => NewsModel::where("is_deleted", false)->orderByDesc("publish_date")->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray(),
                "listType" => "son-yayinlananlar"
            ]
        ];
        
        $data["middle2List"][0]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["middle2List"][0]["data"]);
        $data["middle2List"][1]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["middle2List"][1]["data"]);
        $data["bigList"]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["bigList"]["data"]);

        return view("public.pages.home", ["data" => $data]);
    }
}
