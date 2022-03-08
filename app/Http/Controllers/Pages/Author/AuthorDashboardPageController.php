<?php

namespace App\Http\Controllers\Pages\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorDashboardPageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "AnaPanel";
        return view("author.pages.dashboard")->with("data", $data);
    }
}
