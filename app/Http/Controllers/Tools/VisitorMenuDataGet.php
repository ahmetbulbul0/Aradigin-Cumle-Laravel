<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Support\Str;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;

class VisitorMenuDataGet extends Controller
{
    static function get()
    {
        $data = [
            "category1" => CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted()),
            "category2" => CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted()),
            "category3" => CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted()),
            "category4" => CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted()),
            "category5" => CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted()),
            "category6" => CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted()),
            "category7" => CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted()),
            "category8" => CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted()),
        ];

        $data["category1"] = CategoryGroupToText::categoryGroup($data["category1"]);
        $data["category2"] = CategoryGroupToText::categoryGroup($data["category2"]);
        $data["category3"] = CategoryGroupToText::categoryGroup($data["category3"]);
        $data["category4"] = CategoryGroupToText::categoryGroup($data["category4"]);
        $data["category5"] = CategoryGroupToText::categoryGroup($data["category5"]);
        $data["category6"] = CategoryGroupToText::categoryGroup($data["category6"]);
        $data["category7"] = CategoryGroupToText::categoryGroup($data["category7"]);
        $data["category8"] = CategoryGroupToText::categoryGroup($data["category8"]);

        $data["category1"]["text"] = Str::title($data["category1"]["text"]);
        $data["category2"]["text"] = Str::title($data["category2"]["text"]);
        $data["category3"]["text"] = Str::title($data["category3"]["text"]);
        $data["category4"]["text"] = Str::title($data["category4"]["text"]);
        $data["category5"]["text"] = Str::title($data["category5"]["text"]);
        $data["category6"]["text"] = Str::title($data["category6"]["text"]);
        $data["category7"]["text"] = Str::title($data["category7"]["text"]);
        $data["category8"]["text"] = Str::title($data["category8"]["text"]);

        $data["category1SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category1"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("main", "sub1", "linkUrl")->get()->toArray();
        $data["category2SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category2"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("main", "sub1", "linkUrl")->get()->toArray();
        $data["category3SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category3"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("main", "sub1", "linkUrl")->get()->toArray();
        $data["category4SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category4"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("main", "sub1", "linkUrl")->get()->toArray();
        $data["category5SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category5"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("main", "sub1", "linkUrl")->get()->toArray();
        $data["category6SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category6"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("main", "sub1", "linkUrl")->get()->toArray();
        $data["category7SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category7"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("main", "sub1", "linkUrl")->get()->toArray();
        $data["category8SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category8"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("main", "sub1", "linkUrl")->get()->toArray();

        return $data;
    }
}
