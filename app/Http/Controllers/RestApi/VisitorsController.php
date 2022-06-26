<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VisitorsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Requests\Visitors\VisitorsIndexRequest;
use App\Http\Requests\Visitors\VisitorsStoreRequest;
use App\Http\Controllers\Tools\RestApiResponseGenerator;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VisitorsIndexRequest $request)
    {
        $visitors = new VisitorsModel();

        $visitors = EloquentGenerator::whereGenerateByIsBanned($request, $visitors);

        $listTypeNames = [
            'no09',
            'no90',
            'ipAZ',
            'ipZA',
            'browserAZ',
            'browserZA',
            'lastLoginTimeAZ',
            'lastLoginTimeZA',
            'websiteThemeAZ',
            'websiteThemeZA'
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $visitors = EloquentGenerator::orderByWithListType($request, $visitors, $listTypes);

        $visitors = EloquentGenerator::whereGenerateByColumn($request, $visitors, "ip", "equal");
        $visitors = EloquentGenerator::whereGenerateByColumn($request, $visitors, "browser", "search");
        $visitors = EloquentGenerator::whereGenerateByColumn($request, $visitors, "website_theme", "equal");

        $visitors = $visitors->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Visitors", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "ip", "browser", "website_theme"]),
            "data" => RestApiResponseGenerator::dataGenerate($visitors)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitorsStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateVisitorsNo(),
            "ip" => $request->ip(),
            "browser" => $request->header('User-Agent'),
            "last_login_time" => time(),
            "website_theme" => "dark",
            "is_banned" => false
        ];

        VisitorsModel::create($data);

        $visitor = VisitorsModel::where(["is_banned" => false, "no" => $data["no"]])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Visitor", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["ip", "browser", "last_login_time", "website_theme", "is_banned"]),
            "data" => RestApiResponseGenerator::dataGenerate($visitor)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisitorsModel  $visitorsModel
     * @return \Illuminate\Http\Response
     */
    public function show($visitorNo)
    {
        $visitor = VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->first() ? VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->get() : VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->first();

        if (!$visitor) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Visitor", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $visitorNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Visitor", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $visitorNo]),
            "data" => RestApiResponseGenerator::dataGenerate($visitor)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisitorsModel  $visitorsModel
     * @return \Illuminate\Http\Response
     */
    public function update($visitorNo, Request $request)
    {
        $oldVisitor = VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->first() ? VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->get() : VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->first();

        if (!$oldVisitor) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Visitor", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["name"], ["label" => "no", "value" => $visitorNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "website_theme" => $request->website_theme ? Str::lower($request->website_theme) : $oldVisitor[0]->website_theme
        ];

        VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->update($data);

        $newVisitor = VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Visitor", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name"], ["label" => "no", "value" => $visitorNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldVisitor),
                "new" => RestApiResponseGenerator::dataGenerate($newVisitor)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitorsModel  $visitorsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($visitorNo)
    {
        $visitor = VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->first() ? VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->get() : VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->first();

        if (!$visitor) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Visitor", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $visitorNo]),
                "data" => 0
            ], 404);
        }

        VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->update(["is_banned" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Visitor", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $visitorNo]),
            "data" => RestApiResponseGenerator::dataGenerate($visitor)
        ], 200);
    }
}
