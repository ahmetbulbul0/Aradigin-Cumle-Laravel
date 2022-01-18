<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformCreateController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourcePlatformCreatePageController extends Controller
{
    public function index($data = NULL) {
        $data["page_title"] = "Kaynak Platform Ekle";
        return view("system.pages.resource_platform_create")->with("data", $data);
    }

    public function form(Request $request) {
        $data["data"] = [
            "name" => $request->name,
            "main_url" => $request->main_url
        ];

        $created = ResourcePlatformCreateController::get($data);

        if (isset($created["errors"])) {return $this->index($created);}

        $created["createdDataName"] = "Kaynak Site";

        $created["createdData"] = [
            [
                "column" => "No",
                "value" => $created["createdData"][0]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $created["createdData"][0]["name"]
            ],
            [
                "column" => "Site Linki",
                "value" => $created["createdData"][0]["main_url"]
            ],
            [
                "column" => "Url Metni",
                "value" => $created["createdData"][0]["link_url"]
            ]
        ];

        return $this->index($created);
    }
}
