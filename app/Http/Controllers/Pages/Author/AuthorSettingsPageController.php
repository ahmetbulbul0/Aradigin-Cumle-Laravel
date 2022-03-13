<?php

namespace App\Http\Controllers\Pages\Author;

use App\Http\Controllers\Api\Users\UsersListController;
use Illuminate\Http\Request;
use App\Models\UsersSettingsModel;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Session;

class AuthorSettingsPageController extends Controller
{
    public function myAccount()
    {
        $data["page_title"] = "Ayarlar [Profilim]";
        $data["user_data"] = UsersListController::getFirstDataWithNoOnlyNotDeletedAllRelationships(Session::get("userData.no"));
        return view("author.pages.settings_my_account")->with("data", $data);
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

        return redirect(route("yazar_paneli_ayarlar_profilim"));
    }
    public function theme()
    {
        $data["page_title"] = "Ayarlar [Tema]";
        $data["user_settings"] = UsersSettingsModel::where(["is_deleted" => false, "user_no" => Session::get("userData.no")])->first();
        return view("author.pages.settings_theme")->with("data", $data);
    }
    public function themeForm(Request $request)
    {
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "user_no" => Session::get("userData.no")]);
        if ($request->websiteTheme) {
            $userSettings->update(["website_theme" => $request->websiteTheme]);
        }

        if ($request->dashboardTheme) {
            $userSettings->update(["dashboard_theme" => $request->dashboardTheme]);
        }

        return redirect(route("yazar_paneli_ayarlar_tema"));
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
