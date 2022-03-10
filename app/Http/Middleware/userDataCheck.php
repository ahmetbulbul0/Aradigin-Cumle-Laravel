<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\Users\UsersListController;
use App\Models\UsersModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class userDataCheck
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
            return response()->view('errors.404');
        }

        $userNo = Session::get("userData.no");

        if (!UsersListController::getFirstDataWithNoOnlyNotDeleted($userNo)) {
            Session::remove("userData");
            return response()->view('errors.404');
        }

        $userData = UsersListController::getFirstDataWithNoOnlyNotDeletedAllRelationships($userNo);

        Session::put('userData', $userData);

        return $next($request);
    }
}
