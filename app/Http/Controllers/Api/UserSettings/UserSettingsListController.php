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
}
