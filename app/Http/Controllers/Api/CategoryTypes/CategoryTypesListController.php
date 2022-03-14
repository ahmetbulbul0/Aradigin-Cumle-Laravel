<?php

namespace App\Http\Controllers\Api\CategoryTypes;

use App\Http\Controllers\Controller;
use App\Models\CategoryTypesModel;
use Illuminate\Http\Request;

class CategoryTypesListController extends Controller
{
    static function getAll()
    {
        return CategoryTypesModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return CategoryTypesModel::where("is_deleted", false)->count() ? CategoryTypesModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllOnlyNotDeletedOrderByDescNo()
    {
        return CategoryTypesModel::where("is_deleted", false)->orderBy("no", "DESC")->get();
    }
    static function getAllOnlyNotDeletedOrderByAscNo()
    {
        return CategoryTypesModel::where("is_deleted", false)->orderBy("no", "ASC")->get();
    }
    static function getAllOnlyNotDeletedOrderByDescName()
    {
        return CategoryTypesModel::where("is_deleted", false)->orderBy("name", "DESC")->get();
    }
    static function getAllOnlyNotDeletedOrderByAscName()
    {
        return CategoryTypesModel::where("is_deleted", false)->orderBy("name", "ASC")->get();
    }
    static function getFirstDataWithNoOnlyNotDeleted($no)
    {
        return CategoryTypesModel::where(["is_deleted" => false, "no" => "$no"])->first() ? CategoryTypesModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataWithNameOnlyNotDeleted($name)
    {
        return CategoryTypesModel::where(["is_deleted" => false, "name" => "$name"])->first() ? CategoryTypesModel::where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
}
