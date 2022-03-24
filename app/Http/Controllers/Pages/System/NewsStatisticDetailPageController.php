<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use App\Http\Controllers\Api\Listings\ListingsListController;
use App\Http\Controllers\Api\Readings\ReadingsListController;

class NewsStatisticDetailPageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Haber İstatistikleri Detay";
        $data["news"] = NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        if ($data["news"]) {
            $data["data"] = $data["news"];
            $data["data"]["category"]["text"] = CategoryGroupToText::single($data["data"]["category"]["no"]);
            $data["data"]["publish_date"] = UnixTimeToTextDateController::TimeToDate($data["data"]["publish_date"]);
            $data["data"]["write_time"] = UnixTimeToTextDateController::TimeToDate($data["data"]["write_time"]);
            $data["news"] = $data["data"];
            unset($data["data"]);
            $data["listings"] = ListingsListController::getAllDataWhereNewsNoOrderByDescTimeFinish($data["news"]["no"]);
            $data["readings"] = ReadingsListController::getAllDataWhereNewsNoOrderByDescTimeFinish($data["news"]["no"]);

            if (isset($data["listings"]) || isset($data["readings"])) {
                for ($i = 0; $i < count($data["listings"]); $i++) {
                    $data["news_statistics"][$i] = [
                        "date" => date("d.m.Y", $data["listings"][$i]["time_start"]),
                        "time_start" => date("H:i", $data["listings"][$i]["time_start"]),
                        "time_finish" => date("H:i", $data["listings"][$i]["time_finish"]),
                        "listings" => $data["listings"][$i]["number"] ?? "-",
                        "readings" => $data["readings"][$i]["number"] ?? "-",
                        "ratio" => "-",
                    ];
                }
            }
        }
        
        return view("system.pages.news_statistic_detail")->with("data", $data);
    }
}
