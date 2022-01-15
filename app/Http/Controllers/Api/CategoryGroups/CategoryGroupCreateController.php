<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use App\Models\CategoriesModel;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;

class CategoryGroupCreateController extends Controller
{

    static function get($data) {

        $main = htmlspecialchars($data["main"]);
        $sub1 = htmlspecialchars($data["sub1"]);
        $sub2 = htmlspecialchars($data["sub2"]);
        $sub3 = htmlspecialchars($data["sub3"]);
        $sub4 = htmlspecialchars($data["sub4"]);
        $sub5 = htmlspecialchars($data["sub5"]);

        $data = [
            "main" => $main,
            "sub1" => $sub1,
            "sub2" => $sub2,
            "sub3" => $sub3,
            "sub4" => $sub4,
            "sub5" => $sub5
        ];

        return CategoryGroupCreateController::check($data);
    }

    static function check($data) {

        $main = $data["main"];
        $sub1 = $data["sub1"];
        $sub2 = $data["sub2"];
        $sub3 = $data["sub3"];
        $sub4 = $data["sub4"];
        $sub5 = $data["sub5"];

        if (!isset($main) || empty($main)) {
            $errors["main"] = "Ana Kategori Alanı Zorunludur";
        }

        if (!empty($main) && !CategoriesModel::where("no", $main)->count()) {
            $data["errors"]["main"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub1) && !CategoriesModel::where("no", $sub1)->count()) {
            $data["errors"]["sub1"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub2) && !CategoriesModel::where("no", $sub2)->count()) {
            $data["errors"]["sub2"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub3) && !CategoriesModel::where("no", $sub3)->count()) {
            $data["errors"]["sub3"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub4) && !CategoriesModel::where("no", $sub4)->count()) {
            $data["errors"]["sub4"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub5) && !CategoriesModel::where("no", $sub5)->count()) {
            $data["errors"]["sub5"] = "Böyle Bir Kategori Yok";
        }

        if (empty($data["sub1"])) {$data["sub1"] = NULL;}
        if (empty($data["sub2"])) {$data["sub2"] = NULL;}
        if (empty($data["sub3"])) {$data["sub3"] = NULL;}
        if (empty($data["sub4"])) {$data["sub4"] = NULL;}
        if (empty($data["sub5"])) {$data["sub5"] = NULL;}

        if (CategoryGroupsModel::where([
            "main" => $main,
            "sub1" => $sub1,
            "sub2" => $sub2,
            "sub3" => $sub3,
            "sub4" => $sub4,
            "sub5" => $sub5
        ])->count()) {
            $data["errors"]["categoryGroup"] = "Böyle Bir Kategori Grubu Zaten Var";
        }

        if (isset($errors)) {
            return $errors;
        }

        return CategoryGroupCreateController::work($data);
    }

    static function work($data) {
        $no = NoGenerator::generateCategoryGroupsNo();
        $main = $data["main"];
        $sub1 = $data["sub1"];
        $sub2 = $data["sub2"];
        $sub3 = $data["sub3"];
        $sub4 = $data["sub4"];
        $sub5 = $data["sub5"];

        $main = CategoriesModel::where([["is_deleted", false], ["no", $main]])->first();
        $sub1 = CategoriesModel::where([["is_deleted", false], ["no", $sub1]])->first();
        $sub2 = CategoriesModel::where([["is_deleted", false], ["no", $sub2]])->first();
        $sub3 = CategoriesModel::where([["is_deleted", false], ["no", $sub3]])->first();
        $sub4 = CategoriesModel::where([["is_deleted", false], ["no", $sub4]])->first();
        $sub5 = CategoriesModel::where([["is_deleted", false], ["no", $sub5]])->first();

        $linkUrl = [
            "main" => $main["link_url"],
            "sub1" => $sub1["link_url"],
            "sub2" => $sub2["link_url"],
            "sub3" => $sub3["link_url"],
            "sub4" => $sub4["link_url"],
            "sub5" => $sub5["link_url"]
        ];

        if (empty($linkUrl["sub1"])) {unset($linkUrl["sub1"]);}
        if (empty($linkUrl["sub2"])) {unset($linkUrl["sub2"]);}
        if (empty($linkUrl["sub3"])) {unset($linkUrl["sub3"]);}
        if (empty($linkUrl["sub4"])) {unset($linkUrl["sub4"]);}
        if (empty($linkUrl["sub5"])) {unset($linkUrl["sub5"]);}

        $linkUrl = implode("-", $linkUrl);

        $linkUrlNo = NoGenerator::generateCategoryGroupUrlsNo();

        CategoryGroupUrlsModel::create([
            "no" => $linkUrlNo,
            "group_no" => $no,
            "link_url" => $linkUrl
        ]);

        CategoryGroupsModel::create([
            "no" => $no,
            "main" => $main["no"],
            "sub1" => $sub1["no"],
            "sub2" => $sub2["no"],
            "sub3" => $sub3["no"],
            "sub4" => $sub4["no"],
            "sub5" => $sub5["no"],
            "link_url" => $linkUrlNo
        ]);

        return CategoryGroupsModel::where("no", $no)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5")->get();

    }

}
