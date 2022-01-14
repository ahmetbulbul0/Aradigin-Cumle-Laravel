<?php

namespace App\Http\Controllers;

use App\Models\ResourceUrlsModel;
use Illuminate\Http\Request;

class ResourceUrlsListController extends Controller
{
    public function index()
    {
        $data = [
            "page_title" => "Kaynak Siteler",
            "data" => ResourceUrlsModel::where("is_deleted", false)->with("newsNo", "resourcePlatform")->get()->toArray()
        ];
        
        return view("private.pages.resource_urls_list", ["data" => $data]);
    }
}
