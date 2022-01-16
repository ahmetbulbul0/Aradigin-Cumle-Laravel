<?php

namespace App\Http\Controllers\Api\CategoryTypes;

use Illuminate\Http\Request;
use App\Models\CategoryTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;

class CategoryTypeCreateController extends Controller
{
    static function get($data) {
        $name = htmlspecialchars($data["data"]["name"]);

        $data["data"] = [
            "name" => $name
        ];

        return CategoryTypeCreateController::check($data);
    }

    static function check($data) {
        $name = $data["data"]["name"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Kategori Tipi Adı Alanı Zorunludur";
        }

        if (isset($name) && !empty($name) && CategoryTypesModel::where("name", $name)->count()) {
            $data["errors"]["name"] = "[$name] Bu Kategori Tipi Adı Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryTypeCreateController::work($data);
    }

    static function work($data) {
        $no = NoGenerator::generateCategoryTypesNo();
        $name = $data["data"]["name"];

        CategoryTypesModel::create([
            "no" => $no,
            "name" => $name
        ]);

        $data["createdData"] = CategoryTypesModel::where("no", $no)->get();
        return $data;
    }
}
