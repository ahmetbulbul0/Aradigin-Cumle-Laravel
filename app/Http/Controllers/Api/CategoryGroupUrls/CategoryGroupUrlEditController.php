<?php

namespace App\Http\Controllers\Api\CategoryGroupUrls;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;
use Illuminate\Http\Request;

class CategoryGroupUrlEditController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $linkUrl = htmlspecialchars($data["data"]["link_url"]);

        $data["data"] = [
            "no" => $no,
            "link_url" => $linkUrl
        ];

        return CategoryGroupUrlEditController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];
        $linkUrl = $data["data"]["link_url"];

        if (!isset($linkUrl) || empty($linkUrl)) {
            $data["errors"]["link_url"] = "Kategori grubu link metni Alanı Boş Olamaz";
        }
        if (isset($linkUrl) && !empty($linkUrl) && CategoryGroupUrlsModel::where([["no", "!=", $no], ["link_url", $linkUrl]])->count()) {
            $data["errors"]["link_url"] = "[$linkUrl] Bu Kategori grubu link metni Kullanılıyor, Lütfen Başka Bir Kategori grubu link metni Kullanınız";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return CategoryGroupUrlEditController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];
        $linkUrl = $data["data"]["link_url"];

        CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "link_url" => $linkUrl
        ]);

        $data["editedData"] = CategoryGroupUrlsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);
        return $data;
    }
}
