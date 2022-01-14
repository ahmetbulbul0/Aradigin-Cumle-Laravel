<?php

namespace App\Http\Controllers;

use App\Models\CategoryTypesModel;
use Illuminate\Http\Request;

class CategoryTypesCreateController extends Controller
{
    public function index($data = NULL) {

        $data["page_title"] = "Kategori Tipi Ekle";

        return view("private.pages.category_type_create", ["data" => $data]);
    }

    public function form(Request $request)
    {
        if (!isset($request->categoryTypeName)) {
            $data["errors"]["categoryTypeName"] = "Bu Alan Zorunludur";
        }

        $categoryTypeName = htmlspecialchars($request->categoryTypeName);

        if (CategoryTypesModel::where("name", $categoryTypeName)->count()) {
            $data["errors"]["categoryTypeName"] = "[$categoryTypeName] Böyle Bir Kategori Tipi Zaten Var";
        }

        if (isset($data["errors"])) {
            return $this->index($data);
        }

        $categoryTypeNo = NoGenerator::generateCategoryTypesNo();

        CategoryTypesModel::create([
            "no" => $categoryTypeNo,
            "name" => $categoryTypeName
        ]);

        $createdCategoryType = CategoryTypesModel::where("no", $categoryTypeNo)->get();

        $data["createdDataName"] = "Kategori Tipi";

        $data["createdData"] = [
            [
                "column" => "No",
                "value" => $createdCategoryType[0]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $createdCategoryType[0]["name"]
            ]
        ];

        return $this->index($data);
    }
}
