<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Api\CategoryGroups\CategoryGroupCreateController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;
use App\Models\CategoriesModel;
use App\Models\CategoryTypesModel;
use Illuminate\Support\Str;

class CategoryCreateController extends Controller
{
    static function get($data)
    {
        $name = htmlspecialchars($data["data"]["name"]);
        $type = htmlspecialchars($data["data"]["type"]);
        $mainCategory = htmlspecialchars($data["data"]["main_category"]);

        $name = Str::lower($name);
        $type = intval($type);
        $mainCategory = intval($mainCategory);

        $data["data"] = [
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory,
        ];

        return CategoryCreateController::check($data);
    }
    static function check($data)
    {
        $name = $data["data"]["name"];
        $type = $data["data"]["type"];
        $mainCategory = $data["data"]["main_category"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Kategori Adı Alanı Zorunludur";
        }

        if (!isset($type) || empty($type)) {
            $data["errors"]["type"] = "Kategori Tipi Alanı Zorunludur";
        }

        if ($type == ConstantsListController::getCategoryTypeSubOnlyNotDeleted() && (!isset($mainCategory) || empty($mainCategory))) {
            $data["errors"]["main_category"] = "Alt Kategoriler İçin Ana Kategori Alanı Zorunludur";
        }

        if (isset($name) && !empty($name) && CategoriesListController::getFirstDataWithNameOnlyNotDeleted($name)) {
            $data["errors"]["name"] = "[$name] Bu Kategori Adı Daha Önceden Tanımlanmış, Lütfen Başka Bir Kategori Adı Kullanınız";
        }

        if (isset($type) && !empty($type) && !CategoryTypesListController::getFirstDataWithNoOnlyNotDeleted($type)) {
            $data["errors"]["type"] = "Geçersiz Kategori Tipi";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        if (!isset($data["data"]["main_category"]) || empty($data["data"]["main_category"])) {
            $data["data"]["main_category"] = NULL;
        }

        return CategoryCreateController::work($data);
    }
    static function work($data)
    {
        $no = NoGenerator::generateCategoriesNo();
        $name = $data["data"]["name"];
        $type = $data["data"]["type"];
        $mainCategory = $data["data"]["main_category"];

        switch ($type) {
            case ConstantsListController::getCategoryTypeMainOnlyNotDeleted():
                $linkUrl = LinkUrlGenerator::single($name);
                break;
            case ConstantsListController::getCategoryTypeSubOnlyNotDeleted():
                $linkUrlSub = LinkUrlGenerator::single($name);
                $mainCat = CategoriesListController::getFirstDataWithNoOnlyNotDeleted($mainCategory);
                $linkUrl = $mainCat["link_url"] . "-" . $linkUrlSub;
                break;
            default:
                $data["errors"]["type"] = "Geçersiz Kategori Tipi Değeri, Kategori Tipi Değeri Ya Main Yada Sub Olabilir.";
                return $data;
                break;
        }

        CategoriesModel::create([
            "no" => $no,
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory,
            "link_url" => $linkUrl
        ]);

        $data["createdCategoryData"] = CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);

        switch ($type) {
            case ConstantsListController::getCategoryTypeMainOnlyNotDeleted():
                $dataForCategoryGroup["data"] = ["main" => $no, "sub1" => NULL, "sub2" => NULL, "sub3" => NULL, "sub4" => NULL, "sub5" => NULL];
                $categoryGroupCreate = CategoryGroupCreateController::get($dataForCategoryGroup);
                if (isset($categoryGroupCreate["errors"])) {
                    return $categoryGroupCreate;
                }
                $data["createdCategoryGroupData"] = CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($categoryGroupCreate["createdCategoryGroupData"]["no"]);
                $data["createdCategoryGroupLinkUrlData"] = CategoryGroupUrlsListController::getFirstDataWithNoOnlyNotDeleted($categoryGroupCreate["createdCategoryGroupLinkUrlData"]["no"]);
                break;
            case ConstantsListController::getCategoryTypeSubOnlyNotDeleted():
                $dataForCategoryGroup["data"] = ["main" => $mainCategory, "sub1" => $no, "sub2" => NULL, "sub3" => NULL, "sub4" => NULL, "sub5" => NULL];
                $categoryGroupCreate = CategoryGroupCreateController::get($dataForCategoryGroup);
                if (isset($categoryGroupCreate["errors"])) {
                    return $categoryGroupCreate;
                }
                $data["createdCategoryGroupData"] = CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($categoryGroupCreate["createdCategoryGroupData"]["no"]);
                $data["createdCategoryGroupLinkUrlData"] = CategoryGroupUrlsListController::getFirstDataWithNoOnlyNotDeleted($categoryGroupCreate["createdCategoryGroupLinkUrlData"]["no"]);
                break;
            default:
                break;
        }

        return $data;
    }
}
