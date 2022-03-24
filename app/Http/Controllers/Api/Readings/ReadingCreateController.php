<?php

namespace App\Http\Controllers\Api\Readings;

use App\Models\ReadingsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Api\News\NewsListController;

class ReadingCreateController extends Controller
{
    static function get($data)
    {
        $timeStart = htmlspecialchars($data["data"]["time_start"]);
        $timeFinish = htmlspecialchars($data["data"]["time_finish"]);
        $newsNo = htmlspecialchars($data["data"]["news_no"]);

        $timeStart = intval($timeStart);
        $timeFinish = intval($timeFinish);
        $newsNo = intval($newsNo);

        $data["data"] = [
            "time_start" => $timeStart,
            "time_finish" => $timeFinish,
            "news_no" => $newsNo
        ];

        return ReadingCreateController::check($data);
    }
    static function check($data)
    {
        $timeStart = $data["data"]["time_start"];
        $timeFinish = $data["data"]["time_finish"];
        $newsNo = $data["data"]["news_no"];

        if (!isset($timeStart) || empty($timeStart)) {
            $data["errors"]["time_start"] = "Başlangıç Zamanı Alanı Zorunludur";
        }
        if (!isset($timeFinish) || empty($timeFinish)) {
            $data["errors"]["time_finish"] = "Bitiş Zamanı Alanı Zorunludur";
        }
        if (!isset($newsNo) || empty($newsNo)) {
            $data["errors"]["new_no"] = "Haber No Alanı Zorunludur";
        }

        if (isset($newsNo) && !empty($newsNo) && !NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($newsNo)) {
            $data["errors"]["new_no"] = "Geçersiz Haber No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ReadingCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateReadingsNo();
        $timeStart = $data["data"]["time_start"];
        $timeFinish = $data["data"]["time_finish"];
        $newsNo = $data["data"]["news_no"];
        $number = 0;

        ReadingsModel::create([
            "no" => $no,
            "time_start" => $timeStart,
            "time_finish" => $timeFinish,
            "news_no" => $newsNo,
            "number" => $number
        ]);

        $data["createdData"] = ReadingsListController::getFirstDataWhereNo($no);

        return $data;
    }
}
