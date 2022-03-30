<?php

namespace App\Http\Controllers\Api\Listings;

use App\Http\Controllers\Controller;
use App\Models\ListingsModel;
use Illuminate\Http\Request;

class ListingsListController extends Controller
{
    static function getFirstDataWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ListingsModel::where(["no" => $no])->count() ? ListingsModel::where(["no" => $no])->first() : NULL;
    }
    static function getAllDataWhere($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ListingsModel::where(["no" => $no])->count() ? ListingsModel::where(["no" => $no])->first() : NULL;
    }
    static function getAllDataWhereNewsNoOrderByDescTimeFinish($newsNo) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ListingsModel::where(["news_no" => $newsNo])->orderBy("time_finish", "DESC")->count() ? ListingsModel::where(["news_no" => $newsNo])->orderBy("time_finish", "DESC")->get() : NULL;
    }
    static function getFirstDataWhereTimeStartWhereTimeFinishWhereNewsNo($timeStart, $timeFinish, $newsNo) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ListingsModel::where(["time_start" => $timeStart, "time_finish" => $timeFinish, "news_no" => $newsNo])->count() ? ListingsModel::where(["time_start" => $timeStart, "time_finish" => $timeFinish, "news_no" => $newsNo])->first() : NULL;
    }
}
