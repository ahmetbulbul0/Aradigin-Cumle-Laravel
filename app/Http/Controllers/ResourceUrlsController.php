<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourceUrlsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Requests\ResourceUrlsIndexRequest;
use App\Http\Requests\ResourceUrlsStoreRequest;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;

class ResourceUrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResourceUrlsIndexRequest $request)
    {
        $resourceUrls = new ResourceUrlsModel();

        $resourceUrls = EloquentGenerator::whereGenerateByIsBanned($request, $resourceUrls);

        $listTypeNames = [
            "no09",
            "no90",
            "news_noAZ",
            "news_noZA",
            "resource_platformAZ",
            "resource_platformZA",
            "urlAZ",
            "urlZA"
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $resourceUrls = EloquentGenerator::orderByWithListType($request, $resourceUrls, $listTypes);

        $resourceUrls = EloquentGenerator::whereGenerateByColumn($request, $resourceUrls, "news_no", "equal");
        $resourceUrls = EloquentGenerator::whereGenerateByColumn($request, $resourceUrls, "resource_platform", "equal");
        $resourceUrls = EloquentGenerator::whereGenerateByColumn($request, $resourceUrls, "url", "search");

        $resourceUrls = $resourceUrls->with("newsNo", "resourcePlatform")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Resource Urls", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "news_no", "resource_platform", "url"]),
            "data" => RestApiResponseGenerator::dataGenerate($resourceUrls)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceUrlsStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateResourceUrlsNo(),
            "news_no" => intval($request->news_no),
            "resource_platform" => intval($request->resource_platform),
            "url" => $request->url
        ];

        ResourceUrlsModel::create($data);

        $resourceUrl = ResourceUrlsModel::where(["is_deleted" => false, "no" => $data["no"]])->with("newsNo", "resourcePlatform")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Resource Url", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["news_no", "resource_platform", "url"]),
            "data" => RestApiResponseGenerator::dataGenerate($resourceUrl)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($resourceUrlNo)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($resourceUrlNo, Request $request)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($resourceUrlNo)
    {
        //
    }
}
