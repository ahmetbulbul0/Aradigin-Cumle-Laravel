<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;
use App\Models\VisitorsModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class isItVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::get("userData") && Session::get("visitorData")) {
            return response()->view('errors.403');
        }

        if (Session::get("userData") || Session::get("visitorData")) {
            return $next($request);
        }

        $visitor = [
            "ip" => $request->ip(),
            "browser" => $request->header('User-Agent'),
            "lastLoginTime" => time()
        ];
        

        if (VisitorsModel::where(["ip" => $visitor["ip"], "browser" => $visitor["browser"]])->count()) {

            VisitorsModel::where(["ip" =>  $visitor["ip"], "browser" => $visitor["browser"]])->update(["last_login_time" => $visitor["lastLoginTime"]]);

            $visitorData = VisitorsModel::where(["ip" => $visitor["ip"], "browser" => $visitor["browser"]])->first();

            $visitorData["last_login_time"] = UnixTimeToTextDateController::TimeToDate($visitorData["last_login_time"]);

            Session::put("visitorData", $visitorData);

            return $next($request);
        }

        $visitor["no"] = NoGenerator::generateVisitorsNo();

        VisitorsModel::create([
            "no" => $visitor["no"],
            "ip" => $visitor["ip"],
            "browser" => $visitor["browser"],
            "last_login_time" => $visitor["lastLoginTime"],
            "website_theme" => "dark"
        ]);

        $visitorData = VisitorsModel::where("no", $visitor["no"])->first();

        $visitorData["last_login_time"] = UnixTimeToTextDateController::TimeToDate($visitorData["last_login_time"]);

        Session::put("visitorData", $visitorData);

        return $next($request);
    }
}
