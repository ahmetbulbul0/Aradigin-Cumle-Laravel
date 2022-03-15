<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Api\CategoryGroups\CategoryGroupDeleteController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;

class CategoryDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return CategoryDeleteController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "kategori No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !CategoriesModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz kategori No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryDeleteController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];

        $categoryUseThisCategoryAsMainCategory = CategoriesListController::getAllOnlyNotDeletedWithMainCategoryTypeSub($no);
        if ($categoryUseThisCategoryAsMainCategory) {
            foreach ($categoryUseThisCategoryAsMainCategory as $category) {
                CategoriesModel::where(["is_deleted" => false, "no" => $category["no"]])->update([
                    "is_deleted" => true
                ]);
                $editedCategoryGroups = CategoryGroupsListController::getAllWithCategoryOnlyNotDeleted($category["no"]);
                if ($editedCategoryGroups) {
                    foreach ($editedCategoryGroups as $editedCategoryGroup) {
                        $data["data"]["no"] = $editedCategoryGroup["no"];
                        CategoryGroupDeleteController::get($data);
                    }
                }
            }
        }

        CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);
        $editedCategoryGroups = CategoryGroupsListController::getAllWithCategoryOnlyNotDeleted($no);
        if ($editedCategoryGroups) {
            foreach ($editedCategoryGroups as $editedCategoryGroup) {
                $data["data"]["no"] = $editedCategoryGroup["no"];
                CategoryGroupDeleteController::get($data);
            }
        }

        $data["status"] = "success";
        return $data;
    }
}
