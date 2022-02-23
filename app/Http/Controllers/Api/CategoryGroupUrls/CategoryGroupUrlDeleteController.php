<?php

namespace App\Http\Controllers\Api\CategoryGroupUrls;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;
use Illuminate\Http\Request;

class CategoryGroupUrlDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return CategoryGroupUrlDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "kategori grubu link metni No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz kategori grubu link metni No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryGroupUrlDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $data["status"] = "success";
        return $data;
    }
}
