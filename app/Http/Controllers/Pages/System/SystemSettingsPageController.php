<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Constants\ConstantsUpdateController;
use App\Http\Controllers\Controller;
use App\Models\ConstantsModel;
use App\Models\UsersModel;
use App\Models\UsersSettingsModel;
use Illuminate\Http\Request;

class SystemSettingsPageController extends Controller
{
    public function theme()
    {
        $data["page_title"] = "Ayarlar [Tema]";
        $data["user_settings"] = UsersSettingsModel::where(["is_deleted" => false, "user_no" => 247193])->first();
        return view("system.pages.settings_theme")->with("data", $data);
    }

    public function themeForm(Request $request)
    {
        $userNo = "247193";
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "user_no" => $userNo]);
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
        $data["constants"] = ConstantsModel::where("is_deleted", false)->get();
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
                "key" => "user_type_main",
                "value" => $request->userTypeMain,
            ],
            [
                "key" => "user_type_sub",
                "value" => $request->userTypeSub,
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
}
