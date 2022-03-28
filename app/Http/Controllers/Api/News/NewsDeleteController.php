<?php

namespace App\Http\Controllers\Api\News;

use App\Models\NewsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsListController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlDeleteController;

class NewsDeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $no = intval($no);

        $data["data"]["no"] = $no;

        return NewsDeleteController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !NewsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return NewsDeleteController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        NewsModel::where(["is_deleted" => false, "no" => $no])->update([
            "is_deleted" => true
        ]);

        $resourceUrl = ResourceUrlsListController::getFirstDataOnlyNotDeletedDatasWhereNewsNo($no);
        if ($resourceUrl) {
            $data["data"]["no"] = $resourceUrl["no"];
            ResourceUrlDeleteController::get($data);
        }

        $data["status"] = 200;
        
        return $data;
    }
}
