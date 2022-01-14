<?php

namespace App\Http\Controllers;

use App\Models\ResourcePlatformsModel;
use Illuminate\Http\Request;

class ResourcePlatformsListController extends Controller
{
    public function index()
    {
        $data = [
            "page_title" => "Kaynak Siteler",
            "data" => ResourcePlatformsModel::where("is_deleted", false)->get()->toArray()
        ];

        return view("private.pages.resource_platforms_list", ["data" => $data]);
    }
}
