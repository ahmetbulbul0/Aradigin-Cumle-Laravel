<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsListController;
use App\Http\Controllers\Controller;

class ResourceUrlsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kaynak Linkleri";
        if (!isset($data["data"])) {
            $data["data"] = ResourceUrlsListController::getAllOnlyNotDeletedAllRelationships();
        }
        return view("system.pages.resource_urls_list")->with("data", $data);
    }
}
