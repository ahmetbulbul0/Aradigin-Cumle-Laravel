<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  DashboardController extends Controller
{
    public function index()
    {
        $data["page_title"] = "Yazar Paneli";
        return view("private.pages.dashboard", ["data" => $data]);
    }

    public function system()
    {
        $data["page_title"] = "Sistem Paneli";
        return view("private.pages.dashboard", ["data" => $data]);
    }
}
