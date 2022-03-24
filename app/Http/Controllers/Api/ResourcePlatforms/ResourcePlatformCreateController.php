<?php

namespace App\Http\Controllers\Api\ResourcePlatforms;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;

class ResourcePlatformCreateController extends Controller
{
    static function get($data)
    {
        $name = htmlspecialchars($data["data"]["name"]);
        $mainUrl = htmlspecialchars($data["data"]["main_url"]);

        $mainUrl = Str::lower($mainUrl);

        $data["data"] = [
            "name" => $name,
            "main_url" => $mainUrl
        ];

        return ResourcePlatformCreateController::check($data);
    }
    static function check($data)
    {
        $name = $data["data"]["name"];
        $mainUrl = $data["data"]["main_url"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Kaynak Platform Adı Alanı Zorunludur";
        }

        if (!isset($mainUrl) || empty($mainUrl)) {
            $data["errors"]["mainUrl"] = "Kaynak Platform Site Linki Alanı Zorunludur";
        }

        if (isset($name) && !empty($name) && ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereName($name)) {
            $data["errors"]["name"] = "[$name] Bu Kaynak Platform İsmi Daha Önceden Kullanılmış";
        }

        if (isset($mainUrl) && !empty($mainUrl) && ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereMainUrl($mainUrl)) {
            $data["errors"]["mainUrl"] = "[$mainUrl] Bu Kaynak Platform Site Linki Daha Önceden Kullanılmış";
        }

        if (ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereName($name) && ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereMainUrl($mainUrl)) {
            unset($data["errors"]["name"]);
            unset($data["errors"]["mainUrl"]);
            $data["errors"]["resourcePlatform"] = "[$name - $mainUrl] Bu Kaynak Adı - Site Linki İkilisi Zaten Mevcut";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ResourcePlatformCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateResourcePlatformsNo();
        $name = $data["data"]["name"];
        $mainUrl = $data["data"]["main_url"];

        ResourcePlatformsModel::create([
            "no" => $no,
            "name" => $name,
            "main_url" => $mainUrl,
            "link_url" => LinkUrlGenerator::single($name)
        ]);

        $data["createdData"] = ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereNo($no);
        return $data;
    }
}
