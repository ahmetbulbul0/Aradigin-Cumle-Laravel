<?php

namespace App\Http\Controllers\Pages\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use App\Http\Controllers\Api\Visitors\VisitorsListController;

class VisitorsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Ziyaretçiler";
        $data["data"] = VisitorsListController::getAllData();
        if ($data["data"]) {
            $data["data"] = UnixTimeToTextDateController::MultipleTimeToDateForEveryColumn($data["data"], "last_login_time");
        }
        return view("system.pages.visitors_list")->with("data", $data);
    }
}
