<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformCreateController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourcePlatformCreatePageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kaynak Platform Ekle";
        return view("system.pages.resource_platform_create")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "name" => $request->name,
            "main_url" => $request->mainUrl
        ];

        $created = ResourcePlatformCreateController::get($data);

        if (isset($created["errors"])) {
            return $this->index($created);
        }

        $created["createdData"] = [
            [
                "dataName" => "Kaynak Site",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdData"]["no"]
                    ],
                    [
                        "column" => "Ad",
                        "value" => $created["createdData"]["name"]
                    ],
                    [
                        "column" => "Site Linki",
                        "value" => $created["createdData"]["main_url"]
                    ],
                    [
                        "column" => "Link Metni",
                        "value" => $created["createdData"]["link_url"]
                    ]
                ]
            ]
        ];

        return $this->index($created);
    }
}
