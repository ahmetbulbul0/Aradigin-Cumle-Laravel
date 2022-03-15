<?php

namespace App\Http\Controllers\Api\UserSettings;

use App\Http\Controllers\Controller;
use App\Models\UsersSettingsModel;
use Illuminate\Http\Request;

class UserSettingsListController extends Controller
{
    static function getAll()
    {
        return UsersSettingsModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return UsersSettingsModel::where("is_deleted", false)->get();
    }
    static function getAllOnlyNotDeletedAllRelationships()
    {
        return UsersSettingsModel::where("is_deleted", false)->with("userNo")->get()->toArray();
    }
    static function getFirstDataWithNoOnlyNotDeletedAllRelationships($no)
    {
        return UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->with("userNo")->first() ? UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->with("userNo")->first()->toArray() : NULL;
    }
    static function getFirstDataWithUserNoOnlyNotDeletedAllRelationships($userNo)
    {
        return UsersSettingsModel::where(["is_deleted" => false, "user_no" => "$userNo"])->with("userNo")->first() ? UsersSettingsModel::where(["is_deleted" => false, "user_no" => "$userNo"])->with("userNo")->first()->toArray() : NULL;
    }
    static function getFirstDataWithNoOnlyNotDelete($no)
    {
        return UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->first() ? UsersSettingsModel::where(["is_deleted" => false, "no" => "$no"])->first(): NULL;
    }




    static function getFirstDataWithUserNoOnlyNotDeleted($userNo)
    {
        return UsersSettingsModel::where(["is_deleted" => false, "user_no" => "$userNo"])->first() ? UsersSettingsModel::where(["is_deleted" => false, "user_no" => "$userNo"])->first() : NULL;
    }
}
