<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformDeleteController;
use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourcePlatformDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kaynak Site Sil";
        $data["basic_text"] = "kaynak siteyi";
        $itemData = ResourcePlatformsListController::getFirstDataWithNoOnlyNotDeleted($no);
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $itemData["no"],
            ],
            [
                "label" => "Adı",
                "span" => $itemData["name"],
            ],
            [
                "label" => "Site Linki",
                "span" => $itemData["main_url"],
            ],
            [
                "label" => "Link Metni",
                "span" => $itemData["link_url"],
            ]
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
    }

    public function form(Request $request)
    {
        if ($request->action == "reject") {
            return redirect(route("kaynak_siteler"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = ResourcePlatformDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kaynak_siteler"));
        }

        return redirect(route("kaynak_siteler"));
    }
}
