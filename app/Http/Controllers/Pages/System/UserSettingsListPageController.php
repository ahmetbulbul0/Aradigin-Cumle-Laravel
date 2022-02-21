<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\UserSettings\UserSettingsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSettingsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kullanıcı Ayarları";
        if (!isset($data["data"])) {
            $data["data"] = UserSettingsListController::getAllOnlyNotDeletedAllRelationships();
        }
        return view("system.pages.user_settings_list")->with("data", $data);
    }
}
