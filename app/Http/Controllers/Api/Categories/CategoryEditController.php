<?php

namespace App\Http\Controllers\Api\Categories;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryTypesModel;
use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;

class CategoryEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $name = htmlspecialchars($data["data"]["name"]);
        $type = htmlspecialchars($data["data"]["type"]);
        $mainCategory = htmlspecialchars($data["data"]["main_category"]);
        $linkUrl = htmlspecialchars($data["data"]["link_url"]);

        $name = Str::lower($name);

        $data["data"] = [
            "no" => $no,
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory,
            "link_url" => $linkUrl
        ];

        return CategoryEditController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];
        $type = $data["data"]["type"];
        $mainCategory = $data["data"]["main_category"];
        $linkUrl = $data["data"]["link_url"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Adı Alanı Boş Olamaz";
        }
        if (!isset($type) || empty($type)) {
            $data["errors"]["type"] = "Tipi Alanı Boş Olamaz";
        }
        if (isset($type) && !empty($type) && !CategoryTypesModel::where("no", $type)->count()) {
            $data["errors"]["type"] = "[$type] Geçersiz Kategori Tipi";
        }
        if ($type == "SUB_CATEGORY_NO" && (!isset($mainCategory) || empty($mainCategory))) {
            $data["errors"]["main_category"] = "Alt Kategoriler İçin Ana Kategori Alanı Zorunludur";
        }
        if (!isset($linkUrl) || empty($linkUrl)) {
            $data["errors"]["linkUrl"] = "Url Metni Alanı Boş Olamaz";
        }

        if (isset($name) && !empty($name) && CategoriesModel::where([["no", "!=", $no], ["name", $name]])->count()) {
            $data["errors"]["name"] = "[$name] Bu Kategori Adı Kullanılıyor, Lütfen Başka Bir Kategori Adı Kullanınız";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        if (empty($data["data"]["main_category"])) {
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
        $linkUrl = $data["data"]["link_url"];

        CategoriesModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "name" => $name,
            "type" => $type,
            "main_category" => $mainCategory,
            "link_url" => $linkUrl
        ]);

        $data["editedData"] = CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);
        return $data;
    }
}
