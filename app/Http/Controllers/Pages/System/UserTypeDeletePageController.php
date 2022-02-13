<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\UserTypes\UserTypeDeleteController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTypeDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kullanıcı Tipi Sil";
        $data["basic_text"] = "kullanıcı tipini";
        $userTypeData = UserTypesListController::getFirstDataWithNoOnlyNotDeleted($no);
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $userTypeData["no"],
            ],
            [
                "label" => "Adı",
                "span" => $userTypeData["name"],
            ]
        ];
        return view("system.pages.user_type_delete")->with("data", $data);
    }

    public function form(Request $request)
    {

        if ($request->action == "reject") {
            return redirect(route("kullanici_tipleri"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = UserTypeDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kullanici_tipleri"));
        }

        return redirect(route("kullanici_tipleri"));
    }
}
