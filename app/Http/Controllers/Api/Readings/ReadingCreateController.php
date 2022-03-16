<?php

namespace App\Http\Controllers\Api\Readings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Models\ReadingsDetailModel;
use App\Models\ReadingsModel;
use Illuminate\Support\Facades\Session;

class ReadingCreateController extends Controller
{
    static function work($newsNo)
    {
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

        if (!ReadingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->count()) {
            ReadingsModel::create([
                "no" => NoGenerator::generateReadingsNo(),
                "time_start" => $data["timeStart"],
                "time_finish" => $data["timeFinish"],
                "news_no" => $data["newsNo"],
                "number" => 0
            ]);
        }

        $readingDetail = ReadingsDetailModel::where(["news_no" => $data["newsNo"], "visitor_no" => $data["visitorNo"]])->orderBy("time", "DESC")->first();

        if (!$readingDetail) {
            ReadingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->update([
                "number" => ReadingsModel::raw('number + 1')
            ]);
            ReadingsDetailModel::create([
                "no" => NoGenerator::generateReadingsDetailNo(),
                "visitor_no" => $data["visitorNo"],
                "time" => $nowTime,
                "news_no" => $data["newsNo"]
            ]);
        }

        if ($readingDetail) {
            $back12Hours = strtotime("-12 hours", $nowTime);
            if ($readingDetail["time"] < $back12Hours) {
                ReadingsModel::where(["time_start" => $data["timeStart"], "time_finish" => $data["timeFinish"], "news_no" => $data["newsNo"]])->update([
                    "number" => ReadingsModel::raw('number + 1')
                ]);

                ReadingsDetailModel::create([
                    "no" => NoGenerator::generateListingsDetailNo(),
                    "visitor_no" => $data["visitorNo"],
                    "time" => $nowTime,
                    "news_no" => $data["newsNo"]
                ]);
            }
        }
    }
}
