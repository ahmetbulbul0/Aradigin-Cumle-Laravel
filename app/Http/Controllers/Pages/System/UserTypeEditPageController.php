<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\UserTypes\UserTypeEditController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;

class UserTypeEditPageController extends Controller
{
    public function index($no, $data = NULL)
    {
        $data["page_title"] = "Kullanici Tipi Düzenle";

        if (!empty($data["editedData"]) || !empty($data["errors"])) {
            return view("system.pages.user_type_edit")->with("data", $data);
        }

        $no = htmlspecialchars($no);
        $no = intval($no);
        $data["data"] = UserTypesListController::getFirstDataWithNoOnlyNotDeleted($no);
        if (empty($data["data"])) {
            return "HATA_SAYFASI_OLUŞTURULACAK";
        }
        return view("system.pages.user_type_edit")->with("data", $data);
    }
    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "name" => $request->name
        ];

        $edited = UserTypeEditController::get($data);

        if (isset($edited["errors"])) {
            return $this->index(NULL, $edited);
        }

        $edited["editedDataName"] = "Kullanıcı Tipi";

        $edited["editedData"] = [
            [
                "column" => "No",
                "value" => $edited["editedData"]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $edited["editedData"]["name"]
            ]
        ];

        return $this->index(NULL, $edited);
    }
}
