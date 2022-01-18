<?php

namespace App\Http\Controllers\Api\News;

use App\Models\NewsModel;
use App\Models\UsersModel;
use Illuminate\Support\Str;
use App\Models\ResourceUrlsModel;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;

class NewsCreateController extends Controller
{
    static function get($data) {

        $content = htmlspecialchars($data["data"]["content"]);
        $author = htmlspecialchars($data["data"]["author"]);
        $category = htmlspecialchars($data["data"]["category"]);
        $resourcePlatform = htmlspecialchars($data["data"]["resource_platform"]);
        $resourceUrl = htmlspecialchars($data["data"]["resource_url"]);
        $publishDate = htmlspecialchars($data["data"]["publish_date"]);
        $speDate = htmlspecialchars($data["data"]["spe_date"]);
        $speTime = htmlspecialchars($data["data"]["spe_time"]);

        $data["data"] = [
            "content" => $content,
            "author" => $author,
            "category" => $category,
            "resource_platform" => $resourcePlatform,
            "resource_url" => $resourceUrl,
            "publish_date" => $publishDate,
            "spe_date" => $speDate,
            "spe_time" => $speTime,
        ];

        return NewsCreateController::check($data);
    }

    static function check($data) {
        $content = $data["data"]["content"];
        $author = $data["data"]["author"];
        $category = $data["data"]["category"];
        $resourcePlatform = $data["data"]["resource_platform"];
        $resourceUrl = $data["data"]["resource_url"];
        $publishDate = $data["data"]["publish_date"];
        $speDate = $data["data"]["spe_date"];
        $speTime = $data["data"]["spe_time"];

        if (!isset($content) || empty($content)) {
            $data["errors"]["content"] = "İçerik Alanı Zorunludur";
        }

        if (!isset($author) || empty($author)) {
            $data["errors"]["author"] = "Yazar Alanı Zorunludur";
        }

        if (!isset($category) || empty($category)) {
            $data["errors"]["category"] = "Kategori Alanı Zorunludur";
        }

        if (!isset($resourcePlatform) || empty($resourcePlatform)) {
            $data["errors"]["resource_platform"] = "Kaynak Site Alanı Zorunludur";
        }

        if (!isset($resourceUrl) || empty($resourceUrl)) {
            $data["errors"]["resource_url"] = "Kaynak Url Alanı Zorunludur";
        }

        if (!isset($publishDate) || empty($publishDate)) {
            $data["errors"]["publish_date"] = "Yayın Tarihi Alanı Zorunludur";
        }

        if (isset($content) && !empty($content) && NewsModel::where("content", $content)->count()) {
            $data["errors"]["content"] = "[$content] Bu İçerik Daha Önceden Yazılmış";
        }

        if (isset($author) && !empty($author) && !UsersModel::where("no", $author)->count()) {
            $data["errors"]["author"] = "Böyle Bir Yazar Yok";
        }

        if (isset($category) && !empty($category) && !CategoryGroupsModel::where("no", $category)->count()) {
            $data["errors"]["category"] = "Böyle Bir Kategori Grubu Yok";
        }

        if (isset($resourcePlatform) && !empty($resourcePlatform) && !ResourcePlatformsModel::where("no", $resourcePlatform)->count()) {
            $data["errors"]["resource_platform"] = "[$resourcePlatform] Böyle Bir Kaynak Site Yok";
        }

        if ($publishDate == "specialDate") {
            if (!isset($speDate) || empty($speDate)) {
                $data["errors"]["spe_date"] = "Tarih Seç Alanında Tarih Alanı Zorunludur";
            }
            if (!isset($speTime) || empty($speTime)) {
                $data["errors"]["spe_time"] = "Tarih Seç Alanında Zaman Alanı Zorunludur";
            }
        }

        switch ($publishDate) {
            case 'now':
                $data["data"]["publish_date"] = time();
                break;
            case 'task':
                $data["data"]["publish_date"] = 0;
                break;
            case 'specialDate':
                $publishDate = $speDate . " " . $speTime;
                $data["data"]["publish_date"] = strtotime($publishDate);
                break;
            default:
                $data["errors"]["publish_date"] = "[$publishDate] Böyle Bir Yayın Durumu Yok";
                break;
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return NewsCreateController::work($data);
    }

    static function work($data) {
        $no = NoGenerator::generateNewsNo();
        $content = $data["data"]["content"];
        $author = $data["data"]["author"];
        $category = $data["data"]["category"];
        $resourcePlatform = $data["data"]["resource_platform"];
        $resourceUrl = $data["data"]["resource_url"];
        $publishDate = $data["data"]["publish_date"];
        $writeTime = time();
        $listing = 0;
        $reading = 0;
        $linkUrl= LinkUrlGenerator::single($content);

        $resourceUrlNo = NoGenerator::generateResourceUrlsNo();

        ResourceUrlsModel::create([
            "no" => $resourceUrlNo,
            "news_no" => $no,
            "resource_platform" => $resourcePlatform,
            "url" => $resourceUrl
        ]);


        NewsModel::create([
            "no" => $no,
            "content" => $content,
            "author" => $author,
            "category" => $category,
            "resource_platform" => $resourcePlatform,
            "resource_url" => $resourceUrlNo,
            "publish_date" => $publishDate,
            "write_time" => $writeTime,
            "listing" => $listing,
            "reading" => $reading,
            "link_url" => $linkUrl
        ]);

        $data["createdData"] = NewsModel::where("no", $no)->with("author", "category", "resourcePlatform", "resourceUrl")->first()->toArray();

        return $data;
    }
}
