<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\GetTimeRangeController;
use App\Http\Controllers\Api\Listings\ListingsListController;
use App\Http\Controllers\Api\Listings\ListingCreateController;

class AllNewsListingsCheckPageController extends Controller
{
    static function index()
    {
        $allNews = NewsListController::getAllDataOnlyNotDeletedDatas();

        $nowTimeRange = GetTimeRangeController::getNowTimeRange();
        $timeStart = strtotime($nowTimeRange);
        $timeFinish = strtotime("+1 hours", strtotime($nowTimeRange));

        foreach ($allNews as $news) {
            if (!ListingsListController::getFirstDataWhereTimeStartWhereTimeFinishWhereNewsNo($timeStart, $timeFinish, $news["no"])) {
                $dataForListingCreate["data"] = [
                    "time_start" => $timeStart,
                    "time_finish" => $timeFinish,
                    "news_no" => $news["no"],
                ];
                ListingCreateController::get($dataForListingCreate);
            }
        }

        foreach ($allNews as $news) {

            $newsTimeRange = GetTimeRangeController::getValueTimeRange($news["publish_date"]);
            $newsTimeStart = strtotime($newsTimeRange);

            $timeDifferent = (($timeStart - $newsTimeStart) / 60) / 60;

            for ($i = 1; $i <= $timeDifferent; $i++) {
                if (!ListingsListController::getFirstDataWhereTimeStartWhereTimeFinishWhereNewsNo(strtotime("-$i hours", $timeStart), strtotime("-$i hours", $timeFinish), $news["no"])) {
                    $dataForListingCreate["data"] = [
                        "time_start" => strtotime("-$i hours", $timeStart),
                        "time_finish" => strtotime("-$i hours", $timeFinish),
                        "news_no" => $news["no"],
                    ];
                    ListingCreateController::get($dataForListingCreate);
                }
            }
        }
    }
}
