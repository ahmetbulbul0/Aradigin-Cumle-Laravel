<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use App\Models\CategoryGroupsModel;
use App\Models\CategoryGroupUrlsModel;
use App\Models\CategoryTypesModel;
use App\Models\ConstantsModel;
use App\Models\ListingsDetailModel;
use App\Models\ListingsModel;
use App\Models\NewsModel;
use App\Models\ReadingsDetailModel;
use App\Models\ReadingsModel;
use App\Models\ResourcePlatformsModel;
use App\Models\ResourceUrlsModel;
use App\Models\UsersModel;
use App\Models\UsersSettingsModel;
use App\Models\UserTypesModel;
use App\Models\VisitorsModel;
use App\Models\WritingsModel;

class NoGenerator extends Controller
{
    static function generateCategoriesNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = CategoriesModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = CategoriesModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateCategoryGroupsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = CategoryGroupsModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = CategoryGroupsModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateCategoryTypesNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = CategoryTypesModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = CategoryTypesModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateCategoryGroupUrlsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = CategoryGroupUrlsModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = CategoryGroupUrlsModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateListingsDetailNo() // length: 16
    {
        $no = rand(1000000000000000, 9999999999999999);
        $noCheck = ListingsDetailModel::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(1000000000000000, 9999999999999999);
            $noCheck = ListingsDetailModel::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateListingsNo() // length: 16
    {
        $no = rand(1000000000000000, 9999999999999999);
        $noCheck = ListingsModel::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(1000000000000000, 9999999999999999);
            $noCheck = ListingsModel::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateNewsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = NewsModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = NewsModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateReadingsDetailNo() // length: 16
    {
        $no = rand(1000000000000000, 9999999999999999);
        $noCheck = ReadingsDetailModel::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(1000000000000000, 9999999999999999);
            $noCheck = ReadingsDetailModel::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateReadingsNo() // length: 16
    {
        $no = rand(1000000000000000, 9999999999999999);
        $noCheck = ReadingsModel::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(1000000000000000, 9999999999999999);
            $noCheck = ReadingsModel::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateResourcePlatformsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = ResourcePlatformsModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = ResourcePlatformsModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateResourceUrlsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = ResourceUrlsModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = ResourceUrlsModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateUsersNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = UsersModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UsersModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateUserTypesNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = UserTypesModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UserTypesModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateVisitorsNo() // length: 16
    {
        $no = rand(1000000000000000, 9999999999999999);
        $noCheck = VisitorsModel::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(1000000000000000, 9999999999999999);
            $noCheck = VisitorsModel::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateWritingsNo() // length: 16
    {
        $no = rand(1000000000000000, 9999999999999999);
        $noCheck = WritingsModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(1000000000000000, 9999999999999999);
            $noCheck = WritingsModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateConstantsNo() // length: 4
    {
        $no = rand(1000, 9999);
        $noCheck = ConstantsModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(1000, 9999);
            $noCheck = ConstantsModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
    static function generateUsersSettingsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = UsersSettingsModel::where(["is_deleted" => false, 'no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UsersSettingsModel::where(["is_deleted" => false, 'no' => $no])->count();
        }
        return $no;
    }
}
