<?php

namespace App\Http\Controllers\Api\CategoryGroups;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroupsModel;
use Illuminate\Http\Request;

class CategoryGroupsListController extends Controller
{
    static function getAll()
    {
        return CategoryGroupsModel::get();
    }
    static function getAllOnlyNotDeleted()
    {
        return CategoryGroupsModel::where("is_deleted", false)->get();
    }
    static function getAllOnlyNotDeletedAllRelationShips()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescNo()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("no", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscNo()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("no", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescMain()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("main", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscMain()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("main", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescSub1()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub1", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscSub1()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub1", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescSub2()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub2", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscSub2()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub2", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescSub3()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub3", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscSub3()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub3", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescSub4()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub4", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscSub4()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub4", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescSub5()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub5", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscSub5()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("sub5", "ASC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByDescLinkUrl()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("link_url", "DESC")->get()->toArray();
    }
    static function getAllOnlyNotDeletedAllRelationShipsOrderByAscLinkUrl()
    {
        return CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->orderBy("link_url", "ASC")->get()->toArray();
    }
    static function getFirstDataWithNoOnlyNotDeletedAllRelationShips($no)
    {
        return CategoryGroupsModel::where(["is_deleted" => false, "no" => $no])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first()->toArray();
    }
}
