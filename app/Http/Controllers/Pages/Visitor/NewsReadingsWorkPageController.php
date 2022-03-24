<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Models\NewsModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Tools\GetTimeRangeController;
use App\Http\Controllers\Api\Readings\ReadingCreateController;
use App\Http\Controllers\Api\Readings\ReadingsListController;
use App\Http\Controllers\Api\ReadingsDetails\ReadingsDetailCreateController;
use App\Http\Controllers\Api\ReadingsDetails\ReadingsDetailsListController;
use App\Models\ReadingsModel;

class NewsReadingsWorkPageController extends Controller
{
    static function index($newsNo)
    {
        if (Session::get("visitorData")) {

            $nowTimeRange = GetTimeRangeController::getNowTimeRange();

            $data = [
                "newsNo" => $newsNo,
                "visitorNo" => Session::get("visitorData.no"),
                "time" => time(),
                "timeStart" => strtotime($nowTimeRange),
                "timeFinish" => strtotime("+1 hours", strtotime($nowTimeRange))
            ];

            if (!ReadingsListController::getFirstDataWhereTimeStartWhereTimeFinishWhereNewsNo($data["timeStart"], $data["timeFinish"], $data["newsNo"])) {
                $dataForReadingCreate["data"] = [
                    "time_start" => $data["timeStart"],
                    "time_finish" => $data["timeFinish"],
                    "news_no" => $data["newsNo"],
                ];
                ReadingCreateController::get($dataForReadingCreate);
            }

            if (!ReadingsDetailsListController::getFirstDataWhereNewsNoWhereVisitorNoOrderByDescTime($data["newsNo"], $data["visitorNo"])) {

                ReadingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->update([
                    "number" => ReadingsModel::raw('number + 1')
                ]);

                NewsModel::where(["is_deleted" => false, "no" => $data["newsNo"]])->update([
                    "reading" => NewsModel::raw("reading + 1")
                ]);

                $dataForCreateReadingDetail["data"] = [
                    "visitor_no" => $data["visitorNo"],
                    "news_no" => $data["newsNo"]
                ];
                ReadingsDetailCreateController::get($dataForCreateReadingDetail);
            }

            if (ReadingsDetailsListController::getFirstDataWhereNewsNoWhereVisitorNoOrderByDescTime($data["newsNo"], $data["visitorNo"])) {

                $back12Hours = strtotime("-12 hours", time());

                $readingDetail = ReadingsDetailsListController::getFirstDataWhereNewsNoWhereVisitorNoOrderByDescTime($data["newsNo"], $data["visitorNo"]);

                if ($readingDetail["time"] < $back12Hours) {
                    ReadingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->update([
                        "number" => ReadingsModel::raw('number + 1')
                    ]);

                    NewsModel::where(["is_deleted" => false, "no" => $data["newsNo"]])->update([
                        "reading" => NewsModel::raw("reading + 1")
                    ]);

                    $dataForCreateReadingDetail["data"] = [
                        "visitor_no" => $data["visitorNo"],
                        "news_no" => $data["newsNo"]
                    ];
                    ReadingsDetailCreateController::get($dataForCreateReadingDetail);
                }
            }
        }
    }
}
