<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryGroupsModel;
use App\Models\NewsModel;
use App\Models\ResourcePlatformsModel;
use App\Models\ResourceUrlsModel;
use App\Models\UsersModel;

class NewsCreateController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Haber Ekle";

        $data["categoryGroups"] = CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5")->orderBy("main")->orderBy("sub1")->orderBy("sub2")->orderBy("sub3")->orderBy("sub4")->orderBy("sub5")->get()->toArray();

        $data["resourcePlatforms"] = ResourcePlatformsModel::where("is_deleted", false)->orderBy("name")->get();

        return view("private.pages.news_create", ["data" => $data]);
    }

    public function form(Request $request)
    {
        if (!isset($request->content)) {
            $data["errors"]["content"] = "Bu Alan Zorunludur";
        }

        if (!isset($request->categoryGroup)) {
            $data["errors"]["categoryGroup"] = "Bu Alan Zorunludur";
        }

        if (!isset($request->publishDate)) {
            $data["errors"]["publishDate"] = "Bu Alan Zorunludur";
        }

        if ($request->publishDate == "specialDate") {
            if (!isset($request->speDate)) {
                $data["errors"]["speDate"] = "Tarih Seç Alanında Tarih Alanı Zorunludur";
            }
            if (!isset($request->speTime)) {
                $data["errors"]["speTime"] = "Tarih Seç Alanında Zaman Alanı Zorunludur";
            }
        }

        if (!isset($request->resource)) {
            $data["errors"]["resource"] = "Bu Alan Zorunludur";
        }

        if (!isset($request->resourceUrl)) {
            $data["errors"]["resourceUrl"] = "Bu Alan Zorunludur";
        }

        $content = htmlspecialchars($request->content);
        $categoryGroup = htmlspecialchars($request->categoryGroup);
        $publishDate = htmlspecialchars($request->publishDate);
        $speDate = htmlspecialchars($request->speDate);
        $speTime = htmlspecialchars($request->speTime);
        $resource = htmlspecialchars($request->resource);
        $resourceUrl = htmlspecialchars($request->resourceUrl);
        $author = 628827;

        if (NewsModel::where("content", $content)->count()) {
            $data["errors"]["content"] = "[$content] Böyle Bir Haber Zaten Var";
        }

        if (!CategoryGroupsModel::where("no", $categoryGroup)->count()) {
            $data["errors"]["categoryGroup"] = " Böyle Bir Kategori Grubu Yok";
        }

        switch ($publishDate) {
            case 'now':
                $publishDate = time();
                break;
            case 'task':
                $publishDate = 0;
                break;
            case 'specialDate':
                $publishDate = $speDate . " " . $speTime;
                $publishDate = strtotime($publishDate);
                break;
            default:
                $data["errors"]["publishDate"] = "[$publishDate] Böyle Bir Yayın Durumu Yok";
                break;
        }

        if (!empty($resource) && !ResourcePlatformsModel::where("no", $resource)->count()) {
            $data["errors"]["resource"] = "[$resource] Böyle Bir Kaynak Site Yok";
        }

        if (!empty($resourceUrl) && ResourceUrlsModel::where("url", $resourceUrl)->count()) {
            $data["errors"]["resourceUrl"] = "[$resourceUrl] Bu Linke Ait Bi Haber Zaten Var";
        }

        if (!UsersModel::where("no", $author)->count()) {
            $data["errors"]["author"] = "[$author] Böyle Bir Yazar Yok";
        }

        if (isset($data["errors"])) {
            return $this->index($data);
        }

        $turkishKeys = ['Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ",", "'", "(", ")", "[", "]", ";"];
        $englishKeys = ['c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', "", "", "", "", "", "", ""];
        $newsUrl = str_replace($turkishKeys, $englishKeys, $content);
        $newsUrl = explode(" ", $newsUrl, 10);
        $newsUrl = implode("-", $newsUrl);
        $newsUrl = explode(" ", $newsUrl);
        $newsUrl = strtolower($newsUrl[0]);

        $resourceUrlNo = NoGenerator::generateResourceUrlsNo();
        $newsNo = NoGenerator::generateNewsNo();

        ResourceUrlsModel::create([
            "no" => $resourceUrlNo,
            "news_no" => $newsNo,
            "resource_platform" => $resource,
            "url" => $resourceUrl
        ]);

        NewsModel::create([
            "no" => $newsNo,
            "content" => $content,
            "author" => $author,
            "category" => $categoryGroup,
            "resource_platform" => $resource,
            "resource_url" => $resourceUrlNo,
            "publish_date" => $publishDate,
            "write_time" => time(),
            "listing" => 0,
            "reading" => 0,
            "link_url" => $newsUrl
        ]);

        $createdNews = NewsModel::where("no", $newsNo)->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();

        $data["createdDataName"] = "Haber";

        $data["createdData"] = [
            [
                "column" => "No",
                "value" => $createdNews[0]["no"]
            ],
            [
                "column" => "İçerik",
                "value" => $createdNews[0]["content"]
            ],
            [
                "column" => "Yazar",
                "value" => $createdNews[0]["author"]["username"] . " [" . $createdNews[0]["author"]["full_name"] . "]"
            ],
            // [
            //     "column" => "category",
            //     "value" => $createdNews[0]["category"] /* SIKINTITI */
            // ],
            [
                "column" => "Kaynak Site",
                "value" => $createdNews[0]["resource_platform"]["name"]
            ],
            [
                "column" => "Kaynak Linki:",
                "value" => $createdNews[0]["resource_url"]["url"]
            ],
            [
                "column" => "Yayın Tarihi",
                "value" => date("Y-m-d - H:i", $createdNews[0]["publish_date"])
            ],
            [
                "column" => "write_time",
                "value" => date("Y-m-d - H:i", $createdNews[0]["write_time"])
            ],
            [
                "column" => "Listelenme",
                "value" => $createdNews[0]["listing"]
            ],
            [
                "column" => "Okunma",
                "value" => $createdNews[0]["reading"]
            ],
            [
                "column" => "Haber Linki",
                "value" => $createdNews[0]["link_url"]
            ]
        ];

        return $this->index($data);
    }
}
