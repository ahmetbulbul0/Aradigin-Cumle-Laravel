<?php

namespace App\Http\Controllers\Api\Visitors;

use App\Http\Controllers\Controller;
use App\Models\VisitorsModel;
use Illuminate\Http\Request;

class VisitorBanController extends Controller
{
    static function get($data)
    {
        $no = htmlspecialchars($data["data"]["no"]);

        $data["data"] = [
            "no" => $no
        ];

        return VisitorBanController::check($data);
    }
    static function check($data)
    {
        $no = $data["data"]["no"];

        if (!isset($no) || empty($no)) {
            $data["errors"]["no"] = "Ziyaretçi No Alanı Boş Olamaz";
        }

        if (isset($no) && !empty($no) && !VisitorsListController::getFirstDataOnlyNotBannedDatasWhereNo($no)) {
            $data["errors"]["no"] = "Geçersiz Ziyaretçi No Değeri";
        }

        if (isset($data["errors"])) {
            return $data;
        }

        return VisitorBanController::work($data);
    }
    static function work($data)
    {
        $no = $data["data"]["no"];

        VisitorsModel::where(["is_banned" => false, "no" => $no])->update([
            "is_banned" => true
        ]);

        $data["status"] = "success";
        return $data;
    }
}
