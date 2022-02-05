<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

class UnixTimeToTextDateController extends Controller
{

    static function MultipleTimeToDateForWriteTime($data)
    {
        $count = count($data);
        
        for ($i = 0; $i < $count; $i++) {
            $unix = $data[$i]["write_time"];
            $data[$i]["write_time"] = UnixTimeToTextDateController::TimeToDate($unix);
        }

        return $data;
    }

    static function MultipleTimeToDate($data)
    {
        $count = count($data);

        for ($i = 0; $i < $count; $i++) {
            $unix = $data[$i]["publish_date"];
            $data[$i]["publish_date"] = UnixTimeToTextDateController::TimeToDate($unix);
        }

        return $data;
    }

    static function TimeToDate($unix)
    {
        return [
            "unix" => $unix,
            "text" => date("Y.m.d - h:i:s", $unix)
        ];
    }
}
