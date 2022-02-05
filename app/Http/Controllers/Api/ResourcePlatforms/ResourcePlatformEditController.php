<?php

namespace App\Http\Controllers\Api\ResourcePlatforms;

use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;

class ResourcePlatformEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $name = htmlspecialchars($data["data"]["name"]);
        $mainUrl = htmlspecialchars($data["data"]["main_url"]);
        $linkUrl = htmlspecialchars($data["data"]["link_url"]);

        $data["data"] = [
            "no" => $no,
            "name" => $name,
            "main_url" => $mainUrl,
            "link_url" => $linkUrl,
        ];

        return ResourcePlatformEditController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];
        $mainUrl = $data["data"]["main_url"];
        $linkUrl = $data["data"]["link_url"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Site Adı Alanı Boş Olamaz";
        }

        if (!isset($mainUrl) || empty($mainUrl)) {
            $data["errors"]["mainUrl"] = "Site Linki Alanı Boş Olamaz";
        }

        if (!isset($linkUrl) || empty($linkUrl)) {
            $data["errors"]["linkUrl"] = "Url Metni Alanı Boş Olamaz";
        }

        if (isset($name) && !empty($name) && ResourcePlatformsModel::where([["no", "!=", $no], ["name", $name]])->count()) {
            $data["errors"]["name"] = "[$name] Bu Kaynak Site Adı Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
        }

        if (isset($mainUrl) && !empty($mainUrl) && ResourcePlatformsModel::where([["no", "!=", $no], ["main_url", $mainUrl]])->count()) {
            $data["errors"]["mainUrl"] = "[$mainUrl] Bu Kaynak Site Lini Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
        }

        if (isset($linkUrl) && !empty($linkUrl) && ResourcePlatformsModel::where([["no", "!=", $no], ["link_url", $linkUrl]])->count()) {
            $data["errors"]["linkUrl"] = "[$linkUrl] Bu Kaynak Site Url Metni Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
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
        $linkUrl = $data["data"]["link_url"];

        ResourcePlatformsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "name" => $name,
            "main_url" => $mainUrl,
            "link_url" => $linkUrl
        ]);

        $data["editedData"] = ResourcePlatformsListController::getFirstDataWithNoOnlyNotDeleted($no);
        return $data;
    }
}
