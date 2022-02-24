<?php

namespace App\Http\Controllers\Api\UserSettings;

use App\Models\UsersModel;
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

        if (isset($userNo) && !empty($userNo) && !UsersModel::where("no", $userNo)->count()) {
            $data["errors"]["user_no"] = "[$userNo] Geçersiz Kullanıcı No Değeri";
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

        UsersSettingsModel::create([
            "no" => $no,
            "user_no" => $userNo
        ]);

        $data["createdData"] = UsersSettingsModel::where("no", $no)->first();

        return $data;
    }
}
