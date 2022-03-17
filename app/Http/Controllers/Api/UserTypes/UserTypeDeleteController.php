<?php

namespace App\Http\Controllers\Api\UserTypes;

use App\Http\Controllers\Api\Users\UserDeleteController;
use App\Http\Controllers\Api\Users\UsersListController;
use Illuminate\Http\Request;
use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;

class UserTypeDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return UserTypeDeleteController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "Kullanıcı Tipi No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !UserTypesModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz Kullanıcı Tipi No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserTypeDeleteController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];

        UserTypesModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $editedUsers = UsersListController::getAllWithTypeOnlyNotDeleted($no);
        if ($editedUsers) {
            foreach ($editedUsers as $editedUser) {
                $data["data"]["no"] = $editedUser["no"];
                UserDeleteController::get($data);
            }
        }

        $data["status"] = "success";
        return $data;
    }
}
