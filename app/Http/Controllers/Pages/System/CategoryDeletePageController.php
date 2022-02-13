<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\Categories\CategoryDeleteController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kategori Sil";
        $data["basic_text"] = "kategoriyi";
        $itemData = CategoriesListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips($no);
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
                "label" => "Tipi",
                "span" => $itemData["type"]["name"],
            ],
            [
                "label" => "Ana Kategori",
                "span" => $itemData["main_category"]["name"] ?? "-",
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
            return redirect(route("kategoriler"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = CategoryDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kategoriler"));
        }

        return redirect(route("kategoriler"));
    }
}
