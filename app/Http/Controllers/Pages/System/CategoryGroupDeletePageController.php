<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\CategoryGroups\CategoryGroupDeleteController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryGroupDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kategori Grubu Sil";
        $data["basic_text"] = "kategori grubunu";
        $itemData = CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);
        $data["itemData"] = [
            [
                "label" => "no",
                "span" => $itemData["no"],
            ],
            [
                "label" => "main",
                "span" => $itemData["main"]["name"],
            ],
            [
                "label" => "sub1",
                "span" => $itemData["sub1"]["name"] ?? "-",
            ],
            [
                "label" => "sub2",
                "span" => $itemData["sub2"]["name"] ?? "-",
            ],
            [
                "label" => "sub3",
                "span" => $itemData["sub3"]["name"] ?? "-",
            ],
            [
                "label" => "sub4",
                "span" => $itemData["sub4"]["name"] ?? "-",
            ],
            [
                "label" => "sub5",
                "span" => $itemData["sub5"]["name"] ?? "-",
            ],
            [
                "label" => "link_url",
                "span" => $itemData["link_url"]["link_url"],
            ]
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
    }
    public function form(Request $request)
    {
        if ($request->action == "reject") {
            return redirect(route("kategori_gruplari"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = CategoryGroupDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kategori_gruplari"));
        }

        return redirect(route("kategori_gruplari"));
    }
}
