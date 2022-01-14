<?php

namespace App\Http\Controllers;

use App\Models\ResourcePlatformsModel;
use Illuminate\Http\Request;

class ResourcePlatformsCreateController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kaynak Site Ekle";

        return view("private.pages.resource_create", ["data" => $data]);
    }

    public function form(Request $request)
    {
        if (!isset($request->resourceName)) {
            $data["errors"]["resourceName"] = "Bu Alan Zorunludur";
        }
        if (!isset($request->resourceUrl)) {
            $data["errors"]["resourceUrl"] = "Bu Alan Zorunludur";
        }

        $resourceName = htmlspecialchars($request->resourceName);
        $resourceUrl = htmlspecialchars($request->resourceUrl);

        if (ResourcePlatformsModel::where("name", $resourceName)->count()) {
            $data["errors"]["resourceName"] = "[$resourceName] Böyle Bir Kaynak Site Zaten Var";
        }

        if (ResourcePlatformsModel::where("main_url", $resourceUrl)->count()) {
            $data["errors"]["resourceName"] = "[$resourceUrl] Bu Url Adresi Daha Önceden Kullanılmış";
        }

        if (isset($data["errors"])) {
            return $this->index($data);
        }

        $turkishKeys = ['Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ",", "'", "(", ")", "[", "]", ";"];
        $englishKeys = ['c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', "", "", "", "", "", "", ""];
        $resourceLinkUrl = str_replace($turkishKeys, $englishKeys, $resourceName);
        $resourceLinkUrl = explode(" ", $resourceLinkUrl);
        $resourceLinkUrl = implode("-", $resourceLinkUrl);
        $resourceLinkUrl = strtolower($resourceLinkUrl);

        $resourceNo = NoGenerator::generateResourcePlatformsNo();

        ResourcePlatformsModel::create([
            "no" => $resourceNo,
            "name" => $resourceName,
            "main_url" => $resourceUrl,
            "link_url" => $resourceLinkUrl
        ]);

        $createdResource = ResourcePlatformsModel::where("no", $resourceNo)->get();

        $data["createdDataName"] = "Kaynak Site";

        $data["createdData"] = [
            [
                "column" => "No",
                "value" => $createdResource[0]["no"]
            ],
            [
                "column" => "Adı",
                "value" => $createdResource[0]["name"]
            ],
            [
                "column" => "Ana Url Adresi",
                "value" => $createdResource[0]["main_url"]
            ],
            [
                "column" => "Url Metni:",
                "value" => $createdResource[0]["link_url"]
            ]
        ];

        return $this->index($data);
    }
}
