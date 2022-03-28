<?php

namespace App\Http\Controllers\Api\CategoryGroupUrls;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupDeleteController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;

class CategoryGroupUrlDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return CategoryGroupUrlDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !CategoryGroupUrlsListController::getFirstDataOnlyNotDeletedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryGroupUrlDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $no])->update([
            "is_deleted" => true
        ]);

        $categoryGroup = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereLinkUrl($no);
        if ($categoryGroup) {
            $data["data"]["no"] = $categoryGroup["no"];
            CategoryGroupDeleteController::get($data);
        }

        $data["status"] = 200;

        return $data;
    }
}
