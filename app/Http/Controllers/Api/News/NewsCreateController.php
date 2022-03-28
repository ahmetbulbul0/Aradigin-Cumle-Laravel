<?php

namespace App\Http\Controllers\Api\News;

use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformsListController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsCreateController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsListController;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Models\NewsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;

class NewsCreateController extends Controller
{
    static function get($data)
    {
        $content = $data["data"]["content"];
        $author = htmlspecialchars($data["data"]["author"]);
        $category = htmlspecialchars($data["data"]["category"]);
        $resourcePlatform = htmlspecialchars($data["data"]["resource_platform"]);
        $resourceUrl = htmlspecialchars($data["data"]["resource_url"]);
        $publishDate = htmlspecialchars($data["data"]["publish_date"]);
        $speDate = htmlspecialchars($data["data"]["spe_date"]);
        $speTime = htmlspecialchars($data["data"]["spe_time"]);

        $author = intval($author);
        $category = intval($category);
        $resourcePlatform = intval($resourcePlatform);

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
    static function check($data)
    {
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

        if (!isset($category) || empty($category)) {
            $data["errors"]["category"] = "Kategori Alanı Zorunludur";
        }

        if (!isset($resourcePlatform) || empty($resourcePlatform)) {
            $data["errors"]["resourcePlatform"] = "Kaynak Site Alanı Zorunludur";
        }

        if (!isset($resourceUrl) || empty($resourceUrl)) {
            $data["errors"]["resourceUrl"] = "Kaynak Url Alanı Zorunludur";
        }

        if (!isset($publishDate) || empty($publishDate)) {
            $data["errors"]["publishDate"] = "Yayın Tarihi Alanı Zorunludur";
        }

        if (isset($content) && !empty($content) && NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereContent($content)) {
            $data["errors"]["content"] = "[$content] Bu İçerik Daha Önceden Yazılmış";
        }

        if (isset($author) && !empty($author) && !UsersListController::getFirstDataOnlyNotDeletedDatasWhereWhereNoWhereTypeAuthor($author)) {
            $data["errors"]["author"] = "Geççersiz Yazar Hesabı";
        }

        if (isset($category) && !empty($category) && !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo($category)) {
            $data["errors"]["category"] = "Geçersiz Kategori Grubu";
        }

        if (isset($resourcePlatform) && !empty($resourcePlatform) && !ResourcePlatformsListController::getFirstDataOnlyNotDeletedDatasWhereNo($resourcePlatform)) {
            $data["errors"]["resourcePlatform"] = "Geçersiz Kaynak Site";
        }

        if ($publishDate == "specialDate") {
            if (!isset($speDate) || empty($speDate)) {
                $data["errors"]["speDate"] = "Tarih Seç Alanında Tarih Alanı Zorunludur";
            }
            if (!isset($speTime) || empty($speTime)) {
                $data["errors"]["speTime"] = "Tarih Seç Alanında Zaman Alanı Zorunludur";
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
                $data["errors"]["publishDate"] = "[$publishDate] Böyle Bir Yayın Durumu Yok";
                break;
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return NewsCreateController::work($data);
    }
    static function work($data)
    {
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
        $linkUrl = LinkUrlGenerator::single($content, 10);

        $dataForResourceUrl["data"] = [
            "news_no" => $no,
            "resource_platform" => $resourcePlatform,
            "url" => $resourceUrl
        ];

        NewsModel::create([
            "no" => $no,
            "content" => $content,
            "author" => $author,
            "category" => $category,
            "resource_platform" => $resourcePlatform,
            "resource_url" => 0,
            "publish_date" => $publishDate,
            "write_time" => $writeTime,
            "listing" => $listing,
            "reading" => $reading,
            "link_url" => $linkUrl
        ]);

        $resourceUrl = ResourceUrlsCreateController::get($dataForResourceUrl);

        NewsModel::where(["is_deleted" => false, "no" => $no])->update(["resource_url" => $resourceUrl["createdData"]["no"]]);

        $data["createdNewsData"] = NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        $data["createdResourceUrlData"] = ResourceUrlsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($resourceUrl["createdData"]["no"]);

        return $data;
    }
}
