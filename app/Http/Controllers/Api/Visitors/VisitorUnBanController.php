<?php

namespace App\Http\Controllers\Api\Visitors;

use Illuminate\Http\Request;
use App\Models\VisitorsModel;
use App\Http\Controllers\Controller;

class VisitorUnBanController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return VisitorUnBanController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "Ziyaretçi No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !VisitorsListController::getFirstDataOnlyBannedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz Ziyaretçi No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return VisitorUnBanController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        VisitorsModel::where(["is_banned" => true, "no" => $no])->update([
            "is_banned" => false
        ]);

        $data["status"] = "success";
        return $data;
    }
}
