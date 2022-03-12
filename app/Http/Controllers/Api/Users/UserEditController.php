<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\UsersModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Users\UsersListController;

class UserEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $fullName = htmlspecialchars($data["data"]["full_name"]);
        $username = htmlspecialchars($data["data"]["username"]);
        $password = htmlspecialchars($data["data"]["password"]);
        $type = htmlspecialchars($data["data"]["type"]);

        $fullName = Str::title($fullName);
        $username = Str::lower($username);

        $data["data"] = [
            "no" => $no,
            "full_name" => $fullName,
            "username" => $username,
            "password" => $password,
            "type" => $type
        ];

        return UserEditController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];
        $fullName = $data["data"]["full_name"];
        $username = $data["data"]["username"];
        $password = $data["data"]["password"];
        $type = $data["data"]["type"];

        if (!isset($fullName) || empty($fullName)) {
            $data["errors"]["fullName"] = "Kullanıcı Tam Adı Alanı Boş Olamaz";
        }

        if (!isset($username) || empty($username)) {
            $data["errors"]["username"] = "Kullanıcı Adı Alanı Boş Olamaz";
        }

        if (!isset($password) || empty($password)) {
            $data["errors"]["password"] = "Parola Adı Alanı Boş Olamaz";
        }

        if (!isset($type) || empty($type)) {
            $data["errors"]["type"] = "Kullanıcı Tipi Alanı Boş Olamaz";
        }

        if (isset($username) && !empty($username) && UsersModel::where([["no", "!=", $no], ["username", $username]])->count()) {
            $data["errors"]["username"] = "[$username] Bu Kullanıcı Adı Kullanılıyor, Lütfen Başka Bir Kullanıcı Ad Kullanınız";
        }

        if (isset($type) && !empty($type) && !UserTypesModel::where("no", $type)->count()) {
            $data["errors"]["type"] = "[$type] Böyle Bir Kullanıcı Tipi Yok";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserEditController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];
        $fullName = $data["data"]["full_name"];
        $username = $data["data"]["username"];
        $password = $data["data"]["password"];
        $type = $data["data"]["type"];

        UsersModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "no" => $no,
            "full_name" => $fullName,
            "username" => $username,
            "password" => $password,
            "type" => $type
        ]);

        $data["editedData"] = UsersListController::getFirstDataWithNoOnlyNotDeletedAllRelationships($no);
        return $data;
    }
}
