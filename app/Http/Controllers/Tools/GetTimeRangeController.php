<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetTimeRangeController extends Controller
{
    static function getNowTimeRange() {
        $nowTime = time();
        $timeText = date('d-m-Y H:i:s', $nowTime);
        $timeExplode = explode(" ", $timeText);
        $timeHoursMinutes = $timeExplode[1];
        $timeHoursMinutes = explode(":", $timeHoursMinutes);
        $timeHoursMinutes[1] = "00";
        $timeHoursMinutes[2] = "00";
        $newTime = implode(":", $timeHoursMinutes);
        $newTime = $timeExplode[0] . " " . $newTime;
        return $newTime;
    }
}
