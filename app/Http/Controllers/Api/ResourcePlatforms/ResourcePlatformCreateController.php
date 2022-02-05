<?php

namespace App\Http\Controllers\Api\ResourcePlatforms;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;

class ResourcePlatformCreateController extends Controller
{
    static function get($data) {

        $name = htmlspecialchars($data["data"]["name"]);
        $mainUrl = htmlspecialchars($data["data"]["main_url"]);

        $name = Str::lower($name);
        $mainUrl = Str::lower($mainUrl);


        $data["data"] = [
            "name" => $name,
            "main_url" => $mainUrl
        ];

        return ResourcePlatformCreateController::check($data);
    }

    static function check($data) {
        $name = $data["data"]["name"];
        $mainUrl = $data["data"]["main_url"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Kaynak Platform Adı Alanı Zorunludur";
        }

        if (!isset($mainUrl) || empty($mainUrl)) {
            $data["errors"]["main_url"] = "Kaynak Platform Site Linki Alanı Zorunludur";
        }

        if (isset($name) && !empty($name) && ResourcePlatformsModel::where("name", $name)->count()) {
            $data["errors"]["name"] = "[$name] Bu Kaynak Platform Daha Önceden Tanımlanmış";
        }

        if (isset($mainUrl) && !empty($mainUrl) && ResourcePlatformsModel::where("main_url", $mainUrl)->count()) {
            $data["errors"]["main_url"] = "[$mainUrl] Bu Kaynak Platform Url'i Daha Önceden Tanımlanmış";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ResourcePlatformCreateController::work($data);
    }

    static function work($data) {
        $no = NoGenerator::generateResourcePlatformsNo();
        $name = $data["data"]["name"];
        $mainUrl = $data["data"]["main_url"];

        ResourcePlatformsModel::create([
            "no" => $no,
            "name" => $name,
            "main_url" => $mainUrl,
            "link_url" => LinkUrlGenerator::single($name)
        ]);

        $data["createdData"] = ResourcePlatformsModel::where("no", $no)->get();
        return $data;
    }
}
