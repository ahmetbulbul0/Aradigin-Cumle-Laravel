<?php

namespace App\Http\Controllers\Pages\Author;

use Illuminate\Http\Request;
use App\Models\UsersSettingsModel;
use App\Http\Controllers\Controller;

class AuthorSettingsPageController extends Controller
{
    public function myAccount() {
        $data["page_title"] = "Ayarlar [Profilim]";
        return view("author.pages.settings_my_account")->with("data", $data);
    }

    public function theme()
    {
        $data["page_title"] = "Ayarlar [Tema]";
        $data["user_settings"] = UsersSettingsModel::where(["is_deleted" => false, "user_no" => 247193])->first(); /* user_no değerini sessiondan çekecek */
        return view("author.pages.settings_theme")->with("data", $data);
    }

    public function themeForm(Request $request)
    {
        $userNo = "247193"; /* userNo değerini sessiondan çekecek */
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "user_no" => $userNo]); /* user_no değerini sessiondan çekecek */
        if ($request->websiteTheme) {
            $userSettings->update(["website_theme" => $request->websiteTheme]);
        }

        if ($request->dashboardTheme) {
            $userSettings->update(["dashboard_theme" => $request->dashboardTheme]);
        }

        return redirect(route("yazar_paneli_ayarlar_tema"));
    }
}
