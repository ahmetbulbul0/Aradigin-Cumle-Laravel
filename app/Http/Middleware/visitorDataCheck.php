<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\VisitorsModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Tools\UnixTimeToTextDateController;

class visitorDataCheck
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
        if (Session::get("userData")) {
            return $next($request);
        }

        if (!Session::get("visitorData")) {
            return redirect(Session::previousUrl());
        }

        if (Session::get("visitorData")) {

            $visitorNo = Session::get("visitorData.no");

            if (!VisitorsModel::where("no", $visitorNo)->count()) {
                Session::remove("visitorData");
                return redirect(Session::previousUrl());
            }

            if (VisitorsModel::where(["no" => $visitorNo, "is_banned" => true])->count()) {
                return response()->view('errors.banned');
            }

            $visitorData = VisitorsModel::where("no", $visitorNo)->first();

            $visitorData["last_login_time"] = UnixTimeToTextDateController::TimeToDate($visitorData["last_login_time"]);

            Session::put('visitorData', $visitorData);
        }

        return $next($request);
    }
}
