<?php

namespace App\Http\Controllers\Pages\System;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Models\UsersSettingsModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;
use App\Http\Controllers\Api\Constants\ConstantsUpdateController;
use App\Http\Controllers\Api\UserSettings\UserSettingsListController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;

class SystemSettingsPageController extends Controller
{
    public function myAccount()
    {
        $data["page_title"] = "Ayarlar [Profilim]";
        $data["user_data"] = UsersListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(Session::get("userData.no"));
        return view("system.pages.settings_my_account")->with("data", $data);
    }
    public function myAccountForm(Request $request)
    {
        $userData = UsersModel::where(["is_deleted" => false, "no" => Session::get("userData.no")]);
        if ($request->username) {
            $userData->update(["username" => $request->username]);
        }

        if ($request->fullName) {
            $userData->update(["full_name" => $request->fullName]);
        }

        return redirect(route("sistem_paneli_ayarlar_profilim"));
    }
    public function theme()
    {
        $data["page_title"] = "Ayarlar [Tema]";
        $data["user_settings"] = UserSettingsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(Session::get("userData.settings.no"));
        return view("system.pages.settings_theme")->with("data", $data);
    }
    public function themeForm(Request $request)
    {
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => Session::get("userData.settings.no")]);

        if ($request->websiteTheme) {
            $userSettings->update(["website_theme" => $request->websiteTheme]);
        }

        if ($request->dashboardTheme) {
            $userSettings->update(["dashboard_theme" => $request->dashboardTheme]);
        }

        return redirect(route("sistem_paneli_ayarlar_tema"));
    }
    public function constants()
    {
        $data["page_title"] = "Ayarlar [Sabitler]";
        $data["constants"] = ConstantsListController::getAllDataOnlyNotDeletedDatas();
        $data["categoryTypes"] = CategoryTypesListController::getAllDataOnlyNotDeletedDatas();
        $data["userTypes"] = UserTypesListController::getAllDataOnlyNotDeletedDatas();
        $data["categoryGroups"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationships();
        return view("system.pages.settings_constants")->with("data", $data);
    }
    public function constantsForm(Request $request)
    {
        $data["data"] = [
            [
                "key" => "category_type_main",
                "value" => $request->categoryTypeMain,
            ],
            [
                "key" => "category_type_sub",
                "value" => $request->categoryTypeSub,
            ],
            [
                "key" => "user_type_author",
                "value" => $request->userTypeAuthor,
            ],
            [
                "key" => "user_type_system",
                "value" => $request->userTypeSystem,
            ],
            [
                "key" => "website_visitor_menu_category1",
                "value" => $request->webSiteVisitorMenuCategory1,
            ],
            [
                "key" => "website_visitor_menu_category2",
                "value" => $request->webSiteVisitorMenuCategory2,
            ],
            [
                "key" => "website_visitor_menu_category3",
                "value" => $request->webSiteVisitorMenuCategory3,
            ],
            [
                "key" => "website_visitor_menu_category4",
                "value" => $request->webSiteVisitorMenuCategory4,
            ],
            [
                "key" => "website_visitor_menu_category5",
                "value" => $request->webSiteVisitorMenuCategory5,
            ],
            [
                "key" => "website_visitor_menu_category6",
                "value" => $request->webSiteVisitorMenuCategory6,
            ],
            [
                "key" => "website_visitor_menu_category7",
                "value" => $request->webSiteVisitorMenuCategory7,
            ],
            [
                "key" => "website_visitor_menu_category8",
                "value" => $request->webSiteVisitorMenuCategory8
            ]
        ];

        $updated = ConstantsUpdateController::get($data);

        return redirect(route("ayarlar_sabitler"));
    }
    public function dashboardThemeChange(Request $request)
    {
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "user_no" => Session::get("userData.no")]);

        if ($request->dashboardTheme) {
            $userSettings->update(["dashboard_theme" => $request->dashboardTheme]);
        }

        return redirect(Session::previousUrl());
    }
    public function websiteThemeChange(Request $request)
    {
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "user_no" => Session::get("userData.no")]);

        if ($request->websiteTheme) {
            $userSettings->update(["website_theme" => $request->websiteTheme]);
        }

        return redirect(Session::previousUrl());
    }
}
