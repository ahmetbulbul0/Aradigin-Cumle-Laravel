<?php

namespace App\Http\Controllers\Api\ReadingsDetails;

use Illuminate\Http\Request;
use App\Models\ReadingsDetailModel;
use App\Http\Controllers\Controller;

class ReadingsDetailsListController extends Controller
{
    static function getAllDataWhereTimeInLast24Hours()
    {
        return ReadingsDetailModel::where([["time", ">", strtotime("-1 days", time())]])->count() ? ReadingsDetailModel::where([["time", ">", strtotime("-1 days", time())]])->get() : NULL;
    }
    static function getAllDataWhereTimeBetweenTimeStartTimeFinish($timeStart, $timeFinish)
    {
        return ReadingsDetailModel::where([["time", ">", $timeStart], ["time", "<", $timeFinish]])->get();
    }
    static function getFirstDataWhereNo($no)
    {
        return ReadingsDetailModel::where(["no" => $no])->count() ? ReadingsDetailModel::where(["no" => $no])->first() : NULL;
    }
    static function getFirstDataWhereNewsNoWhereVisitorNoOrderByDescTime($newsNo, $visitorNo)
    {
        return ReadingsDetailModel::where(["news_no" => $newsNo, "visitor_no" => $visitorNo])->orderBy("time", "DESC")->count() ? ReadingsDetailModel::where(["news_no" => $newsNo, "visitor_no" => $visitorNo])->orderBy("time", "DESC")->first() : NULL;
    }
}
