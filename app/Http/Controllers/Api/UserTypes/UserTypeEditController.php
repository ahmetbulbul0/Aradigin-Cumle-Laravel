<?php

namespace App\Http\Controllers\Api\UserTypes;

use Illuminate\Http\Request;
use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;

class UserTypeEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $name = htmlspecialchars($data["data"]["name"]);

        $data["data"] = [
            "no" => $no,
            "name" => $name
        ];

        return UserTypeEditController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "Kullanıcı Tipi No Alanı Boş Olamaz";
        }

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Kullanıcı Tipi Adı Alanı Boş Olamaz";
        }

        if (isset($name) && !empty($name) && UserTypesModel::where("name", $name)->count()) {
            $data["errors"]["name"] = "[$name] Bu Kullanıcı Tipi Adı Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
        }

        if (isset($no) && !empty($no) && !UserTypesModel::where("no", $no)->count()) {
            $data["errors"]["no"] = "[$no] Bu No Değerine Ait Bir Kullanıcı Tipi Bulunamadı";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserTypeEditController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];

        UserTypesModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "name" => $name
        ]);

        $data["editedData"] = UserTypesModel::where("no", $no)->get();
        return $data;
    }
}
