<?php

namespace App\Http\Controllers\Api\ResourcePlatforms;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;

class ResourcePlatformEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $name = htmlspecialchars($data["data"]["name"]);
        $mainUrl = htmlspecialchars($data["data"]["main_url"]);

        $no = intval($no);
        $mainUrl = Str::lower($mainUrl);

        $data["data"] = [
            "no" => $no,
            "name" => $name,
            "main_url" => $mainUrl
        ];

        return ResourcePlatformEditController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];
        $mainUrl = $data["data"]["main_url"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Site Adı Alanı Boş Olamaz";
        }

        if (!isset($mainUrl) || empty($mainUrl)) {
            $data["errors"]["mainUrl"] = "Site Linki Alanı Boş Olamaz";
        }

        if (isset($name) && !empty($name) && ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereNameWhereNotNo($no, $name)) {
            $data["errors"]["name"] = "[$name] Bu Kaynak Site Adı Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
        }

        if (isset($mainUrl) && !empty($mainUrl) && ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereMainUrlWhereNotNo($no, $name)) {
            $data["errors"]["mainUrl"] = "[$mainUrl] Bu Kaynak Site Lini Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ResourcePlatformEditController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];
        $mainUrl = $data["data"]["main_url"];

        ResourcePlatformsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "name" => $name,
            "main_url" => $mainUrl
        ]);

        $data["editedData"] = ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereNo($no);
        
        return $data;
    }
}
