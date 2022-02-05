<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemDashboardPageController extends Controller
{
    public function index() {
        $data["page_title"] = "AnaPanel";
        return view("system.pages.dashboard")->with("data", $data);
    }
}
