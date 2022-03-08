<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Models\NewsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Pagination;
use App\Http\Controllers\Tools\VisitorMenuDataGet;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;

class HomePageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "AnaSayfa";
        $data["menu"] = VisitorMenuDataGet::get();
        $data["smallList2One"] = $this->Small2ListOne();
        $data["middle2List"] = $this->Middle2List();
        $data["bigList"] = $this->BigList();
        $data["pagination"] = $this->GetData($data["bigList"]["data"], 1, 5);
        $data["bigList"]["data"] = $data["pagination"]["data"];
        $data["pagination"] = $data["pagination"]["pagination"];
        $data["bigList"] = CategoryGroupToText::multiple($data["bigList"]);
        $data["bigList"]["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["bigList"]["data"]);

        return view("visitor.pages.home")->with("data", $data);
    }
    public function Small2ListOne()
    {
        $data = [
            [
                "listTitle" => "Son Yayınlananlar",
                "data" => NewsListController::getAllOnlyNotDeletedAllRelationshipsOrderByDescPublishDateMaxLimit(5),
                "allListLink" => route("haberler_listesi", "son-yayinlananlar")
            ],
            [
                "listTitle" => "Çok Okunanlar",
                "data" => NewsListController::getAllOnlyNotDeletedAllRelationshipsOrderByDescReadingMaxLimit(5),
                "allListLink" => route("haberler_listesi", "cok-okunanlar")
            ]
        ];

        return $data;
    }
    public function Middle2List()
    {
        $data = [
            [
                "listTitle" => "Futbol",
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllOnlyNotDeletedWithCategoryNoAllRelationshipsOrderByDescPublishDateMaxLimit(925923, 5)),
                "allListLink" => route("haberler_listesi_kategori", ["spor-futbol", "son-yayinlananlar"])
            ],
            [
                "listTitle" => "Oyun",
                "data" => UnixTimeToTextDateController::MultipleTimeToDate(NewsListController::getAllOnlyNotDeletedWithCategoryNoAllRelationshipsOrderByDescPublishDateMaxLimit(406718, 5)),
                "allListLink" => route("haberler_listesi_kategori", ["oyun", "son-yayinlananlar"])
            ]
        ];

        return $data;
    }
    public function BigList()
    {
        $data = [
            "listTitle" => "Son Yayınlananlar",
            "data" => NewsListController::getAllOnlyNotDeletedAllRelationshipsOrderByDescPublishDate(),
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
            dd("HATA");
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
