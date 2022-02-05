<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use App\Models\CategoryGroupsModel;
use App\Models\CategoryGroupUrlsModel;
use App\Models\CategoryTypesModel;
use App\Models\ListingsDetailModel;
use App\Models\ListingsModel;
use App\Models\NewsModel;
use App\Models\ReadingsDetailModel;
use App\Models\ReadingsModel;
use App\Models\ResourcePlatformsModel;
use App\Models\ResourceUrlsModel;
use App\Models\UsersModel;
use App\Models\UserTypesModel;
use App\Models\VisitorsModel;
use App\Models\WritingsModel;

class NoGenerator extends Controller
{
    static function generateCategoriesNo()
    {
        $no = rand(100000, 999999);
        $noCheck = CategoriesModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = CategoriesModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateCategoryGroupsNo()
    {
        $no = rand(100000, 999999);
        $noCheck = CategoryGroupsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = CategoryGroupsModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateCategoryTypesNo()
    {
        $no = rand(100000, 999999);
        $noCheck = CategoryTypesModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = CategoryTypesModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateCategoryGroupUrlsNo()
    {
        $no = rand(100000, 999999);
        $noCheck = CategoryGroupUrlsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = CategoryGroupUrlsModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateListingsDetailNo()
    {
        $no = rand(1000000000, 9999999999);
        $noCheck = ListingsDetailModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(1000000000, 9999999999);
            $noCheck = ListingsDetailModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateListingsNo()
    {
        $no = rand(1000000000, 9999999999);
        $noCheck = ListingsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(1000000000, 9999999999);
            $noCheck = ListingsModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateNewsNo()
    {
        $no = rand(100000, 999999);
        $noCheck = NewsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = NewsModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateReadingsDetailNo()
    {
        $no = rand(1000000000, 9999999999);
        $noCheck = ReadingsDetailModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(1000000000, 9999999999);
            $noCheck = ReadingsDetailModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateReadingsNo()
    {
        $no = rand(1000000000, 9999999999);
        $noCheck = ReadingsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(1000000000, 9999999999);
            $noCheck = ReadingsModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateResourcePlatformsNo()
    {
        $no = rand(100000, 999999);
        $noCheck = ResourcePlatformsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = ResourcePlatformsModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateResourceUrlsNo()
    {
        $no = rand(100000, 999999);
        $noCheck = ResourceUrlsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = ResourceUrlsModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateUsersNo()
    {
        $no = rand(100000, 999999);
        $noCheck = UsersModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UsersModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateUserTypesNo()
    {
        $no = rand(100000, 999999);
        $noCheck = UserTypesModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UserTypesModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateVisitorsNo()
    {
        $no = rand(1000000000, 9999999999);
        $noCheck = VisitorsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(1000000000, 9999999999);
            $noCheck = VisitorsModel::where('no', $no)->count();
        }
        return $no;
    }
    static function generateWritingsNo()
    {
        $no = rand(1000000000, 9999999999);
        $noCheck = WritingsModel::where('no', $no)->count();
        while ($noCheck == 1) {
            $no = rand(1000000000, 9999999999);
            $noCheck = WritingsModel::where('no', $no)->count();
        }
        return $no;
    }
}
