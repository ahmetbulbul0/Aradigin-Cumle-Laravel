<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryGroupUrlsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;
use App\Http\Requests\CategoryGroupUrls\CategoryGroupUrlsIndexRequest;
use App\Http\Requests\CategoryGroupUrls\CategoryGroupUrlsStoreRequest;

class CategoryGroupUrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryGroupUrlsIndexRequest $request)
    {
        $categoryGroupUrls = new CategoryGroupUrlsModel;

        $categoryGroupUrls = EloquentGenerator::whereGenerateByIsDeleted($request, $categoryGroupUrls);

        $listTypeNames = [
            "no09",
            "no90",
            "group_no09",
            "group_no90",
            "link_urlAZ",
            "link_urlZA",
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $categoryGroupUrls = EloquentGenerator::orderByWithListType($request, $categoryGroupUrls, $listTypes);

        $categoryGroupUrls = EloquentGenerator::whereGenerateByColumn($request, $categoryGroupUrls, "group_no", "equal");
        $categoryGroupUrls = EloquentGenerator::whereGenerateByColumn($request, $categoryGroupUrls, "link_url", "search");

        $categoryGroupUrls = $categoryGroupUrls->with("groupNo")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group Urls", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "group_no", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryGroupUrls)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryGroupUrlsStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateCategoryGroupUrlsNo(),
            "group_no" => $request->group_no,
            "link_url" => $request->link_url,
        ];

        CategoryGroupUrlsModel::create($data);

        $categoryGroupUrl = CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $data["no"]])->with("groupNo")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group Url", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["group_no", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryGroupUrl)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($categoryGroupUrlNo)
    {
        $categoryGroupUrl = CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->first() ? CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->get()->toArray() : CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->first();

        if (!$categoryGroupUrl) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Group Url", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryGroupUrlNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group Url", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryGroupUrlNo]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryGroupUrl)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($categoryGroupUrlNo, Request $request)
    {
        $oldCategoryGroupUrl = CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->first() ? CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->get()->toArray() : CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->first();

        if (!$oldCategoryGroupUrl) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Group Url", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["link_url"], ["label" => "no", "value" => $categoryGroupUrlNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "link_url" => $request->link_url ? $request->link_url : $oldCategoryGroupUrl[0]["link_url"]
        ];

        CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->update($data);

        $newCategoryGroupUrl = CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group Url", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["link_url"], ["label" => "no", "value" => $categoryGroupUrlNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldCategoryGroupUrl),
                "new" => RestApiResponseGenerator::dataGenerate($newCategoryGroupUrl)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryGroupUrlNo)
    {
        $categoryGroupUrl = CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->first() ? CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->get()->toArray() : CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->with("groupNo")->first();

        if (!$categoryGroupUrl) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Group Url", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryGroupUrlNo]),
                "data" => 0
            ], 404);
        }

        CategoryGroupUrlsModel::where(["is_deleted" => false, "no" => $categoryGroupUrlNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group Url", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryGroupUrlNo]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryGroupUrl)
        ], 200);
    }
}
