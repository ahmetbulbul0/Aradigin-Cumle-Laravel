<?php

namespace App\Http\Controllers\Pages\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\CategoryGroupToText;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;

class SystemNewsListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Haberler";
        if (!isset($data["data"])) {
            $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationships();
        }
        $data = CategoryGroupToText::multiple($data);
        $data["data"] = UnixTimeToTextDateController::MultipleTimeToDate($data["data"]);
        $data["data"] = UnixTimeToTextDateController::MultipleTimeToDateForWriteTime($data["data"]);
        return view("system.pages.news_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("haberler"));
                break;
            case 'no09':
                return redirect(route("haberler_no09"));
                break;
            case 'no90':
                return redirect(route("haberler_no90"));
                break;
            case 'contentAZ':
                return redirect(route("haberler_contentAZ"));
                break;
            case 'contentZA':
                return redirect(route("haberler_contentZA"));
                break;
            case 'authorAZ':
                return redirect(route("haberler_authorAZ"));
                break;
            case 'authorZA':
                return redirect(route("haberler_authorZA"));
                break;
            case 'categoryAZ':
                return redirect(route("haberler_categoryAZ"));
                break;
            case 'categoryZA':
                return redirect(route("haberler_categoryZA"));
                break;
            case 'resourcePlatformAZ':
                return redirect(route("haberler_resourcePlatformAZ"));
                break;
            case 'resourcePlatformZA':
                return redirect(route("haberler_resourcePlatformZA"));
                break;
            case 'resourceUrlAZ':
                return redirect(route("haberler_resourceUrlAZ"));
                break;
            case 'resourceUrlZA':
                return redirect(route("haberler_resourceUrlZA"));
                break;
            case 'publishDateAZ':
                return redirect(route("haberler_publishDateAZ"));
                break;
            case 'publishDateZA':
                return redirect(route("haberler_publishDateZA"));
                break;
            case 'writeTimeAZ':
                return redirect(route("haberler_writeTimeAZ"));
                break;
            case 'writeTimeZA':
                return redirect(route("haberler_writeTimeZA"));
                break;
            case 'linkUrlAZ':
                return redirect(route("haberler_linkUrlAZ"));
                break;
            case 'linkUrlZA':
                return redirect(route("haberler_linkUrlZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo();
        return $this->index($data);
    }
    public function contentAZ()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscContent();
        return $this->index($data);
    }
    public function contentZA()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescContent();
        return $this->index($data);
    }
    public function authorAZ()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscAuthor();
        return $this->index($data);
    }
    public function authorZA()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescAuthor();
        return $this->index($data);
    }
    public function categoryAZ()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscCategory();
        return $this->index($data);
    }
    public function categoryZA()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescCategory();
        return $this->index($data);
    }
    public function resourcePlatformAZ()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscResourcePlatform();
        return $this->index($data);
    }
    public function resourcePlatformZA()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescResourcePlatform();
        return $this->index($data);
    }
    public function publishDateAZ()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscPublishDate();
        return $this->index($data);
    }
    public function publishDateZA()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescPublishDate();
        return $this->index($data);
    }
    public function writeTimeAZ()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscWriteTime();
        return $this->index($data);
    }
    public function writeTimeZA()
    {
        $data["data"] = NewsListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescWriteTime();
        return $this->index($data);
    }
}
