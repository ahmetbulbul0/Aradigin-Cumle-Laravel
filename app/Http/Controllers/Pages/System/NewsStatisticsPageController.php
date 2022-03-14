<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Controller;

class NewsStatisticsPageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "Haber İstatistikleri";
        return view("system.pages.news_statistics")->with("data", $data);
    }
}
