<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Api\Constants\ConstantsListController;

class isItSystem
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
            return redirect(route("anasayfa"));
        }

        if (Session::get("userData")) {
            if (Session::get("userData.type.no") == ConstantsListController::getUserTypeSystemOnlyNotDeleted()) {
                return $next($request);
            }
            if (Session::get("userData.type.no") == ConstantsListController::getUserTypeAuthorOnlyNotDeleted()) {
                return redirect(route("yazar_paneli_anapanel"));
            }
        }

        return redirect(route("anasayfa"));
    }
}
