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
    static function getAllDataOnlyNotBannedDatasWhereLastLoginTimeInLast24Hours() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return VisitorsModel::where("is_banned", false)->where([["last_login_time", ">", strtotime("-1 days", time())]])->count() ? VisitorsModel::where("is_banned", false)->where([["last_login_time", ">", strtotime("-1 days", time())]])->get() : NULL;
    }
    static function getFirstDataOnlyNotBannedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return VisitorsModel::where(["is_banned" => false, "no" => "$no"])->count() ? VisitorsModel::where(["is_banned" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyBannedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return VisitorsModel::where(["is_banned" => true, "no" => "$no"])->count() ? VisitorsModel::where(["is_banned" => true, "no" => "$no"])->first() : NULL;
    }
    static function getAllDataOrderByAscNo()
    {
        return VisitorsModel::orderBy("no", "ASC")->count() ? VisitorsModel::orderBy("no", "ASC")->get() : NULL;
    }
    static function getAllDataOrderByDescNo()
    {
        return VisitorsModel::orderBy("no", "DESC")->count() ? VisitorsModel::orderBy("no", "DESC")->get() : NULL;
    }
    static function getAllDataOrderByAscIp()
    {
        return VisitorsModel::orderBy("ip", "ASC")->count() ? VisitorsModel::orderBy("ip", "ASC")->get() : NULL;
    }
    static function getAllDataOrderByDescIp()
    {
        return VisitorsModel::orderBy("ip", "DESC")->count() ? VisitorsModel::orderBy("ip", "DESC")->get() : NULL;
    }
    static function getAllDataOrderByAscBrowser()
    {
        return VisitorsModel::orderBy("browser", "ASC")->count() ? VisitorsModel::orderBy("browser", "ASC")->get() : NULL;
    }
    static function getAllDataOrderByDescBrowser()
    {
        return VisitorsModel::orderBy("browser", "DESC")->count() ? VisitorsModel::orderBy("browser", "DESC")->get() : NULL;
    }
    static function getAllDataOrderByAscLastLoginTime()
    {
        return VisitorsModel::orderBy("last_login_time", "ASC")->count() ? VisitorsModel::orderBy("last_login_time", "ASC")->get() : NULL;
    }
    static function getAllDataOrderByDescLastLoginTime()
    {
        return VisitorsModel::orderBy("last_login_time", "DESC")->count() ? VisitorsModel::orderBy("last_login_time", "DESC")->get() : NULL;
    }
    static function getAllDataOrderByAscWebSiteTheme()
    {
        return VisitorsModel::orderBy("website_theme", "ASC")->count() ? VisitorsModel::orderBy("website_theme", "ASC")->get() : NULL;
    }
    static function getAllDataOrderByDescWebSiteTheme()
    {
        return VisitorsModel::orderBy("website_theme", "DESC")->count() ? VisitorsModel::orderBy("website_theme", "DESC")->get() : NULL;
    }
}
