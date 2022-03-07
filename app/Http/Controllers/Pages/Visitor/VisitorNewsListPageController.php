<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Models\NewsModel;
use App\Models\UsersModel;
use App\Models\CategoryGroupsModel;
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
                $data["bigList"]["listTitle"] = "Son Yayınlananlar";
                $data["bigList"]["allListLink"] = route("haberler_listesi", ["son-yayinlananlar"]);
                break;
            case 'cok-okunanlar':
                $data = $this->getData($listType, NULL, NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi", ["cok-okunanlar"]);
                $data["bigList"]["listTitle"] = "Çok Okunanlar";
                $data["bigList"]["allListLink"] = route("haberler_listesi", ["cok-okunanlar"]);
                break;
            case 'az-okunanlar':
                $data = $this->getData($listType, NULL, NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi", ["az-okunanlar"]);
                $data["bigList"]["listTitle"] = "Az Okunanlar";
                $data["bigList"]["allListLink"] = route("haberler_listesi", ["az-okunanlar"]);
                break;
            default:
                dd("HATA");
                break;
        }

        $data["bigList"]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["bigList"]["listType"] = $listType;
        $data["bigList"] = CategoryGroupToText::multiple($data["bigList"]);
        $data["menu"] = VisitorMenuDataGet::get();


        return view("visitor.pages.news_list")->with("data", $data);
    }
    public function author($author, $listType, $page = 1)
    {
        $listType = htmlspecialchars($listType);
        $author = htmlspecialchars($author);
        $page = htmlspecialchars($page);

        if (!UsersModel::where(["is_deleted" => false, "username" => $author])->count()) {
            dd("HATA");
        }

        $author = UsersModel::where(["is_deleted" => false, "username" => $author])->first();

        switch ($listType) {
            case 'son-yayinlananlar':
                $data = $this->getData($listType, $author["no"], NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_yazar", [$author["username"], "son-yayinlananlar"]);
                $data["bigList"]["listTitle"] = "Son Yayınlananlar [" . $author["full_name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_yazar", [$author["username"], "son-yayinlananlar"]);
                break;
            case 'cok-okunanlar':
                $data = $this->getData($listType, $author["no"], NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_yazar", [$author["username"], "cok-okunanlar"]);
                $data["bigList"]["listTitle"] = "Çok Okunanlar [" . $author["full_name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_yazar", [$author["username"], "cok-okunanlar"]);
                break;
            case 'az-okunanlar':
                $data = $this->getData($listType, $author["no"], NULL, NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_yazar", [$author["username"], "az-okunanlar"]);
                $data["bigList"]["listTitle"] = "Az Okunanlar [" . $author["full_name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_yazar", [$author["username"], "az-okunanlar"]);
                break;
            default:
                return "HATA";
                break;
        }

        $data["bigList"]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["bigList"]["listType"] = $listType;
        $data["bigList"] = CategoryGroupToText::multiple($data["bigList"]);
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
                $data["bigList"]["listTitle"] = "Son Yayınlananlar [" . $resourcePlatform["name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "son-yayinlananlar"]);
                break;
            case 'cok-okunanlar':
                $data = $this->getData($listType, NULL, $resourcePlatform["no"], NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "cok-okunanlar"]);
                $data["bigList"]["listTitle"] = "Çok Okunanlar [" . $resourcePlatform["name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "cok-okunanlar"]);
                break;
            case 'az-okunanlar':
                $data = $this->getData($listType, NULL, $resourcePlatform["no"], NULL, $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "az-okunanlar"]);
                $data["bigList"]["listTitle"] = "Az Okunanlar [" . $resourcePlatform["name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_kaynak", [$resourcePlatform["link_url"], "az-okunanlar"]);
                break;
            default:
                return "HATA";
                break;
        }

        $data["bigList"]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["bigList"]["listType"] = $listType;
        $data["bigList"] = CategoryGroupToText::multiple($data["bigList"]);
        $data["menu"] = VisitorMenuDataGet::get();

        return view("visitor.pages.news_list")->with("data", $data);
    }
    public function category($categoryGroupLinkUrl, $listType, $page = 1)
    {
        $listType = htmlspecialchars($listType);
        $categoryGroupLinkUrl = htmlspecialchars($categoryGroupLinkUrl);
        $page = htmlspecialchars($page);

        if (!CategoryGroupUrlsModel::where(["is_deleted" => false, "link_url" => $categoryGroupLinkUrl])->count()) {
            dd("HATA");
        }

        $categoryGroupUrl = CategoryGroupUrlsModel::where(["is_deleted" => false, "link_url" => $categoryGroupLinkUrl])->first();
        $categoryGroup = CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($categoryGroupUrl->group_no);
        $categoryGroup["name"] = CategoryGroupToText::single($categoryGroup["no"]);

        switch ($listType) {
            case 'son-yayinlananlar':
                $data = $this->getData($listType, NULL, NULL, $categoryGroup["no"], $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "son-yayinlananlar"]);
                $data["bigList"]["listTitle"] = "Son Yayınlananlar [" . $categoryGroup["name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "son-yayinlananlar"]);
                break;
            case 'cok-okunanlar':
                $data = $this->getData($listType, NULL, NULL, $categoryGroup["no"], $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "cok-okunanlar"]);
                $data["bigList"]["listTitle"] = "Çok Okunanlar [" . $categoryGroup["name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "cok-okunanlar"]);
                break;
            case 'az-okunanlar':
                $data = $this->getData($listType, NULL, NULL, $categoryGroup["no"], $page, 5);
                $data["pagination"]["mainLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "az-okunanlar"]);
                $data["bigList"]["listTitle"] = "Az Okunanlar [" . $categoryGroup["name"] . "]";
                $data["bigList"]["allListLink"] = route("haberler_listesi_kategori", [$categoryGroup["link_url"]["link_url"], "az-okunanlar"]);
                break;
            default:
                return "HATA";
                break;
        }

        $data["bigList"]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["bigList"]["listType"] = $listType;
        $data["bigList"] = CategoryGroupToText::multiple($data["bigList"]);
        $data["menu"] = VisitorMenuDataGet::get();

        return view("visitor.pages.news_list")->with("data", $data);
    }
    public function GetData($listType, $authorNo = NULL, $resourcePlatformNo = NULL, $categoryGroupNo = NULL, $page, $itemPerPage)
    {
        switch ($listType) {
            case 'son-yayinlananlar':
                $dataNumber = count(NewsListController::getAllOnlyNotDeleted());
                if ($authorNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWithAuthorNoAllRelationships($authorNo));
                }
                if ($resourcePlatformNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWithResourcePlatformNoAllRelationships($resourcePlatformNo));
                }
                if ($categoryGroupNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWitCategoryNoAllRelationships($categoryGroupNo));
                }
                break;
            case 'cok-okunanlar':
                $dataNumber = count(NewsListController::getAllOnlyNotDeleted());
                if ($authorNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWithAuthorNoAllRelationships($authorNo));
                }
                if ($resourcePlatformNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWithResourcePlatformNoAllRelationships($resourcePlatformNo));
                }
                if ($categoryGroupNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWitCategoryNoAllRelationships($categoryGroupNo));
                }
                break;
            case 'az-okunanlar':
                $dataNumber = count(NewsListController::getAllOnlyNotDeleted());
                if ($authorNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWithAuthorNoAllRelationships($authorNo));
                }
                if ($resourcePlatformNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWithResourcePlatformNoAllRelationships($resourcePlatformNo));
                }
                if ($categoryGroupNo) {
                    $dataNumber = count(NewsListController::getAllOnlyNotDeletedWitCategoryNoAllRelationships($categoryGroupNo));
                }
                break;
            default:
                dd("HATA");
                break;
        }

        $TotalPageNumber = Pagination::TotalPageNumber($dataNumber, $itemPerPage);

        if ($page > $TotalPageNumber) {
            dd("HATA");
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
                return "HATA";
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
