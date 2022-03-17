<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Controller;

class NewsStatisticDetailPageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "Haber İstatistikleri Detay";
        return view("system.pages.news_statistic_detail")->with("data", $data);
    }
}
