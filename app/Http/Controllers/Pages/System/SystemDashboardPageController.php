<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\ListingsDetails\ListingsDetailsListController;
use App\Http\Controllers\Api\News\NewsListController;
use App\Http\Controllers\Api\ReadingsDetails\ReadingsDetailsListController;
use App\Http\Controllers\Api\Visitors\VisitorsListController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\GetTimeRangeController;

class SystemDashboardPageController extends Controller
{
    public function index()
    {
        $data["page_title"] = "AnaPanel";

        $data["values4Box"] = [
            "last24HourVisitorNumber" => count(VisitorsListController::getAllDataOnlyNotBannedDatasWhereLastLoginTimeInLast24Hours()),
            "last24HourListingNews" => count(ListingsDetailsListController::getAllDataWhereTimeInLast24Hours()),
            "last24HourReadingNews" => count(ReadingsDetailsListController::getAllDataWhereTimeInLast24Hours()),
            "last24HourPublishingNews" => NewsListController::getAllDataOnlyNotDeletedDatasWherePublishDateInLast24Hours() ? count(NewsListController::getAllDataOnlyNotDeletedDatasWherePublishDateInLast24Hours()) : 0,
        ];

        $data["graph"] = [
            "labels" => [
                date("d/M", strtotime("-6 days", time())),
                date("d/M", strtotime("-5 days", time())),
                date("d/M", strtotime("-4 days", time())),
                date("d/M", strtotime("-3 days", time())),
                date("d/M", strtotime("-2 days", time())),
                date("d/M", strtotime("-1 days", time())),
                date("d/M", time())
            ],
            "listings" =>[
                count(ListingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-6 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-6 days", time())))),
                count(ListingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-5 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-5 days", time())))),
                count(ListingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-4 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-4 days", time())))),
                count(ListingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-3 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-3 days", time())))),
                count(ListingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-2 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-2 days", time())))),
                count(ListingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-1 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-1 days", time())))),
                count(ListingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(time()), GetTimeRangeController::getValueDayFinishTime(time())))
            ],
            "readings" =>[
                count(ReadingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-6 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-6 days", time())))),
                count(ReadingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-5 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-5 days", time())))),
                count(ReadingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-4 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-4 days", time())))),
                count(ReadingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-3 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-3 days", time())))),
                count(ReadingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-2 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-2 days", time())))),
                count(ReadingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(strtotime("-1 days", time())), GetTimeRangeController::getValueDayFinishTime(strtotime("-1 days", time())))),
                count(ReadingsDetailsListController::getAllDataWhereTimeBetweenTimeStartTimeFinish(GetTimeRangeController::getValueDayStartTime(time()), GetTimeRangeController::getValueDayFinishTime(time())))
            ]
        ];

        return view("system.pages.dashboard")->with("data", $data);
    }
}
