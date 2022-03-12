<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\Categories\CategoryCreateController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryCreatePageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Ekle";
        $data["categoryTypes"] = CategoryTypesListController::getAllOnlyNotDeleted();
        $data["categories"] = CategoriesListController::getAllOnlyNotDeletedAllRelationShips();
        return view("system.pages.category_create")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "name" => $request->name,
            "type" => $request->type,
            "main_category" => $request->mainCategory
        ];

        $created = CategoryCreateController::get($data);

        if (isset($created["errors"])) {
            return $this->index($created);
        }

        $created["createdData"] = [
            [
                "dataName" => "Kategori",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdCategoryData"]["no"]
                    ],
                    [
                        "column" => "Adı",
                        "value" => $created["createdCategoryData"]["name"]
                    ],
                    [
                        "column" => "Tipi",
                        "value" => $created["createdCategoryData"]["type"]["name"]
                    ],
                    [
                        "column" => "Ana Kategori",
                        "value" => $created["createdCategoryData"]['main_category']['name'] ?? "-"
                    ],
                    [
                        "column" => "Link Metni",
                        "value" => $created["createdCategoryData"]['link_url']
                    ]
                ]
            ],
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
                        "column" => "Link Metni No",
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
