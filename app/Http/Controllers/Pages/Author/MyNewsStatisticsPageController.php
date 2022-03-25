<?php

namespace App\Http\Controllers\Pages\Author;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use Illuminate\Support\Facades\Session;

class MyNewsStatisticsPageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "Haber İstatistikleri";
        $data["news"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor(Session::get("userData.no"));
        if ($data["news"]) {
            $data["data"] = $data["news"];
            $data = CategoryGroupToText::multiple($data);
            $data["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
            $data["data"] = UnixTimeToTextDateController::MultipleTimeToDateForWriteTime($data["data"]);
            $data["news"] = $data["data"];
            unset($data["data"]);
        }

        return view("author.pages.my_news_statistics")->with("data", $data);
    }
}
