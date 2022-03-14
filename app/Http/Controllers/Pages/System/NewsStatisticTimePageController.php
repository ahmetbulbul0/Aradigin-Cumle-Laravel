<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Controller;

class NewsStatisticTimePageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "Haber İstatistikleri Zaman";
        return view("system.pages.news_statistic_time")->with("data", $data);
    }
}
