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
}
