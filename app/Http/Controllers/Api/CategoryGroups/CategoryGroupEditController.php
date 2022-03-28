<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\LinkUrlGenerator;
use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlEditController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;

class CategoryGroupEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $main = htmlspecialchars($data["data"]["main"]);
        $sub1 = htmlspecialchars($data["data"]["sub1"]);
        $sub2 = htmlspecialchars($data["data"]["sub2"]);
        $sub3 = htmlspecialchars($data["data"]["sub3"]);
        $sub4 = htmlspecialchars($data["data"]["sub4"]);
        $sub5 = htmlspecialchars($data["data"]["sub5"]);

        $no = intval($no);
        $main = intval($main);
        $sub1 = intval($sub1);
        $sub2 = intval($sub2);
        $sub3 = intval($sub3);
        $sub4 = intval($sub4);
        $sub5 = intval($sub5);

        $data["data"] = [
            "no" => $no,
            "main" => $main,
            "sub1" => $sub1,
            "sub2" => $sub2,
            "sub3" => $sub3,
            "sub4" => $sub4,
            "sub5" => $sub5
        ];

        return CategoryGroupEditController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];
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

        if (CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereMainWhereSub1WhereSub2WhereSub3WhereSub4WhereSub5WhereNotNo($no, $main, $sub1, $sub2, $sub3, $sub4, $sub5)) {
            $data["errors"]["categoryGroup"] = "Böyle Bir Kategori Grubu Zaten Var";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryGroupEditController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];
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

        CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->update([
            "main" => $main["no"],
            "sub1" => $sub1["no"] ?? NULL,
            "sub2" => $sub2["no"] ?? NULL,
            "sub3" => $sub3["no"] ?? NULL,
            "sub4" => $sub4["no"] ?? NULL,
            "sub5" => $sub5["no"] ?? NULL,
        ]);

        $linkUrl = CategoryGroupEditController::linkUrlCreator($no);
        $groupUrl = CategoryGroupUrlsListController::getFirstDataOnlyNotDeletedDatasWhereGroupNo($no);
        $dataForGroupUrl["data"]["no"] = $groupUrl["no"];
        $dataForGroupUrl["data"]["link_url"] = $linkUrl;
        $groupUrlUpdate = CategoryGroupUrlEditController::get($dataForGroupUrl);

        $data["editedData"] = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);

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
