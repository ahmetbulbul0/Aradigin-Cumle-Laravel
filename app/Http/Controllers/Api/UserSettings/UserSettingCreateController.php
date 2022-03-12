<?php

namespace App\Http\Controllers\Api\UserSettings;

use App\Http\Controllers\Api\Users\UsersListController;
use App\Models\UsersSettingsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;

class UserSettingCreateController extends Controller
{
    static function get($data)
    {
        $userNo = htmlspecialchars($data["data"]["user_no"]);

        $data["data"] = [
            "user_no" => $userNo
        ];

        return UserSettingCreateController::check($data);
    }
    static function check($data)
    {
        $userNo = $data["data"]["user_no"];

        if (!isset($userNo) || empty($userNo)) {
            $data["errors"]["user_no"] = "Kullanıcı No Alanı Zorunludur";
        }

        if (isset($userNo) && !empty($userNo) && !UsersListController::getFirstDataWithNoOnlyNotDeleted($userNo)) {
            $data["errors"]["user_no"] = "Geçersiz Kullanıcı";
        }

        if (isset($userNo) && !empty($userNo) && UserSettingsListController::getFirstDataWithUserNoOnlyNotDeletedAllRelationships($userNo)) {
            $data["errors"]["user_no"] = "Bu Kullanıcının Zaten Bir Kullanıcı Ayar Kaydı Var";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserSettingCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateUsersSettingsNo();
        $userNo = $data["data"]["user_no"];
        $websiteTheme = "dark";
        $dashboardTheme = "dark";

        UsersSettingsModel::create([
            "no" => $no,
            "user_no" => $userNo,
            "website_theme" => $websiteTheme,
            "dashboard_theme" => $dashboardTheme
        ]);

        $data["createdData"] = UserSettingsListController::getFirstDataWithNoOnlyNotDeletedAllRelationships($no);

        return $data;
    }
}
