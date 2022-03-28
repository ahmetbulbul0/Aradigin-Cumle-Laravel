<?php

namespace App\Http\Controllers\Api\UserTypes;

use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Api\Users\UserDeleteController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;

class UserTypeDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return UserTypeDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !UserTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
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

        $users = UsersListController::getAllDataOnlyNotDeletedDatasWhereType($no);
        if ($users) {
            foreach ($users as $user) {
                $data["data"]["no"] = $user["no"];
                UserDeleteController::get($data);
            }
        }

        $data["status"] = 200;


        return $data;
    }
}
