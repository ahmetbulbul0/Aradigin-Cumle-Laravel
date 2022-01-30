<?php

namespace App\Http\Controllers\Api\ResourcePlatforms;

use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use Illuminate\Http\Request;

class ResourcePlatformsListController extends Controller
{
    static function getAll()
    {
        return ResourcePlatformsModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->get();
    }
    static function getAllOnlyNotDeletedOrderByDescNo()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("no", "DESC")->get();
    }
    static function getAllOnlyNotDeletedOrderByAscNo()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("no", "ASC")->get();
    }
    static function getAllOnlyNotDeletedOrderByDescName()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("name", "DESC")->get();
    }
    static function getAllOnlyNotDeletedOrderByAscName()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("name", "ASC")->get();
    }
    static function getAllOnlyNotDeletedOrderByAscWebsiteLink()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("main_url", "ASC")->get();
    }
    static function getAllOnlyNotDeletedOrderByDescWebsiteLink()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("main_url", "DESC")->get();
    }
    static function getAllOnlyNotDeletedOrderByAscLinkUrl()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("link_url", "ASC")->get();
    }
    static function getAllOnlyNotDeletedOrderByDescLinkUrl()
    {
        return ResourcePlatformsModel::where("is_deleted", false)->orderBy("link_url", "DESC")->get();
    }
}
