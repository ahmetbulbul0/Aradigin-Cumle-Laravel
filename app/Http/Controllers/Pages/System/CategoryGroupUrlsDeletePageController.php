<?php

namespace App\Http\Controllers\Pages\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlDeleteController;

class CategoryGroupUrlsDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kategori Grubu Link Metnş Sil";
        $data["basic_text"] = "kategori grubu link metnini";
        $itemData = CategoryGroupUrlsListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        $data["itemData"] = [
            [
                "label" => "no",
                "span" => $itemData["no"],
            ],
            [
                "label" => "Kategori Grubu",
                "span" => CategoryGroupToText::single($itemData["group_no"]),
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
            return redirect(route("kategori_grubu_linkleri"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = CategoryGroupUrlDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kategori_grubu_linkleri"));
        }

        return redirect(route("kategori_grubu_linkleri"));
    }
}
