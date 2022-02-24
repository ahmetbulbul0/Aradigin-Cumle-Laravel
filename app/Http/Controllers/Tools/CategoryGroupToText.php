<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroupsModel;

class CategoryGroupToText extends Controller
{
    static function multiple($data)
    {
        $count = count($data["data"]);
        for ($i = 0; $i < $count; $i++) {
            $item = $data["data"][$i]["category"]["no"];
            $data["data"][$i]["category"]["text"] = CategoryGroupToText::single($item);
        }
        return $data;
    }

    static function single($no)
    {
        $get = CategoryGroupsModel::where("no", $no)->with("main", "sub1", "sub2", "sub3", "sub4", "sub5")->first()->toArray();
        $data = [
            "main" => $get["main"]["name"],
            "sub1" => $get["sub1"]["name"] ?? NULL,
            "sub2" => $get["sub2"]["name"] ?? NULL,
            "sub3" => $get["sub3"]["name"] ?? NULL,
            "sub4" => $get["sub4"]["name"] ?? NULL,
            "sub5" => $get["sub5"]["name"] ?? NULL
        ];
        if (empty($data["sub1"])) {
            unset($data["sub1"]);
        }
        if (empty($data["sub2"])) {
            unset($data["sub2"]);
        }
        if (empty($data["sub3"])) {
            unset($data["sub3"]);
        }
        if (empty($data["sub4"])) {
            unset($data["sub4"]);
        }
        if (empty($data["sub5"])) {
            unset($data["sub5"]);
        }

        $data = implode(" #", $data);
        $data = "#" . $data;

        return $data;
    }
}
