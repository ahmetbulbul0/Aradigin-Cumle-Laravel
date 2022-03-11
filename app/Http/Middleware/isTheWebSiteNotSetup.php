<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;

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
        if (!Schema::hasTable("categories")) {
            return $next($request);
        }
        if (!Schema::hasTable("category_groups")) {
            return $next($request);
        }
        if (!Schema::hasTable("category_group_urls")) {
            return $next($request);
        }
        if (!Schema::hasTable("category_types")) {
            return $next($request);
        }
        if (!Schema::hasTable("constants")) {
            return $next($request);
        }
        if (!Schema::hasTable("listings")) {
            return $next($request);
        }
        if (!Schema::hasTable("listings_detail")) {
            return $next($request);
        }
        if (!Schema::hasTable("readings")) {
            return $next($request);
        }
        if (!Schema::hasTable("readings_detail")) {
            return $next($request);
        }
        if (!Schema::hasTable("resource_platforms")) {
            return $next($request);
        }
        if (!Schema::hasTable("resource_urls")) {
            return $next($request);
        }
        if (!Schema::hasTable("users")) {
            return $next($request);
        }
        if (!Schema::hasTable("user_types")) {
            return $next($request);
        }
        if (!Schema::hasTable("users_settings")) {
            return $next($request);
        }
        if (!Schema::hasTable("visitors")) {
            return $next($request);
        }
        if (!Schema::hasTable("writings")) {
            return $next($request);
        }
        if (empty(ConstantsListController::getUserTypeSystemOnlyNotDeleted()) || !UserTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getUserTypeSystemOnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getUserTypeAuthorOnlyNotDeleted()) || !UserTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getUserTypeAuthorOnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getCategoryTypeMainOnlyNotDeleted()) || !CategoryTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getCategoryTypeMainOnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getCategoryTypeSubOnlyNotDeleted()) || !CategoryTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getCategoryTypeSubOnlyNotDeleted())) {
            return $next($request);
        }
        if (!UsersListController::getFirstDataOnlyNotDeletedOnlyTypeSystemAllRelationships()) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted())) {
            return $next($request);
        }

        return redirect(route("anasayfa"));
    }
}
