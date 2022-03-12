<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\CategoryTypes\CategoryTypeCreateController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryTypeCreatePageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Tipi Ekle";
        return view("system.pages.category_type_create")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "name" => $request->name
        ];

        $created = CategoryTypeCreateController::get($data);

        if (isset($created["errors"])) {
            return $this->index($created);
        }

        $created["createdData"] = [
            [
                "dataName" => "Kategori Tipi",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdData"]["no"]
                    ],
                    [
                        "column" => "Adı",
                        "value" => $created["createdData"]["name"]
                    ]
                ]
            ]
        ];

        return $this->index($created);
    }
}
