<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryTypesListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Tipleri";
        if (!isset($data["data"])) {
            $data["data"] = CategoryTypesListController::getAllDataOnlyNotDeletedDatas();
        }
        return view("system.pages.category_types_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("kategori_tipleri"));
                break;
            case 'no09':
                return redirect(route("kategori_tipleri_no09"));
                break;
            case 'no90':
                return redirect(route("kategori_tipleri_no90"));
                break;
            case 'nameAZ':
                return redirect(route("kategori_tipleri_nameAZ"));
                break;
            case 'nameZA':
                return redirect(route("kategori_tipleri_nameZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = CategoryTypesListController::getAllDataOnlyNotDeletedDatasOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = CategoryTypesListController::getAllDataOnlyNotDeletedDatasOrderByDescNo();
        return $this->index($data);
    }
    public function nameAZ()
    {
        $data["data"] = CategoryTypesListController::getAllDataOnlyNotDeletedDatasOrderByAscName();
        return $this->index($data);
    }
    public function nameZA()
    {
        $data["data"] = CategoryTypesListController::getAllDataOnlyNotDeletedDatasOrderByDescName();
        return $this->index($data);
    }
}
