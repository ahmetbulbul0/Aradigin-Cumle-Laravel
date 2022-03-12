<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\UserTypes\UserTypeCreateController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTypeCreatePageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kullanıcı Tipi Ekle";
        return view("system.pages.user_type_create")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "name" => $request->name
        ];

        $created = UserTypeCreateController::get($data);

        if (isset($created["errors"])) {
            return $this->index($created);
        }

        $created["createdData"] = [
            [
                "dataName" => "Kullanıcı Tipi",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdData"]["no"]
                    ],
                    [
                        "column" => "Ad",
                        "value" => $created["createdData"]["name"]
                    ]
                ]
            ]
        ];

        return $this->index($created);
    }
}
