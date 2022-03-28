<?php

namespace App\Http\Controllers\Api\Categories;

use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupDeleteController;

class CategoryDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return CategoryDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        $categoryUseThisCategoryAsMainCategory = CategoriesListController::getAllDataOnlyNotDeletedDatasWhereMainCategoryWhereTypeSub($no);

        if ($categoryUseThisCategoryAsMainCategory) {
            foreach ($categoryUseThisCategoryAsMainCategory as $category) {
                CategoriesModel::where(["is_deleted" => false, "no" => $category["no"]])->update([
                    "is_deleted" => true
                ]);
                $editedCategoryGroups = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasOrWhereCategory($category["no"]);
                if ($editedCategoryGroups) {
                    foreach ($editedCategoryGroups as $editedCategoryGroup) {
                        $data["data"]["no"] = $editedCategoryGroup["no"];
                        CategoryGroupDeleteController::get($data);
                    }
                }
            }
        }

        if (!$categoryUseThisCategoryAsMainCategory) {
            CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->update([
                "is_deleted" => true
            ]);
            $editedCategoryGroups = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasOrWhereCategory($no);
            if ($editedCategoryGroups) {
                foreach ($editedCategoryGroups as $editedCategoryGroup) {
                    $data["data"]["no"] = $editedCategoryGroup["no"];
                    CategoryGroupDeleteController::get($data);
                }
            }
        }

        $data["status"] = 200;

        return $data;
    }
}
