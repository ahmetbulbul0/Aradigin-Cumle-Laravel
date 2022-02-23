<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\CategoryGroups\CategoryGroupCreateController;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;

class CategoryGroupCreatePageController extends Controller
{
    public function index($data = NULL) {
        $data["page_title"] = "Kategori Grubu Ekle";
        $data["categories"] = CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->get()->toArray();

        return view("system.pages.category_group_create", ["data" => $data]);
    }
    public function form(Request $request) {
        $data["data"] = [
            "main" => $request->main,
            "sub1" => $request->sub1,
            "sub2" => $request->sub2,
            "sub3" => $request->sub3,
            "sub4" => $request->sub4,
            "sub5" => $request->sub5,
        ];

        $created = CategoryGroupCreateController::get($data);

        if (isset($created["errors"])) {return $this->index($created);}

        $created["createdDataName"] = "Kategori Grubu";

        $created["createdData"] = [
            [
                "column" => "No",
                "value" => $created["createdData"][0]["no"]
            ],
            [
                "column" => "Ana Kategori",
                "value" => $created["createdData"][0]["main"]["name"]
            ],
            [
                "column" => "1.Alt Kategori",
                "value" => $created["createdData"][0]["sub1"]["name"] ?? "-"
            ],
            [
                "column" => "2.Alt Kategori",
                "value" => $created["createdData"][0]["sub2"]["name"] ?? "-"
            ],
            [
                "column" => "3.Alt Kategori",
                "value" => $created["createdData"][0]["sub3"]["name"] ?? "-"
            ],
            [
                "column" => "4.Alt Kategori",
                "value" => $created["createdData"][0]["sub4"]["name"] ?? "-"
            ],
            [
                "column" => "5.Alt Kategori",
                "value" => $created["createdData"][0]["sub5"]["name"] ?? "-"
            ],
            [
                "column" => "Url Metni:",
                "value" => $created["createdData"][0]["link_url"]["link_url"]
            ],
        ];

        return $this->index($created);
    }
}
