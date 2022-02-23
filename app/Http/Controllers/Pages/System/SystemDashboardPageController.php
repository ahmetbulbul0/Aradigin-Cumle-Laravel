<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Controller;

class SystemDashboardPageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "AnaPanel";
        return view("system.pages.dashboard")->with("data", $data);
    }
}
