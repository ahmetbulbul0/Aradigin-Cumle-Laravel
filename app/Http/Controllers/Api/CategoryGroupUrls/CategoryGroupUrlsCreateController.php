<?php

namespace App\Http\Controllers\Api\CategoryGroupUrls;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\LinkUrlGenerator;
use App\Http\Controllers\Tools\NoGenerator;
use App\Models\CategoryGroupUrlsModel;

class CategoryGroupUrlsCreateController extends Controller
{
    static function get($data)
    {
        $groupNo = htmlspecialchars($data["data"]["group_no"]);

        $data["data"] = [
            "group_no" => $groupNo
        ];

        return CategoryGroupUrlsCreateController::check($data);
    }
    static function check($data)
    {
        $groupNo = $data["data"]["group_no"];

        if (!isset($groupNo) || empty($groupNo)) {
            $data["errors"]["group_no"] = "Kategori Grubu No Alanı Zorunludur";
        }

        if (isset($groupNo) && !empty($groupNo) && !CategoryGroupsModel::where("no", $groupNo)->count()) {
            $data["errors"]["group_no"] = "[$groupNo] Bu Kategori Grubu No Değeri Geçersiz";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryGroupUrlsCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateCategoryGroupUrlsNo();
        $groupNo = $data["data"]["group_no"];
        $linkUrl = CategoryGroupUrlsCreateController::linkUrlCreator($groupNo);

        CategoryGroupUrlsModel::create([
            "no" => $no,
            "group_no" => $groupNo,
            "link_url" => $linkUrl
        ]);

        $data["createdData"] = CategoryGroupUrlsModel::where("no", $no)->first()->toArray();

        return $data;
    }
    static function linkUrlCreator($groupNo)
    {
        $groupData = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo($groupNo);

        $main = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($groupData["main"]);
        $sub1 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($groupData["sub1"]);
        $sub2 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($groupData["sub2"]);
        $sub3 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($groupData["sub3"]);
        $sub4 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($groupData["sub4"]);
        $sub5 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($groupData["sub5"]);

        $linkUrl["main"] = LinkUrlGenerator::single($main["name"]);

        if (isset($sub1)) {
            $linkUrl["sub1"] = LinkUrlGenerator::single($sub1["name"]);
        }

        if (isset($sub2)) {
            $linkUrl["sub2"] = LinkUrlGenerator::single($sub2["name"]);
        }

        if (isset($sub3)) {
            $linkUrl["sub3"] = LinkUrlGenerator::single($sub3["name"]);
        }

        if (isset($sub4)) {
            $linkUrl["sub4"] = LinkUrlGenerator::single($sub4["name"]);
        }

        if (isset($sub5)) {
            $linkUrl["sub5"] = LinkUrlGenerator::single($sub5["name"]);
        }

        $linkUrl = implode("-", $linkUrl);

        return $linkUrl;
    }
}
