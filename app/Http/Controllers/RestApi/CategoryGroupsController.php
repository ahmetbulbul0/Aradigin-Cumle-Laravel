<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Http\Request;
use App\Models\CategoryGroupsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;
use App\Http\Requests\CategoryGroups\CategoryGroupsIndexRequest;
use App\Http\Requests\CategoryGroups\CategoryGroupsStoreRequest;
use App\Models\CategoryGroupUrlsModel;

class CategoryGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryGroupsIndexRequest $request)
    {
        $categoryGroups = new CategoryGroupsModel;

        $categoryGroups = EloquentGenerator::whereGenerateByIsDeleted($request, $categoryGroups);

        $listTypeNames = [
            "no09",
            "no90",
            "mainAZ",
            "mainZA",
            "sub1AZ",
            "sub1ZA",
            "sub2AZ",
            "sub2ZA",
            "sub3AZ",
            "sub3ZA",
            "sub4AZ",
            "sub4ZA",
            "sub5AZ",
            "sub5ZA",
            "link_urlAZ",
            "link_urlZA"
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $categoryGroups = EloquentGenerator::orderByWithListType($request, $categoryGroups, $listTypes);

        $categoryGroups = EloquentGenerator::whereGenerateByColumn($request, $categoryGroups, "main", "equal");
        $categoryGroups = EloquentGenerator::whereGenerateByColumn($request, $categoryGroups, "sub1", "equal");
        $categoryGroups = EloquentGenerator::whereGenerateByColumn($request, $categoryGroups, "sub2", "equal");
        $categoryGroups = EloquentGenerator::whereGenerateByColumn($request, $categoryGroups, "sub3", "equal");
        $categoryGroups = EloquentGenerator::whereGenerateByColumn($request, $categoryGroups, "sub4", "equal");
        $categoryGroups = EloquentGenerator::whereGenerateByColumn($request, $categoryGroups, "sub5", "equal");
        $categoryGroups = EloquentGenerator::whereGenerateByColumn($request, $categoryGroups, "link_url", "equal");

        $categoryGroups = $categoryGroups->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Groups", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "main", "sub1", "sub2", "sub3", "sub4", "sub5", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryGroups)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryGroupsStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateCategoryGroupsNo(),
            "main" => intval($request->main),
            "sub1" => intval($request->sub1),
            "sub2" => intval($request->sub2),
            "sub3" => intval($request->sub3),
            "sub4" => intval($request->sub4),
            "sub5" => intval($request->sub5),
            "link_url" => $request->link_url,
        ];

        $categoryGroupUrl = [
            "no" => NoGenerator::generateCategoryGroupUrlsNo(),
            "group_no" => $data["no"],
            "link_url" => $data["link_url"]
        ];

        CategoryGroupUrlsModel::create($categoryGroupUrl);

        $data["link_url"] = $categoryGroupUrl["no"];

        CategoryGroupsModel::create($data);

        $categoryGroup = CategoryGroupsModel::where(["is_deleted" => false, "no" => $data["no"]])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["main", "sub1", "sub2", "sub3", "sub4", "sub5", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryGroup)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($categoryGroupNo)
    {
        $categoryGroup = CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first() ? CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray() : CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first();

        if (!$categoryGroup) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Group", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryGroupNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryGroupNo]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryGroup)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($categoryGroupNo, Request $request)
    {
        $oldCategoryGroup = CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first() ? CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray() : CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first();

        if (!$oldCategoryGroup) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Group", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["main", "sub1", "sub2", "sub3", "sub4", "sub5", "link_url"], ["label" => "no", "value" => $categoryGroupNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "main" => $request->main ? $request->main : ($oldCategoryGroup[0]["main"] ? $oldCategoryGroup[0]["main"]["no"] : $oldCategoryGroup[0]["main"]),
            "sub1" => $request->sub1 ? $request->sub1 : ($oldCategoryGroup[0]["sub1"] ? $oldCategoryGroup[0]["sub1"]["no"] : $oldCategoryGroup[0]["sub1"]),
            "sub2" => $request->sub2 ? $request->sub2 : ($oldCategoryGroup[0]["sub2"] ? $oldCategoryGroup[0]["sub2"]["no"] : $oldCategoryGroup[0]["sub2"]),
            "sub3" => $request->sub3 ? $request->sub3 : ($oldCategoryGroup[0]["sub3"] ? $oldCategoryGroup[0]["sub3"]["no"] : $oldCategoryGroup[0]["sub3"]),
            "sub4" => $request->sub4 ? $request->sub4 : ($oldCategoryGroup[0]["sub4"] ? $oldCategoryGroup[0]["sub4"]["no"] : $oldCategoryGroup[0]["sub4"]),
            "sub5" => $request->sub5 ? $request->sub5 : ($oldCategoryGroup[0]["sub5"] ? $oldCategoryGroup[0]["sub5"]["no"] : $oldCategoryGroup[0]["sub5"]),
            "link_url" => $request->link_url ? $request->link_url : ($oldCategoryGroup[0]["link_url"] ? $oldCategoryGroup[0]["link_url"]["no"] : $oldCategoryGroup[0]["link_url"])
        ];

        if (!is_integer($data["link_url"])) {
            $categoryGroupUrl = [
                "no" => NoGenerator::generateCategoryGroupUrlsNo(),
                "group_no" => $categoryGroupNo,
                "link_url" => $data["link_url"]
            ];

            CategoryGroupUrlsModel::create($categoryGroupUrl);

            $data["link_url"] = $categoryGroupUrl["no"];
        }

        CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->update($data);

        $newCategoryGroup = CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["main", "sub1", "sub2", "sub3", "sub4", "sub5", "link_url"], ["label" => "no", "value" => $categoryGroupNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldCategoryGroup),
                "new" => RestApiResponseGenerator::dataGenerate($newCategoryGroup)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryGroupNo)
    {
        $categoryGroup = CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first() ? CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->get()->toArray() : CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl")->first();

        if (!$categoryGroup) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Group", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryGroupNo]),
                "data" => 0
            ], 404);
        }

        CategoryGroupsModel::where(["is_deleted" => false, "no" => $categoryGroupNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Group", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryGroupNo]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryGroup)
        ], 200);
    }
}
