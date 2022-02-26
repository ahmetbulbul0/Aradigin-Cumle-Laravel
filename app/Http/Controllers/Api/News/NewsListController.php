<?php

namespace App\Http\Controllers\Api\News;

use App\Http\Controllers\Controller;
use App\Models\NewsModel;
use Illuminate\Http\Request;

class NewsListController extends Controller
{
    static function getAll()
    {
        return NewsModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return NewsModel::where("is_deleted", false)->get();
    }
    static function getAllOnlyNotDeletedAllRelationships()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescNo()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("no", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscNo()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("no", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescContent()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("content", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscContent()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("content", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescAuthor()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("author", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscAuthor()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("author", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescCategory()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("category", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscCategory()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("category", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescResourcePlatform()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_platform", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscResourcePlatform()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_platform", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescResourceUrl()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_url", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscResourceUrl()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_url", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescPublishDate()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscPublishDate()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescWriteTime()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("write_time", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscWriteTime()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("write_time", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByDescLinkUrl()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("link_url", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationshipsOrderByAscLinkUrl()
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("link_url", "ASC")->get()->toArray();
    }
    static function getFirstDataWithNoOnlyNotDeletedAllRelationShips($no)
    {
        return NewsModel::where(["is_deleted" => false, "no" => "$no"])->with("author", "category", "resourcePlatform", "resourceUrl")->first()->toArray();
    }
    static function getAllOnlyNotDeletedWithAuthorNoAllRelationships($no)
    {
        return NewsModel::where(["is_deleted" => false, "author" => "$no"])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();
    }
}

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    