<?php

namespace App\Http\Controllers\Pages\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorSettingsPageController extends Controller
{
    public function myAccount() {
        $data["page_title"] = "Ayarlar [Profilim]";
        return view("author.pages.settings_my_account")->with("data", $data);
    }

    public function theme() {
        $data["page_title"] = "Ayarlar [Tema]";
        return view("author.pages.settings_theme")->with("data", $data);
    }
}
