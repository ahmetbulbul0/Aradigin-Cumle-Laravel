<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Api\Constants\ConstantsListController;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;

class CategoriesListController extends Controller
{
    static function getAll()
    {
        return CategoriesModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return CategoriesModel::where("is_deleted", false)->get();
    }
    static function getAllOnlyNotDeletedAllRelationShips()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->get()->toArray() : NULL;
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescNo()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("no", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscNo()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("no", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescName()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("name", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscName()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("name", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescType()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("type", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscType()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("type", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescMainCategory()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("main_category", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscMainCategory()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("main_category", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescLinkUrl()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("link_url", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscLinkUrl()
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("link_url", "ASC")->get()->toArray();
    }
    static function getFirstDataWithNoOnlyNotDeletedAllRelationShips($no)
    {
        return CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->with("type", "mainCategory")->first()->toArray();
    }
    static function getFirstDataWithNoOnlyNotDeleted($no)
    {
        return CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->first() ? CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataWithNameOnlyNotDeleted($name)
    {
        return CategoriesModel::where(["is_deleted" => false, "name" => "$name"])->first() ? CategoriesModel::where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
    static function getAllOnlyNotDeletedWithCategoryType($categoryType)
    {
        return CategoriesModel::where(["is_deleted" => false, "type" => $categoryType])->count() ? CategoriesModel::where(["is_deleted" => false, "type" => $categoryType])->get() : NULL;
    }
    static function getAllOnlyNotDeletedWithMainCategoryTypeSub($mainCategory)
    {
        return CategoriesModel::where(["is_deleted" => false, "type" => ConstantsListController::getCategoryTypeSubOnlyNotDeleted(), "main_category" => $mainCategory])->count() ? CategoriesModel::where(["is_deleted" => false, "type" => ConstantsListController::getCategoryTypeSubOnlyNotDeleted(), "main_category" => $mainCategory])->get() : NULL;
    }
}
