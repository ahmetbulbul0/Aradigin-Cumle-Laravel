<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsCreateController;
use App\Models\CategoriesModel;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;

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

        if (empty($sub1)) {
            $sub1 = NULL;
        }
        if (empty($sub2)) {
            $sub2 = NULL;
        }
        if (empty($sub3)) {
            $sub3 = NULL;
        }
        if (empty($sub4)) {
            $sub4 = NULL;
        }
        if (empty($sub5)) {
            $sub5 = NULL;
        }

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

        $main = CategoriesModel::where([["is_deleted", false], ["no", $main]])->first();
        $sub1 = CategoriesModel::where([["is_deleted", false], ["no", $sub1]])->first();
        $sub2 = CategoriesModel::where([["is_deleted", false], ["no", $sub2]])->first();
        $sub3 = CategoriesModel::where([["is_deleted", false], ["no", $sub3]])->first();
        $sub4 = CategoriesModel::where([["is_deleted", false], ["no", $sub4]])->first();
        $sub5 = CategoriesModel::where([["is_deleted", false], ["no", $sub5]])->first();

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

        $linkUrl = CategoryGroupUrlsCreateController::get($dataForLinkUrl);

        CategoryGroupsModel::where("no", $no)->update(["link_url" => $linkUrl["createdData"]["no"]]);

        $data["createdData"] = CategoryGroupsModel::where("no", $no)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray();

        return $data;
    }
}
