<?php

namespace App\Http\Controllers\Api\UserSettings;

use App\Models\UsersSettingsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Api\Users\UserDeleteController;
use App\Http\Controllers\Api\UserSettings\UserSettingsListController;

class UserSettingDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return UserSettingDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !UserSettingsListController::getFirstDataOnlyNotDeletedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserSettingDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        UsersSettingsModel::where(["is_deleted" => false, "no" => $no])->update([
            "is_deleted" => true
        ]);

        $user = UsersListController::getFirstDataOnlyNotDeletedDatasWhereSettings($no);
        if ($user) {
            $data["data"]["no"] = $user["no"];
            UserDeleteController::get($data);
        }

        $data["status"] = 200;
        return $data;
    }
}
