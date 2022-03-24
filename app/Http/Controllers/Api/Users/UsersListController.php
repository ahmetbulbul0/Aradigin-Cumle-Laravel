<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Http\Request;

class UsersListController extends Controller
{
    static function getAllData()
    {
        return UsersModel::count() ? UsersModel::get() : NULL;
    }
    static function getAllDataAllRelationships()
    {
        return UsersModel::with("type", "settings")->count() ? UsersModel::with("type", "settings")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas()
    {
        return UsersModel::where("is_deleted", false)->count() ? UsersModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationships()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("no", "DESC")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("no", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("no", "ASC")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("no", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescFullName()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("full_name", "DESC")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("full_name", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscFullName()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("full_name", "ASC")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("full_name", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescUsername()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("username", "DESC")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("username", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscUsername()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("username", "ASC")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("username", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescType()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("type", "DESC")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("type", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscType()
    {
        return UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("type", "ASC")->count() ? UsersModel::where("is_deleted", false)->with("type", "settings")->orderBy("type", "ASC")->get()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no)
    {
        return UsersModel::where(["is_deleted" => false, "no" => "$no"])->count() ? UsersModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereWhereNoWhereTypeAuthor($no)
    {
        return UsersModel::where(["is_deleted" => false, "type" =>  ConstantsListController::getUserTypeAuthorOnlyNotDeleted(), "no" => "$no"])->count() ? UsersModel::where(["is_deleted" => false, "type" =>  ConstantsListController::getUserTypeAuthorOnlyNotDeleted(), "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no)
    {
        return UsersModel::where(["is_deleted" => false, "no" => "$no"])->with("type", "settings")->count() ? UsersModel::where(["is_deleted" => false, "no" => "$no"])->with("type", "settings")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereUsername($username)
    {
        return UsersModel::where(["is_deleted" => false, "username" => "$username"])->with("type", "settings")->count() ? UsersModel::where(["is_deleted" => false, "username" => "$username"])->with("type", "settings")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereTypeSystem()
    {
        return UsersModel::where(["is_deleted" => false, "type" => ConstantsListController::getUserTypeSystemOnlyNotDeleted()])->with("type", "settings")->count() ? UsersModel::where(["is_deleted" => false, "type" => ConstantsListController::getUserTypeSystemOnlyNotDeleted()])->with("type", "settings")->first()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasWhereType($type)
    {
        return UsersModel::where(["is_deleted" => false, "type" => $type])->count() ? UsersModel::where(["is_deleted" => false, "type" => $type])->get() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereSettings($settings)
    {
        return UsersModel::where(["is_deleted" => false, "settings" => $settings])->count() ? UsersModel::where(["is_deleted" => false, "settings" => $settings])->first() : NULL;
    }
}
