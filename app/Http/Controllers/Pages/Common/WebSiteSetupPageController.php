<?php

namespace App\Http\Controllers\Pages\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Api\Users\UserCreateController;
use App\Http\Controllers\Api\Constants\ConstantsListController;
use App\Http\Controllers\Api\UserTypes\UserTypesListController;
use App\Http\Controllers\Api\UserTypes\UserTypeCreateController;
use App\Http\Controllers\Api\Categories\CategoriesListController;
use App\Http\Controllers\Api\Categories\CategoryCreateController;
use App\Http\Controllers\Api\CategoryGroups\CategoryGroupsListController;
use App\Http\Controllers\Api\Constants\ConstantsUpdateController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypesListController;
use App\Http\Controllers\Api\CategoryTypes\CategoryTypeCreateController;

class WebSiteSetupPageController extends Controller
{
    public function stage1()
    {
        $data["page_title"] = "Aradığın Cümle Kurulum";

        $data["stage"] = "stage1";

        $data["nextStage"] = "asama-2";

        $data["formAction"] = "asama-1";

        $data["setupProcess"] = "Veritabanı Ve Tablolar Kontrolü";

        $data["database_tables_check"] = [
            "tables" => [
                [
                    "name" => "Categories",
                    "dbName" => "categories",
                    "hasTable" => Schema::hasTable("categories") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Category Groups",
                    "dbName" => "category_groups",
                    "hasTable" => Schema::hasTable("category_groups") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Category Group Urls",
                    "dbName" => "category_group_urls",
                    "hasTable" => Schema::hasTable("category_group_urls") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Category Types",
                    "dbName" => "category_types",
                    "hasTable" => Schema::hasTable("category_types") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Constants",
                    "dbName" => "constants",
                    "hasTable" => Schema::hasTable("constants") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Listings",
                    "dbName" => "listings",
                    "hasTable" => Schema::hasTable("listings") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Listings Detail",
                    "dbName" => "listings_detail",
                    "hasTable" => Schema::hasTable("listings_detail") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Readings",
                    "dbName" => "readings",
                    "hasTable" => Schema::hasTable("readings") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Readings Detail",
                    "dbName" => "readings_detail",
                    "hasTable" => Schema::hasTable("readings_detail") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Resource Platforms",
                    "dbName" => "resource_platforms",
                    "hasTable" => Schema::hasTable("resource_platforms") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Resource Urls",
                    "dbName" => "resource_urls",
                    "hasTable" => Schema::hasTable("resource_urls") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Users",
                    "dbName" => "users",
                    "hasTable" => Schema::hasTable("users") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "User Types",
                    "dbName" => "user_types",
                    "hasTable" => Schema::hasTable("user_types") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Users Settings",
                    "dbName" => "users_settings",
                    "hasTable" => Schema::hasTable("users_settings") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Visitors",
                    "dbName" => "visitors",
                    "hasTable" => Schema::hasTable("visitors") ? "Mevcut" : "Bulunamadı"
                ],
                [
                    "name" => "Writings",
                    "dbName" => "writings",
                    "hasTable" => Schema::hasTable("writings") ? "Mevcut" : "Bulunamadı"
                ],
            ]
        ];

        return view("common.pages.website_setup")->with("data", $data);
    }
    public function stage2()
    {
        $data["page_title"] = "Aradığın Cümle Kurulum";

        $data["stage"] = "stage2";

        $data["previousPage"] = "asama-1";

        $data["nextStage"] = "asama-3";

        $data["formAction"] = "asama-2";

        $data["setupProcess"] = "Kullanıcı Ve Kategori Tipi Oluşturma";

        $data["user_and_category_types_create"] = [
            "constants" => [
                "userTypes" => [
                    [
                        "name" => "Sistem Kullanıcı Tipi",
                        "value" => ConstantsListController::getUserTypeSystemOnlyNotDeleted() ? UserTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getUserTypeSystemOnlyNotDeleted()) : NULL,
                        "create" => "userTypeSystem"
                    ],
                    [
                        "name" => "Yazar Kullanıcı Tipi",
                        "value" => ConstantsListController::getUserTypeAuthorOnlyNotDeleted() ? UserTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getUserTypeAuthorOnlyNotDeleted()) : NULL,
                        "create" => "userTypeAuthor"
                    ],
                ],
                "categoryTypes" => [
                    [
                        "name" => "Ana Kategori Tipi",
                        "value" => ConstantsListController::getCategoryTypeMainOnlyNotDeleted() ? CategoryTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getCategoryTypeMainOnlyNotDeleted()) : NULL,
                        "create" => "categoryTypeMain"
                    ],
                    [
                        "name" => "Alt Kategori Tipi",
                        "value" => ConstantsListController::getCategoryTypeSubOnlyNotDeleted() ? CategoryTypesListController::getFirstDataWithNoOnlyNotDeleted(ConstantsListController::getCategoryTypeSubOnlyNotDeleted()) : NULL,
                        "create" => "categoryTypeSub"
                    ],
                ]
            ]
        ];

        $data["nextStage"] = "asama-3";

        return view("common.pages.website_setup")->with("data", $data);
    }
    public function stage3()
    {
        $data["page_title"] = "Aradığın Cümle Kurulum";

        $data["stage"] = "stage3";

        $data["previousPage"] = "asama-2";

        $data["nextStage"] = "asama-4";

        $data["formAction"] = "asama-3";

        $data["setupProcess"] = "Sistem Kullanıcısı Oluşturma";

        $data["system_user"] = [
            "hasSystemUser" => UsersListController::getFirstDataOnlyNotDeletedOnlyTypeSystemAllRelationships() ? UsersListController::getFirstDataOnlyNotDeletedOnlyTypeSystemAllRelationships() : NULL
        ];

        $data["nextStage"] = "asama-4";

        return view("common.pages.website_setup")->with("data", $data);
    }
    public function stage4()
    {
        $data["page_title"] = "Aradığın Cümle Kurulum";

        $data["stage"] = "stage4";

        $data["previousPage"] = "asama-3";

        $data["nextStage"] = "son";

        $data["formAction"] = "asama-4";

        $data["setupProcess"] = "Ana Kategorileri Oluşturma";

        $data["main_categories"] = [
            "constants" => [
                [
                    "name" => "1.Ana Kategori",
                    "value" => ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted() ? CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory1OnlyNotDeleted()) : NULL,
                    "create" => "category1Create"
                ],
                [
                    "name" => "2.Ana Kategori",
                    "value" => ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted() ? CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory2OnlyNotDeleted()) : NULL,
                    "create" => "category2Create"
                ],
                [
                    "name" => "3.Ana Kategori",
                    "value" => ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted() ? CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory3OnlyNotDeleted()) : NULL,
                    "create" => "category3Create"
                ],
                [
                    "name" => "4.Ana Kategori",
                    "value" => ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted() ? CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory4OnlyNotDeleted()) : NULL,
                    "create" => "category4Create"
                ],
                [
                    "name" => "5.Ana Kategori",
                    "value" => ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted() ? CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory5OnlyNotDeleted()) : NULL,
                    "create" => "category5Create"
                ],
                [
                    "name" => "6.Ana Kategori",
                    "value" => ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted() ? CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory6OnlyNotDeleted()) : NULL,
                    "create" => "category6Create"
                ],
                [
                    "name" => "7.Ana Kategori",
                    "value" => ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted() ? CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory7OnlyNotDeleted()) : NULL,
                    "create" => "category7Create"
                ],
                [
                    "name" => "8.Ana Kategori",
                    "value" => ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted() ? CategoryGroupsListController::getFirstDataWithNoOnlyNotDeletedAllRelationShips(ConstantsListController::getWebSiteVisitorMenuCategory8OnlyNotDeleted()) : NULL,
                    "create" => "category8Create"
                ],
            ]
        ];

        return view("common.pages.website_setup")->with("data", $data);
    }
    public function finish()
    {
        $data["page_title"] = "Aradığın Cümle Kurulum";

        $data["stage"] = "finish";

        $data["setupProcess"] = "Kurulum Tamamlandı";

        return view("common.pages.website_setup")->with("data", $data);
    }
    public function formStage2(Request $request)
    {
        if (!$request->actionType) {
            return redirect(route("website_setup_stage2"));
        }

        switch ($request->actionType) {
            case 'userTypeSystem':
                $data["data"]["name"] = "system";
                $create = UserTypeCreateController::get($data);
                $data["data"][0]["key"] = "user_type_system";
                $data["data"][0]["value"] = $create["createdData"]["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage2"));
                break;
            case 'userTypeAuthor':
                $data["data"]["name"] = "author";
                $create = UserTypeCreateController::get($data);
                $data["data"][0]["key"] = "user_type_author";
                $data["data"][0]["value"] = $create["createdData"]["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage2"));
                break;
            case 'categoryTypeMain':
                $data["data"]["name"] = "main";
                $create = CategoryTypeCreateController::get($data);
                $data["data"][0]["key"] = "category_type_main";
                $data["data"][0]["value"] = $create["createdData"]["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage2"));
                break;
            case 'categoryTypeSub':
                $data["data"]["name"] = "sub";
                $create = CategoryTypeCreateController::get($data);
                $data["data"][0]["key"] = "category_type_sub";
                $data["data"][0]["value"] = $create["createdData"]["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage2"));
                break;
            default:
                return redirect(route("website_setup_stage2"));
                break;
        }
    }
    public function formStage3(Request $request)
    {
        if (!$request->actionType) {
            return redirect(route("website_setup_stage3"));
        }

        switch ($request->actionType) {
            case 'systemUserCreate':
                $data["data"]["full_name"] = $request->systemUserFullName;
                $data["data"]["username"] = $request->systemUserName;
                $data["data"]["password"] = $request->systemUserPassword;
                $data["data"]["type"] = ConstantsListController::getUserTypeSystemOnlyNotDeleted();
                $create = UserCreateController::get($data);
                return redirect(route("website_setup_stage3"));
                break;
            default:
                return redirect(route("website_setup_stage3"));
                break;
        }
    }
    public function formStage4(Request $request)
    {
        if (!$request->actionType) {
            return redirect(route("website_setup_stage4"));
        }

        switch ($request->actionType) {
            case 'category1Create':
                $data["data"]["name"] = $request->categoryName;
                $data["data"]["type"] = ConstantsListController::getCategoryTypeMainOnlyNotDeleted();
                $data["data"]["main_category"] = NULL;
                $create = CategoryCreateController::get($data);
                $data["data"][0]["key"] = "website_visitor_menu_category1";
                $groupNo = CategoryGroupsListController::getFirstDataWithMainNoOnlyNotDeleted($create["createdCategoryGroupData"]["main"]["no"]);
                $data["data"][0]["value"] = $groupNo["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage4"));
                break;
            case 'category2Create':
                $data["data"]["name"] = $request->categoryName;
                $data["data"]["type"] = ConstantsListController::getCategoryTypeMainOnlyNotDeleted();
                $data["data"]["main_category"] = NULL;
                $create = CategoryCreateController::get($data);
                $data["data"][0]["key"] = "website_visitor_menu_category2";
                $groupNo = CategoryGroupsListController::getFirstDataWithMainNoOnlyNotDeleted($create["createdCategoryGroupData"]["main"]["no"]);
                $data["data"][0]["value"] = $groupNo["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage4"));
                break;
            case 'category3Create':
                $data["data"]["name"] = $request->categoryName;
                $data["data"]["type"] = ConstantsListController::getCategoryTypeMainOnlyNotDeleted();
                $data["data"]["main_category"] = NULL;
                $create = CategoryCreateController::get($data);
                $data["data"][0]["key"] = "website_visitor_menu_category3";
                $groupNo = CategoryGroupsListController::getFirstDataWithMainNoOnlyNotDeleted($create["createdCategoryGroupData"]["main"]["no"]);
                $data["data"][0]["value"] = $groupNo["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage4"));
                break;
            case 'category4Create':
                $data["data"]["name"] = $request->categoryName;
                $data["data"]["type"] = ConstantsListController::getCategoryTypeMainOnlyNotDeleted();
                $data["data"]["main_category"] = NULL;
                $create = CategoryCreateController::get($data);
                $data["data"][0]["key"] = "website_visitor_menu_category4";
                $groupNo = CategoryGroupsListController::getFirstDataWithMainNoOnlyNotDeleted($create["createdCategoryGroupData"]["main"]["no"]);
                $data["data"][0]["value"] = $groupNo["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage4"));
                break;
            case 'category5Create':
                $data["data"]["name"] = $request->categoryName;
                $data["data"]["type"] = ConstantsListController::getCategoryTypeMainOnlyNotDeleted();
                $data["data"]["main_category"] = NULL;
                $create = CategoryCreateController::get($data);
                $data["data"][0]["key"] = "website_visitor_menu_category5";
                $groupNo = CategoryGroupsListController::getFirstDataWithMainNoOnlyNotDeleted($create["createdCategoryGroupData"]["main"]["no"]);
                $data["data"][0]["value"] = $groupNo["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage4"));
                break;
            case 'category6Create':
                $data["data"]["name"] = $request->categoryName;
                $data["data"]["type"] = ConstantsListController::getCategoryTypeMainOnlyNotDeleted();
                $data["data"]["main_category"] = NULL;
                $create = CategoryCreateController::get($data);
                $data["data"][0]["key"] = "website_visitor_menu_category6";
                $groupNo = CategoryGroupsListController::getFirstDataWithMainNoOnlyNotDeleted($create["createdCategoryGroupData"]["main"]["no"]);
                $data["data"][0]["value"] = $groupNo["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage4"));
                break;
            case 'category7Create':
                $data["data"]["name"] = $request->categoryName;
                $data["data"]["type"] = ConstantsListController::getCategoryTypeMainOnlyNotDeleted();
                $data["data"]["main_category"] = NULL;
                $create = CategoryCreateController::get($data);
                $data["data"][0]["key"] = "website_visitor_menu_category7";
                $groupNo = CategoryGroupsListController::getFirstDataWithMainNoOnlyNotDeleted($create["createdCategoryGroupData"]["main"]["no"]);
                $data["data"][0]["value"] = $groupNo["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage4"));
                break;
            case 'category8Create':
                $data["data"]["name"] = $request->categoryName;
                $data["data"]["type"] = ConstantsListController::getCategoryTypeMainOnlyNotDeleted();
                $data["data"]["main_category"] = NULL;
                $create = CategoryCreateController::get($data);
                $data["data"][0]["key"] = "website_visitor_menu_category8";
                $groupNo = CategoryGroupsListController::getFirstDataWithMainNoOnlyNotDeleted($create["createdCategoryGroupData"]["main"]["no"]);
                $data["data"][0]["value"] = $groupNo["no"];
                ConstantsUpdateController::check($data);
                return redirect(route("website_setup_stage4"));
                break;
            default:
                return redirect(route("website_setup_stage4"));
                break;
        }
    }
}
