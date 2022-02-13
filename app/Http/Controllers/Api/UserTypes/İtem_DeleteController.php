<?php

namespace App\Http\Controllers\Api\İTEMNAMESPACE;

use App\Http\Controllers\Controller;

class İtem_DeleteController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return İtem_DeleteController::check($data);
    }

    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["name"] = "İTEM NAME No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !İTEMNAMEMODEL::where(["is_deleted" => false, "no" => $no])->count()) {
            $data["errors"]["no"] = "Geçersiz İTEM NAME No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return İtem_DeleteController::work($data);
    }

    static function work($data)
    {
        $no = $data["data"]["no"];

        İTEMNAMEMODEL::where(["is_deleted" => false, "no" => "$no"])->update([
            "is_deleted" => true
        ]);

        $data["status"] = "success";
        return $data;
    }
}
