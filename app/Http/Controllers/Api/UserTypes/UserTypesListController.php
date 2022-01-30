<?php

namespace App\Http\Controllers;

use App\Models\UserTypesModel;

class UserTypesListController extends Controller
{
    static function getAll()
    {
        return UserTypesModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return UserTypesModel::where("is_deleted", false)->get();
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
}
