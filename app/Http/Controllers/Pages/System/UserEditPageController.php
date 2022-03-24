<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Users\UserEditController;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kullanıcı Düzenle";
        $data["userTypes"] = UserTypesListController::getAllDataOnlyNotDeletedDatas();

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            return view("system.pages.user_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = UsersListController::getFirstDataOnlyNotDeletedDatasWhereNo($no);
        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }
        return view("system.pages.user_edit")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "full_name" => $request->fullName,
            "username" => $request->username,
            "password" => $request->password,
            "type" => $request->type
        ];

        $edited = UserEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kullanıcı";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "Tam Adı",
                "value" => $edited["editedData"]["full_name"]
            ],
            [
                "column" => "Kullanıcı Adı",
                "value" => $edited["editedData"]["username"]
            ],
            [
                "column" => "Parolası",
                "value" => $edited["editedData"]["password"]
            ],
            [
                "column" => "Kullanıcı Tipi",
                "value" => $edited["editedData"]['type']['name']
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
