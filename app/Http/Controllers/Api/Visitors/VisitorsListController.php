<?php

namespace App\Http\Controllers\Api\Visitors;

use App\Http\Controllers\Controller;
use App\Models\VisitorsModel;
use Illuminate\Http\Request;

class VisitorsListController extends Controller
{
    static function getAllData() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA 
    {
        return VisitorsModel::count() ? VisitorsModel::get() : NULL;
    }
    static function getAllDataOnlyNotBannedDatas() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return VisitorsModel::where("is_banned", false)->count() ? VisitorsModel::where("is_banned", false)->get() : NULL;
    }
    static function getFirstDataOnlyNotBannedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return VisitorsModel::where(["is_banned" => false, "no" => "$no"])->count() ? VisitorsModel::where(["is_banned" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyBannedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return VisitorsModel::where(["is_banned" => true, "no" => "$no"])->count() ? VisitorsModel::where(["is_banned" => true, "no" => "$no"])->first() : NULL;
    }
}
