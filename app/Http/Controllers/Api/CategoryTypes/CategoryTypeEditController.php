<?php

namespace App\Http\Controllers\Api\CategoryTypes;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryTypesModel;
use App\Http\Controllers\Controller;

class CategoryTypeEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $name = htmlspecialchars($data["data"]["name"]);

        $no = intval($no);
        $name = Str::lower($name);

        $data["data"] = [
            "no" => $no,
            "name" => $name
        ];

        return CategoryTypeEditController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];

        if (!isset($name) || empty($name)) {
            $data["errors"]["name"] = "Kategori Tipi Adı Alanı Boş Olamaz";
        }
        if (isset($name) && !empty($name) && CategoryTypesListController::getFirstDataOnlyNotDeletedDatasWhereNameWhereNotNo($no, $name)) {
            $data["errors"]["name"] = "[$name] Bu Kategori Tipi Adı Kullanılıyor, Lütfen Başka Bir Ad Kullanınız";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryTypeEditController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];
        $name = $data["data"]["name"];

        CategoryTypesModel::where(["is_deleted" => false, "no" => $no])->update([
            "name" => $name
        ]);

        $data["editedData"] = CategoryTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo($no);

        return $data;
    }
}
