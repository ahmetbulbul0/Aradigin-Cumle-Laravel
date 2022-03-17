<?php

namespace App\Http\Controllers\Api\UserSettings;

use App\Http\Controllers\Api\Users\UserDeleteController;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Controller;
use App\Models\UsersSettingsModel;

class UserSettingDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return UserSettingDeleteController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "kullanıcı ayarı No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !UsersSettingsModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz kullanıcı ayarı No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserSettingDeleteController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];

        UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $userData = UsersListController::getFirstDataWithSettingsOnlyNotDeleted($no);
        if ($userData) {
            $dataForUserDelete["data"]["no"] = $userData["no"];
            UserDeleteController::get($dataForUserDelete);
        }

        $data["status"] = "success";
        return $data;
    }
}
