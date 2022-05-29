<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Http\Request;
use App\Models\VisitorsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Requests\Visitors\VisitorsIndexRequest;
use App\Http\Requests\Visitors\VisitorsStoreRequest;

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

        switch ($request->is_banned) {
            case true:
                $visitors = $visitors->where("is_banned", true);
                break;
            case false:
                $visitors = $visitors->where("is_banned", false);
                break;
            default:
                $visitors = $visitors->where("is_banned", false);
                break;
        }

        switch ($request->list_type) {
            case 'no09':
                $visitors = $visitors->orderBy("no", "ASC");
                break;
            case 'no90':
                $visitors = $visitors->orderBy("no", "DESC");
                break;
            case 'ipAZ':
                $visitors = $visitors->orderBy("ip", "ASC");
                break;
            case 'ipZA':
                $visitors = $visitors->orderBy("ip", "DESC");
                break;
            case 'browserAZ':
                $visitors = $visitors->orderBy("browser", "ASC");
                break;
            case 'browserZA':
                $visitors = $visitors->orderBy("browser", "DESC");
                break;
            case 'lastLoginTimeAZ':
                $visitors = $visitors->orderBy("last_login_time", "ASC");
                break;
            case 'lastLoginTimeZA':
                $visitors = $visitors->orderBy("last_login_time", "DESC");
                break;
            case 'websiteThemeAZ':
                $visitors = $visitors->orderBy("website_theme", "ASC");
                break;
            case 'websiteThemeZA':
                $visitors = $visitors->orderBy("website_theme", "DESC");
                break;
            default:
                break;
        }

        if (!empty($request->ip)) {
            $visitors = $visitors->where("ip", $request->ip);
        }

        if (!empty($request->browser)) {
            $visitors = $visitors->where("browser", $request->browser);
        }

        if (!empty($request->website_theme)) {
            $visitors = $visitors->where("website_theme", $request->website_theme);
        }

        $visitors = $visitors->get();

        return response()->json([
            "message" => "Visitors Listed Successfully",
            "query" => [
                "is_banned" => $request->is_banned,
                "list_type" => $request->list_type,
                "ip" => $request->ip,
                "browser" => $request->browser,
                "website_theme" => $request->website_theme,
            ],
            "data" => [
                "count" => count($visitors),
                "visitors" => $visitors
            ]
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

        $visitor = VisitorsModel::where("is_banned", false)->where("no", $data["no"])->get();

        return response()->json([
            "message" => "Visitor Created Successfully",
            "query" => [
                null
            ],
            "data" => [
                "count" => count($visitor),
                "visitor" => $visitor
            ]
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
        $visitor = VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->get();

        return response()->json([
            "message" => "Visitor Showed Successfully",
            "query" => [
                "no" => $visitorNo
            ],
            "data" => [
                "count" => count($visitor),
                "userSettings" => $visitor
            ]
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
        $oldVisitor = VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->first();

        $data = [
            "website_theme" => $request->website_theme ?? $oldVisitor->website_theme
        ];

        VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->update($data);

        $newVisitor = VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->get();

        return response()->json([
            "message" => "Visitor Updated Successfully",
            "query" => [
                "website_theme" => $request->website_theme,
            ],
            "data" => [
                "count" => count($newVisitor),
                "oldUserSettings" => $oldVisitor,
                "newUserSettings" => $newVisitor
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
        $visitor = VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->get();

        VisitorsModel::where(["is_banned" => false, "no" => $visitorNo])->update(["is_banned" => true]);

        return response()->json([
            "message" => "Visitor Banned Successfully",
            "query" => [
                "no" => $visitorNo,
            ],
            "data" => [
                "count" => count($visitor),
                "bannedVisitor" => $visitor
            ]
        ], 200);
    }
}
