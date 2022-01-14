<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\CategoryTypesModel;
use Illuminate\Http\Request;

class CategoriesCreateController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Ekle";

        $data["categoryTypes"] = CategoryTypesModel::where("is_deleted", false)->get();

        $data["categories"] = CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->get()->toArray();

        return view("private.pages.category_create", ["data" => $data]);
    }

    public function form(Request $request)
    {
        if (!isset($request->categoryName)) {
            $data["errors"]["categoryName"] = "Bu Alan Zorunludur";
        }
        if (!isset($request->categoryType)) {
            $data["errors"]["categoryType"] = "Bu Alan Zorunludur";
        }
        if ($request->categoryType == 764496 && !isset($request->mainCategory)) {
            $data["errors"]["mainCategory"] = "Kategoriniz Alt Kategori Olduğu İçin Bu Alan Zorunludur";
        }

        $categoryName = htmlspecialchars($request->categoryName);
        $categoryType = htmlspecialchars($request->categoryType);
        $mainCategory = htmlspecialchars($request->mainCategory);

        if (CategoriesModel::where("name", $categoryName)->count()) {
            $data["errors"]["categoryName"] = "[$categoryName] Böyle Bir Kategori Zaten Var";
        }

        if (!empty($categoryType) && !CategoryTypesModel::where("no", $categoryType)->count()) {
            $data["errors"]["categoryType"] = "[$categoryType] Böyle Bir Kategori Tipi Yok";
        }

        if ($request->categoryType == 691862 && isset($mainCategory)) {
            if (!CategoriesModel::where("no", $mainCategory)->count()) {
                $data["errors"]["mainCategory"] = "[$mainCategory] Böyle Bir Kategori Yok";
            }
        }

        $turkishKeys = ['Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ",", "'", "(", ")", "[", "]", ";"];
        $englishKeys = ['c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', "", "", "", "", "", "", ""];
        $categoryUrl = str_replace($turkishKeys, $englishKeys, $categoryName);
        $categoryUrl = explode(" ", $categoryUrl);
        $categoryUrl = implode("-", $categoryUrl);
        $categoryUrl = strtolower($categoryUrl);

        if (isset($data["errors"])) {
            return $this->index($data);
        }

        if (empty($mainCategory)) {
            $mainCategory = NULL;
        }

        $categoryNo = NoGenerator::generateCategoriesNo();

        CategoriesModel::create([
            "no" => $categoryNo,
            "name" => $categoryName,
            "type" => $categoryType,
            "main_category" => $mainCategory,
            "link_url" => $categoryUrl
        ]);

        $createdCategory = CategoriesModel::where("no", $categoryNo)->with("type", "mainCategory")->get()->toArray();

        $data["createdDataName"] = "Kategori";

        $data["createdData"] = [
            [
                "column" => "No",
                "value" => $createdCategory[0]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $createdCategory[0]["name"]
            ],
            [
                "column" => "Tipi",
                "value" => $createdCategory[0]["type"]["name"]
            ],
            [
                "column" => "Ana Kategori",
                "value" => $createdCategory[0]["main_category"]["name"] ?? "-"
            ],
            [
                "column" => "Url Adresi",
                "value" => $createdCategory[0]["link_url"]
            ]
        ];

        return $this->index($data);
    }
}
