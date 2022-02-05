<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {
        $data["page_title"] = "AnaSayfa";
        return view("visitor.pages.home")->with("data", $data);
    }
}
