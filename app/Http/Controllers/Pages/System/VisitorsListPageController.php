<?php

namespace App\Http\Controllers\Pages\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use App\Http\Controllers\Api\Visitors\VisitorsListController;

class VisitorsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Ziyaretçiler";
        if (!isset($data["data"])) {
            $data["data"] = VisitorsListController::getAllData();
        }
        if ($data["data"]) {
            $data["data"] = UnixTimeToTextDateController::MultipleTimeToDateForEveryColumn($data["data"], "last_login_time");
        }
        return view("system.pages.visitors_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("ziyaretciler"));
                break;
            case 'no09':
                return redirect(route("ziyaretciler_no09"));
                break;
            case 'no90':
                return redirect(route("ziyaretciler_no90"));
                break;
            case 'ip09':
                return redirect(route("ziyaretciler_ip09"));
                break;
            case 'ip90':
                return redirect(route("ziyaretciler_ip90"));
                break;
            case 'browserAZ':
                return redirect(route("ziyaretciler_browserAZ"));
                break;
            case 'browserZA':
                return redirect(route("ziyaretciler_browserZA"));
                break;
            case 'lastLoginTimeAZ':
                return redirect(route("ziyaretciler_lastLoginTimeAZ"));
                break;
            case 'lastLoginTimeZA':
                return redirect(route("ziyaretciler_lastLoginTimeZA"));
                break;
            case 'webSiteThemeAZ':
                return redirect(route("ziyaretciler_webSiteThemeAZ"));
                break;
            case 'webSiteThemeZA':
                return redirect(route("ziyaretciler_webSiteThemeZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByDescNo();
        return $this->index($data);
    }
    public function ip09()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByAscIp();
        return $this->index($data);
    }
    public function ip90()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByDescIp();
        return $this->index($data);
    }
    public function browserAZ()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByAscBrowser();
        return $this->index($data);
    }
    public function browserZA()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByDescBrowser();
        return $this->index($data);
    }
    public function lastLoginTimeAZ()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByAscLastLoginTime();
        return $this->index($data);
    }
    public function lastLoginTimeZA()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByDescLastLoginTime();
        return $this->index($data);
    }
    public function webSiteThemeAZ()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByAscWebSiteTheme();
        return $this->index($data);
    }
    public function webSiteThemeZA()
    {
        $data["data"] = VisitorsListController::getAllDataOrderByDescWebSiteTheme();
        return $this->index($data);
    }
}
