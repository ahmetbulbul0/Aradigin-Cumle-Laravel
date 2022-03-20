<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\VisitorMenuDataGet;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use App\Http\Controllers\Api\Readings\ReadingCreateController;

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

        $data["newsDetail"]["data"] = NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($newsNo);

        $data["newsDetail"]["data"]["publish_date"] = UnixTimeToTextDateController::TimeToDate($data["newsDetail"]["data"]["publish_date"]);
        
        $data["newsDetail"]["data"]["category"]["text"] = CategoryGroupToText::single($data["newsDetail"]["data"]["category"]["no"]);

        $data["someRecentNews"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($data["newsDetail"]["data"]["category"]["no"], 5);
        $data["mostReadNews"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescReadingLimit($data["newsDetail"]["data"]["category"]["no"], 5);
        $data["lessReadNews"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByAscReadingLimit($data["newsDetail"]["data"]["category"]["no"], 5);

        ReadingCreateController::work($newsNo);

        return view("visitor.pages.news_detail")->with("data", $data);
    }
}
