<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlDeleteController;

class CategoryGroupDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return CategoryGroupDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryGroupDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->update([
            "is_deleted" => true
        ]);

        $linkUrl = CategoryGroupUrlsListController::getFirstDataOnlyNotDeletedDatasWhereGroupNo($no);
        if ($linkUrl) {
            $data["data"]["no"] = $linkUrl["no"];
            CategoryGroupUrlDeleteController::get($data);
        }

        $data["status"] = 200;

        return $data;
    }
}
