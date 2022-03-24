<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;

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
        
        if (!isset($main) || empty($main)) {
            $errors["main"] = "Ana Kategori Boş Olamaz";
        }

        if (isset($main) && $main != "null" && !empty($main) && !CategoriesModel::where("no", $main)->count()) {
            $data["errors"]["main"] = "Böyle Bir Kategori Yok";
        }

        if (isset($sub1) && $sub1 != "null" && !empty($main) && !CategoriesModel::where("no", $sub1)->count()) {
            $data["errors"]["sub1"] = "Böyle Bir Kategori Yok";
        }

        if (isset($sub2) && $sub2 != "null" && !empty($main) && !CategoriesModel::where("no", $sub2)->count()) {
            $data["errors"]["sub2"] = "Böyle Bir Kategori Yok";
        }

        if (isset($sub3) && $sub3 != "null" && !empty($main) && !CategoriesModel::where("no", $sub3)->count()) {
            $data["errors"]["sub3"] = "Böyle Bir Kategori Yok";
        }

        if (isset($sub4) && $sub4 != "null" && !empty($main) && !CategoriesModel::where("no", $sub4)->count()) {
            $data["errors"]["sub4"] = "Böyle Bir Kategori Yok";
        }

        if (isset($sub5) && $sub5 != "null" && !empty($main) && !CategoriesModel::where("no", $sub5)->count()) {
            $data["errors"]["sub5"] = "Böyle Bir Kategori Yok";
        }

        if (empty($sub1) || $sub1 == "null") {$sub1 = NULL;}
        if (empty($sub2) || $sub2 == "null") {$sub2 = NULL;}
        if (empty($sub3) || $sub3 == "null") {$sub3 = NULL;}
        if (empty($sub4) || $sub4 == "null") {$sub4 = NULL;}
        if (empty($sub5) || $sub5 == "null") {$sub5 = NULL;}

        if (CategoryGroupsModel::where([["no", "!=", $no]])->where([
            "main" => $main,
            "sub1" => $sub1,
            "sub2" => $sub2,
            "sub3" => $sub3,
            "sub4" => $sub4,
            "sub5" => $sub5
        ])->count()) {
            $data["errors"]["categoryGroup"] = "Böyle Bir Kategori Grubu Zaten Var";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        if (empty($data["data"]["sub1"]) || $data["data"]["sub1"] == "null") {$data["data"]["sub1"] = NULL;}
        if (empty($data["data"]["sub2"]) || $data["data"]["sub2"] == "null") {$data["data"]["sub2"] = NULL;}
        if (empty($data["data"]["sub3"]) || $data["data"]["sub3"] == "null") {$data["data"]["sub3"] = NULL;}
        if (empty($data["data"]["sub4"]) || $data["data"]["sub4"] == "null") {$data["data"]["sub4"] = NULL;}
        if (empty($data["data"]["sub5"]) || $data["data"]["sub5"] == "null") {$data["data"]["sub5"] = NULL;}

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

        CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->update([
            "main" => $main,
            "sub1" => $sub1,
            "sub2" => $sub2,
            "sub3" => $sub3,
            "sub4" => $sub4,
            "sub5" => $sub5
        ]);

        $data["editedData"] = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        return $data;
    }   
}
