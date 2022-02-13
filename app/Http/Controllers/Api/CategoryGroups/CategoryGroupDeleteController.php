<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroupsModel;

class CategoryGroupDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return CategoryGroupDeleteController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "kategori grubu No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz kategori grubu No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryGroupDeleteController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];

        CategoryGroupsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $data["status"] = "success";
        return $data;
    }
}
