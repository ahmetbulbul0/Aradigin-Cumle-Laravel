<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Models\UserTypesModel;
use Illuminate\Http\Request;

class UsersCreateController extends Controller
{
    public function index($data = NULL)
    {

        $data["page_title"] = "Kullanıcı Ekle";

        $data["userTypes"] = UserTypesModel::where("is_deleted", false)->get();

        return view("private.pages.user_create", ["data" => $data]);
    }

    public function form(Request $request)
    {

        if (!isset($request->userFullName)) {
            $data["errors"]["userFullName"] = "Bu Alan Zorunludur";
        }
        if (!isset($request->userName)) {
            $data["errors"]["userName"] = "Bu Alan Zorunludur";
        }
        if (!isset($request->userPassword)) {
            $data["errors"]["userPassword"] = "Bu Alan Zorunludur";
        }
        if (!isset($request->userType)) {
            $data["errors"]["userType"] = "Bu Alan Zorunludur";
        }

        $userFullName = htmlspecialchars($request->userFullName);
        $userName = htmlspecialchars($request->userName);
        $userPassword = htmlspecialchars($request->userPassword);
        $userType = htmlspecialchars($request->userType);

        if (UsersModel::where("username", $userName)->count()) {
            $data["errors"]["userName"] = "[$userName] Bu Kullanıcı Adı Alınmış";
        }

        if (!empty($userType) && !UserTypesModel::where("no", $userType)->count()) {
            $data["errors"]["userType"] = "[$userType] Böyle Bir Kullanıcı Tipi Yok";
        }

        if (isset($data["errors"])) {
            return $this->index($data);
        }

        $userNo = NoGenerator::generateUsersNo();

        UsersModel::create([
            "no" => $userNo,
            "full_name" => $userFullName,
            "username" => $userName,
            "password" => $userPassword,
            "type" => $userType
        ]);

        $createdUser = UsersModel::where("no", $userNo)->with("type")->get()->toArray();

        $data["createdDataName"] = "Kullanıcı";

        $data["createdData"] = [
            [
                "column" => "No",
                "value" => $createdUser[0]["no"]
            ],
            [
                "column" => "Tam Adı",
                "value" => $createdUser[0]["full_name"]
            ],
            [
                "column" => "Kullanıcı Adı",
                "value" => $createdUser[0]["username"]
            ],
            [
                "column" => "Parolası",
                "value" => $createdUser[0]["password"]
            ],
            [
                "column" => "Kullanıcı Tipi",
                "value" => $createdUser[0]['type']['name']
            ]
        ];

        return $this->index($data);
    }
}
