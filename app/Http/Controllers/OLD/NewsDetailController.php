<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Faker\Provider\HtmlLorem;

class NewsDetailController extends Controller
{
    public function index($url)
    {
        $url = htmlspecialchars($url);

        if (!NewsModel::where("link_url", $url)->count()) {
            return redirect("/");
        }

        $data = [
            "newsDetail" => [
                "data" => NewsModel::where("link_url", $url)->with("author", "category", "resourcePlatform", "resourceUrl")->first()->toArray()
            ]
        ];

        $categories[] = $data["newsDetail"]["data"]["category"]["main"]["name"];

        if (!empty($data["newsDetail"]["data"]["category"]["sub1"])) {
            $categories[] = $data["newsDetail"]["data"]["category"]["sub1"]["name"];
        }
        if (!empty($data["newsDetail"]["data"]["category"]["sub2"])) {
            $categories[] = $data["newsDetail"]["data"]["category"]["sub2"]["name"];
        }
        if (!empty($data["newsDetail"]["data"]["category"]["sub3"])) {
            $categories[] = $data["newsDetail"]["data"]["category"]["sub3"]["name"];
        }
        if (!empty($data["newsDetail"]["data"]["category"]["sub4"])) {
            $categories[] = $data["newsDetail"]["data"]["category"]["sub4"]["name"];
        }
        if (!empty($data["newsDetail"]["data"]["category"]["sub5"])) {
            $categories[] = $data["newsDetail"]["data"]["category"]["sub5"]["name"];
        }

        $categories = implode(", ", $categories);
        $categories = Str::title($categories);

        $data["newsDetail"]["data"]["categories"] = $categories;
        $data["newsDetail"]["data"]["publish_date"] = UnixTimeToTextDateController::TimeToDate($data["newsDetail"]["data"]["publish_date"]);
        $data["page_title"] = $data["newsDetail"]["data"]["content"];

        return view("public.pages.news_detail", ["data" => $data]);
    }
}
