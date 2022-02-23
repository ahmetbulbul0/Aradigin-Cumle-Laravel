<?php

namespace App\Http\Controllers\Api\CategoryGroupUrls;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use Illuminate\Http\Request;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
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

        $data["createdData"] = CategoryGroupUrlsModel::where("no", $no)->with("groupNo")->first()->toArray();

        return $data;
    }
    static function linkUrlCreator($groupNo)
    {
        $groupData = CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted($groupNo);

        $main = CategoriesListController::getFirstDataWithNoOnlyNotDeleted($groupData["main"]);
        $sub1 = CategoriesListController::getFirstDataWithNoOnlyNotDeleted($groupData["sub1"]);
        $sub2 = CategoriesListController::getFirstDataWithNoOnlyNotDeleted($groupData["sub2"]);
        $sub3 = CategoriesListController::getFirstDataWithNoOnlyNotDeleted($groupData["sub3"]);
        $sub4 = CategoriesListController::getFirstDataWithNoOnlyNotDeleted($groupData["sub4"]);
        $sub5 = CategoriesListController::getFirstDataWithNoOnlyNotDeleted($groupData["sub5"]);

        if (empty($sub1)) {
            unset($sub1);
        }
        if (empty($sub2)) {
            unset($sub2);
        }
        if (empty($sub3)) {
            unset($sub3);
        }
        if (empty($sub4)) {
            unset($sub4);
        }
        if (empty($sub5)) {
            unset($sub5);
        }

        $linkUrl = [
            "main" => $main["link_url"],
            "sub1" => $sub1["link_url"] ?? NULL,
            "sub2" => $sub2["link_url"] ?? NULL,
            "sub3" => $sub3["link_url"] ?? NULL,
            "sub4" => $sub4["link_url"] ?? NULL,
            "sub5" => $sub5["link_url"] ?? NULL
        ];

        if (empty($linkUrl["sub1"])) {
            unset($linkUrl["sub1"]);
        }
        if (empty($linkUrl["sub2"])) {
            unset($linkUrl["sub2"]);
        }
        if (empty($linkUrl["sub3"])) {
            unset($linkUrl["sub3"]);
        }
        if (empty($linkUrl["sub4"])) {
            unset($linkUrl["sub4"]);
        }
        if (empty($linkUrl["sub5"])) {
            unset($linkUrl["sub5"]);
        }

        $linkUrl = implode("-", $linkUrl);

        return $linkUrl;
    }
}
