<?php

namespace App\Http\Controllers\Api\ResourceUrls;

use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformsListController;
use Illuminate\Http\Request;
use App\Models\ResourceUrlsModel;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use Illuminate\Support\Str;

class ResourceUrlEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $resourcePlatform = htmlspecialchars($data["data"]["resource_platform"]);
        $url = htmlspecialchars($data["data"]["url"]);

        $no = intval($no);
        $resourcePlatform = intval($resourcePlatform);
        $url = Str::lower($url);

        $data["data"] = [
            "no" => $no,
            "resource_platform" => $resourcePlatform,
            "url" => $url,
        ];

        return ResourceUrlEditController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];
        $resourcePlatform = $data["data"]["resource_platform"];
        $url = $data["data"]["url"];

        if (!isset($resourcePlatform) || empty($resourcePlatform)) {
            $data["errors"]["resource_platform"] = "Kaynak Link Platform Alanı Boş Olamaz";
        }

        if (!isset($url) || empty($url)) {
            $data["errors"]["url"] = "Kaynak Linki Url Alanı Boş Olamaz";
        }

        if (isset($resourcePlatform) && !empty($resourcePlatform) && !ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereNo($resourcePlatform)) {
            $data["errors"]["resource_platform"] = "Kaynak Platform Değeri Geçersiz";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ResourceUrlEditController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];
        $resourcePlatform = $data["data"]["resource_platform"];
        $url = $data["data"]["url"];

        ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "resource_platform" => $resourcePlatform,
            "url" => $url
        ]);

        $data["editedData"] = ResourceUrlsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        
        return $data;
    }
}
