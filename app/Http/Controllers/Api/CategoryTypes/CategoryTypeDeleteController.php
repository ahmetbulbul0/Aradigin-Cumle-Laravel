<?php

namespace App\Http\Controllers\Api\CategoryTypes;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\Categories\CategoryDeleteController;
use App\Http\Controllers\Controller;
use App\Models\CategoryTypesModel;

class CategoryTypeDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return CategoryTypeDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !CategoryTypesModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryTypeDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        CategoryTypesModel::where(["is_deleted" => false, "no" => $no])->update([
            "is_deleted" => true
        ]);

        $categories = CategoriesListController::getAllDataOnlyNotDeletedDatasWhereType($no);
        if ($categories) {
            foreach ($categories as $category) {
                $data["data"]["no"] = $category["no"];
                CategoryDeleteController::get($data);
            }
        }

        $data["status"] = 200;

        return $data;
    }
}
