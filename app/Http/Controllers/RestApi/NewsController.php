<?php

namespace App\Http\Controllers\RestApi;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Requests\News\NewsIndexRequest;
use App\Http\Requests\News\NewsStoreRequest;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;
use App\Models\ResourceUrlsModel;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsIndexRequest $request) // completed
    {
        $news = new NewsModel;

        $news = EloquentGenerator::whereGenerateByIsDeleted($request, $news);

        $listTypeNames = [
            "contentAZ",
            "contentZA",
            "authorAZ",
            "authorZA",
            "categoryAZ",
            "categoryZA",
            "resource_platformAZ",
            "resource_platformZA",
            "resource_urlAZ",
            "resource_urlZA",
            "publish_date09",
            "publish_date90",
            "write_time09",
            "write_time90",
            "listing09",
            "listing90",
            "reading09",
            "reading90",
            "link_urlAZ",
            "link_urlZA"
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $news = EloquentGenerator::orderByWithListType($request, $news, $listTypes);

        $news = EloquentGenerator::whereGenerateByColumn($request, $news, "content", "search");
        $news = EloquentGenerator::whereGenerateByColumn($request, $news, "author", "equal");
        $news = EloquentGenerator::whereGenerateByColumn($request, $news, "category", "equal");
        $news = EloquentGenerator::whereGenerateByColumn($request, $news, "resource_platform", "equal");
        $news = EloquentGenerator::whereGenerateByColumn($request, $news, "resource_url", "equal");
        $news = EloquentGenerator::whereGenerateByColumn($request, $news, "listing", "equal");
        $news = EloquentGenerator::whereGenerateByColumn($request, $news, "reading", "equal");
        $news = EloquentGenerator::whereGenerateByColumn($request, $news, "link_url", "search");

        $news = $news->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("News", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "content", "author", "category", "resource_platform", "resource_url", "listing", "reading", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($news)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsStoreRequest $request) // completed
    {
        $data = [
            "no" => NoGenerator::generateNewsNo(),
            "content" => $request->content,
            "author" => $request->author,
            "category" => $request->category,
            "resource_platform" => $request->resource_platform,
            "publish_date" => $request->publish_date,
            "link_url" => $request->link_url,
            "write_time" => time(),
            "listing" => 0,
            "reading" => 0
        ];

        $resourceUrlData = [
            "no" => NoGenerator::generateResourceUrlsNo(),
            "news_no" => $data["no"],
            "resource_platform" => $data["resource_platform"],
            "url" => $request->resource_url
        ];

        $data["resource_url"] = $resourceUrlData["no"];

        ResourceUrlsModel::create($resourceUrlData);
        NewsModel::create($data);

        $news = NewsModel::where(["is_deleted" => false, "no" => $data["no"]])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("News", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["content", "author", "category", "resource_platform", "resource_url", "publish_date", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($news)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($newsNo)
    {
        $news = NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->first() ? NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->first();

        if (!$news) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("News", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $newsNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("News", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $newsNo]),
            "data" => RestApiResponseGenerator::dataGenerate($news)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($newsNo, Request $request) // completed
    {
        $oldNews = NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->first() ? NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->first();

        if (!$oldNews) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("News", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["content", "category", "resource_platform", "resource_url", "publish_date", "link_url"], ["label" => "no", "value" => $newsNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "content" => $request->content ? $request->content : $oldNews[0]["content"],
            "category" => $request->category ? $request->category : ($oldNews[0]["category"] ? $oldNews[0]["category"]["no"] : $oldNews[0]["category"]),
            "resource_platform" => $request->resource_platform ? $request->resource_platform : ($oldNews[0]["resource_platform"] ? $oldNews[0]["resource_platform"]["no"] : $oldNews[0]["resource_platform"]),
            "resource_url" => $request->resource_url ? $request->resource_url : ($oldNews[0]["resource_url"] ? $oldNews[0]["resource_url"]["no"] : $oldNews[0]["resource_platform"]),
            "publish_date" => $request->publish_date ? $request->publish_date : $oldNews[0]["publish_date"],
            "link_url" => $request->link_url ? $request->link_url : $oldNews[0]["link_url"],
        ];

        if (!is_integer($data["resource_url"])) {
            $resourceUrlData = [
                "no" => NoGenerator::generateResourceUrlsNo(),
                "news_no" => $newsNo,
                "resource_platform" => $data["resource_platform"],
                "url" => $data["resource_url"]
            ];

            $data["resource_url"] = $resourceUrlData["no"];

            ResourceUrlsModel::create($resourceUrlData);
        }

        NewsModel::where(["is_deleted" => false, "no" => $newsNo])->update($data);

        $newNews = NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("News", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["content", "category", "resource_platform", "resource_url", "publish_date", "link_url"], ["label" => "no", "value" => $newsNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldNews),
                "new" => RestApiResponseGenerator::dataGenerate($newNews)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($newsNo) // completed
    {
        $news = NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->first() ? NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->get()->toArray() : NewsModel::where(["is_deleted" => false, "no" => $newsNo])->with("author", "category", "resourcePlatform", "resourceUrl")->first();

        if (!$news) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("News", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $newsNo]),
                "data" => 0
            ], 404);
        }

        NewsModel::where(["is_deleted" => false, "no" => $newsNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("News", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $newsNo]),
            "data" => RestApiResponseGenerator::dataGenerate($news)
        ], 200);
    }
}
