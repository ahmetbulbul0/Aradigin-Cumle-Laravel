<?php

namespace App\Http\Controllers\Api\Categories;

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
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->get()->toArray();
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
        return CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->first();
    }
}
