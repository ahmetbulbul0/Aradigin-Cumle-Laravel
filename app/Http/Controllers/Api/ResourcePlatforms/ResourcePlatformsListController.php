<?php

namespace App\Http\Controllers\Api\ResourcePlatforms;

use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;

class ResourcePlatformsListController extends Controller
{
    static function getAllData() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::count() ? ResourcePlatformsModel::get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->count() ? ResourcePlatformsModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByDescNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("no", "DESC")->count() ? ResourcePlatformsModel::where("is_deleted", false)->orderBy("no", "DESC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByAscNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("no", "ASC")->count() ? ResourcePlatformsModel::where("is_deleted", false)->orderBy("no", "ASC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByDescName() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("name", "DESC")->count() ? ResourcePlatformsModel::where("is_deleted", false)->orderBy("name", "DESC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByAscName() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("name", "ASC")->count() ? ResourcePlatformsModel::where("is_deleted", false)->orderBy("name", "ASC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByDescMainUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("main_url", "DESC")->count() ? ResourcePlatformsModel::where("is_deleted", false)->orderBy("main_url", "DESC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByAscMainUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("main_url", "ASC")->count() ? ResourcePlatformsModel::where("is_deleted", false)->orderBy("main_url", "ASC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByDescLinkUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("link_url", "DESC")->count() ? ResourcePlatformsModel::where("is_deleted", false)->orderBy("link_url", "DESC")->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrderByAscLinkUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("link_url", "ASC")->count() ? ResourcePlatformsModel::where("is_deleted", false)->orderBy("link_url", "ASC")->get() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where(["is_deleted" => false, "no" => "$no"])->count() ? ResourcePlatformsModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereName($name) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where(["is_deleted" => false, "name" => "$name"])->count() ? ResourcePlatformsModel::where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNameWhereNotNo($no, $name) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where([["no", "!=", $no]])->where(["is_deleted" => false, "name" => "$name"])->count() ? ResourcePlatformsModel::where([["no", "!=", $no]])->where(["is_deleted" => false, "name" => "$name"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereMainUrl($mainUrl) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where(["is_deleted" => false, "main_url" => "$mainUrl"])->count() ? ResourcePlatformsModel::where(["is_deleted" => false, "main_url" => "$mainUrl"])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereMainUrlWhereNotNo($no, $mainUrl) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return ResourcePlatformsModel::where([["no", "!=", $no]])->where(["is_deleted" => false, "main_url" => "$mainUrl"])->count() ? ResourcePlatformsModel::where([["no", "!=", $no]])->where(["is_deleted" => false, "main_url" => "$mainUrl"])->first() : NULL;
    }
}
