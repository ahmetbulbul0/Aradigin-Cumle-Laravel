<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\NewsModel;
use App\Models\UsersModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserTypesModel;
use App\Models\CategoriesModel;
use App\Models\CategoryGroupsModel;
use App\Models\CategoryGroupUrlsModel;

class NewsListController extends Controller
{
    public function index($listType)
    {
        switch ($listType) {
            case 'son-yayinlananlar':
                $data["bigList"]["title"] = "Son Yayınlananlar";
                $data["bigList"]["data"] = NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderByDesc("publish_date")->get()->toArray();
                break;
            case 'cok-okunanlar':
                $data["bigList"]["title"] = "Çok Okunanlar";
                $data["bigList"]["data"] = NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderByDesc("reading")->get()->toArray();
                break;
            case 'az-okunanlar':
                $data["bigList"]["title"] = "Az Okunanlar";
                $data["bigList"]["data"] = NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading")->get()->toArray();
                break;
            default:
                return redirect("/");
                break;
        }

        $data["menu"] = [
            "categories" => CategoriesModel::where([["is_deleted", false], ["type", Constants::MAİN_CATEGORY_TYPE]])->get()->toArray()
        ];

        $data["page_title"] = $data["bigList"]["title"];
        $data["bigList"]["listType"] = $listType;
        $data["bigList"]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["bigList"]["data"]);

        return view("public.pages.news_list", ["data" => $data]);
    }

    public function category($url, $listType)
    {
        $url = htmlspecialchars($url);

        if (!CategoryGroupUrlsModel::where("link_url", $url)->count()) {
            return redirect("/");
        }

        $categoryGroupUrl = CategoryGroupUrlsModel::where("link_url", $url)->first();

        $category = CategoryGroupsModel::where("link_url", $categoryGroupUrl->no)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first()->toArray();

        $categories[] = $category["main"]["name"];

        if (!empty($category["sub1"])) {
            $categories[] = $category["sub1"]["name"];
        }
        if (!empty($category["sub2"])) {
            $categories[] = $category["sub2"]["name"];
        }
        if (!empty($category["sub3"])) {
            $categories[] = $category["sub3"]["name"];
        }
        if (!empty($category["sub4"])) {
            $categories[] = $category["sub4"]["name"];
        }
        if (!empty($category["sub5"])) {
            $categories[] = $category["sub5"]["name"];
        }

        $categories = implode(", ", $categories);
        $categories = Str::title($categories);

        switch ($listType) {
            case 'son-yayinlananlar':
                $data["bigList"]["title"] = "Son Yayınlananlar [$categories Haberleri]";
                $data["bigList"]["data"] = NewsModel::where([["is_deleted", false], ["category", $category["no"]]])->orderByDesc("publish_date")->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();
                break;
            case 'cok-okunanlar':
                $data["bigList"]["title"] = "Çok Okunanlar [$categories Haberleri]";
                $data["bigList"]["data"] = NewsModel::where([["is_deleted", false], ["category", $category["no"]]])->orderByDesc("reading")->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();
                break;
            case 'az-okunanlar':
                $data["bigList"]["title"] = "Az Okunanlar [$categories Haberleri]";
                $data["bigList"]["data"] = NewsModel::where([["is_deleted", false], ["category", $category["no"]]])->orderBy("reading")->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();
                break;
            default:
                return redirect("/");
                break;
        }

        $data["menu"] = [
            "categories" => CategoriesModel::where([["is_deleted", false], ["type", Constants::MAİN_CATEGORY_TYPE]])->get()->toArray()
        ];

        $data["page_title"] = $data["bigList"]["title"];
        $data["bigList"]["listType"] = $listType;
        $data["bigList"]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["bigList"]["data"]);

        return view("public.pages.news_list", ["data" => $data]);
    }

    public function author($username, $listType)
    {
        $username = htmlspecialchars($username);

        if (!UsersModel::where("username", $username)->count()) {
            return redirect("/");
        }

        $author = UsersModel::where("username", $username)->with("type")->get()[0];

        switch ($listType) {
            case 'son-yayinlananlar':
                $data["page_title"] = "Son Yayınlananlar [$author->username Haberleri]";
                $data["news"] = NewsModel::where([["is_deleted", false], ["author", $author->no]])->orderByDesc("publish_date")->get();
                break;
            case 'cok-okunanlar':
                $data["page_title"] = "Çok Okunanlar [$author->username Haberleri]";
                $data["news"] = NewsModel::where([["is_deleted", false], ["author", $author->no]])->orderByDesc("reading")->get();
                break;
            case 'az-okunanlar':
                $data["page_title"] = "Az Okunanlar [$author->username Haberleri]";
                $data["news"] = NewsModel::where([["is_deleted", false], ["author", $author->no]])->orderBy("reading")->get();
                break;
            default:
                return redirect("/");
                break;
        }

        $data["menu"] = [
            "categories" => CategoriesModel::where([["is_deleted", false], ["type", Constants::MAİN_CATEGORY_TYPE]])->get()->toArray()
        ];

        return view("public.pages.news_list", ["data" => $data]);
    }
}
