<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\Constants\ConstantsListController;
use Closure;
use Illuminate\Http\Request;

class isTheWebSiteSetup
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
            return redirect(route("kurulum"));
        }
        if (empty(ConstantsListController::getCategoryTypeMainOnlyNotDeleted()) || empty(ConstantsListController::getCategoryTypeSubOnlyNotDeleted())) {
            return redirect(route("kurulum"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted()) || empty(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted())) {
            return redirect(route("kurulum"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted()) || empty(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted())) {
            return redirect(route("kurulum"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted()) || empty(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted())) {
            return redirect(route("kurulum"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted()) || empty(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted())) {
            return redirect(route("kurulum"));
        }
        return $next($request);
    }
}
