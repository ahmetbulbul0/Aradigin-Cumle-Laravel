<?php

namespace App\Http\Controllers;

use App\Models\CategoryTypesModel;
use Illuminate\Http\Request;

class CategoryTypesListController extends Controller
{
    public function index()
    {
        $data = [
            "page_title" => "Kategori Tipleri",
            "data" => CategoryTypesModel::where("is_deleted", false)->get()->toArray()
        ];

        return view("private.pages.category_types_list", ["data" => $data]);
    }
}
