<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
        if (Route::is('website_setup_stage4')) {
            return $next($request);
        }
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
        if (empty(ConstantsListController::getUserTypeSystemOnlyNotDeleted()) || !UserTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getUserTypeSystemOnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getUserTypeAuthorOnlyNotDeleted()) || !UserTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getUserTypeAuthorOnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getCategoryTypeMainOnlyNotDeleted()) || !CategoryTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getCategoryTypeMainOnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getCategoryTypeSubOnlyNotDeleted()) || !CategoryTypesListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getCategoryTypeSubOnlyNotDeleted())) {
            return $next($request);
        }
        if (!UsersListController::getFirstDataOnlyNotDeletedDatasAllRelationShipsWhereTypeSystem()) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted())) {
            return $next($request);
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataOnlyNotDeletedDatasWhereNo(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted())) {
            return $next($request);
        }

        return response()->view('errors.404');
    }
}
