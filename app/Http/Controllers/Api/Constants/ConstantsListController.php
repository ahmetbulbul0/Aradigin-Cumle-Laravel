<?php

namespace App\Http\Controllers\Api\Constants;

use App\Http\Controllers\Controller;
use App\Models\ConstantsModel;

class ConstantsListController extends Controller
{
    static function getAllData() // ALL CONSTANTS
    {
        return ConstantsModel::count() ? ConstantsModel::get() : NULL;
    }
    static function getAllDataOnlyNotDeletedDatas() // ALL CONSTANTS BUT NOT DELETED CONSTANTS
    {
        return ConstantsModel::where(["is_deleted" => false])->count() ? ConstantsModel::where(["is_deleted" => false])->get()->toArray() : NULL;
    }
    static function getCategoryTypeMainOnlyNotDeleted() // CATEGORY TYPE MAİN [category_type_main]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "category_type_main"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "category_type_main"])->first()->value : NULL;
    }
    static function getCategoryTypeSubOnlyNotDeleted() // CATEGORY TYPE SUB [category_type_sub]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "category_type_sub"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "category_type_sub"])->first()->value : NULL;
    }
    static function getUserTypeAuthorOnlyNotDeleted() // USER TYPE AUTHOR [user_type_author]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "user_type_author"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "user_type_author"])->first()->value : NULL;
    }
    static function getUserTypeSystemOnlyNotDeleted() // USER TYPE SYSTEM [user_type_system]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "user_type_system"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "user_type_system"])->first()->value : NULL;
    }
    static function getWebSiteVisitorMenuCategory1OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 1 [website_visitor_menu_category1]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category1"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category1"])->first()->value : NULL;
    }
    static function getWebSiteVisitorMenuCategory2OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 2 [website_visitor_menu_category2]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category2"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category2"])->first()->value : NULL;
    }
    static function getWebSiteVisitorMenuCategory3OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 3 [website_visitor_menu_category3]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category3"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category3"])->first()->value : NULL;
    }
    static function getWebSiteVisitorMenuCategory4OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 4 [website_visitor_menu_category4]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category4"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category4"])->first()->value : NULL;
    }
    static function getWebSiteVisitorMenuCategory5OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 5 [website_visitor_menu_category5]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category5"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category5"])->first()->value : NULL;
    }
    static function getWebSiteVisitorMenuCategory6OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 6 [website_visitor_menu_category6]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category6"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category6"])->first()->value : NULL;
    }
    static function getWebSiteVisitorMenuCategory7OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 7 [website_visitor_menu_category7]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category7"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category7"])->first()->value : NULL;
    }
    static function getWebSiteVisitorMenuCategory8OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 8 [website_visitor_menu_category8]
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category8"])->count() ? ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category8"])->first()->value : NULL;
    }
}
