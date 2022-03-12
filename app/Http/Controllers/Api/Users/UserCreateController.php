<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\UsersModel;
use Illuminate\Support\Str;
use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CharChecker;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Api\UserSettings\UserSettingCreateController;
use App\Http\Controllers\Api\UserSettings\UserSettingsListController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;

class UserCreateController extends Controller
{
    static function get($data)
    {
        $fullName = $data["data"]["full_name"];
        $username = $data["data"]["username"];
        $password = $data["data"]["password"];
        $type = $data["data"]["type"];

        $fullName = Str::lower($fullName);
        $fullName = CharChecker::specialChars($fullName);
        $username = Str::lower($username);
        $username = CharChecker::allChars($username);

        $data["data"] = [
            "full_name" => $fullName,
            "username" => $username,
            "password" => $password,
            "type" => $type
        ];

        return UserCreateController::check($data);
    }
    static function check($data)
    {
        $fullName = $data["data"]["full_name"];
        $username = $data["data"]["username"];
        $password = $data["data"]["password"];
        $type = $data["data"]["type"];

        if (!isset($fullName) || empty($fullName)) {
            $data["errors"]["fullName"] = "Kullanıcı Tam Adı Alanı Zorunludur";
        }

        if (!isset($username) || empty($username)) {
            $data["errors"]["username"] = "Kullanıcı Adı Alanı Zorunludur";
        }

        if (!isset($password) || empty($password)) {
            $data["errors"]["password"] = "Parola Alanı Zorunludur";
        }

        if (!isset($type) || empty($type)) {
            $data["errors"]["type"] = "Kullanıcı Tipi Alanı Zorunludur";
        }

        if (isset($username) && !empty($username) && UsersListController::getFirstDataWithUsernameOnlyNotDeletedAllRelationships($username)) {
            $data["errors"]["username"] = "[$username] Bu Kullanıcı Adı Kullanılıyor, Lütfen Başka Bir Kullanıcı Ad Kullanınız";
        }

        if (isset($type) && !empty($type) && !UserTypesListController::getFirstDataWithNoOnlyNotDeleted($type)) {
            $data["errors"]["type"] = "Geçersiz Kullanıcı Tipi";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateUsersNo();
        $fullName = $data["data"]["full_name"];
        $username = $data["data"]["username"];
        $password = $data["data"]["password"];
        $type = $data["data"]["type"];

        UsersModel::create([
            "no" => $no,
            "full_name" => $fullName,
            "username" => $username,
            "password" => $password,
            "type" => $type,
            "settings" => 0
        ]);

        $dataForUserSettings["data"]["user_no"] = $no;

        $userSettings = UserSettingCreateController::get($dataForUserSettings);

        if (isset($userSettings["errors"])) {
            UsersModel::where("no", $no)->delete();
            return $userSettings;
        }

        UsersModel::where("no", $no)->update(["settings" => $userSettings["createdData"]["no"]]);
        
        $data["createdUserData"] = UsersListController::getFirstDataWithNoOnlyNotDeletedAllRelationships($no);
        $data["createdUserSettingsData"] = UserSettingsListController::getFirstDataWithNoOnlyNotDelete($userSettings["createdData"]["no"]);

        return $data;
    }
}
