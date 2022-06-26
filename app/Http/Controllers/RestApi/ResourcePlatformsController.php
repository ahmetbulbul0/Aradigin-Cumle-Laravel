<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ResourcePlatformsModel;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;
use App\Http\Requests\ResourcePlatforms\ResourcePlatformsIndexRequest;
use App\Http\Requests\ResourcePlatforms\ResourcePlatformsStoreRequest;
use App\Models\ResourceUrlsModel;

class ResourcePlatformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResourcePlatformsIndexRequest $request)
    {
        $resourcePlatforms = new ResourcePlatformsModel();

        $resourcePlatforms = EloquentGenerator::whereGenerateByIsDeleted($request, $resourcePlatforms);

        $listTypeNames = [
            "no09",
            "no90",
            "nameAZ",
            "nameZA",
            "main_urlAZ",
            "main_urlZA",
            "link_urlAZ",
            "link_urlZA",
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $resourcePlatforms = EloquentGenerator::orderByWithListType($request, $resourcePlatforms, $listTypes);

        $resourcePlatforms = EloquentGenerator::whereGenerateByColumn($request, $resourcePlatforms, "name", "search");
        $resourcePlatforms = EloquentGenerator::whereGenerateByColumn($request, $resourcePlatforms, "main_url", "search");
        $resourcePlatforms = EloquentGenerator::whereGenerateByColumn($request, $resourcePlatforms, "link_url", "search");

        $resourcePlatforms = $resourcePlatforms->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Resource Platforms", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "name", "main_url", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($resourcePlatforms)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourcePlatformsStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateResourcePlatformsNo(),
            "name" => strtolower($request->name),
            "main_url" => strtolower($request->main_url)
        ];

        $data["link_url"] = LinkUrlGenerator::single($data["name"]);

        ResourcePlatformsModel::create($data);

        $resourcePlatform = ResourcePlatformsModel::where(["is_deleted" => false, "no" => $data["no"]])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Resource Platform", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "main_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($resourcePlatform)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($resourcePlatformNo)
    {
        $resourcePlatform = ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->first() ? ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->get() : ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->first();

        if (!$resourcePlatform) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Resource Platform", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $resourcePlatformNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Resource Platform", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $resourcePlatformNo]),
            "data" => RestApiResponseGenerator::dataGenerate($resourcePlatform)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($resourcePlatformNo, Request $request)
    {
        $oldResourcePlatform = ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->first() ? ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->get() : ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->first();

        if (!$oldResourcePlatform) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Resource Platform", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "main_url", "link_url"], ["label" => "no", "value" => $resourcePlatformNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "name" => $request->name ? Str::lower($request->name) : $oldResourcePlatform[0]->name,
            "main_url" => $request->main_url ? Str::lower($request->main_url) : $oldResourcePlatform[0]->main_url,
            "link_url" => $request->link_url ? Str::lower($request->link_url) : $oldResourcePlatform[0]->link_url,
        ];

        ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->update($data);

        $newResourcePlatform = ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Resource Platform", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "main_url", "link_url"], ["label" => "no", "value" => $resourcePlatformNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldResourcePlatform),
                "new" => RestApiResponseGenerator::dataGenerate($newResourcePlatform)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($resourcePlatformNo)
    {
        $resourcePlatform = ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->first() ? ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->get() : ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->first();

        if (!$resourcePlatform) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Resource Platform", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $resourcePlatformNo]),
                "data" => 0
            ], 404);
        }

        ResourcePlatformsModel::where(["is_deleted" => false, "no" => $resourcePlatformNo])->update(["is_deleted" => true]);
        ResourceUrlsModel::where(["is_deleted" => false, "resource_platform" => $resourcePlatformNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Resource Platform", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $resourcePlatformNo]),
            "data" => RestApiResponseGenerator::dataGenerate($resourcePlatform)
        ], 200);
    }
}
