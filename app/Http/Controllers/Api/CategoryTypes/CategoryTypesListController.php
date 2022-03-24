<?php

namespace App\Http\Controllers\Api\CategoryTypes;

use App\Http\Controllers\Controller;
use App\Models\CategoryTypesModel;
use Illuminate\Http\Request;

class CategoryTypesListController extends Controller
{
    static function getAllData() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA 
    {
        return CategoryTypesModel::count() ? CategoryTypesModel::get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA 
    {
        return CategoryTypesModel::where("is_deleted", false)->count() ? CategoryTypesModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByDescNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA 
    {
        return CategoryTypesModel::where("is_deleted", false)->orderBy("no", "DESC")->count() ? CategoryTypesModel::where("is_deleted", false)->orderBy("no", "DESC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByAscNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA 
    {
        return CategoryTypesModel::where("is_deleted", false)->orderBy("no", "ASC")->count() ? CategoryTypesModel::where("is_deleted", false)->orderBy("no", "ASC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByDescName() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA 
    {
        return CategoryTypesModel::where("is_deleted", false)->orderBy("name", "DESC")->count() ? CategoryTypesModel::where("is_deleted", false)->orderBy("name", "DESC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByAscName() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA 
    {
        return CategoryTypesModel::where("is_deleted", false)->orderBy("name", "ASC")->count() ? CategoryTypesModel::where("is_deleted", false)->orderBy("name", "ASC")->get() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryTypesModel::where(["is_deleted" => false, "no" => "$no"])->count() ? CategoryTypesModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereName($name) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryTypesModel::where(["is_deleted" => false, "name" => "$name"])->count() ? CategoryTypesModel::where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
}
