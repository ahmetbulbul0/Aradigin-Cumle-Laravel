<?php

namespace App\Http\Controllers\Pages\Visitor;

use Illuminate\Http\Request;
use App\Models\VisitorsModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VisitorChangeWebSiteThemePageController extends Controller
{
    public function form(Request $request) {

        if (!$request->websiteTheme) {
            return response()->view('errors.400');
        }

        switch ($request->websiteTheme) {
            case 'dark':
                $websiteTheme = "dark";
                break;
            case 'light':
                $websiteTheme = "light";
                break;
            default:
                return response()->view('errors.400');
                break;
        }

        if (!Session::get("visitorData")) {
            return response()->view('errors.400');
        }

        if (!VisitorsModel::where("no", Session::get("visitorData.no"))->count()) {
            return response()->view('errors.400');
        }

        VisitorsModel::where("no", Session::get("visitorData.no"))->update([
            "website_theme" => $websiteTheme
        ]);

        return redirect(Session::previousUrl());

    }
}
