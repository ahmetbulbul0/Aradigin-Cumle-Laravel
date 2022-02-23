<?php

namespace App\Http\Controllers\Api\ResourceUrls;

use App\Http\Controllers\Controller;
use App\Models\ResourceUrlsModel;
use Illuminate\Http\Request;

class ResourceUrlDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return ResourceUrlDeleteController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "kaynak linki No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !ResourceUrlsModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz kaynak linki No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ResourceUrlDeleteController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];

        ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $data["status"] = "success";
        return $data;
    }
}
