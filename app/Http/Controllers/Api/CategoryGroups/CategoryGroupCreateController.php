<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsCreateController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;
use App\Models\CategoriesModel;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Models\CategoryGroupUrlsModel;

class CategoryGroupCreateController extends Controller
{
    static function get($data)
    {
        $main = htmlspecialchars($data["data"]["main"]);
        $sub1 = htmlspecialchars($data["data"]["sub1"]);
        $sub2 = htmlspecialchars($data["data"]["sub2"]);
        $sub3 = htmlspecialchars($data["data"]["sub3"]);
        $sub4 = htmlspecialchars($data["data"]["sub4"]);
        $sub5 = htmlspecialchars($data["data"]["sub5"]);

        $main = intval($main);
        $sub1 = intval($sub1);
        $sub2 = intval($sub2);
        $sub3 = intval($sub3);
        $sub4 = intval($sub4);
        $sub5 = intval($sub5);

        $data["data"] = [
            "main" => $main,
            "sub1" => $sub1,
            "sub2" => $sub2,
            "sub3" => $sub3,
            "sub4" => $sub4,
            "sub5" => $sub5
        ];

        return CategoryGroupCreateController::check($data);
    }
    static function check($data)
    {
        $main = $data["data"]["main"];
        $sub1 = $data["data"]["sub1"];
        $sub2 = $data["data"]["sub2"];
        $sub3 = $data["data"]["sub3"];
        $sub4 = $data["data"]["sub4"];
        $sub5 = $data["data"]["sub5"];

        if (empty($sub1)) {
            $sub1 = NULL;
            $sub2 = NULL;
            $sub3 = NULL;
            $sub4 = NULL;
            $sub5 = NULL;
        }
        if (empty($sub2)) {
            $sub2 = NULL;
            $sub3 = NULL;
            $sub4 = NULL;
            $sub5 = NULL;
        }
        if (empty($sub3)) {
            $sub3 = NULL;
            $sub4 = NULL;
            $sub5 = NULL;
        }
        if (empty($sub4)) {
            $sub4 = NULL;
            $sub5 = NULL;
        }
        if (empty($sub5)) {
            $sub5 = NULL;
        }

        if (empty($main) || !isset($main)) {
            $data["errors"]["main"] = "Ana Kategori Alanı Zorunludur";
        }

        if (!empty($main) && isset($main) && !CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($main)) {
            $data["errors"]["main"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub1) && isset($sub1) && !CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub1)) {
            $data["errors"]["sub1"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub2) && isset($sub2) && !CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub2)) {
            $data["errors"]["sub2"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub3) && isset($sub3) && !CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub3)) {
            $data["errors"]["sub3"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub4) && isset($sub4) && !CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub4)) {
            $data["errors"]["sub4"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub5) && isset($sub5) && !CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub5)) {
            $data["errors"]["sub5"] = "Böyle Bir Kategori Yok";
        }

        if (CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereMainWhereSub1WhereSub2WhereSub3WhereSub4WhereSub5($main, $sub1, $sub2, $sub3, $sub4, $sub5)) {
            $data["errors"]["categoryGroup"] = "Böyle Bir Kategori Grubu Zaten Var";
        }

        if (isset($data["errors"])) {
            return $data;
        }
        return CategoryGroupCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateCategoryGroupsNo();
        $main = $data["data"]["main"];
        $sub1 = $data["data"]["sub1"];
        $sub2 = $data["data"]["sub2"];
        $sub3 = $data["data"]["sub3"];
        $sub4 = $data["data"]["sub4"];
        $sub5 = $data["data"]["sub5"];

        if (empty($sub1)) {
            $sub1 = NULL;
            $sub2 = NULL;
            $sub3 = NULL;
            $sub4 = NULL;
            $sub5 = NULL;
        }
        if (empty($sub2)) {
            $sub2 = NULL;
            $sub3 = NULL;
            $sub4 = NULL;
            $sub5 = NULL;
        }
        if (empty($sub3)) {
            $sub3 = NULL;
            $sub4 = NULL;
            $sub5 = NULL;
        }
        if (empty($sub4)) {
            $sub4 = NULL;
            $sub5 = NULL;
        }
        if (empty($sub5)) {
            $sub5 = NULL;
        }

        $main = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($main);
        $sub1 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub1);
        $sub2 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub2);
        $sub3 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub3);
        $sub4 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub4);
        $sub5 = CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($sub5);

        CategoryGroupsModel::create([
            "no" => $no,
            "main" => $main["no"],
            "sub1" => $sub1["no"] ?? NULL,
            "sub2" => $sub2["no"] ?? NULL,
            "sub3" => $sub3["no"] ?? NULL,
            "sub4" => $sub4["no"] ?? NULL,
            "sub5" => $sub5["no"] ?? NULL,
            "link_url" => 0
        ]);

        $dataForLinkUrl["data"]["group_no"] = $no;

        $linkUrlCreate = CategoryGroupUrlsCreateController::get($dataForLinkUrl);
        if (isset($linkUrlCreate["errors"])) {
            CategoryGroupsModel::where(["is_deleted" => false, "no", $no])->delete();
            return $linkUrlCreate;
        }

        CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->update(["link_url" => $linkUrlCreate["createdData"]["no"]]);
        
        $data["createdCategoryGroupData"] = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        $data["createdCategoryGroupLinkUrlData"] = CategoryGroupUrlsListController::getFirstDataOnlyNotDeletedDatasWhereNo($linkUrlCreate["createdData"]["no"]);

        return $data;
    }
}
