<?php

namespace App\Http\Controllers;

use App\Models\CategoryGroupsModel;
use Illuminate\Http\Request;

class CategoryGroupsListController extends Controller
{
    public function index()
    {
        $data = [
            "page_title" => "Kategori Grupları",
            "data" => CategoryGroupsModel::where("is_deleted", false)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray()
        ];

        return view("private.pages.category_groups_list", ["data" => $data]);
    }
}
