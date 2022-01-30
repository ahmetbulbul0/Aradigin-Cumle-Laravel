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
        return CategoryTypesModel::where("is_deleted", false)->get();
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
}
