<?php

namespace App\Http\Controllers\Api\Readings;

use Illuminate\Http\Request;
use App\Models\ReadingsModel;
use App\Http\Controllers\Controller;

class ReadingsListController extends Controller
{
    static function getFirstDataWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ReadingsModel::where(["no" => $no])->count() ? ReadingsModel::where(["no" => $no])->first() : NULL;
    }
    static function getAllDataWhereNewsNoOrderByDescTimeFinish($newsNo) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ReadingsModel::where(["news_no" => "$newsNo"])->orderBy("time_finish", "DESC")->count() ? ReadingsModel::where(["news_no" => "$newsNo"])->orderBy("time_finish", "DESC")->get() : NULL;
    }
    static function getFirstDataWhereTimeStartWhereTimeFinishWhereNewsNo($timeStart, $timeFinish, $newsNo) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ReadingsModel::where(["time_start" => $timeStart, "time_finish" => $timeFinish, "news_no" => $newsNo])->count() ? ReadingsModel::where(["time_start" => $timeStart, "time_finish" => $timeFinish, "news_no" => $newsNo])->first() : NULL;
    }
}
