<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use Illuminate\Support\Facades\Session;

class UserSignInController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);
        $password = htmlspecialchars($data["data"]["password"]);

        $data["data"] = [
            "no" => $no,
            "password" => $password
        ];

        return UserSignInController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];
        $password = $data["data"]["password"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "No Alanı Zorunludur";
        }

        if (!isset($password) || empty($password)) {
            $data["errors"]["password"] = "Parola Alanı Zorunludur";
        }

        if (isset($no) && !empty($no) && isset($password) && !empty($password) && !UsersModel::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["signIn"] = "Hatalı Giriş Bilgileri";
        }

        if (isset($no) && !empty($no) && isset($password) && !empty($password) && !UsersModel::where(["is_deleted" => false, "no" => $no, "password" => $password])->count()) {
            $data["errors"]["signIn"] = "Hatalı Giriş Bilgileri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return UserSignInController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];
        $password = $data["data"]["password"];

        $userData = UsersModel::where(["is_deleted" => false, "no" => $no, "password" => $password])->with("type", "settings")->first()->toArray();
        $userData["signedTime"] = UnixTimeToTextDateController::TimeToDate(time());

        Session::remove("visitorData");
        Session::put('userData', $userData);

        $data["status"] = "success";

        return $data;
    }
}
