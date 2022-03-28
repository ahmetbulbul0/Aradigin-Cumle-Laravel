<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Api\News\NewsDeleteController;
use App\Http\Controllers\Api\News\NewsListController;
use App\Models\UsersModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Api\UserSettings\UserSettingsListController;
use App\Http\Controllers\Api\UserSettings\UserSettingDeleteController;

class UserDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return UserDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !UsersListController::getFirstDataOnlyNotDeletedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        UsersModel::where(["is_deleted" => false, "no" => $no])->update([
            "is_deleted" => true
        ]);

        $userSettings = UserSettingsListController::getFirstDataOnlyNotDeletedDatasWhereUserNo($no);
        if ($userSettings) {
            $data["data"]["no"] = $userSettings["no"];
            UserSettingDeleteController::get($data);
        }

        $news = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor($no);
        if ($news) {
            foreach ($news as $n1ws) {
                $data["data"]["no"] = $n1ws["no"];
                NewsDeleteController::get($data);
            }
        }

        $data["status"] = 200;

        return $data;
    }
}
