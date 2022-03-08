<?php

namespace App\Http\Middleware;

use App\Models\VisitorsModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        if (!Session::get("userData")) {
            if (Session::get("visitorData")) {
                $visitorNo = Session::get("visitorData.no");

                if (!VisitorsModel::where("no", $visitorNo)->count()) {
                    Session::remove("visitorData");
                    return response()->view('errors.500');
                }
        
                $visitorData = VisitorsModel::where("no", $visitorNo)->first();
        
                Session::put('visitorData', $visitorData);
            }
        }

        return $next($request);
    }
}
