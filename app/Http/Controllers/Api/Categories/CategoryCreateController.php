<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Api\CategoryGroups\CategoryGroupCreateController;
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

        if (isset($type) && !empty($type) && !CategoryTypesModel::where("no", $type)->count()) {
            $data["errors"]["type"] = "[$type] Geçersiz Kategori Tipi";
        }

        if ($type == ConstantsListController::getCategoryTypeSubOnlyNotDeleted() && (!isset($mainCategory) || empty($mainCategory))) {
            $data["errors"]["main_category"] = "Alt Kategoriler İçin Ana Kategori Alanı Zorunludur";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        if (empty($data["data"]["main_category"])) {
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
                dd("hata");
                break;
        }

        CategoriesModel::create([
            "no" => $no,
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory,
            "link_url" => $linkUrl
        ]);

        if ($type == ConstantsListController::getCategoryTypeMainOnlyNotDeleted()) {
            $dataForCategoryGroup["data"] = [
                "main" => $no,
                "sub1" => NULL,
                "sub2" => NULL,
                "sub3" => NULL,
                "sub4" => NULL,
                "sub5" => NULL
            ];
            CategoryGroupCreateController::get($dataForCategoryGroup);
        }


        if ($type == ConstantsListController::getCategoryTypeSubOnlyNotDeleted()) {
            $dataForCategoryGroup["data"] = [
                "main" => $no,
                "sub1" => $mainCategory,
                "sub2" => NULL,
                "sub3" => NULL,
                "sub4" => NULL,
                "sub5" => NULL
            ];
            CategoryGroupCreateController::get($dataForCategoryGroup);
        }

        $data["createdData"] = CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);
        return $data;
    }
}
