<?php

namespace App\Http\Controllers\Pages\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;

class CategoryGroupUrlsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Grup Link Metinleri";
        if (!isset($data["data"])) {
            $data["data"] = CategoryGroupUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationships();
            for ($i = 0; $i < count($data["data"]); $i++) {
                $data["data"][$i]["group_no"] = CategoryGroupToText::single($data["data"][$i]["group_no"]);
            }
        }

        return view("system.pages.category_group_urls_list")->with("data", $data);
    }
}
