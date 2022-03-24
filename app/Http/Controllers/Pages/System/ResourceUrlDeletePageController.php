<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ResourceUrls\ResourceUrlDeleteController;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceUrlDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kaynak Linki Sil";
        $data["basic_text"] = "kaynak linkini";
        $itemData = ResourceUrlsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $itemData["no"],
            ],
            [
                "label" => "Haber",
                "span" => $itemData["news_no"]["content"],
            ],
            [
                "label" => "Kaynak Platform",
                "span" => $itemData["resource_platform"]["name"],
            ],
            [
                "label" => "Url",
                "span" => $itemData["url"],
            ]
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
    }
    public function form(Request $request)
    {
        if ($request->action == "reject") {
            return redirect(route("kaynak_linkler"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = ResourceUrlDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kaynak_linkler"));
        }

        return redirect(route("kaynak_linkler"));
    }
}
