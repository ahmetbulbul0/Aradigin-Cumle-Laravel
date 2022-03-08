<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\Constants\ConstantsListController;
use Closure;
use Illuminate\Http\Request;

class isTheWebSiteNotSetup
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
        if (empty(ConstantsListController::getUserTypeAuthorOnlyNotDeleted()) || empty(ConstantsListController::getUserTypeSystemOnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getCategoryTypeMainOnlyNotDeleted()) || empty(ConstantsListController::getCategoryTypeSubOnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted()) || empty(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted()) || empty(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted()) || empty(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted()) || empty(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted())) {
            return $next($request);
        }
        return response()->view('errors.404');
    }
}
