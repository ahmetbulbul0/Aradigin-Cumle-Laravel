<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupCreateController;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;

class CategoryGroupCreatePageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Grubu Ekle";
        $data["categories"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationships();

        return view("system.pages.category_group_create", ["data" => $data]);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "main" => $request->main,
            "sub1" => $request->sub1,
            "sub2" => $request->sub2,
            "sub3" => $request->sub3,
            "sub4" => $request->sub4,
            "sub5" => $request->sub5,
        ];

        $created = CategoryGroupCreateController::get($data);

        if (isset($created["errors"])) {
            return $this->index($created);
        }

        $created["createdData"] = [
            [
                "dataName" => "Kategori Grubu",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdCategoryGroupData"]["no"]
                    ],
                    [
                        "column" => "Ana Kategori",
                        "value" => $created["createdCategoryGroupData"]["main"]["name"]
                    ],
                    [
                        "column" => "1.Alt Kategori",
                        "value" => $created["createdCategoryGroupData"]["sub1"]["name"] ?? "-"
                    ],
                    [
                        "column" => "2.Alt Kategori",
                        "value" => $created["createdCategoryGroupData"]["sub2"]["name"] ?? "-"
                    ],
                    [
                        "column" => "3.Alt Kategori",
                        "value" => $created["createdCategoryGroupData"]["sub3"]["name"] ?? "-"
                    ],
                    [
                        "column" => "4.Alt Kategori",
                        "value" => $created["createdCategoryGroupData"]["sub4"]["name"] ?? "-"
                    ],
                    [
                        "column" => "5.Alt Kategori",
                        "value" => $created["createdCategoryGroupData"]["sub5"]["name"] ?? "-"
                    ],
                    [
                        "column" => "Link Metni No:",
                        "value" => $created["createdCategoryGroupData"]["link_url"]["no"]
                    ],
                ]
            ],
            [
                "dataName" => "Kategori Grup Link Metni",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdCategoryGroupLinkUrlData"]["no"]
                    ],
                    [
                        "column" => "Kategori Grubu No",
                        "value" => $created["createdCategoryGroupLinkUrlData"]["group_no"]
                    ],
                    [
                        "column" => "Link Metni",
                        "value" => $created["createdCategoryGroupLinkUrlData"]["link_url"]
                    ]
                ]
            ],
        ];

        return $this->index($created);
    }
}
