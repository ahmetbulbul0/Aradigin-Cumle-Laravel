<?php

namespace App\Http\Controllers\Api\ResourceUrls;

use App\Http\Controllers\Controller;
use App\Models\ResourceUrlsModel;
use Illuminate\Http\Request;

class ResourceUrlsListController extends Controller
{
    static function getAll()
    {
        return ResourceUrlsModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return ResourceUrlsModel::where("is_deleted", false)->get();
    }
    static function getAllOnlyNotDeletedAllRelationships()
    {
        return ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->get()->toArray();
    }
    static function getFirstDataWithNoOnlyNotDeleted($no)
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->first() ? ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->first() : NULL;
    }
    static function getFirstDataWithNoOnlyNotDeletedAllRelationships($no)
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->with("newsNo", "resourcePlatform")->first()->toArray();
    }
    static function getAllWithResourcePlatformOnlyNotDeletedAllRelationships($resourcePlatform)
    {
        return ResourceUrlsModel::where(["is_deleted" => false, "resource_platform" => $resourcePlatform])->count() ? ResourceUrlsModel::where(["is_deleted" => false, "resource_platform" => $resourcePlatform])->get() : NULL;
    }
}
