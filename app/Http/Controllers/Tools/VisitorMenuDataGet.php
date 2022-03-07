<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Api\Categories\CategoriesListController;

class VisitorMenuDataGet extends Controller
{
    static function get()
    {
        $subCategoryType = ConstantsListController::getCategoryTypeSubOnlyNotDeleted();

        $data = [
            "category1" => CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted()),
            "category2" => CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted()),
            "category3" => CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted()),
            "category4" => CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted()),
            "category5" => CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted()),
            "category6" => CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted()),
            "category7" => CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted()),
            "category8" => CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted()),
        ];

        $data["category1Subs"] = CategoriesModel::where(["type" => $subCategoryType, "main_category" => $data["category1"]["no"]])->with("mainCategory")->get()->toArray();
        $data["category2Subs"] = CategoriesModel::where(["type" => $subCategoryType, "main_category" => $data["category2"]["no"]])->with("mainCategory")->get()->toArray();
        $data["category3Subs"] = CategoriesModel::where(["type" => $subCategoryType, "main_category" => $data["category3"]["no"]])->with("mainCategory")->get()->toArray();
        $data["category4Subs"] = CategoriesModel::where(["type" => $subCategoryType, "main_category" => $data["category4"]["no"]])->with("mainCategory")->get()->toArray();
        $data["category5Subs"] = CategoriesModel::where(["type" => $subCategoryType, "main_category" => $data["category5"]["no"]])->with("mainCategory")->get()->toArray();
        $data["category6Subs"] = CategoriesModel::where(["type" => $subCategoryType, "main_category" => $data["category6"]["no"]])->with("mainCategory")->get()->toArray();
        $data["category7Subs"] = CategoriesModel::where(["type" => $subCategoryType, "main_category" => $data["category7"]["no"]])->with("mainCategory")->get()->toArray();
        $data["category8Subs"] = CategoriesModel::where(["type" => $subCategoryType, "main_category" => $data["category8"]["no"]])->with("mainCategory")->get()->toArray();

        return $data;
    }
}
