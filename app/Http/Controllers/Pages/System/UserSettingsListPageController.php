<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\UserSettings\UserSettingsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSettingsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kullanıcı Ayarları";
        if (!isset($data["data"])) {
            $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationships();
        }
        return view("system.pages.user_settings_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("kullanici_ayarlari"));
                break;
            case 'no09':
                return redirect(route("kullanici_ayarlari_no09"));
                break;
            case 'no90':
                return redirect(route("kullanici_ayarlari_no90"));
                break;
            case 'userAZ':
                return redirect(route("kullanici_ayarlari_userAZ"));
                break;
            case 'userZA':
                return redirect(route("kullanici_ayarlari_userZA"));
                break;
            case 'webSiteThemeAZ':
                return redirect(route("kullanici_ayarlari_webSiteThemeAZ"));
                break;
            case 'webSiteThemeZA':
                return redirect(route("kullanici_ayarlari_webSiteThemeZA"));
                break;
            case 'dashboardThemeAZ':
                return redirect(route("kullanici_ayarlari_dashboardThemeAZ"));
                break;
            case 'dashboardThemeZA':
                return redirect(route("kullanici_ayarlari_dashboardThemeZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo();
        return $this->index($data);
    }
    public function userAZ()
    {
        $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscUserNo();
        return $this->index($data);
    }
    public function userZA()
    {
        $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescUserNo();
        return $this->index($data);
    }
    public function webSiteThemeAZ()
    {
        $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscWebSiteTheme();
        return $this->index($data);
    }
    public function webSiteThemeZA()
    {
        $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescWebSiteTheme();
        return $this->index($data);
    }
    public function dashboardThemeAZ()
    {
        $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscDashboardTheme();
        return $this->index($data);
    }
    public function dashboardThemeZA()
    {
        $data["data"] = UserSettingsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescDashboardTheme();
        return $this->index($data);
    }
}
