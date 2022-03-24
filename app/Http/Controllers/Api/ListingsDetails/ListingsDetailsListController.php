<?php

namespace App\Http\Controllers\Api\ListingsDetails;

use Illuminate\Http\Request;
use App\Models\ListingsDetailModel;
use App\Http\Controllers\Controller;

class ListingsDetailsListController extends Controller
{
    static function getFirstDataWhereNo($no) {
        return ListingsDetailModel::where(["no" => $no])->count() ? ListingsDetailModel::where(["no" => $no])->first() : NULL;
    }
    static function getFirstDataWhereNewsNoWhereVisitorNoOrderByDescTime($newsNo, $visitorNo) {
        return ListingsDetailModel::where(["news_no" => $newsNo, "visitor_no" => $visitorNo])->orderBy("time", "DESC")->count() ? ListingsDetailModel::where(["news_no" => $newsNo, "visitor_no" => $visitorNo])->orderBy("time", "DESC")->first() : NULL;
    }
}
