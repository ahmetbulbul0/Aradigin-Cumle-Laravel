<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Api\Constants\ConstantsListController;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;

class CategoriesListController extends Controller
{
    static function getAllData() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::count() ? CategoriesModel::get() : NULL;
    }
    static function getAllDataAllRelationships() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::with("type", "mainCategory")->count() ? CategoriesModel::with("type", "mainCategory")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->count() ? CategoriesModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasWhereType($type)
    {
        return CategoriesModel::where(["is_deleted" => false, "type" => $type])->count() ? CategoriesModel::where(["is_deleted" => false, "type" => $type])->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasWhereMainCategoryWhereTypeSub($mainCategory)
    {
        return CategoriesModel::where(["is_deleted" => false, "type" => ConstantsListController::getCategoryTypeSubOnlyNotDeleted(), "main_category" => $mainCategory])->count() ? CategoriesModel::where(["is_deleted" => false, "type" => ConstantsListController::getCategoryTypeSubOnlyNotDeleted(), "main_category" => $mainCategory])->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationships() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("no", "DESC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("no", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("no", "ASC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("no", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescName() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("name", "DESC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("name", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscName() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("name", "ASC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("name", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescType() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("type", "DESC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("type", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscType() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("type", "ASC")->get()->toArray() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("type", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescMainCategory() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("main_category", "DESC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("main_category", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscMainCategory() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("main_category", "ASC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("main_category", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescLinkUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("link_url", "DESC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("link_url", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscLinkUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("link_url", "ASC")->count() ? CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->orderBy("link_url", "ASC")->get()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no)
    {
        return CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->with("type", "mainCategory")->count() ? CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->with("type", "mainCategory")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no)
    {
        return CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->count() ? CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereName($name)
    {
        return CategoriesModel::where(["is_deleted" => false, "name" => "$name"])->count() ? CategoriesModel::where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNameWhereNotNo($no, $name)
    {
        return CategoriesModel::where([["no", "!=", $no]])->where(["is_deleted" => false, "name" => "$name"])->count() ? CategoriesModel::where([["no", "!=", $no]])->where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
}
