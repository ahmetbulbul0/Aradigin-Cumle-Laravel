<?php

namespace App\Http\Controllers\Api\CategoryGroupUrls;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;

class CategoryGroupUrlsListController extends Controller
{
    static function getAllData()
    {
        return CategoryGroupUrlsModel::count() ? CategoryGroupUrlsModel::get() : NULL;
    }
    static function getAllDataAllRelationships()
    {
        return CategoryGroupUrlsModel::with("groupNo")->count() ? CategoryGroupUrlsModel::with("groupNo")->get()->toArray() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas()
    {
        return CategoryGroupUrlsModel::where("is_deleted", false)->count() ? CategoryGroupUrlsModel::where("is_deleted", false)->get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatasAllRelationships()
    {
        return CategoryGroupUrlsModel::where("is_deleted", false)->with("groupNo")->count() ? CategoryGroupUrlsModel::where("is_deleted", false)->with("groupNo")->get()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no)
    {
        return CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $no])->with("groupNo")->count() ? CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $no])->with("groupNo")->first()->toArray() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereNo($no)
    {
        return CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $no])->count() ? CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $no])->first() : NULL;
    }
    static function getFirstDataOnlyNotDeletedDatasWhereGroupNo($groupNo)
    {
        return CategoryGroupUrlsModel::where(["is_deleted" => false, "group_no" => $groupNo])->count() ? CategoryGroupUrlsModel::where(["is_deleted" => false, "group_no" => $groupNo])->first() : NULL;
    }
}
