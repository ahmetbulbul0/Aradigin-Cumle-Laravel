<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Models\CategoryGroupsModel;

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

        $data["category1SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category1"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("sub1", "linkUrl")->get()->toArray();
        $data["category2SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category2"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("sub1", "linkUrl")->get()->toArray();
        $data["category3SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category3"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("sub1", "linkUrl")->get()->toArray();
        $data["category4SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category4"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("sub1", "linkUrl")->get()->toArray();
        $data["category5SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category5"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("sub1", "linkUrl")->get()->toArray();
        $data["category6SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category6"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("sub1", "linkUrl")->get()->toArray();
        $data["category7SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category7"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("sub1", "linkUrl")->get()->toArray();
        $data["category8SubGroups"] = CategoryGroupsModel::where(["is_deleted" => false, "main" => $data["category8"]["main"]["no"]])->where('sub1', '!=', null)->where('sub2', null)->where('sub3', null)->where('sub4', null)->where('sub5', null)->with("sub1", "linkUrl")->get()->toArray();

        return $data;
    }
}
