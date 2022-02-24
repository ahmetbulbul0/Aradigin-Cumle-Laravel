<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\CategoryTypes\CategoryTypeDeleteController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryTypeDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kategori Tipi Sil";
        $data["basic_text"] = "kategori tipini";
        $itemData = CategoryTypesListController::getFirstDataWithNoOnlyNotDeleted($no);
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $itemData["no"],
            ],
            [
                "label" => "Adı",
                "span" => $itemData["name"],
            ]
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
    }
    public function form(Request $request)
    {
        if ($request->action == "reject") {
            return redirect(route("kategori_tipleri"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = CategoryTypeDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kategori_tipleri"));
        }

        return redirect(route("kategori_tipleri"));
    }
}
