<?php

namespace App\Http\Controllers\Pages\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ResourceUrls\ResourceUrlsListController;

class ResourceUrlsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kaynak Linkleri";
        if (!isset($data["data"])) {
            $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationships();
        }
        return view("system.pages.resource_urls_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("kaynak_linkler"));
                break;
            case 'no09':
                return redirect(route("kaynak_linkler_no09"));
                break;
            case 'no90':
                return redirect(route("kaynak_linkler_no90"));
                break;
            case 'newsAZ':
                return redirect(route("kaynak_linkler_newsAZ"));
                break;
            case 'newsZA':
                return redirect(route("kaynak_linkler_newsZA"));
                break;
            case 'resourcePlatformAZ':
                return redirect(route("kaynak_linkler_resourcePlatformAZ"));
                break;
            case 'resourcePlatformZA':
                return redirect(route("kaynak_linkler_resourcePlatformZA"));
                break;
            case 'urlAZ':
                return redirect(route("kaynak_linkler_urlAZ"));
                break;
            case 'urlZA':
                return redirect(route("kaynak_linkler_urlZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo();
        return $this->index($data);
    }
    public function newsAZ()
    {
        $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNews();
        return $this->index($data);
    }
    public function newsZA()
    {
        $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNews();
        return $this->index($data);
    }
    public function resourcePlatformAZ()
    {
        $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscResourcePlatform();
        return $this->index($data);
    }
    public function resourcePlatformZA()
    {
        $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescResourcePlatform();
        return $this->index($data);
    }
    public function urlAZ()
    {
        $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscUrl();
        return $this->index($data);
    }
    public function urlZA()
    {
        $data["data"] = ResourceUrlsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescUrl();
        return $this->index($data);
    }
}
