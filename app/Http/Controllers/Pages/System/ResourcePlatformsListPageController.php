<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ResourcePlatforms\ResourcePlatformsListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourcePlatformsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kaynak Siteleri";
        if (!isset($data["data"])) {
            $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatas();
        }
        return view("system.pages.resource_platforms_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("kaynak_siteler"));
                break;
            case 'no09':
                return redirect(route("kaynak_siteler_no09"));
                break;
            case 'no90':
                return redirect(route("kaynak_siteler_no90"));
                break;
            case 'nameAZ':
                return redirect(route("kaynak_siteler_nameAZ"));
                break;
            case 'nameZA':
                return redirect(route("kaynak_siteler_nameZA"));
                break;
            case 'websiteLinkAZ':
                return redirect(route("kaynak_siteler_websiteLinkAZ"));
                break;
            case 'websiteLinkZA':
                return redirect(route("kaynak_siteler_websiteLinkZA"));
                break;
            case 'linkUrlAZ':
                return redirect(route("kaynak_siteler_linkUrlAZ"));
                break;
            case 'linkUrlZA':
                return redirect(route("kaynak_siteler_linkUrlZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByDescNo();
        return $this->index($data);
    }
    public function nameAZ()
    {
        $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByAscName();
        return $this->index($data);
    }
    public function nameZA()
    {
        $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByDescName();
        return $this->index($data);
    }
    public function websiteLinkAZ()
    {
        $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByAscMainUrl();
        return $this->index($data);
    }
    public function websiteLinkZA()
    {
        $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByDescMainUrl();
        return $this->index($data);
    }
    public function linkUrlAZ()
    {
        $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByAscName();
        return $this->index($data);
    }
    public function linkUrlZA()
    {
        $data["data"] = ResourcePlatformsListController::getAllDataOnlyNotDeletedDatasOrderByDescName();
        return $this->index($data);
    }
}
