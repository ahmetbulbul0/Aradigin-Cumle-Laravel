<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Api\UserSettings\UserSettingDeleteController;
use App\Http\Controllers\Api\UserSettings\UserSettingsListController;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;

class UserDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return UserDeleteController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "kullanıcı No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !UsersModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz kullanıcı No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserDeleteController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];

        UsersModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $userSettings = UserSettingsListController::getFirstDataWithUserNoOnlyNotDeleted($no);
        if ($userSettings) {
            $dataForUserSettingDelete["data"]["no"] = $userSettings["no"];
            UserSettingDeleteController::get($dataForUserSettingDelete);
        }

        $data["status"] = "success";
        return $data;
    }
}
