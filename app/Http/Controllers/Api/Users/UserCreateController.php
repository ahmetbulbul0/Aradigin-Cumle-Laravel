<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Models\UsersModel;
use App\Models\UserTypesModel;
use Illuminate\Support\Str;

class UserCreateController extends Controller
{
    static function get($data) {

        $fullName = htmlspecialchars($data["data"]["full_name"]);
        $username = htmlspecialchars($data["data"]["username"]);
        $password = htmlspecialchars($data["data"]["password"]);
        $type = htmlspecialchars($data["data"]["type"]);

        $fullName = Str::title($fullName);
        $username = Str::lower($username);

        $data["data"] = [
            "full_name" => $fullName,
            "username" => $username,
            "password" => $password,
            "type" => $type
        ];

        return UserCreateController::check($data);
    }

    static function check($data) {
        $fullName = $data["data"]["full_name"];
        $username = $data["data"]["username"];
        $password = $data["data"]["password"];
        $type = $data["data"]["type"];

        if (!isset($fullName) || empty($fullName)) {
            $data["errors"]["fullName"] = "Kullanıcının Tam Adı Alanı Zorunludur";
        }

        if (!isset($username) || empty($username)) {
            $data["errors"]["username"] = "Kullanıcı Adı Alanı Zorunludur";
        }

        if (!isset($password) || empty($password)) {
            $data["errors"]["password"] = "Parola Adı Alanı Zorunludur";
        }

        if (!isset($type) || empty($type)) {
            $data["errors"]["type"] = "Kullanıcı Tipi Adı Alanı Zorunludur";
        }

        if (isset($username) && !empty($username) && UsersModel::where("username", $username)->count()) {
            $data["errors"]["username"] = "[$username] Bu Kullanıcı Adı Kullanılıyor, Lütfen Başka Bir Kullanıcı Ad Kullanınız";
        }

        if (isset($type) && !empty($type) && !UserTypesModel::where("no", $type)->count()) {
            $data["errors"]["type"] = "[$type] Böyle Bir Kullanıcı Tipi Yok";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserCreateController::work($data);
    }

    static function work($data) {
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
        ]);

        $data["createdData"] = UsersModel::where("no", $no)->with("type")->get()->toArray();

        return $data;
    }
}
