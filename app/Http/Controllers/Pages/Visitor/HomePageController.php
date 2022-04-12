<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Models\NewsModel;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Pagination;
use App\Http\Controllers\Tools\VisitorMenuDataGet;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Tools\VisitorFooterDataGet;

class HomePageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "AnaSayfa";

        $data["menu"] = VisitorMenuDataGet::get();
        $data["footer"] = VisitorFooterDataGet::get();
        $data["smallList2One"] = $this->Small2ListOne();
        $data["middle2List"] = $this->Middle2List();
        $data["bigList"] = $this->BigList();

        if ($data["bigList"][0]["data"]) {
            $data["pagination"] = $this->GetData($data["bigList"][0]["data"], 1, 25);
            $data["bigList"]["data"] = $data["pagination"]["data"];
            $data["pagination"] = $data["pagination"]["pagination"];
            $data["bigList"] = CategoryGroupToText::multiple($data["bigList"]);
            $data["bigList"][0]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["bigList"]["data"]);
        }

        return view("visitor.pages.home")->with("data", $data);
    }
    public function Small2ListOne()
    {
        $data[] = [
            [
                "listTitle" => "Son Yayınlananlar",
                "data" => NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescPublishDateLimit(5),
                "allListLink" => route("haberler_listesi", "son-yayinlananlar")
            ],
            [
                "listTitle" => "Çok Okunanlar",
                "data" => NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescReadingLimit(5),
                "allListLink" => route("haberler_listesi", "cok-okunanlar")
            ]
        ];

        return $data;
    }
    public function Middle2List()
    {
        $constantCategory1Data = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted());
        $constantCategory2Data = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted());
        $data[] = [
            [
                "listTitle" => Str::title($constantCategory1Data["main"]["name"]),
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($constantCategory1Data["no"], 5)),
                "allListLink" => route("haberler_listesi_kategori", [$constantCategory1Data["link_url"]["link_url"], "son-yayinlananlar"])
            ],
            [
                "listTitle" => Str::title($constantCategory2Data["main"]["name"]),
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($constantCategory2Data["no"], 5)),
                "allListLink" => route("haberler_listesi_kategori", [$constantCategory2Data["link_url"]["link_url"], "son-yayinlananlar"])
            ]
        ];
        $constantCategory3Data = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted());
        $constantCategory4Data = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted());
        $data[] = [
            [
                "listTitle" => Str::title($constantCategory3Data["main"]["name"]),
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($constantCategory3Data["no"], 5)),
                "allListLink" => route("haberler_listesi_kategori", [$constantCategory3Data["link_url"]["link_url"], "son-yayinlananlar"])
            ],
            [
                "listTitle" => Str::title($constantCategory4Data["main"]["name"]),
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($constantCategory4Data["no"], 5)),
                "allListLink" => route("haberler_listesi_kategori", [$constantCategory4Data["link_url"]["link_url"], "son-yayinlananlar"])
            ]
        ];
        $constantCategory5Data = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted());
        $constantCategory6Data = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted());
        $data[] = [
            [
                "listTitle" => Str::title($constantCategory5Data["main"]["name"]),
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($constantCategory5Data["no"], 5)),
                "allListLink" => route("haberler_listesi_kategori", [$constantCategory5Data["link_url"]["link_url"], "son-yayinlananlar"])
            ],
            [
                "listTitle" => Str::title($constantCategory6Data["main"]["name"]),
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($constantCategory6Data["no"], 5)),
                "allListLink" => route("haberler_listesi_kategori", [$constantCategory6Data["link_url"]["link_url"], "son-yayinlananlar"])
            ]
        ];
        $constantCategory7Data = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted());
        $constantCategory8Data = CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted());
        $data[] = [
            [
                "listTitle" => Str::title($constantCategory7Data["main"]["name"]),
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($constantCategory7Data["no"], 5)),
                "allListLink" => route("haberler_listesi_kategori", [$constantCategory7Data["link_url"]["link_url"], "son-yayinlananlar"])
            ],
            [
                "listTitle" => Str::title($constantCategory8Data["main"]["name"]),
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($constantCategory8Data["no"], 5)),
                "allListLink" => route("haberler_listesi_kategori", [$constantCategory8Data["link_url"]["link_url"], "son-yayinlananlar"])
            ]
        ];

        return $data;
    }
    public function BigList()
    {
        $data[] = [
            "listTitle" => "Son Yayınlananlar",
            "data" => NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescPublishDate(),
            "allListLink" => route("haberler_listesi", ["son-yayinlananlar"]),
            "listType" => "son-yayinlananlar"
        ];

        return $data;
    }
    public function GetData($data, $page, $itemPerPage)
    {
        $dataNumber = count($data);

        $TotalPageNumber = Pagination::TotalPageNumber($dataNumber, $itemPerPage);

        if ($page > $TotalPageNumber) {
            return response()->view('errors.404');
        }

        $offsetValue = ($page * $itemPerPage) - $itemPerPage;

        $data["data"] = new NewsModel;
        $data["data"] = $data["data"]->where("is_deleted", false);
        $data["data"] = $data["data"]->with("author", "category", "resourcePlatform", "resourceUrl");
        $data["data"] = $data["data"]->orderBy("publish_date", "DESC");
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

        $data["pagination"]["mainLink"] = route("haberler_listesi", ["son-yayinlananlar"]);

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
