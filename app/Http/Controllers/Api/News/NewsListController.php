<?php

namespace App\Http\Controllers\Api\News;

use App\Http\Controllers\Controller;
use App\Models\NewsModel;
use Illuminate\Http\Request;

class NewsListController extends Controller
{
    static function getAllData() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::count() ? NewsModel::get() : NULL;
    }
    static function getAllDataAllRelationships() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->count() ? NewsModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationships() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsWhereAuthor($author) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where(["is_deleted" => false, "author" => "$author"])->with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::where(["is_deleted" => false, "author" => "$author"])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourcePlatform($resourcePlatform) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where(["is_deleted" => false, "resource_platform" => "$resourcePlatform"])->with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::where(["is_deleted" => false, "resource_platform" => "$resourcePlatform"])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategory($category) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where(["is_deleted" => false, "category" => "$category"])->with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::where(["is_deleted" => false, "category" => "$category"])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourceUrl($resourceUrl) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where(["is_deleted" => false, "resource_url" => "$resourceUrl"])->with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::where(["is_deleted" => false, "resource_url" => "$resourceUrl"])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("no", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("no", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("no", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("no", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescContent() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("content", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("content", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscContent() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("content", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("content", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescAuthor() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("author", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("author", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscAuthor() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("author", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("author", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescCategory() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("category", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("category", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscCategory() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("category", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("category", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescResourcePlatform() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_platform", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_platform", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscResourcePlatform() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_platform", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_platform", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescResourceUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_url", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_url", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscResourceUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_url", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("resource_url", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescPublishDate() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescPublishDateLimit($limit) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "DESC")->limit($limit)->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "DESC")->limit($limit)->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscPublishDate() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescWriteTime() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("write_time", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("write_time", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscWriteTime() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("write_time", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("write_time", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescLinkUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("link_url", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("link_url", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscLinkUrl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("link_url", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("link_url", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescReading() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "DESC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescReadingLimit($limit) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "DESC")->limit($limit)->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "DESC")->limit($limit)->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscReading() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "ASC")->count() ? NewsModel::where("is_deleted", false)->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescPublishDateLimit($category, $limit)
    {
        return NewsModel::where(["is_deleted" => false, "category" => $category])->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "DESC")->limit($limit)->count() ? NewsModel::where(["is_deleted" => false, "category" => $category])->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("publish_date", "DESC")->limit($limit)->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByDescReadingLimit($category, $limit)
    {
        return NewsModel::where(["is_deleted" => false, "category" => $category])->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "DESC")->limit($limit)->count() ? NewsModel::where(["is_deleted" => false, "category" => $category])->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "DESC")->limit($limit)->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsWhereCategoryOrderByAscReadingLimit($category, $limit)
    {
        return NewsModel::where(["is_deleted" => false, "category" => $category])->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "ASC")->limit($limit)->count() ? NewsModel::where(["is_deleted" => false, "category" => $category])->with("author", "category", "resourcePlatform", "resourceUrl")->orderBy("reading", "ASC")->limit($limit)->get()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where(["is_deleted" => false, "no" => "$no"])->with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::where(["is_deleted" => false, "no" => "$no"])->with("author", "category", "resourcePlatform", "resourceUrl")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereContent($content) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where(["is_deleted" => false, "content" => "$content"])->with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::where(["is_deleted" => false, "content" => "$content"])->with("author", "category", "resourcePlatform", "resourceUrl")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereContentWhereNotNo($no, $content) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return NewsModel::where([["no", "!=", $no]])->where(["is_deleted" => false, "content" => "$content"])->with("author", "category", "resourcePlatform", "resourceUrl")->count() ? NewsModel::where([["no", "!=", $no]])->where(["is_deleted" => false, "content" => "$content"])->with("author", "category", "resourcePlatform", "resourceUrl")->first()->toArray() : NULL;
    }
}
