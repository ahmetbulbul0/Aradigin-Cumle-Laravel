<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Models\NewsModel;
use App\Models\UsersModel;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\Pagination;
use App\Http\Controllers\Tools\VisitorMenuDataGet;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;

class VisitorNewsListPageController extends Controller
{
    public function index($listType, $page = 1)
    {
        $listType = htmlspecialchars($listType);

        $page = htmlspecialchars($page);

        switch ($listType) {
            case 'son-yayinlananlar':
                $data = $this->getData($listType, NULL, NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi", ["son-yayinlananlar"]);
                $data["bigList"][0]["listTitle"] = "Son Yayınlananlar";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi", ["son-yayinlananlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            case 'cok-okunanlar':
                $data = $this->getData($listType, NULL, NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi", ["cok-okunanlar"]);
                $data["bigList"][0]["listTitle"] = "Çok Okunanlar";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi", ["cok-okunanlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            case 'az-okunanlar':
                $data = $this->getData($listType, NULL, NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi", ["az-okunanlar"]);
                $data["bigList"][0]["listTitle"] = "Az Okunanlar";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi", ["az-okunanlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            default:
                return response()->view('errors.404');
                break;
        }

        $data["bigList"][0]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["bigList"][0]["listType"] = $listType;
        $data["bigList"][0] = CategoryGroupToText::multiple($data["bigList"][0]);
        $data["menu"] = VisitorMenuDataGet::get();


        return view("visitor.pages.news_list")->with("data", $data);
    }
    public function author($author, $listType, $page = 1)
    {
        $listType = htmlspecialchars($listType);
        $author = htmlspecialchars($author);
        $page = htmlspecialchars($page);

        if (!UsersModel::where(["is_deleted" => false, "username" => $author])->count()) {
            return response()->view('errors.404');
        }

        $author = UsersModel::where(["is_deleted" => false, "username" => $author])->first();

        switch ($listType) {
            case 'son-yayinlananlar':
                $data = $this->getData($listType, $author["no"], NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_yazar", [$author["username"], "son-yayinlananlar"]);
                $data["bigList"][0]["listTitle"] = $author["username"]." (".Str::title($author["full_name"]).") Yazarına Ait Haberler [Son Yayınlananlar]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_yazar", [$author["username"], "son-yayinlananlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            case 'cok-okunanlar':
                $data = $this->getData($listType, $author["no"], NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_yazar", [$author["username"], "cok-okunanlar"]);
                $data["bigList"][0]["listTitle"] = $author["username"]." (".Str::title($author["full_name"]).") Yazarına Ait Haberler [Çok Okunanlar]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_yazar", [$author["username"], "cok-okunanlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            case 'az-okunanlar':
                $data = $this->getData($listType, $author["no"], NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_yazar", [$author["username"], "az-okunanlar"]);
                $data["bigList"][0]["listTitle"] = $author["username"]." (".Str::title($author["full_name"]).") Yazarına Ait Haberler [Az Okunanlar]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_yazar", [$author["username"], "az-okunanlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            default:
                return response()->view('errors.404');
                break;
        }

        $data["bigList"][0]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["bigList"][0]["listType"] = $listType;
        $data["bigList"][0] = CategoryGroupToText::multiple($data["bigList"][0]);
        $data["menu"] = VisitorMenuDataGet::get();

        return view("visitor.pages.news_list")->with("data", $data);
    }
    public function resourcePlatform($resourcePlatformLinkUrl, $listType, $page = 1)
    {
        $listType = htmlspecialchars($listType);
        $resourcePlatformLinkUrl = htmlspecialchars($resourcePlatformLinkUrl);
        $page = htmlspecialchars($page);

        if (!ResourcePlatformsModel::where(["is_deleted" => false, "link_url" => $resourcePlatformLinkUrl])->count()) {
            dd("deneeme");
        }

        $resourcePlatform = ResourcePlatformsModel::where(["is_deleted" => false, "link_url" => $resourcePlatformLinkUrl])->first();

        switch ($listType) {
            case 'son-yayinlananlar':
                $data = $this->getData($listType, NULL, $resourcePlatform["no"], NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "son-yayinlananlar"]);
                $data["bigList"][0]["listTitle"] = "Son Yayınlananlar [" . $resourcePlatform["name"] . "]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "son-yayinlananlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            case 'cok-okunanlar':
                $data = $this->getData($listType, NULL, $resourcePlatform["no"], NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "cok-okunanlar"]);
                $data["bigList"][0]["listTitle"] = "Çok Okunanlar [" . $resourcePlatform["name"] . "]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "cok-okunanlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            case 'az-okunanlar':
                $data = $this->getData($listType, NULL, $resourcePlatform["no"], NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "az-okunanlar"]);
                $data["bigList"][0]["listTitle"] = "Az Okunanlar [" . $resourcePlatform["name"] . "]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "az-okunanlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            default:
                return response()->view('errors.404');
                break;
        }

        $data["bigList"][0]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["bigList"][0]["listType"] = $listType;
        $data["bigList"][0] = CategoryGroupToText::multiple($data["bigList"]);
        $data["menu"] = VisitorMenuDataGet::get();

        return view("visitor.pages.news_list")->with("data", $data);
    }
    public function category($categoryGroupLinkUrl, $listType, $page = 1)
    {
        $listType = htmlspecialchars($listType);
        $categoryGroupLinkUrl = htmlspecialchars($categoryGroupLinkUrl);
        $page = htmlspecialchars($page);

        if (!CategoryGroupUrlsModel::where(["is_deleted" => false, "link_url" => $categoryGroupLinkUrl])->count()) {
            return response()->view('errors.404');
        }

        $categoryGroupUrl = CategoryGroupUrlsModel::where(["is_deleted" => false, "link_url" => $categoryGroupLinkUrl])->first();
        $categoryGroup = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($categoryGroupUrl->group_no);
        $categoryGroup["name"] = CategoryGroupToText::single($categoryGroup["no"]);

        switch ($listType) {
            case 'son-yayinlananlar':
                $data = $this->getData($listType, NULL, NULL, $categoryGroup["no"], $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "son-yayinlananlar"]);
                $data["bigList"][0]["listTitle"] = "Son Yayınlananlar [" . $categoryGroup["name"] . "]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "son-yayinlananlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            case 'cok-okunanlar':
                $data = $this->getData($listType, NULL, NULL, $categoryGroup["no"], $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "cok-okunanlar"]);
                $data["bigList"][0]["listTitle"] = "Çok Okunanlar [" . $categoryGroup["name"] . "]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "cok-okunanlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            case 'az-okunanlar':
                $data = $this->getData($listType, NULL, NULL, $categoryGroup["no"], $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "az-okunanlar"]);
                $data["bigList"][0]["listTitle"] = "Az Okunanlar [" . $categoryGroup["name"] . "]";
                $data["bigList"][0]["allListLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "az-okunanlar"]);
                $data["page_title"] = $data["bigList"][0]["listTitle"];
                break;
            default:
                return response()->view('errors.404');
                break;
        }

        $data["bigList"][0]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["bigList"][0]["listType"] = $listType;
        $data["bigList"][0] = CategoryGroupToText::multiple($data["bigList"][0]);
        $data["menu"] = VisitorMenuDataGet::get();

        return view("visitor.pages.news_list")->with("data", $data);
    }
    public function GetData($listType, $authorNo = NULL, $resourcePlatformNo = NULL, $categoryGroupNo = NULL, $page, $itemPerPage)
    {
        switch ($listType) {
            case 'son-yayinlananlar':
                $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatas() ? count(NewsListController::getAllDataOnlyNotDeletedDatas()) : 0;
                if ($authorNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor($authorNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor($authorNo)) : 0;
                }
                if ($resourcePlatformNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourcePlatform($resourcePlatformNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourcePlatform($resourcePlatformNo)) : 0;
                }
                if ($categoryGroupNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategory($categoryGroupNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategory($categoryGroupNo)) : 0;
                }
                break;
            case 'cok-okunanlar':
                $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescReading() ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescReading()) : 0;
                if ($authorNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor($authorNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor($authorNo)) : 0;
                }
                if ($resourcePlatformNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourcePlatform($resourcePlatformNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourcePlatform($resourcePlatformNo)) : 0;
                }
                if ($categoryGroupNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategory($categoryGroupNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategory($categoryGroupNo)) : 0;
                }
                break;
            case 'az-okunanlar':
                $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscReading() ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscReading()) : 0;
                if ($authorNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor($authorNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor($authorNo)) : 0;
                }
                if ($resourcePlatformNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourcePlatform($resourcePlatformNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourcePlatform($resourcePlatformNo)) : 0;
                }
                if ($categoryGroupNo) {
                    $dataNumber = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategory($categoryGroupNo) ? count(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategory($categoryGroupNo)) : 0;
                }
                break;
            default:
                return response()->view('errors.404');
                break;
        }

        $TotalPageNumber = Pagination::TotalPageNumber($dataNumber, $itemPerPage);

        if ($page > $TotalPageNumber) {
            return response()->view('errors.404');
        }

        $offsetValue = ($page * $itemPerPage) - $itemPerPage;


        $data["data"] = new NewsModel;
        $data["data"] = $data["data"]->where("is_deleted", false);

        if ($authorNo) {
            $data["data"] = $data["data"]->where("author", $authorNo);
        }

        if ($resourcePlatformNo) {
            $data["data"] = $data["data"]->where("resource_platform", $resourcePlatformNo);
        }

        if ($categoryGroupNo) {
            $data["data"] = $data["data"]->where("category", $categoryGroupNo);
        }

        $data["data"] = $data["data"]->with("author", "category", "resourcePlatform", "resourceUrl");

        switch ($listType) {
            case 'son-yayinlananlar':
                $data["data"] = $data["data"]->orderBy("publish_date", "DESC");
                break;
            case 'cok-okunanlar':
                $data["data"] = $data["data"]->orderBy("reading", "DESC");
                break;
            case 'az-okunanlar':
                $data["data"] = $data["data"]->orderBy("reading", "ASC");
                break;
            default:
                return response()->view('errors.404');
                break;
        }

        $data["data"] = $data["data"]->limit($itemPerPage);
        $data["data"] = $data["data"]->offset($offsetValue);
        $data["data"] = $data["data"]->get();
        $data["data"] = $data["data"]->toArray();

        $data["pagination"]["nowPage"] = $page;

        $data["pagination"]["previousPage"] = null;

        if ($data["pagination"]["nowPage"] > 1) {
            $data["pagination"]["previousPage"] = $page - 1;
        }

        $data["pagination"]["previousPreviousPage"] = null;

        if ($data["pagination"]["nowPage"] > 2) {
            $data["pagination"]["previousPreviousPage"] = $page - 2;
        }

        $data["pagination"]["nextPage"] = null;

        if (($data["pagination"]["nowPage"] + 1) <= $TotalPageNumber) {
            $data["pagination"]["nextPage"] = $page + 1;
        }

        $data["pagination"]["nextNextPage"] = null;

        if (($data["pagination"]["nowPage"] + 2) <= $TotalPageNumber) {
            $data["pagination"]["nextNextPage"] = $page + 2;
        }

        $data["pagination"]["totalPageNumber"] = $TotalPageNumber;

        return $data;
    }
}
