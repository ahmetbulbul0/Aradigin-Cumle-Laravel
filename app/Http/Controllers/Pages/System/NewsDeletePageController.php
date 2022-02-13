<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\News\NewsDeleteController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;

class NewsDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Haber Sil";
        $data["basic_text"] = "haberi";
        $itemData = NewsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $itemData["no"],
            ],
            [
                "label" => "İçerik",
                "span" => $itemData["content"],
            ],
            [
                "label" => "Yazar",
                "span" => $itemData["author"]["username"]." [".$itemData["author"]["full_name"]."]",
            ],
            [
                "label" => "Kategori Grubu",
                "span" => CategoryGroupToText::single($itemData["category"]["no"]),
            ],
            [
                "label" => "Kaynak Site",
                "span" => $itemData["resource_platform"]["name"],
            ],
            [
                "label" => "Kaynak Linki",
                "span" => $itemData["resource_url"]["url"],
            ],
            [
                "label" => "Yayınlanma Tarihi",
                "span" => UnixTimeToTextDateController::TimeToDate($itemData["publish_date"])["text"],
            ],
            [
                "label" => "Yazılma Tarihi",
                "span" => UnixTimeToTextDateController::TimeToDate($itemData["write_time"])["text"],
            ],
            [
                "label" => "Listelenme",
                "span" => $itemData["listing"],
            ],
            [
                "label" => "Okunma",
                "span" => $itemData["reading"],
            ],
            [
                "label" => "Link Metni",
                "span" => $itemData["link_url"],
            ],
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
    }

    public function form(Request $request)
    {

        if ($request->action == "reject") {
            return redirect(route("haberler"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = NewsDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("haberler"));
        }

        return redirect(route("haberler"));
    }
}
