<?php

namespace App\Http\Controllers;

use App\Models\UserTypesModel;
use Illuminate\Http\Request;

class UserTypeCreateController extends Controller
{
    public function index($data = NULL) {

        $data["page_title"] = "Kullanıcı Tipi Ekle";

        return view("private.pages.user_type_create", ["data" => $data]);
    }

    public function form(Request $request) {
        if (!isset($request->userTypeName)) {
            return redirect("/sistem-paneli/kullanıcı-tipi/ekle");
        }

        $userTypeName = htmlspecialchars($request->userTypeName);

        if (UserTypesModel::where("name", $userTypeName)->count()) {
            $data["errors"]["userTypeName"] = "[$userTypeName] Bu İsimde Bi Kullanıcı Tipi Zaten Var";
        }

        if (isset($data["errors"])) {
            return $this->index($data);
        }

        $userTypeNo = NoGenerator::generateUserTypesNo();

        UserTypesModel::create([
            "no" => $userTypeNo,
            "name" => $userTypeName
        ]);

        $createdUserType = UserTypesModel::where("no", $userTypeNo)->get();

        $data["createdDataName"] = "Kullanıcı Tipi";

        $data["createdData"] = [
            [
                "column" => "No",
                "value" => $createdUserType[0]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $createdUserType[0]["name"]
            ]
        ];

        return $this->index($data);

    }
}
