<?php

namespace App\Http\Controllers\Pages\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyNewsStatisticTimePageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "Haber İstatistikleri Zaman";
        return view("author.pages.my_news_statistic_time")->with("data", $data);
    }
}
