<?php

namespace App\Http\Controllers\Pages\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SignOutPageController extends Controller
{
    public function index()
    {
        if (Session::get("userData")) {
            Session::forget("userData");
            return redirect(route("anasayfa"));
        }
        return redirect(route("anasayfa"));
    }
}
