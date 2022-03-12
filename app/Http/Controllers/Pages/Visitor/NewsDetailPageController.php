<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\VisitorMenuDataGet;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;

class NewsDetailPageController extends Controller
{
    public function index($linkUrl)
    {
        $data["menu"] = VisitorMenuDataGet::get();

        $linkUrl = htmlspecialchars($linkUrl);

        if (!NewsModel::where(["is_deleted" => false, "link_url" => $linkUrl])->count()) {
            return response()->view('errors.404');
        }

        $newsNo = NewsModel::where(["is_deleted" => false, "link_url" => $linkUrl])->first()->no;

        $data["newsDetail"]["data"] = NewsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($newsNo);

        $data["newsDetail"]["data"]["publish_date"] = UnixTimeToTextDateController::TimeToDate($data["newsDetail"]["data"]["publish_date"]);
        
        $data["newsDetail"]["data"]["category"]["text"] = CategoryGroupToText::single($data["newsDetail"]["data"]["category"]["no"]);

        return view("visitor.pages.news_detail")->with("data", $data);
    }
}
