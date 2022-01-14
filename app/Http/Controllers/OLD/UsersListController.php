<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;

class UsersListController extends Controller
{
    public function index()
    {
        $data = [
            "page_title" => "Kullanıcı Hesapları",
            "data" => UsersModel::where("is_deleted", false)->with("type")->get()->toArray()
        ];

        return view("private.pages.users_list", ["data" => $data]);
    }
}
