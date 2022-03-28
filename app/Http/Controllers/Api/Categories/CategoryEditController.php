<?php

namespace App\Http\Controllers\Api\Categories;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\CategoryTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\LinkUrlGenerator;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;

class CategoryEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $name = htmlspecialchars($data["data"]["name"]);
        $type = htmlspecialchars($data["data"]["type"]);
        $mainCategory = htmlspecialchars($data["data"]["main_category"]);

        $no = intval($no);
        $name = Str::lower($name);
        $type = intval($type);
        $mainCategory = intval($mainCategory);

        $data["data"] = [
            "no" => $no,
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory
        ];

        return CategoryEditController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];
        $type = $data["data"]["type"];
        $mainCategory = $data["data"]["main_category"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Adı Alanı Boş Olamaz";
        }

        if (!isset($type) || empty($type)) {
            $data["errors"]["type"] = "Tipi Alanı Boş Olamaz";
        }

        if (isset($type) && !empty($type) && !CategoryTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo($type)) {
            $data["errors"]["type"] = "Geçersiz Kategori Tipi";
        }

        if ($type == ConstantsListController::getCategoryTypeSubOnlyNotDeleted() && (!isset($mainCategory) || empty($mainCategory))) {
            $data["errors"]["mainCategory"] = "Alt Kategoriler İçin Ana Kategori Alanı Zorunludur";
        }

        if (isset($name) && !empty($name) && CategoriesListController::getFirstDataOnlyNotDeletedDatasWhereNameWhereNotNo($no, $name)) {
            $data["errors"]["name"] = "[$name] Bu Kategori Adı Kullanılıyor, Lütfen Başka Bir Kategori Adı Kullanınız";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        if (!isset($data["data"]["main_category"]) || empty($data["data"]["main_category"]) || ($data["data"]["type"] == ConstantsListController::getCategoryTypeMainOnlyNotDeleted())) {
            $data["data"]["main_category"] = NULL;
        }

        return CategoryEditController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];
        $type = $data["data"]["type"];
        $mainCategory = $data["data"]["main_category"];
        $linkUrl = LinkUrlGenerator::single($name);

        CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory,
            "link_url" => $linkUrl
        ]);

        $data["editedData"] = CategoriesListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);

        return $data;
    }
}
