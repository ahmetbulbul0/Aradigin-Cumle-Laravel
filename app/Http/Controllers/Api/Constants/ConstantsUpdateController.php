<?php

namespace App\Http\Controllers\Api\Constants;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Models\ConstantsModel;
use Illuminate\Http\Request;

class ConstantsUpdateController extends Controller
{
    static function get($data)
    {
        $key_categoryTypeMain = htmlspecialchars($data["data"][0]["key"]);
        $value_categoryTypeMain = htmlspecialchars(intval($data["data"][0]["value"]));
        $key_categoryTypeSub = htmlspecialchars($data["data"][1]["key"]);
        $value_categoryTypeSub = htmlspecialchars(intval($data["data"][1]["value"]));
        $key_userTypeAuthor = htmlspecialchars($data["data"][2]["key"]);
        $value_userTypeAuthor = htmlspecialchars(intval($data["data"][2]["value"]));
        $key_userTypeSystem = htmlspecialchars($data["data"][3]["key"]);
        $value_userTypeSystem = htmlspecialchars(intval($data["data"][3]["value"]));
        $key_webSiteVisitorMenuCategory1 = htmlspecialchars($data["data"][4]["key"]);
        $value_webSiteVisitorMenuCategory1 = htmlspecialchars(intval($data["data"][4]["value"]));
        $key_webSiteVisitorMenuCategory2 = htmlspecialchars($data["data"][5]["key"]);
        $value_webSiteVisitorMenuCategory2 = htmlspecialchars(intval($data["data"][5]["value"]));
        $key_webSiteVisitorMenuCategory3 = htmlspecialchars($data["data"][6]["key"]);
        $value_webSiteVisitorMenuCategory3 = htmlspecialchars(intval($data["data"][6]["value"]));
        $key_webSiteVisitorMenuCategory4 = htmlspecialchars($data["data"][7]["key"]);
        $value_webSiteVisitorMenuCategory4 = htmlspecialchars(intval($data["data"][7]["value"]));
        $key_webSiteVisitorMenuCategory5 = htmlspecialchars($data["data"][8]["key"]);
        $value_webSiteVisitorMenuCategory5 = htmlspecialchars(intval($data["data"][8]["value"]));
        $key_webSiteVisitorMenuCategory6 = htmlspecialchars($data["data"][9]["key"]);
        $value_webSiteVisitorMenuCategory6 = htmlspecialchars(intval($data["data"][9]["value"]));
        $key_webSiteVisitorMenuCategory7 = htmlspecialchars($data["data"][10]["key"]);
        $value_webSiteVisitorMenuCategory7 = htmlspecialchars(intval($data["data"][10]["value"]));
        $key_webSiteVisitorMenuCategory8 = htmlspecialchars($data["data"][11]["key"]);
        $value_webSiteVisitorMenuCategory8 = htmlspecialchars(intval($data["data"][11]["value"]));

        $data["data"] = [
            [
                "key" => $key_categoryTypeMain,
                "value" => $value_categoryTypeMain,
            ],
            [
                "key" => $key_categoryTypeSub,
                "value" => $value_categoryTypeSub,
            ],
            [
                "key" => $key_userTypeAuthor,
                "value" => $value_userTypeAuthor,
            ],
            [
                "key" => $key_userTypeSystem,
                "value" => $value_userTypeSystem,
            ],
            [
                "key" => $key_webSiteVisitorMenuCategory1,
                "value" => $value_webSiteVisitorMenuCategory1,
            ],
            [
                "key" => $key_webSiteVisitorMenuCategory2,
                "value" => $value_webSiteVisitorMenuCategory2,
            ],
            [
                "key" => $key_webSiteVisitorMenuCategory3,
                "value" => $value_webSiteVisitorMenuCategory3,
            ],
            [
                "key" => $key_webSiteVisitorMenuCategory4,
                "value" => $value_webSiteVisitorMenuCategory4,
            ],
            [
                "key" => $key_webSiteVisitorMenuCategory5,
                "value" => $value_webSiteVisitorMenuCategory5,
            ],
            [
                "key" => $key_webSiteVisitorMenuCategory6,
                "value" => $value_webSiteVisitorMenuCategory6,
            ],
            [
                "key" => $key_webSiteVisitorMenuCategory7,
                "value" => $value_webSiteVisitorMenuCategory7,
            ],
            [
                "key" => $key_webSiteVisitorMenuCategory8,
                "value" => $value_webSiteVisitorMenuCategory8
            ]
        ];

        return ConstantsUpdateController::check($data);
    }

    static function check($data)
    {
        foreach ($data["data"] as $item) {
            if (isset($item["key"]) && !empty($item["key"]) && !ConstantsModel::where("key", $item["key"])->count()) {
                ConstantsModel::create([
                    "no" => NoGenerator::generateConstantsNo(),
                    "key" => $item["key"]
                ]);
            }
        }

        return ConstantsUpdateController::work($data);
    }

    static function work($data)
    {

        foreach ($data["data"] as $item) {
            if (isset($item["value"]) && !empty($item["value"]) && !ConstantsModel::where(["key" => $item["key"], "value" => $item["value"]])->count()) {
                ConstantsModel::where("key", $item["key"])->update([ 
                    "value" => $item["value"]
                ]);
            }
        }

        
    }
}
