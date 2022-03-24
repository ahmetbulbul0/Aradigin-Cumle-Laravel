<?php

namespace App\Http\Controllers\Api\ListingsDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Api\Visitors\VisitorsListController;
use App\Models\ListingsDetailModel;

class ListingsDetailCreateController extends Controller
{
    static function get($data)
    {
        $visitorNo = htmlspecialchars($data["data"]["visitor_no"]);
        $newsNo = htmlspecialchars($data["data"]["news_no"]);

        $visitorNo = intval($visitorNo);
        $newsNo = intval($newsNo);

        $data["data"] = [
            "visitor_no" => $visitorNo,
            "news_no" => $newsNo
        ];

        return ListingsDetailCreateController::check($data);
    }
    static function check($data)
    {
        $visitorNo = $data["data"]["visitor_no"];
        $newsNo = $data["data"]["news_no"];

        if (!isset($visitorNo) || empty($visitorNo)) {
            $data["errors"]["visitor_no"] = "Ziyaretçi No Alanı Zorunludur";
        }
        if (!isset($newsNo) || empty($newsNo)) {
            $data["errors"]["news_no"] = "Haber No Alanı Zorunludur";
        }

        if (isset($newsNo) && !empty($newsNo) && !NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($newsNo)) {
            $data["errors"]["news_no"] = "Geçersiz Haber No Değeri";
        }

        if (isset($visitorNo) && !empty($visitorNo) && !VisitorsListController::getFirstDataOnlyNotBannedDatasWhereNo($visitorNo)) {
            $data["errors"]["visitor_no"] = "Geçersiz Ziyaretçi No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ListingsDetailCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateListingsDetailNo();
        $visitorNo = $data["data"]["visitor_no"];
        $time = time();
        $newsNo = $data["data"]["news_no"];

        ListingsDetailModel::create([
            "no" => $no,
            "visitor_no" => $visitorNo,
            "time" => $time,
            "news_no" => $newsNo
        ]);

        $data["createdData"] = ListingsDetailsListController::getFirstDataWhereNo($no);

        return $data;
    }
}
