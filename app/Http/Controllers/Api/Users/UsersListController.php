<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Http\Request;

class UsersListController extends Controller
{
    static function getAll()
    {
        return UsersModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return UsersModel::where("is_deleted", false)->get();
    }
    static function getAllOnlyNotDeletedAllRelationships()
    {
        return UsersModel::where("is_deleted", false)->with("type")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescNo()
    {
        return UsersModel::where("is_deleted", false)->with("type")->orderBy("no", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscNo()
    {
        return UsersModel::where("is_deleted", false)->with("type")->orderBy("no", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescFullName()
    {
        return UsersModel::where("is_deleted", false)->with("type")->orderBy("full_name", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscFullName()
    {
        return UsersModel::where("is_deleted", false)->with("type")->orderBy("full_name", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescUsername()
    {
        return UsersModel::where("is_deleted", false)->with("type")->orderBy("username", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscUsername()
    {
        return UsersModel::where("is_deleted", false)->with("type")->orderBy("username", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscType()
    {
        return UsersModel::where("is_deleted", false)->with("type")->orderBy("type", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescType()
    {
        return UsersModel::where("is_deleted", false)->with("type")->orderBy("type", "DESC")->get()->toArray();
    }
}
