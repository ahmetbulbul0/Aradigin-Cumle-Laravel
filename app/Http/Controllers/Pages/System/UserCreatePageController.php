<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Users\UserCreateController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCreatePageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kullanıcı Ekle";
        $data["userTypes"] = UserTypesListController::getAllDataOnlyNotDeletedDatas();
        return view("system.pages.user_create")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "full_name" => $request->fullName,
            "username" => $request->username,
            "password" => $request->password,
            "type" => $request->type
        ];

        $created = UserCreateController::get($data);

        if (isset($created["errors"])) {
            return $this->index($created);
        }

        $created["createdData"] = [
            [
                "dataName" => "Kullanıcı",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdUserData"]["no"]
                    ],
                    [
                        "column" => "Tam Adı",
                        "value" => $created["createdUserData"]["full_name"]
                    ],
                    [
                        "column" => "Kullanıcı Adı",
                        "value" => $created["createdUserData"]["username"]
                    ],
                    [
                        "column" => "Parola",
                        "value" => $created["createdUserData"]["password"]
                    ],
                    [
                        "column" => "Kullanıcı Tipi",
                        "value" => $created["createdUserData"]['type']['name']
                    ],
                    [
                        "column" => "Kullanıcı Ayarı No",
                        "value" => $created["createdUserData"]['settings']['no']
                    ]
                ]
            ],
            [
                "dataName" => "Kullanıcı Ayarı",
                "columnValues" => [
                    [
                        "column" => "No",
                        "value" => $created["createdUserSettingsData"]["no"]
                    ],
                    [
                        "column" => "Kullanıcı No",
                        "value" => $created["createdUserSettingsData"]["user_no"]
                    ],
                    [
                        "column" => "WebSite Tema",
                        "value" => $created["createdUserSettingsData"]["website_theme"]
                    ],
                    [
                        "column" => "Panel Tema",
                        "value" => $created["createdUserSettingsData"]["dashboard_theme"]
                    ]
                ]
            ]
        ];

        return $this->index($created);
    }
}
