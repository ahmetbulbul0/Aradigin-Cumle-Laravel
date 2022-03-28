<?php

namespace App\Http\Controllers\Api\ResourceUrls;

use App\Models\NewsModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResourceUrlsModel;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\NoGenerator;

class ResourceUrlsCreateController extends Controller
{
    static function get($data)
    {
        $newsNo = htmlspecialchars($data["data"]["news_no"]);
        $resourcePlatform = htmlspecialchars($data["data"]["resource_platform"]);
        $url = htmlspecialchars($data["data"]["url"]);

        $newsNo = intval($newsNo);
        $resourcePlatform = intval($resourcePlatform);
        $url = Str::lower($url);

        $data["data"] = [
            "news_no" => $newsNo,
            "resource_platform" => $resourcePlatform,
            "url" => $url,
        ];

        return ResourceUrlsCreateController::check($data);
    }
    static function check($data)
    {
        $newsNo = $data["data"]["news_no"];
        $resourcePlatform = $data["data"]["resource_platform"];
        $url = $data["data"]["url"];

        if (!isset($newsNo) || empty($newsNo)) {
            $data["errors"]["news_no"] = "Haber No Alanı Zorunludur";
        }

        if (!isset($resourcePlatform) || empty($resourcePlatform)) {
            $data["errors"]["resource_platform"] = "Kaynak Platform Alanı Zorunludur";
        }

        if (!isset($url) || empty($url)) {
            $data["errors"]["url"] = "Url Alanı Zorunludur";
        }

        if (isset($newsNo) && !empty($newsNo) && !NewsModel::where("no", $newsNo)->count()) {
            $data["errors"]["news_no"] = "[$newsNo] Geçersiz Haber No Değeri";
        }

        if (isset($resourcePlatform) && !empty($resourcePlatform) && !ResourcePlatformsModel::where("no", $resourcePlatform)->count()) {
            $data["errors"]["resource_platform"] = "[$resourcePlatform] Geçersiz Kaynak Platform No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ResourceUrlsCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateResourceUrlsNo();
        $newsNo = $data["data"]["news_no"];
        $resourcePlatform = $data["data"]["resource_platform"];
        $url = $data["data"]["url"];

        ResourceUrlsModel::create([
            "no" => $no,
            "news_no" => $newsNo,
            "resource_platform" => $resourcePlatform,
            "url" => $url
        ]);

        $data["createdData"] = ResourceUrlsModel::where("no", $no)->with("newsNo", "resourcePlatform")->first();

        return $data;
    }
}
