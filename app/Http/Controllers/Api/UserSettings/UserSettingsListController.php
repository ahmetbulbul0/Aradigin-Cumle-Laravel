<?php

namespace App\Http\Controllers\Api\UserSettings;

use App\Http\Controllers\Controller;
use App\Models\UsersSettingsModel;
use Illuminate\Http\Request;

class UserSettingsListController extends Controller
{
    static function getAllData()
    {
        return UsersSettingsModel::count() ? UsersSettingsModel::get() : NULL;
    }
    static function getAllDataAllRelationships()
    {
        return UsersSettingsModel::where("is_deleted", false)->with("userNo")->count() ? UsersSettingsModel::where("is_deleted", false)->with("userNo")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas()
    {
        return UsersSettingsModel::where("is_deleted", false)->count() ? UsersSettingsModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationships()
    {
        return UsersSettingsModel::where("is_deleted", false)->with("userNo")->count() ? UsersSettingsModel::where("is_deleted", false)->with("userNo")->get()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no)
    {
        return UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->with("userNo")->count() ? UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->with("userNo")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereUserNo($userNo)
    {
        return UsersSettingsModel::where(["is_deleted" => false, "user_no" => "$userNo"])->with("userNo")->count() ? UsersSettingsModel::where(["is_deleted" => false, "user_no" => "$userNo"])->with("userNo")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no)
    {
        return UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->count() ? UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->first(): NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereUserNo($userNo)
    {
        return UsersSettingsModel::where(["is_deleted" => false, "user_no" => "$userNo"])->count() ? UsersSettingsModel::where(["is_deleted" => false, "user_no" => "$userNo"])->first() : NULL;
    }
}
