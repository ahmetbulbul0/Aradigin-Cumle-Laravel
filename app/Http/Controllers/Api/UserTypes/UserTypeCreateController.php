<?php

namespace App\Http\Controllers\Api\UserTypes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Models\UserTypesModel;

class UserTypeCreateController extends Controller
{
    static function get($data) {

        $name = htmlspecialchars($data["data"]["name"]);

        $data["data"] = [
            "name" => $name
        ];

        return UserTypeCreateController::check($data);
    }

    static function check($data) {
        $name = $data["data"]["name"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Kullanıcı Tipi Adı Alanı Zorunludur";
        }

        if (isset($name) && !empty($name) && UserTypesModel::where("name", $name)->count()) {
            $data["errors"]["name"] = "[$name] Bu Kullanıcı Tipi Adı Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserTypeCreateController::work($data);
    }

    static function work($data) {
        $no = NoGenerator::generateUserTypesNo();
        $name = $data["data"]["name"];

        UserTypesModel::create([
            "no" => $no,
            "name" => $name
        ]);

        $data["createdData"] = UserTypesModel::where("no", $no)->get();
        return $data;
    }
}
