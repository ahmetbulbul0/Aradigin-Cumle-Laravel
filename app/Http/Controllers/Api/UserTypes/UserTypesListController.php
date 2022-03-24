<?php

namespace App\Http\Controllers\Api\UserTypes;

use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;

class UserTypesListController extends Controller
{
    static function getAllData() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return UserTypesModel::count() ? UserTypesModel::get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return UserTypesModel::where("is_deleted", false)->count() ? UserTypesModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByDescNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return UserTypesModel::where("is_deleted", false)->orderBy("no", "DESC")->count() ? UserTypesModel::where("is_deleted", false)->orderBy("no", "DESC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByAscNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return UserTypesModel::where("is_deleted", false)->orderBy("no", "ASC")->count() ? UserTypesModel::where("is_deleted", false)->orderBy("no", "ASC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByDescName() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return UserTypesModel::where("is_deleted", false)->orderBy("name", "DESC")->count() ? UserTypesModel::where("is_deleted", false)->orderBy("name", "DESC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByAscName() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return UserTypesModel::where("is_deleted", false)->orderBy("name", "ASC")->count() ? UserTypesModel::where("is_deleted", false)->orderBy("name", "ASC")->get() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return UserTypesModel::where(["is_deleted" => false, "no" => "$no"])->count() ? UserTypesModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereName($name) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return UserTypesModel::where(["is_deleted" => false, "name" => "$name"])->count() ? UserTypesModel::where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
}
