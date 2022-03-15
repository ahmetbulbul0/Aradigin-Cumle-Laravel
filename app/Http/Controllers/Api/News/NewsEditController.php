<?php

namespace App\Http\Controllers\Api\News;

use App\Models\NewsModel;
use App\Models\UsersModel;
use App\Models\ResourceUrlsModel;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;

class NewsEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $content = htmlspecialchars($data["data"]["content"]);
        $category = htmlspecialchars($data["data"]["category"]);
        $publishDate = htmlspecialchars($data["data"]["publish_date"]);
        $speDate = htmlspecialchars($data["data"]["spe_date"]);
        $speTime = htmlspecialchars($data["data"]["spe_time"]);
        $resourcePlatform = htmlspecialchars($data["data"]["resource_platform"]);
        $resourceUrl = htmlspecialchars($data["data"]["resource_url"]);

        $data["data"] = [
            "no" => $no,
            "content" => $content,
            "category" => $category,
            "publish_date" => $publishDate,
            "spe_date" => $speDate,
            "spe_time" => $speTime,
            "resource_platform" => $resourcePlatform,
            "resource_url" => $resourceUrl
        ];

        return NewsEditController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];
        $content = $data["data"]["content"];
        $category = $data["data"]["category"];
        $resourcePlatform = $data["data"]["resource_platform"];
        $resourceUrl = $data["data"]["resource_url"];
        $publishDate = $data["data"]["publish_date"];
        $speDate = $data["data"]["spe_date"];
        $speTime = $data["data"]["spe_time"];

        if (!isset($content) || empty($content)) {
            $data["errors"]["content"] = "İçerik Alanı Boş Olamaz";
        }

        if (!isset($category) || empty($category)) {
            $data["errors"]["category"] = "Kategori Alanı Boş Olamaz";
        }

        if (!isset($resourcePlatform) || empty($resourcePlatform)) {
            $data["errors"]["resource_platform"] = "Kaynak Site Alanı Boş Olamaz";
        }

        if (!isset($resourceUrl) || empty($resourceUrl)) {
            $data["errors"]["resource_url"] = "Kaynak Url Alanı Boş Olamaz";
        }

        if (!isset($publishDate) || empty($publishDate)) {
            $data["errors"]["publish_date"] = "Yayın Tarihi Alanı Boş Olamaz";
        }

        if (isset($content) && !empty($content) && NewsModel::where([["no", "!=", $no], ["content", $content]])->count()) {
            $data["errors"]["content"] = "[$content] Bu İçerik Daha Önceden Yazılmış, Başka Bir İçerik Metni Ekleyiniz";
        }

        if (isset($category) && !empty($category) && !CategoryGroupsModel::where("no", $category)->count()) {
            $data["errors"]["category"] = "Böyle Bir Kategori Grubu Yok";
        }

        if (isset($resourcePlatform) && !empty($resourcePlatform) && !ResourcePlatformsModel::where("no", $resourcePlatform)->count()) {
            $data["errors"]["resource_platform"] = "Böyle Bir Kaynak Site Yok";
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

        return NewsEditController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];
        $content = $data["data"]["content"];
        $category = $data["data"]["category"];
        $resourcePlatform = $data["data"]["resource_platform"];
        $resourceUrl = $data["data"]["resource_url"];
        $publishDate = $data["data"]["publish_date"];
        $linkUrl = LinkUrlGenerator::single($content);

        if (isset($resourceUrl) && !empty($resourceUrl) && ResourceUrlsModel::where("url", $resourceUrl)->count()) {
            $resourceUrlNo = ResourceUrlsModel::where("url", $resourceUrl)->first()->no;
        }
        if (isset($resourceUrl) && !empty($resourceUrl) && !ResourceUrlsModel::where("url", $resourceUrl)->count()) {
            $resourceUrlNo = NoGenerator::generateResourceUrlsNo();
            ResourceUrlsModel::create([
                "no" => $resourceUrlNo,
                "news_no" => $no,
                "resource_platform" => $resourcePlatform,
                "url" => $resourceUrl
            ]);
        }

        NewsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "content" => $content,
            "category" => $category,    
            "resource_platform" => $resourcePlatform,
            "resource_url" => $resourceUrlNo,
            "publish_date" => $publishDate,
            "link_url" => $linkUrl
        ]);

        $data["editedData"] = NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);

        return $data;
    }
}
