<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\Users\UsersListController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class userDataCheckIfIsUser
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
            $userData = UsersListController::getFirstDataWithNoOnlyNotDeletedAllRelationships(Session::get("userData.no"));

            if (!$userData) {
                Session::remove("userData");
                return response()->view('errors.500');
            }

            Session::put("userData", $userData);
        }

        return $next($request);
    }
}
