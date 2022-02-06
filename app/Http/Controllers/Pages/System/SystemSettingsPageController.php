<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemSettingsPageController extends Controller
{
    public function theme() {
        $data["page_title"] = "Ayarlar [Tema]";
        return view("system.pages.settings_theme")->with("data", $data);
    }

    public function constants() {
        $data["page_title"] = "Ayarlar [Sabitler]";
        return view("system.pages.settings_constants")->with("data", $data);
    }
}
