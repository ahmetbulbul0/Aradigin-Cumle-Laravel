<?php

namespace App\Http\Controllers\Pages\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use Illuminate\Support\Facades\Session;

class MyNewsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Haberlerim";

        if (!isset($data["data"])) {
            $data["data"] = NewsListController::getAllOnlyNotDeletedWithAuthorNoAllRelationships(Session::get("userData.no"));
        }

        $data = CategoryGroupToText::multiple($data);
        $data["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["data"] = UnixTimeToTextDateController::MultipleTimeToDateForWriteTime($data["data"]);

        return view("author.pages.my_news_list")->with("data", $data);
    }
}
