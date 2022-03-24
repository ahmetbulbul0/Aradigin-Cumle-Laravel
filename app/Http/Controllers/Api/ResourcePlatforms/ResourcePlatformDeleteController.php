<?php

namespace App\Http\Controllers\Api\ResourcePlatforms;

use App\Http\Controllers\Api\ResourceUrls\ResourceUrlDeleteController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsListController;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;

class ResourcePlatformDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return ResourcePlatformDeleteController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "kaynak site No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !ResourcePlatformsModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz kaynak site No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ResourcePlatformDeleteController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];

        ResourcePlatformsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $resourceUrls = ResourceUrlsListController::getFirstDataOnlyNotDeletedDatasWhereResourcePlatform($no);
        if ($resourceUrls) {
            foreach ($resourceUrls as $resourceUrl) {
                $data["data"]["no"] = $resourceUrl["no"];
                ResourceUrlDeleteController::get($data);
            }
        }

        $data["status"] = "success";
        return $data;
    }
}
