<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Visitors\VisitorsListController;
use App\Http\Controllers\Api\Visitors\VisitorUnBanController;

class VisitorUnBanPageController extends Controller
{
    public function index($no)
    {
        $data["page_title"] = "Ziyaretçi Ban Kaldırma";
        $data["basic_text"] = "ziyaretçiyi";
        $data["action_name"] = "ban kaldırma";
        $itemData = VisitorsListController::getFirstDataOnlyBannedDatasWhereNo($no);
        if (!$itemData) {
            return response()->view('errors.404');
        }
        $data["itemData"] = [
            [
                "label" => "No",
                "span" => $itemData["no"]
            ],
            [
                "label" => "İp",
                "span" => $itemData["ip"]
            ],
            [
                "label" => "Tarayıcı",
                "span" => $itemData["browser"]
            ],
            [
                "label" => "Son Giriş Tarihi",
                "span" => $itemData["last_login_time"]
            ],
            [
                "label" => "WebSite Tema",
                "span" => $itemData["website_theme"]
            ]
        ];
        return view("system.pages.delete_confirm")->with("data", $data);
    }
    public function form(Request $request)
    {
        if ($request->action == "reject") {
            return redirect(route("ziyaretciler"));
        }

        $data["data"]["no"] = $request->no;

        $deleted = VisitorUnBanController::get($data);

        if (isset($deleted["errors"])) {
            return redirect(route("ziyaretciler"));
        }

        return redirect(route("ziyaretciler"));
    }
}
