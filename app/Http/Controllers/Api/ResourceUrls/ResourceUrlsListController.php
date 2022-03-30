<?php

namespace App\Http\Controllers\Api\ResourceUrls;

use App\Http\Controllers\Controller;
use App\Models\ResourceUrlsModel;
use Illuminate\Http\Request;

class ResourceUrlsListController extends Controller
{
    static function getAllData() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::count() ? ResourceUrlsModel::get() : NULL;
    }
    static function getAllDataAllRelationships() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::with("newsNo", "resourcePlatform")->count() ? ResourceUrlsModel::with("newsNo", "resourcePlatform")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::where("is_deleted", false)->count() ? ResourceUrlsModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationships() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasWhereResourcePlatform($resourcePlatform) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "resource_platform" => $resourcePlatform])->count() ? ResourceUrlsModel::where(["is_deleted" => false, "resource_platform" => $resourcePlatform])->get() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->count() ? ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->with("newsNo", "resourcePlatform")->count() ? ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->with("newsNo", "resourcePlatform")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereResourcePlatform($resourcePlatform) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "resource_platform" => $resourcePlatform])->count() ? ResourceUrlsModel::where(["is_deleted" => false, "resource_platform" => $resourcePlatform])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereUrl($url) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "url" => $url])->count() ? ResourceUrlsModel::where(["is_deleted" => false, "url" => $url])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNewsNo($newsNo) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "news_no" => "$newsNo"])->count() ? ResourceUrlsModel::where(["is_deleted" => false, "news_no" => "$newsNo"])->first() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("no", "ASC")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("no", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("no", "DESC")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("no", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNews()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("news_no", "ASC")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("news_no", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNews()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("news_no", "DESC")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("news_no", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscResourcePlatform()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("resource_platform", "ASC")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("resource_platform", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescResourcePlatform()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("resource_platform", "DESC")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("resource_platform", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscUrl()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("url", "ASC")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("url", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescUrl()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("url", "DESC")->count() ? ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->orderBy("url", "DESC")->get()->toArray() : NULL;
    }
}
