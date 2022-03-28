<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\UsersModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CharChecker;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;

class UserEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $fullName = htmlspecialchars($data["data"]["full_name"]);
        $username = htmlspecialchars($data["data"]["username"]);
        $type = htmlspecialchars($data["data"]["type"]);

        $fullName = Str::lower($fullName);
        $fullName = CharChecker::specialChars($fullName);
        $username = Str::lower($username);
        $username = CharChecker::allChars($username);

        $data["data"] = [
            "no" => $no,
            "full_name" => $fullName,
            "username" => $username,
            "type" => $type
        ];

        return UserEditController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];
        $fullName = $data["data"]["full_name"];
        $username = $data["data"]["username"];
        $type = $data["data"]["type"];

        if (!isset($fullName) || empty($fullName)) {
            $data["errors"]["fullName"] = "Tam Adı Alanı Boş Olamaz";
        }

        if (!isset($username) || empty($username)) {
            $data["errors"]["username"] = "Kullanıcı Adı Alanı Boş Olamaz";
        }

        if (!isset($type) || empty($type)) {
            $data["errors"]["type"] = "Kullanıcı Tipi Alanı Boş Olamaz";
        }

        if (isset($username) && !empty($username) && UsersListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereUsernameWhereNotNo($no, $username)) {
            $data["errors"]["username"] = "[$username] Bu Kullanıcı Adı Kullanılıyor, Lütfen Başka Bir Kullanıcı Ad Kullanınız";
        }

        if (isset($type) && !empty($type) && !UserTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo($type)) {
            $data["errors"]["type"] = "Geçersiz Kullanıcı Tipi Değeri";
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
        $type = $data["data"]["type"];

        UsersModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "no" => $no,
            "full_name" => $fullName,
            "username" => $username,
            "type" => $type
        ]);

        $data["editedData"] = UsersListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        
        return $data;
    }
}
