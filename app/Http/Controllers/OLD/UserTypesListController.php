<?php

namespace App\Http\Controllers;

use App\Models\UserTypesModel;
use Illuminate\Http\Request;

class UserTypesListController extends Controller
{
    public function index()
    {
        $data["page_title"] = "Kullanıcı Tipleri";

        $data = [
            "page_title" => "Kullanıcı Tipleri",
            "data" => UserTypesModel::where("is_deleted", false)->get()
        ];

        return view("private.pages.user_types_list", ["data" => $data]);
    }
}
