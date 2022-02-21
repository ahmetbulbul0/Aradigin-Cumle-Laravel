<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\UserSettings\UserSettingEditController;
use App\Http\Controllers\Api\UserSettings\UserSettingsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSettingEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kullanıcı Ayarı Düzenle";

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            return view("system.pages.user_setting_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = UserSettingsListController::getFirstDataWithNoOnlyNotDeletedAllRelationships($no);
        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }
        return view("system.pages.user_setting_edit")->with("data", $data);
    }

    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "website_theme" => $request->websiteTheme,
            "dashboard_theme" => $request->dashboardTheme,
        ];

        $edited = UserSettingEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kullanıcı Ayarı";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "Kullanıcı",
                "value" => $edited["editedData"]["user_no"]["username"] . " [" . $edited["editedData"]["user_no"]["full_name"] . "]"
            ],
            [
                "column" => "WebSite Tema",
                "value" => $edited["editedData"]["website_theme"] ?? "-"
            ],
            [
                "column" => "Panel Rema",
                "value" => $edited["editedData"]["dashboard_theme"] ?? "-"
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
