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
            $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShips();
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
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByDescNo();
        return $this->index($data);
    }
    public function mainAZ()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByAscMain();
        return $this->index($data);
    }
    public function mainZA()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByDescMain();
        return $this->index($data);
    }
    public function sub1AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByAscSub1();
        return $this->index($data);
    }
    public function sub1ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByDescSub1();
        return $this->index($data);
    }
    public function sub2AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByAscSub2();
        return $this->index($data);
    }
    public function sub2ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByDescSub2();
        return $this->index($data);
    }
    public function sub3AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByAscSub3();
        return $this->index($data);
    }
    public function sub3ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByDescSub3();
        return $this->index($data);
    }
    public function sub4AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByAscSub4();
        return $this->index($data);
    }
    public function sub4ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByDescSub4();
        return $this->index($data);
    }
    public function sub5AZ()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByAscSub5();
        return $this->index($data);
    }
    public function sub5ZA()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByDescSub5();
        return $this->index($data);
    }
    public function linkUrlAZ()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByAscLinkUrl();
        return $this->index($data);
    }
    public function linkUrlZA()
    {
        $data["data"] = CategoryGroupsListController::getAllOnlyNotDeletedAllRelationShipsOrderByDescLinkUrl();
        return $this->index($data);
    }
}
