<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Users\UserDeleteController;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDeletePageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Kullanıcı Sil";
        $data["basic_text"] = "kullanıcıyı";
        $itemData = UsersListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereNo($no);
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $itemData["no"],
            ],
            [
                "label" => "Tam Adı",
                "span" => $itemData["full_name"],
            ],
            [
                "label" => "Kullanıcı Adı",
                "span" => $itemData["username"],
            ],
            [
                "label" => "Parola",
                "span" => $itemData["password"],
            ],
            [
                "label" => "Tipi",
                "span" => $itemData["type"]["name"],
            ]
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
    }
    public function form(Request $request)
    {

        if ($request->action == "reject") {
            return redirect(route("kullanicilar"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = UserDeleteController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("kullanicilar"));
        }

        return redirect(route("kullanicilar"));
    }
}
