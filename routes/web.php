<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Pages\Visitor\HomePageController;
use App\Http\Controllers\Pages\Visitor\SignInPageController;
use App\Http\Controllers\Pages\System\UserEditPageController;
use App\Http\Controllers\Pages\System\UsersListPageController;
use App\Http\Controllers\Pages\Author\MyNewsEditPageController;
use App\Http\Controllers\Pages\Author\MyNewsListPageController;
use App\Http\Controllers\Pages\Author\NewsCreatePageController;
use App\Http\Controllers\Pages\System\UserCreatePageController;
use App\Http\Controllers\Pages\System\UserDeletePageController;
use App\Http\Controllers\Pages\Visitor\NewsDetailPageController;
use App\Http\Controllers\Pages\Author\MyNewsDeletePageController;
use App\Http\Controllers\Pages\System\CategoryEditPageController;
use App\Http\Controllers\Pages\System\UserTypeEditPageController;
use App\Http\Controllers\Pages\System\UserTypesListPageController;
use App\Http\Controllers\Pages\Author\AuthorSettingsPageController;
use App\Http\Controllers\Pages\System\CategoriesListPageController;
use App\Http\Controllers\Pages\System\CategoryCreatePageController;
use App\Http\Controllers\Pages\System\CategoryDeletePageController;
use App\Http\Controllers\Pages\System\NewsStatisticsPageController;
use App\Http\Controllers\Pages\System\SystemNewsListPageController;
use App\Http\Controllers\Pages\System\SystemSettingsPageController;
use App\Http\Controllers\Pages\System\UserTypeCreatePageController;
use App\Http\Controllers\Pages\System\UserTypeDeletePageController;
use App\Http\Controllers\Pages\Author\AuthorDashboardPageController;
use App\Http\Controllers\Pages\System\SystemDashboardPageController;
use App\Http\Controllers\Pages\Author\MyNewsStatisticsPageController;
use App\Http\Controllers\Pages\System\CategoryTypeEditPageController;
use App\Http\Controllers\Pages\Visitor\VisitorNewsListPageController;
use App\Http\Controllers\Pages\System\CategoryGroupEditPageController;
use App\Http\Controllers\Pages\System\CategoryTypesListPageController;
use App\Http\Controllers\Pages\System\NewsStatisticTimePageController;
use App\Http\Controllers\Pages\System\CategoryGroupsListPageController;
use App\Http\Controllers\Pages\System\CategoryTypeCreatePageController;
use App\Http\Controllers\Pages\System\CategoryTypeDeletePageController;
use App\Http\Controllers\Pages\Author\MyNewsStatisticTimePageController;
use App\Http\Controllers\Pages\System\CategoryGroupCreatePageController;
use App\Http\Controllers\Pages\System\CategoryGroupDeletePageController;
use App\Http\Controllers\Pages\System\NewsStatisticDetailPageController;
use App\Http\Controllers\Pages\System\ResourcePlatformEditPageController;
use App\Http\Controllers\Pages\Author\MyNewsStatisticDetailPageController;
use App\Http\Controllers\Pages\System\ResourcePlatformsListPageController;
use App\Http\Controllers\Pages\System\ResourcePlatformCreatePageController;

/* VİSİTOR PAGES */
Route::get("/", [HomePageController::class, "index"]);
Route::get("/haberler/{listType}", [VisitorNewsListPageController::class, "index"]);
Route::get("haberler/yazar/{authorUserName}/{listType}", [VisitorNewsListPageController::class, "author"]);
Route::get("haberler/kategori/{categoryGroupLinkUrl}/{listType}", [VisitorNewsListPageController::class, "category"]);
Route::get("/haber/{newsLinkUrl}", [NewsDetailPageController::class, "index"]);
Route::get("/yazar-girisi", [SignInPageController::class, "index"]);

/* AUTHOR PAGES */
Route::get("/yazar-paneli", [AuthorDashboardPageController::class, "index"]);
Route::get("/yazar-paneli/haber/ekle", [NewsCreatePageController::class, "index"]);
Route::get("/yazar-paneli/haberlerim/{listType}", [MyNewsListPageController::class, "index"]);
Route::get("/yazar-paneli/haberlerim/duzenle/{newsNo}", [MyNewsEditPageController::class, "index"]);
Route::get("/yazar-paneli/haberlerim/sil/{newsNo}", [MyNewsDeletePageController::class, "index"]);
Route::get("/yazar-paneli/haberlerim/istatistikleri", [MyNewsStatisticsPageController::class, "index"]);
Route::get("/yazar-paneli/haberlerim/istatistikleri/zaman/{timeType}/{listType}", [MyNewsStatisticTimePageController::class, "index"]);
Route::get("/yazar-paneli/haberlerim/istatistikleri/detay/{newsNo}", [MyNewsStatisticDetailPageController::class, "index"]);
Route::get("/yazar-paneli/ayarlar/profilim", [AuthorSettingsPageController::class, "myAccount"]);
Route::get("/yazar-paneli/ayarlar/tema", [AuthorSettingsPageController::class, "theme"]);

/* SYSTEM PAGES */
Route::get("/sistem-paneli", [SystemDashboardPageController::class, "index"]);
Route::get("/sistem-paneli/kullanici-tipi/ekle", [UserTypeCreatePageController::class, "index"]);
Route::get("/sistem-paneli/kullanici-tipi/düzenle", [UserTypeEditPageController::class, "index"]);
Route::get("/sistem-paneli/kullanici-tipi/sil", [UserTypeDeletePageController::class, "index"]);
Route::get("/sistem-paneli/kullanici-tipleri/{listType}", [UserTypesListPageController::class, "index"]);
Route::get("/sistem-paneli/kullanici/ekle", [UserCreatePageController::class, "index"]);
Route::get("/sistem-paneli/kullanici/düzenle", [UserEditPageController::class, "index"]);
Route::get("/sistem-paneli/kullanici/sil", [UserDeletePageController::class, "index"]);
Route::get("/sistem-paneli/kullanicilar/{listType}", [UsersListPageController::class, "index"]);
Route::get("/sistem-paneli/kaynak-site/ekle", [ResourcePlatformCreatePageController::class, "index"]);
Route::get("/sistem-paneli/kaynak-site/düzenle", [ResourcePlatformEditPageController::class, "index"]);
Route::get("/sistem-paneli/kaynak-site/sil", [ResourcePlatformCreatePageController::class, "index"]);
Route::get("/sistem-paneli/kaynak-siteler/{listType}", [ResourcePlatformsListPageController::class, "index"]);
Route::get("/sistem-paneli/kategori-tipi/ekle", [CategoryTypeCreatePageController::class, "index"]);
Route::get("/sistem-paneli/kategori-tipi/düzenle", [CategoryTypeEditPageController::class, "index"]);
Route::get("/sistem-paneli/kategori-tipi/sil", [CategoryTypeDeletePageController::class, "index"]);
Route::get("/sistem-paneli/kategori-tipleri/{listType}", [CategoryTypesListPageController::class, "index"]);
Route::get("/sistem-paneli/kategori/ekle", [CategoryCreatePageController::class, "index"]);
Route::get("/sistem-paneli/kategori/düzenle", [CategoryEditPageController::class, "index"]);
Route::get("/sistem-paneli/kategori/sil", [CategoryDeletePageController::class, "index"]);
Route::get("/sistem-paneli/kategoriler/{listType}", [CategoriesListPageController::class, "index"]);
Route::get("/sistem-paneli/kategori-grubu/ekle", [CategoryGroupCreatePageController::class, "index"]);
Route::get("/sistem-paneli/kategori-grubu/düzenle", [CategoryGroupEditPageController::class, "index"]);
Route::get("/sistem-paneli/kategori-grubu/sil", [CategoryGroupDeletePageController::class, "index"]);
Route::get("/sistem-paneli/kategori-gruplari/{listType}", [CategoryGroupsListPageController::class, "index"]);
Route::get("/sistem-paneli/haberler/{listType}", [SystemNewsListPageController::class, "index"]);
Route::get("/sistem-paneli/haberler/istatistikleri/{listType}", [NewsStatisticsPageController::class, "index"]);
Route::get("/sistem-paneli/haberler/istatistikleri/zaman/{timeType}/{listType}", [NewsStatisticTimePageController::class, "index"]);
Route::get("/sistem-paneli/haberler/istatistikleri/detay/{newsNo}", [NewsStatisticDetailPageController::class, "index"]);
Route::get("/sistem-paneli/ayarlar/tema", [SystemSettingsPageController::class, "theme"]);
Route::get("/sistem-paneli/ayarlar/sabitler", [SystemSettingsPageController::class, "constants"]);

/* SYSTEM PAGES FORM */
Route::post("/sistem-paneli/kullanici/ekle", [UserCreatePageController::class, "form"]);
Route::post("/sistem-paneli/kullanici-tipi/ekle", [UserTypeCreatePageController::class, "form"]);
Route::post("/sistem-paneli/kategori-tipi/ekle", [CategoryTypeCreatePageController::class, "form"]);
Route::post("/sistem-paneli/kategori/ekle", [CategoryCreatePageController::class, "form"]);
Route::post("/sistem-paneli/kategori-grubu/ekle", [CategoryGroupCreatePageController::class, "form"]);
Route::post("/sistem-paneli/kaynak-site/ekle", [ResourcePlatformCreatePageController::class, "form"]);

/* AUTHOR PAGES FORM */
Route::post("/yazar-paneli/haber/ekle", [NewsCreatePageController::class, "form"]);
