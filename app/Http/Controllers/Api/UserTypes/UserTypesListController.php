<?php

namespace App\Http\Controllers\Api\UserTypes;

use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;

class UserTypesListController extends Controller
{
    static function getAll()
    {
        return UserTypesModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return UserTypesModel::where("is_deleted", false)->count() ? UserTypesModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllOnlyNotDeletedOrderByDescNo()
    {
        return UserTypesModel::where("is_deleted", false)->orderBy("no", "DESC")->get();
    }
    static function getAllOnlyNotDeletedOrderByAscNo()
    {
        return UserTypesModel::where("is_deleted", false)->orderBy("no", "ASC")->get();
    }
    static function getAllOnlyNotDeletedOrderByDescName()
    {
        return UserTypesModel::where("is_deleted", false)->orderBy("name", "DESC")->get();
    }
    static function getAllOnlyNotDeletedOrderByAscName()
    {
        return UserTypesModel::where("is_deleted", false)->orderBy("name", "ASC")->get();
    }
    static function getFirstDataWithNoOnlyNotDeleted($no)
    {
        return UserTypesModel::where(["is_deleted" => false, "no" => "$no"])->first() ? UserTypesModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataWithNameOnlyNotDeleted($name)
    {
        return UserTypesModel::where(["is_deleted" => false, "name" => "$name"])->first() ? UserTypesModel::where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
}
