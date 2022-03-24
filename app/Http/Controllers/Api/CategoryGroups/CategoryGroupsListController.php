<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroupsModel;
use Illuminate\Http\Request;

class CategoryGroupsListController extends Controller
{
    static function getAllData() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::count() ? CategoryGroupsModel::get() : NULL;
    }
    static function getAllDataAllRelationships() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->count() ? CategoryGroupsModel::with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->count() ? CategoryGroupsModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationships() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("no", "DESC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("no", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("no", "ASC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("no", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescMain() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("main", "DESC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("main", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscMain() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("main", "ASC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("main", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub1() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub1", "DESC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub1", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub1() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub1", "ASC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub1", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub2() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub2", "DESC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub2", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub2() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub2", "ASC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub2", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub3() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub3", "DESC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub3", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub3() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub3", "ASC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub3", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub4() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub4", "DESC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub4", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub4() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub4", "ASC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub4", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub5() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub5", "DESC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub5", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub5() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub5", "ASC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub5", "ASC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescLinkurl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("link_url", "DESC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("link_url", "DESC")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscLinkurl() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("link_url", "ASC")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("link_url", "ASC")->get()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->count() ? CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->count() ? CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereMain($main) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where(["is_deleted" => false, "main" => $main])->count() ? CategoryGroupsModel::where(["is_deleted" => false, "main" => $main])->first() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscMainSub1Sub2Sub3Sub4Sub5() // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("main")->orderBy("sub1")->orderBy("sub2")->orderBy("sub3")->orderBy("sub4")->orderBy("sub5")->count() ? CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("main")->orderBy("sub1")->orderBy("sub2")->orderBy("sub3")->orderBy("sub4")->orderBy("sub5")->get()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereMainWhereSub1WhereSub2WhereSub3WhereSub4WhereSub5($main, $sub1, $sub2, $sub3, $sub4, $sub5) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where(["is_deleted" => false, "main" => $main, "sub1" => $sub1, "sub2" => $sub2, "sub3" => $sub3, "sub4" => $sub4, "sub5" => $sub5])->count() ? CategoryGroupsModel::where(["is_deleted" => false, "main" => $main, "sub1" => $sub1, "sub2" => $sub2, "sub3" => $sub3, "sub4" => $sub4, "sub4" => $sub4])->first() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasOrWhereCategory($category) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where("is_deleted", false)->where("main", $category)->orWhere("sub1", $category)->orWhere("sub2", $category)->orWhere("sub3", $category)->orWhere("sub4", $category)->orWhere("sub5", $category)->count() ? CategoryGroupsModel::where("is_deleted", false)->where("main", $category)->orWhere("sub1", $category)->orWhere("sub2", $category)->orWhere("sub3", $category)->orWhere("sub4", $category)->orWhere("sub5", $category)->get()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereLinkUrl($linkUrl) // TODO: BU FONKSİYONUN NE İŞE YARADIĞINI AÇIKLA
    {
        return CategoryGroupsModel::where(["is_deleted" => false, "link_url" => $linkUrl])->count() ? CategoryGroupsModel::where(["is_deleted" => false, "link_url" => $linkUrl])->first() : NULL;
    }
}
