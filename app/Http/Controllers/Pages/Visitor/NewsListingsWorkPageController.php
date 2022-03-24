<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Models\NewsModel;
use App\Models\ListingsModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Tools\GetTimeRangeController;
use App\Http\Controllers\Api\Listings\ListingsListController;
use App\Http\Controllers\Api\Listings\ListingCreateController;
use App\Http\Controllers\Api\ListingsDetails\ListingsDetailCreateController;
use App\Http\Controllers\Api\ListingsDetails\ListingsDetailsListController;

class NewsListingsWorkPageController extends Controller
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

            if (!ListingsListController::getFirstDataWhereTimeStartWhereTimeFinishWhereNewsNo($data["timeStart"], $data["timeFinish"], $data["newsNo"])) {
                $dataForListingCreate["data"] = [
                    "time_start" => $data["timeStart"],
                    "time_finish" => $data["timeFinish"],
                    "news_no" => $data["newsNo"],
                ];
                ListingCreateController::get($dataForListingCreate);
            }

            if (!ListingsDetailsListController::getFirstDataWhereNewsNoWhereVisitorNoOrderByDescTime($data["newsNo"], $data["visitorNo"])) {

                ListingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->update([
                    "number" => ListingsModel::raw('number + 1')
                ]);

                NewsModel::where(["is_deleted" => false, "no" => $data["newsNo"]])->update([
                    "listing" => NewsModel::raw("listing + 1")
                ]);

                $dataForCreateeListingDetail["data"] = [
                    "visitor_no" => $data["visitorNo"],
                    "news_no" => $data["newsNo"]
                ];
                ListingsDetailCreateController::get($dataForCreateeListingDetail);
            }

            if (ListingsDetailsListController::getFirstDataWhereNewsNoWhereVisitorNoOrderByDescTime($data["newsNo"], $data["visitorNo"])) {

                $back12Hours = strtotime("-12 hours", time());

                $listingDetail = ListingsDetailsListController::getFirstDataWhereNewsNoWhereVisitorNoOrderByDescTime($data["newsNo"], $data["visitorNo"]);

                if ($listingDetail["time"] < $back12Hours) {
                    ListingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->update([
                        "number" => ListingsModel::raw('number + 1')
                    ]);

                    NewsModel::where(["is_deleted" => false, "no" => $data["newsNo"]])->update([
                        "listing" => NewsModel::raw("listing + 1")
                    ]);

                    $dataForCreateeListingDetail["data"] = [
                        "visitor_no" => $data["visitorNo"],
                        "news_no" => $data["newsNo"]
                    ];
                    ListingsDetailCreateController::get($dataForCreateeListingDetail);
                }

            }
        }
    }
}
