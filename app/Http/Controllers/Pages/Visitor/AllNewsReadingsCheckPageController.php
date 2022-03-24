<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Api\Readings\ReadingCreateController;
use App\Http\Controllers\Api\Readings\ReadingsListController;
use App\Http\Controllers\Tools\GetTimeRangeController;

class AllNewsReadingsCheckPageController extends Controller
{
    static function index()
    {
        $allNews = NewsListController::getAllDataOnlyNotDeletedDatas();

        $nowTimeRange = GetTimeRangeController::getNowTimeRange();
        $timeStart = strtotime($nowTimeRange);
        $timeFinish = strtotime("+1 hours", strtotime($nowTimeRange));

        foreach ($allNews as $news) {
            if (!ReadingsListController::getFirstDataWhereTimeStartWhereTimeFinishWhereNewsNo($timeStart, $timeFinish, $news["no"])) {
                $dataForReadingCreate["data"] = [
                    "time_start" => $timeStart,
                    "time_finish" => $timeFinish,
                    "news_no" => $news["no"],
                ];
                ReadingCreateController::get($dataForReadingCreate);
            }
        }

        foreach ($allNews as $news) {

            $newsTimeRange = GetTimeRangeController::getValueTimeRange($news["publish_date"]);
            $newsTimeStart = strtotime($newsTimeRange);

            $timeDifferent = (($timeStart - $newsTimeStart) / 60) / 60;

            for ($i = 1; $i <= $timeDifferent; $i++) {
                if (!ReadingsListController::getFirstDataWhereTimeStartWhereTimeFinishWhereNewsNo(strtotime("-$i hours", $timeStart), strtotime("-$i hours", $timeFinish), $news["no"])) {
                    $dataForReadingCreate["data"] = [
                        "time_start" => strtotime("-$i hours", $timeStart),
                        "time_finish" => strtotime("-$i hours", $timeFinish),
                        "news_no" => $news["no"],
                    ];
                    ReadingCreateController::get($dataForReadingCreate);
                }
            }
        }
    }
}
