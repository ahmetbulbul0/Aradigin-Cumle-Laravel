<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\UserSettings\UserSettingDeleteController;
use App\Http\Controllers\Api\UserSettings\UserSettingsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSettingDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kullanıcı Ayarı Sil";
        $data["basic_text"] = "kullanıcı ayarını";
        $itemData = UserSettingsListController::getFirstDataWithNoOnlyNotDeletedAllRelationships($no);
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $itemData["no"],
            ],
            [
                "label" => "Kullanıcı",
                "span" => $itemData["user_no"]["username"] . " [" . $itemData["user_no"]["full_name"] . "]"
            ],
            [
                "label" => "WebSite Tema",
                "span" => $itemData["website_theme"],
            ],
            [
                "label" => "Pannel Tema",
                "span" => $itemData["dashboard_theme"],
            ]
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
    }

    public function form(Request $request)
    {

        if ($request->action == "reject") {
            return redirect(route("kullanici_ayarlari"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = UserSettingDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kullanici_ayarlari"));
        }

        return redirect(route("kullanici_ayarlari"));
    }
}
