<?php

namespace App\Http\Controllers\Api\Constants;

use App\Http\Controllers\Controller;
use App\Models\ConstantsModel;
use Illuminate\Http\Request;

class ConstantsListController extends Controller
{
    static function getAllOnlyNotDeleted() // ALL CONSTANTS
    {
        return ConstantsModel::where(["is_deleted" => false])->get()->toArray();
    }
    static function getCategoryTypeMainOnlyNotDeleted() // CATEGORY TYPE MAİN
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "category_type_main"])->first()->value;
    }
    static function getCategoryTypeSubOnlyNotDeleted() // CATEGORY TYPE SUB
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "category_type_sub"])->first()->value;
    }
    static function getUserTypeAuthorOnlyNotDeleted() // USER TYPE AUTHOR
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "user_type_author"])->first()->value;
    }
    static function getUserTypeSystemOnlyNotDeleted() // USER TYPE SYSTEM
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "user_type_system"])->first()->value;
    }
    static function getWebSiteVisitorMenuCategory1OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 1
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category1"])->first()->value;
    }
    static function getWebSiteVisitorMenuCategory2OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 2
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category2"])->first()->value;
    }
    static function getWebSiteVisitorMenuCategory3OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 3
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category3"])->first()->value;
    }
    static function getWebSiteVisitorMenuCategory4OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 4
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category4"])->first()->value;
    }
    static function getWebSiteVisitorMenuCategory5OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 5
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category5"])->first()->value;
    }
    static function getWebSiteVisitorMenuCategory6OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 6
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category6"])->first()->value;
    }
    static function getWebSiteVisitorMenuCategory7OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 7
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category7"])->first()->value;
    }
    static function getWebSiteVisitorMenuCategory8OnlyNotDeleted() // WEBSİTE VİSİTOR MENU CATEGORY 8
    {
        return ConstantsModel::where(["is_deleted" => false, "key" => "website_visitor_menu_category8"])->first()->value;
    }
}
