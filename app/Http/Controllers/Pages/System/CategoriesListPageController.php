<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategoriler";
        if (!isset($data["data"])) {
            $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationships();
        }
        return view("system.pages.categories_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("kategoriler"));
                break;
            case 'no09':
                return redirect(route("kategoriler_no09"));
                break;
            case 'no90':
                return redirect(route("kategoriler_no90"));
                break;
            case 'nameAZ':
                return redirect(route("kategoriler_nameAZ"));
                break;
            case 'nameZA':
                return redirect(route("kategoriler_nameZA"));
                break;
            case 'typeAZ':
                return redirect(route("kategoriler_typeAZ"));
                break;
            case 'typeZA':
                return redirect(route("kategoriler_typeZA"));
                break;
            case 'mainCategoryAZ':
                return redirect(route("kategoriler_mainCategoryAZ"));
                break;
            case 'mainCategoryZA':
                return redirect(route("kategoriler_mainCategoryZA"));
                break;
            case 'linkUrlAZ':
                return redirect(route("kategoriler_linkUrlAZ"));
                break;
            case 'linkUrlZA':
                return redirect(route("kategoriler_linkUrlZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo();
        return $this->index($data);
    }
    public function nameAZ()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscName();
        return $this->index($data);
    }
    public function nameZA()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescName();
        return $this->index($data);
    }
    public function typeAZ()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscType();
        return $this->index($data);
    }
    public function typeZA()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescType();
        return $this->index($data);
    }
    public function mainCategoryAZ()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscMainCategory();
        return $this->index($data);
    }
    public function mainCategoryZA()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescMainCategory();
        return $this->index($data);
    }
    public function linkUrlAZ()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscLinkUrl();
        return $this->index($data);
    }
    public function linkUrlZA()
    {
        $data["data"] = CategoriesListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescLinkUrl();
        return $this->index($data);
    }
}
