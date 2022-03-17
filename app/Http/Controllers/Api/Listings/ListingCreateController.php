<?php

namespace App\Http\Controllers\Api\Listings;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use App\Models\ListingsModel;
use App\Models\ListingsDetailModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Tools\NoGenerator;

class ListingCreateController extends Controller
{
    static function work($newsNo)
    {
        if (Session::get("visitorData")) {
            $nowTime = time();

            $timeText = date('d-m-Y H:i:s', $nowTime);
            $timeExplode = explode(" ", $timeText);
            $timeHoursMinutes = $timeExplode[1];
            $timeHoursMinutes = explode(":", $timeHoursMinutes);
            $timeHoursMinutes[1] = "00";
            $timeHoursMinutes[2] = "00";
            $newTime = implode(":", $timeHoursMinutes);
            $newTime = $timeExplode[0] . " " . $newTime;

            $data = [
                "newsNo" => $newsNo,
                "visitorNo" => Session::get("visitorData.no"),
                "time" => $nowTime,
                "timeStart" => strtotime($newTime),
                "timeFinish" => strtotime("+1 hours", strtotime($newTime))
            ];

            if (!ListingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->count()) {
                ListingsModel::create([
                    "no" => NoGenerator::generateListingsNo(),
                    "time_start" => $data["timeStart"],
                    "time_finish" => $data["timeFinish"],
                    "news_no" => $data["newsNo"],
                    "number" => 0
                ]);
            }

            $listingDetail = ListingsDetailModel::where(["news_no" => $data["newsNo"], "visitor_no" => $data["visitorNo"]])->orderBy("time", "DESC")->first();

            if (!$listingDetail) {
                ListingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->update([
                    "number" => ListingsModel::raw('number + 1')
                ]);

                NewsModel::where(["is_deleted" => false, "no" => $data["newsNo"]])->update([
                    "listing" => NewsModel::raw("listing + 1")
                ]);

                ListingsDetailModel::create([
                    "no" => NoGenerator::generateListingsDetailNo(),
                    "visitor_no" => $data["visitorNo"],
                    "time" => $nowTime,
                    "news_no" => $data["newsNo"]
                ]);
            }

            if ($listingDetail) {
                $back12Hours = strtotime("-12 hours", $nowTime);
                if ($listingDetail["time"] < $back12Hours) {
                    ListingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->update([
                        "number" => ListingsModel::raw('number + 1')
                    ]);

                    NewsModel::where(["is_deleted" => false, "no" => $data["newsNo"]])->update([
                        "listing" => NewsModel::raw("listing + 1")
                    ]);

                    ListingsDetailModel::create([
                        "no" => NoGenerator::generateListingsDetailNo(),
                        "visitor_no" => $data["visitorNo"],
                        "time" => $nowTime,
                        "news_no" => $data["newsNo"]
                    ]);
                }
            }
        }
    }
}
