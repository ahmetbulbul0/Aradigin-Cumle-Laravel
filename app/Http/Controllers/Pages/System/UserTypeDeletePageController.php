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
        $itemData = UserTypesListController::getFirstDataWithNoOnlyNotDeleted($no);
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $itemData["no"],
            ],
            [
                "label" => "Adı",
                "span" => $itemData["name"],
            ]
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
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
