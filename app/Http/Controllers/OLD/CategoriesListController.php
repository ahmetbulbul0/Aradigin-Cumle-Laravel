<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;

class CategoriesListController extends Controller
{
    public function index()
    {
        $data = [
            "page_title" => "Kategoriler",
            "data" => CategoriesModel::where("is_deleted", false)->with("type", "mainCategory")->get()->toArray()
        ];

        return view("private.pages.categories_list", ["data" => $data]);
    }
}
