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
        if (!Session::get("visitorData")) {
            $visitorNo = NoGenerator::generateVisitorsNo();

            VisitorsModel::create([
                "no" => $visitorNo,
                "ip" => $request->ip(),
                "browser" => $request->header('User-Agent'),
                "last_login_time" => time(),
                "website_theme" => "dark"
            ]);

            $visitorData = VisitorsModel::where("no", $visitorNo)->first();
            $visitorData["last_login_time"] = UnixTimeToTextDateController::TimeToDate($visitorData["last_login_time"]);

            Session::put("visitorData", $visitorData);


            return $next($request);
        }

        return $next($request);
    }
}
