<?php

namespace App\Http\Controllers\Api\ResourceUrls;

use App\Models\ResourceUrlsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Api\News\NewsDeleteController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsListController;

class ResourceUrlDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return ResourceUrlDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !ResourceUrlsListController::getFirstDataOnlyNotDeletedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return ResourceUrlDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        ResourceUrlsModel::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $news = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsWhereResourceUrl($no);
        if ($news) {
            foreach ($news as $n1ws) {
                $data["data"]["no"] = $n1ws["no"];
                NewsDeleteController::get($data);
            }
        }

        $data["status"] = 200;
        return $data;
    }
}
