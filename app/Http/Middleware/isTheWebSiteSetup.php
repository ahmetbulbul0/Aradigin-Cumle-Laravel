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
        if (!Schema::hasTable("categories")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("category_groups")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("category_group_urls")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("category_types")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("constants")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("listings")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("listings_detail")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("readings")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("readings_detail")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("resource_platforms")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("resource_urls")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("users")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("user_types")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("users_settings")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("visitors")) {
            return redirect(route("website_setup_stage1"));
        }
        if (!Schema::hasTable("writings")) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getUserTypeSystemOnlyNotDeleted()) || !UserTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getUserTypeSystemOnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getUserTypeAuthorOnlyNotDeleted()) || !UserTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getUserTypeAuthorOnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getCategoryTypeMainOnlyNotDeleted()) || !CategoryTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getCategoryTypeMainOnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getCategoryTypeSubOnlyNotDeleted()) || !CategoryTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getCategoryTypeSubOnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (!UsersListController::getFirstDataOnlyNotDeletedOnlyTypeSystemAllRelationships()) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }
        if (empty(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted()) || !CategoryGroupsListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted())) {
            return redirect(route("website_setup_stage1"));
        }

        return $next($request);
    }
}
