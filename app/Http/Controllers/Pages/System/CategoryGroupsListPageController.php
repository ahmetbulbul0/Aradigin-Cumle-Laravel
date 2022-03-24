<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryGroupsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kategori Grupları";
        if (!isset($data["data"])) {
            $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationships();
        }
        return view("system.pages.category_groups_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("kategoriler"));
                break;
            case 'no09':
                return redirect(route("kategori_gruplari_no09"));
                break;
            case 'no90':
                return redirect(route("kategori_gruplari_no90"));
                break;
            case 'mainAZ':
                return redirect(route("kategori_gruplari_mainAZ"));
                break;
            case 'mainZA':
                return redirect(route("kategori_gruplari_mainZA"));
                break;
            case 'sub1AZ':
                return redirect(route("kategori_gruplari_sub1AZ"));
                break;
            case 'sub1ZA':
                return redirect(route("kategori_gruplari_sub1ZA"));
                break;
            case 'sub2AZ':
                return redirect(route("kategori_gruplari_sub2AZ"));
                break;
            case 'sub2ZA':
                return redirect(route("kategori_gruplari_sub2ZA"));
                break;
            case 'sub3AZ':
                return redirect(route("kategori_gruplari_sub3AZ"));
                break;
            case 'sub3ZA':
                return redirect(route("kategori_gruplari_sub3ZA"));
                break;
            case 'sub4AZ':
                return redirect(route("kategori_gruplari_sub4AZ"));
                break;
            case 'sub4ZA':
                return redirect(route("kategori_gruplari_sub4ZA"));
                break;
            case 'sub5AZ':
                return redirect(route("kategori_gruplari_sub5AZ"));
                break;
            case 'sub5ZA':
                return redirect(route("kategori_gruplari_sub5ZA"));
                break;
            case 'linkUrlAZ':
                return redirect(route("kategori_gruplari_linkUrlAZ"));
                break;
            case 'linkUrlZA':
                return redirect(route("kategori_gruplari_linkUrlZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo();
        return $this->index($data);
    }
    public function mainAZ()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscMain();
        return $this->index($data);
    }
    public function mainZA()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescMain();
        return $this->index($data);
    }
    public function sub1AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub1();
        return $this->index($data);
    }
    public function sub1ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub1();
        return $this->index($data);
    }
    public function sub2AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub2();
        return $this->index($data);
    }
    public function sub2ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub2();
        return $this->index($data);
    }
    public function sub3AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub3();
        return $this->index($data);
    }
    public function sub3ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub3();
        return $this->index($data);
    }
    public function sub4AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub4();
        return $this->index($data);
    }
    public function sub4ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub4();
        return $this->index($data);
    }
    public function sub5AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscSub5();
        return $this->index($data);
    }
    public function sub5ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescSub5();
        return $this->index($data);
    }
    public function linkUrlAZ()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscLinkUrl();
        return $this->index($data);
    }
    public function linkUrlZA()
    {
        $data["data"] = CategoryGroupsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescLinkUrl();
        return $this->index($data);
    }
}
