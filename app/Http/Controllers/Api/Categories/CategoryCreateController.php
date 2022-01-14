<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;
use App\Models\CategoriesModel;
use App\Models\CategoryTypesModel;

class CategoryCreateController extends Controller
{

    public function get($data) {

        $name = htmlspecialchars($data["name"]);
        $type = htmlspecialchars($data["type"]);
        $mainCategory = htmlspecialchars($data["main_category"]);

        $data = [
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory,
        ];

        return $this->check($data);
    }

    public function check($data) {
        $name = $data["name"];
        $type = $data["type"];
        $mainCategory = $data["main_category"];

        if (!isset($name) || empty($name)) {
            $errors["name"] = "Kategori Adı Alanı Zorunludur";
        }

        if (!isset($type) || empty($type)) {
            $errors["type"] = "Kategori Tipi Alanı Zorunludur";
        }

        if (isset($type) && !empty($type) && !CategoryTypesModel::where("no", $type)->count()) {
            $errors["type"] = "[$type] Geçersiz Kategori Tipi";
        }

        if ($type == "SUB_CATEGORY_NO" && (!isset($mainCategory) || empty($mainCategory))) {
            $errors["main_category"] = "Alt Kategoriler İçin Ana Kategori Alanı Zorunludur";
        }

        if (isset($errors)) {
            return $errors;
        }

        if (empty($data["main_category"])) {
            $data["main_category"] = NULL;
        }

        return $this->work($data);

    }

    public function work($data) {
        $no = NoGenerator::generateCategoriesNo();
        $name = $data["name"];
        $type = $data["type"];
        $mainCategory = $data["main_category"];
        $linkUrl = LinkUrlGenerator::single($name);

        CategoriesModel::create([
            "no" => $no,
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory,
            "link_url" => $linkUrl
        ]);

        return CategoriesModel::where("no", $no)->with("type", "mainCategory")->get();

    }

}
