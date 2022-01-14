<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\NoGenerator;
use App\Models\CategoryGroupsModel;
use App\Models\CategoryGroupUrlsModel;

class CategoryGroupsCreateController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Grubu Ekle";

        $data["categories"] = CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->get()->toArray();

        return view("private.pages.category_group_create", ["data" => $data]);
    }

    public function form(Request $request)
    {
        if (!isset($request->mainCategory)) {
            $data["errors"]["mainCategory"] = "Bu Alan Zorunludur";
        }

        $mainCategory = htmlspecialchars($request->mainCategory);
        $sub1Category = htmlspecialchars($request->sub1Category);
        $sub2Category = htmlspecialchars($request->sub2Category);
        $sub3Category = htmlspecialchars($request->sub3Category);
        $sub4Category = htmlspecialchars($request->sub4Category);
        $sub5Category = htmlspecialchars($request->sub5Category);

        if (!CategoriesModel::where("no", $mainCategory)->count()) {
            $data["errors"]["mainCategory"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub1Category) && !CategoriesModel::where("no", $sub1Category)->count()) {
            $data["errors"]["sub1Category"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub2Category) && !CategoriesModel::where("no", $sub2Category)->count()) {
            $data["errors"]["sub2Category"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub3Category) && !CategoriesModel::where("no", $sub3Category)->count()) {
            $data["errors"]["sub3Category"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub4Category) && !CategoriesModel::where("no", $sub4Category)->count()) {
            $data["errors"]["sub4Category"] = "Böyle Bir Kategori Yok";
        }

        if (!empty($sub5Category) && !CategoriesModel::where("no", $sub5Category)->count()) {
            $data["errors"]["sub5Category"] = "Böyle Bir Kategori Yok";
        }

        if (CategoryGroupsModel::where([
            "main" => $mainCategory,
            "sub1" => $sub1Category,
            "sub2" => $sub2Category,
            "sub3" => $sub3Category,
            "sub4" => $sub4Category,
            "sub5" => $sub5Category
        ])->count()) {
            $data["errors"]["categoryGroup"] = "Böyle Bir Kategori Grubu Zaten Var Yok";
        }

        if (isset($data["errors"])) {
            return $this->index($data);
        }

        $mainCategory = CategoriesModel::where([["is_deleted", false], ["no", $mainCategory]])->first();
        $sub1Category = CategoriesModel::where([["is_deleted", false], ["no", $sub1Category]])->first();
        $sub2Category = CategoriesModel::where([["is_deleted", false], ["no", $sub2Category]])->first();
        $sub3Category = CategoriesModel::where([["is_deleted", false], ["no", $sub3Category]])->first();
        $sub4Category = CategoriesModel::where([["is_deleted", false], ["no", $sub4Category]])->first();
        $sub5Category = CategoriesModel::where([["is_deleted", false], ["no", $sub5Category]])->first();

        $linkUrl = [
            "main" => $mainCategory["link_url"],
            "sub1" => $sub1Category["link_url"],
            "sub2" => $sub2Category["link_url"],
            "sub3" => $sub3Category["link_url"],
            "sub4" => $sub4Category["link_url"],
            "sub5" => $sub5Category["link_url"]
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

        if (empty($sub1Category)) {
            $sub1Category["no"] = NULL;
        }

        if (empty($sub2Category)) {
            $sub2Category["no"] = NULL;
        }

        if (empty($sub3Category)) {
            $sub3Category["no"] = NULL;
        }

        if (empty($sub4Category)) {
            $sub4Category["no"] = NULL;
        }

        if (empty($sub5Category)) {
            $sub5Category["no"] = NULL;
        }

        $categoryGroupNo = NoGenerator::generateCategoryGroupsNo();
        $categoryGroupUrlNo = NoGenerator::generateCategoryGroupUrlsNo();

        CategoryGroupUrlsModel::create([
            "no" => $categoryGroupUrlNo,
            "group_no" => $categoryGroupNo,
            "link_url" => $linkUrl
        ]);

        CategoryGroupsModel::create([
            "no" => $categoryGroupNo,
            "main" => $mainCategory["no"],
            "sub1" => $sub1Category["no"],
            "sub2" => $sub2Category["no"],
            "sub3" => $sub3Category["no"],
            "sub4" => $sub4Category["no"],
            "sub5" => $sub5Category["no"],
            "link_url" => $categoryGroupUrlNo
        ]);

        $createdCategoryGroup = CategoryGroupsModel::where("no", $categoryGroupNo)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray();

        $data["createdDataName"] = "Kategori Grubu";

        $data["createdData"] = [
            [
                "column" => "No",
                "value" => $createdCategoryGroup[0]["no"]
            ],
            [
                "column" => "Ana Kategori",
                "value" => $createdCategoryGroup[0]["main"]["name"]
            ],
            [
                "column" => "1.Alt Kategori",
                "value" => $createdCategoryGroup[0]["sub1"]["name"] ?? "-"
            ],
            [
                "column" => "2.Alt Kategori",
                "value" => $createdCategoryGroup[0]["sub2"]["name"] ?? "-"
            ],
            [
                "column" => "3.Alt Kategori",
                "value" => $createdCategoryGroup[0]["sub3"]["name"] ?? "-"
            ],
            [
                "column" => "4.Alt Kategori",
                "value" => $createdCategoryGroup[0]["sub4"]["name"] ?? "-"
            ],
            [
                "column" => "5.Alt Kategori",
                "value" => $createdCategoryGroup[0]["sub5"]["name"] ?? "-"
            ],
            [
                "column" => "Url Metni:",
                "value" => $createdCategoryGroup[0]["link_url"]["link_url"]
            ],
        ];

        return $this->index($data);
    }
}
