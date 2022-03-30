<?php

namespace App\Http\Controllers\Pages\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\CategoryGroupUrls\CategoryGroupUrlsListController;

class CategoryGroupUrlsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Grup Link Metinleri";
        if (!isset($data["data"])) {
            $data["data"] = CategoryGroupUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationships();
        }
        if (isset($data["data"])) {
            for ($i = 0; $i < count($data["data"]); $i++) {
                $data["data"][$i]["group_no"] = CategoryGroupToText::single($data["data"][$i]["group_no"]);
            }
        }
        return view("system.pages.category_group_urls_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("kategori_grubu_linkleri"));
                break;
            case 'no09':
                return redirect(route("kategori_grubu_linkleri_no09"));
                break;
            case 'no90':
                return redirect(route("kategori_grubu_linkleri_no90"));
                break;
            case 'categoryGroupAZ':
                return redirect(route("kategori_grubu_linkleri_categoryGroupAZ"));
                break;
            case 'categoryGroupZA':
                return redirect(route("kategori_grubu_linkleri_categoryGroupZA"));
                break;
            case 'linkUrlAZ':
                return redirect(route("kategori_grubu_linkleri_linkUrlAZ"));
                break;
            case 'linkUrlZA':
                return redirect(route("kategori_grubu_linkleri_linkUrlZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = CategoryGroupUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = CategoryGroupUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo();
        return $this->index($data);
    }
    public function categoryGroupAZ()
    {
        $data["data"] = CategoryGroupUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscGroupNo();
        return $this->index($data);
    }
    public function categoryGroupZA()
    {
        $data["data"] = CategoryGroupUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescGroupNo();
        return $this->index($data);
    }
    public function linkUrlAZ()
    {
        $data["data"] = CategoryGroupUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscLinkurl();
        return $this->index($data);
    }
    public function linkUrlZA()
    {
        $data["data"] = CategoryGroupUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescLinkurl();
        return $this->index($data);
    }
}
