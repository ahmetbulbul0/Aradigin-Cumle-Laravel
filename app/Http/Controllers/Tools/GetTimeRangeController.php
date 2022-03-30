<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetTimeRangeController extends Controller
{
    static function getNowTimeRange()
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
        return $newTime;
    }
    static function getValueTimeRange($timeValue)
    {
        $nowTime = $timeValue;
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
    static function getValueDayStartTime($dayTime)
    {
        $dayStart = date("H:i:s", $dayTime);
        $dayStart = explode(":", $dayStart);
        $dayStart[0] = "00";
        $dayStart[1] = "00";
        $dayStart[2] = "00";
        $dayStart = implode(":", $dayStart);
        $dayStart = date("d-m-Y", $dayTime) . " " . $dayStart;
        $dayStart = strtotime($dayStart);
        return $dayStart;
    }
    static function getValueDayFinishTime($dayTime)
    {
        $dayFinish = date("H:i:s", $dayTime);
        $dayFinish = explode(":", $dayFinish);
        $dayFinish[0] = "23";
        $dayFinish[1] = "59";
        $dayFinish[2] = "59";
        $dayFinish = implode(":", $dayFinish);
        $dayFinish = date("d-m-Y", $dayTime) . " " . $dayFinish;
        $dayFinish = strtotime($dayFinish);
        return $dayFinish;
    }
}
