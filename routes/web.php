<?php

use App\Http\Controllers\Api\Users\UserSignInController;
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
use App\Http\Controllers\Pages\System\NewsEditPageController;
use App\Http\Controllers\Pages\System\ResourcePlatformsListPageController;
use App\Http\Controllers\Pages\System\ResourcePlatformCreatePageController;
use App\Http\Controllers\Pages\SystemSignOutPageController;

/* VİSİTOR PAGES */
    // ANASAYFA
        Route::get("/", [HomePageController::class, "index"])->name("anasayfa");
    // HABERLER LİSTESİ
        Route::get("/haberler/{listType}", [VisitorNewsListPageController::class, "index"]);
        Route::get("haberler/yazar/{authorUserName}/{listType}", [VisitorNewsListPageController::class, "author"]);
        Route::get("haberler/kategori/{categoryGroupLinkUrl}/{listType}", [VisitorNewsListPageController::class, "category"]);
    // HABER DETAY
        Route::get("/haber/{newsLinkUrl}", [NewsDetailPageController::class, "index"]);
    // YAZAR GİRİŞİ
        Route::get("/yazar-girisi", [SignInPageController::class, "index"])->name("yazar_girisi");
/* AUTHOR PAGES */
    // YAZAR PANELİ ANA SAYFA
        Route::get("/yazar-paneli", [AuthorDashboardPageController::class, "index"])->name("yazar_paneli_anapanel");
    // HABER EKLE
        Route::get("/yazar-paneli/haber/ekle", [NewsCreatePageController::class, "index"])->name("haber_ekle");
    // HABERLERİM LİSTESİ
        Route::get("/yazar-paneli/haberlerim/", [MyNewsListPageController::class, "index"])->name("haberlerim");
    // HABERLERİMDEN HABER DÜZENLE
        Route::get("/yazar-paneli/haberlerim/duzenle/{no}", [MyNewsEditPageController::class, "index"])->name("haberlerim_düzenle");
    // HABERLERİMDEN HABER SİL
        Route::get("/yazar-paneli/haberlerim/sil/{no}", [MyNewsDeletePageController::class, "index"])->name("haberlerim_sil");
    // HABERLERİMDEN HABER İSTATİSTİKLERİ
        Route::get("/yazar-paneli/haberlerim/istatistikleri", [MyNewsStatisticsPageController::class, "index"]);
        Route::get("/yazar-paneli/haberlerim/istatistikleri/zaman/{timeType}/{listType}", [MyNewsStatisticTimePageController::class, "index"]);
        Route::get("/yazar-paneli/haberlerim/istatistikleri/detay/{newsNo}", [MyNewsStatisticDetailPageController::class, "index"]);
    // YAZAR PANELİ AYARLAR
        Route::get("/yazar-paneli/ayarlar/profilim", [AuthorSettingsPageController::class, "myAccount"])->name("yazar_paneli_ayarlar_profilim");
        Route::get("/yazar-paneli/ayarlar/tema", [AuthorSettingsPageController::class, "theme"])->name("yazar_paneli_ayarlar_tema");
    // YAZAR PANELİ ÇIKIŞ YAP
        Route::get("/yazar-paneli/cikis-yap", [SystemSignOutPageController::class, "index"])->name("yazar_paneli_cikis_yap"); // controller değiştirilecek
/* SYSTEM PAGES */
    // SİSTEM PANELİ ANA SAYFA
        Route::get("/sistem-paneli", [SystemDashboardPageController::class, "index"])->name("sistem_paneli_anapanel");
    // KULLANICI TİPİ EKLE
        Route::get("/sistem-paneli/kullanici-tipi/ekle", [UserTypeCreatePageController::class, "index"])->name("kullanici_tipi_ekle");
    // KULLANICI TİPLERİ LİSTESİ
        Route::get("/sistem-paneli/kullanici-tipleri/", [UserTypesListPageController::class, "index"])->name("kullanici_tipleri");
        Route::get("/sistem-paneli/kullanici-tipleri/no09", [UserTypesListPageController::class, "no09"])->name("kullanici_tipleri_no09");
        Route::get("/sistem-paneli/kullanici-tipleri/no90", [UserTypesListPageController::class, "no90"])->name("kullanici_tipleri_no90");
        Route::get("/sistem-paneli/kullanici-tipleri/nameAZ", [UserTypesListPageController::class, "nameAZ"])->name("kullanici_tipleri_nameAZ");
        Route::get("/sistem-paneli/kullanici-tipleri/nameZA", [UserTypesListPageController::class, "nameZA"])->name("kullanici_tipleri_nameZA");
    // KULLANICI TİPİ DÜZENLE
        Route::get("/sistem-paneli/kullanici-tipi/düzenle/{no}", [UserTypeEditPageController::class, "index"])->name("kullanici_tipi_düzenle");
    // KULLANICI TİPİ SİL
        Route::get("/sistem-paneli/kullanici-tipi/sil/{no}", [UserTypeDeletePageController::class, "index"])->name("kullanici_tipi_sil");
    // KULLANICI EKLE
        Route::get("/sistem-paneli/kullanici/ekle", [UserCreatePageController::class, "index"])->name("kullanici_ekle");
    // KULLANICILAR LİSTESİ
        Route::get("/sistem-paneli/kullanicilar/", [UsersListPageController::class, "index"])->name("kullanicilar");
        Route::get("/sistem-paneli/kullanicilar/no09", [UsersListPageController::class, "no09"])->name("kullanicilar_no09");
        Route::get("/sistem-paneli/kullanicilar/no90", [UsersListPageController::class, "no90"])->name("kullanicilar_no90");
        Route::get("/sistem-paneli/kullanicilar/fullNameAZ", [UsersListPageController::class, "fullNameAZ"])->name("kullanicilar_fullNameAZ");
        Route::get("/sistem-paneli/kullanicilar/fullNameZA", [UsersListPageController::class, "fullNameZA"])->name("kullanicilar_fullNameZA");
        Route::get("/sistem-paneli/kullanicilar/usernameAZ", [UsersListPageController::class, "usernameAZ"])->name("kullanicilar_usernameAZ");
        Route::get("/sistem-paneli/kullanicilar/usernameZA", [UsersListPageController::class, "usernameZA"])->name("kullanicilar_usernameZA");
        Route::get("/sistem-paneli/kullanicilar/typeAZ", [UsersListPageController::class, "typeAZ"])->name("kullanicilar_typeAZ");
        Route::get("/sistem-paneli/kullanicilar/typeZA", [UsersListPageController::class, "typeZA"])->name("kullanicilar_typeZA");
    // KULLANICI DÜZENLE
        Route::get("/sistem-paneli/kullanici/düzenle/{no}", [UserEditPageController::class, "index"])->name("kullanici_düzenle");
    // KULLANICI SİL
        Route::get("/sistem-paneli/kullanici/sil", [UserDeletePageController::class, "index"])->name("kullanici_sil");
    // KAYNAK SİTE EKLE
        Route::get("/sistem-paneli/kaynak-site/ekle", [ResourcePlatformCreatePageController::class, "index"])->name("kaynak_site_ekle");
    // KAYNAK SİTELER LİSTESİ
        Route::get("/sistem-paneli/kaynak-siteler/", [ResourcePlatformsListPageController::class, "index"])->name("kaynak_siteler");
        Route::get("/sistem-paneli/kaynak-siteler/no09", [ResourcePlatformsListPageController::class, "no09"])->name("kaynak_siteler_no09");
        Route::get("/sistem-paneli/kaynak-siteler/no90", [ResourcePlatformsListPageController::class, "no90"])->name("kaynak_siteler_no90");
        Route::get("/sistem-paneli/kaynak-siteler/nameAZ", [ResourcePlatformsListPageController::class, "nameAZ"])->name("kaynak_siteler_nameAZ");
        Route::get("/sistem-paneli/kaynak-siteler/nameZA", [ResourcePlatformsListPageController::class, "nameZA"])->name("kaynak_siteler_nameZA");
        Route::get("/sistem-paneli/kaynak-siteler/websiteLinkAZ", [ResourcePlatformsListPageController::class, "websiteLinkAZ"])->name("kaynak_siteler_websiteLinkAZ");
        Route::get("/sistem-paneli/kaynak-siteler/websiteLinkZA", [ResourcePlatformsListPageController::class, "websiteLinkZA"])->name("kaynak_siteler_websiteLinkZA");
        Route::get("/sistem-paneli/kaynak-siteler/linkUrlAZ", [ResourcePlatformsListPageController::class, "linkUrlAZ"])->name("kaynak_siteler_linkUrlAZ");
        Route::get("/sistem-paneli/kaynak-siteler/linkUrlZA", [ResourcePlatformsListPageController::class, "linkUrlZA"])->name("kaynak_siteler_linkUrlZA");
    // KAYNAK SİTE DÜZENLE
        Route::get("/sistem-paneli/kaynak-site/düzenle/{no}", [ResourcePlatformEditPageController::class, "index"])->name("kaynak_site_düzenle");
    // KAYNAK SİTE SİL
        Route::get("/sistem-paneli/kaynak-site/sil", [ResourcePlatformCreatePageController::class, "index"])->name("kaynak_site_sil");
    // KATEGORİ TİPİ EKLE
        Route::get("/sistem-paneli/kategori-tipi/ekle", [CategoryTypeCreatePageController::class, "index"])->name("kategori_tipi_ekle");
    // KATEGORİ TİPLERİ LİSTESİ
        Route::get("/sistem-paneli/kategori-tipleri", [CategoryTypesListPageController::class, "index"])->name("kategori_tipleri");
        Route::get("/sistem-paneli/kategori-tipleri/no09", [CategoryTypesListPageController::class, "no09"])->name("kategori_tipleri_no09");
        Route::get("/sistem-paneli/kategori-tipleri/no90", [CategoryTypesListPageController::class, "no90"])->name("kategori_tipleri_no90");
        Route::get("/sistem-paneli/kategori-tipleri/nameAZ", [CategoryTypesListPageController::class, "nameAZ"])->name("kategori_tipleri_nameAZ");
        Route::get("/sistem-paneli/kategori-tipleri/nameZA", [CategoryTypesListPageController::class, "nameZA"])->name("kategori_tipleri_nameZA");
    // KATEGORİ TİPİ DÜZENLE
        Route::get("/sistem-paneli/kategori-tipi/düzenle/{no}", [CategoryTypeEditPageController::class, "index"])->name("kategori_tipi_düzenle");
    // KATEGORİ TİPİ SİL
        Route::get("/sistem-paneli/kategori-tipi/sil", [CategoryTypeDeletePageController::class, "index"])->name("kategori_tipi_sil");
    // KATEGORİ EKLE
        Route::get("/sistem-paneli/kategori/ekle", [CategoryCreatePageController::class, "index"])->name("kategori_ekle");
    // KATEGORİLER LİSTESİ
        Route::get("/sistem-paneli/kategoriler", [CategoriesListPageController::class, "index"])->name("kategoriler");
        Route::get("/sistem-paneli/kategoriler/no09", [CategoriesListPageController::class, "no09"])->name("kategoriler_no09");
        Route::get("/sistem-paneli/kategoriler/no90", [CategoriesListPageController::class, "no90"])->name("kategoriler_no90");
        Route::get("/sistem-paneli/kategoriler/nameAZ", [CategoriesListPageController::class, "nameAZ"])->name("kategoriler_nameAZ");
        Route::get("/sistem-paneli/kategoriler/nameZA", [CategoriesListPageController::class, "nameZA"])->name("kategoriler_nameZA");
        Route::get("/sistem-paneli/kategoriler/typeAZ", [CategoriesListPageController::class, "typeAZ"])->name("kategoriler_typeAZ");
        Route::get("/sistem-paneli/kategoriler/typeZA", [CategoriesListPageController::class, "typeZA"])->name("kategoriler_typeZA");
        Route::get("/sistem-paneli/kategoriler/mainCategoryAZ", [CategoriesListPageController::class, "mainCategoryAZ"])->name("kategoriler_mainCategoryAZ");
        Route::get("/sistem-paneli/kategoriler/mainCategoryZA", [CategoriesListPageController::class, "mainCategoryZA"])->name("kategoriler_mainCategoryZA");
        Route::get("/sistem-paneli/kategoriler/linkUrlAZ", [CategoriesListPageController::class, "linkUrlAZ"])->name("kategoriler_linkUrlAZ");
        Route::get("/sistem-paneli/kategoriler/linkUrlZA", [CategoriesListPageController::class, "linkUrlZA"])->name("kategoriler_linkUrlZA");
    // KATEGORİ DÜZENLE
        Route::get("/sistem-paneli/kategori/düzenle/{no}", [CategoryEditPageController::class, "index"])->name("kategori_düzenle");
    // KATEGORİ SİL
        Route::get("/sistem-paneli/kategori/sil", [CategoryDeletePageController::class, "index"])->name("kategori_sil");
    // KATEGORİ GRUBU EKLE
        Route::get("/sistem-paneli/kategori-grubu/ekle", [CategoryGroupCreatePageController::class, "index"])->name("kategori_grubu_ekle");
    // KATEGORİ GRUPLARI LİSTESİ
        Route::get("/sistem-paneli/kategori-gruplari/", [CategoryGroupsListPageController::class, "index"])->name("kategori_gruplari");
        Route::get("/sistem-paneli/kategori-gruplari/no09", [CategoryGroupsListPageController::class, "no09"])->name("kategori_gruplari_no09");
        Route::get("/sistem-paneli/kategori-gruplari/no90", [CategoryGroupsListPageController::class, "no90"])->name("kategori_gruplari_no90");
        Route::get("/sistem-paneli/kategori-gruplari/mainAZ", [CategoryGroupsListPageController::class, "mainAZ"])->name("kategori_gruplari_mainAZ");
        Route::get("/sistem-paneli/kategori-gruplari/mainZA", [CategoryGroupsListPageController::class, "mainZA"])->name("kategori_gruplari_mainZA");
        Route::get("/sistem-paneli/kategori-gruplari/sub1AZ", [CategoryGroupsListPageController::class, "sub1AZ"])->name("kategori_gruplari_sub1AZ");
        Route::get("/sistem-paneli/kategori-gruplari/sub1ZA", [CategoryGroupsListPageController::class, "sub1ZA"])->name("kategori_gruplari_sub1ZA");
        Route::get("/sistem-paneli/kategori-gruplari/sub2AZ", [CategoryGroupsListPageController::class, "sub2AZ"])->name("kategori_gruplari_sub2AZ");
        Route::get("/sistem-paneli/kategori-gruplari/sub2ZA", [CategoryGroupsListPageController::class, "sub2ZA"])->name("kategori_gruplari_sub2ZA");
        Route::get("/sistem-paneli/kategori-gruplari/sub3AZ", [CategoryGroupsListPageController::class, "sub3AZ"])->name("kategori_gruplari_sub3AZ");
        Route::get("/sistem-paneli/kategori-gruplari/sub3ZA", [CategoryGroupsListPageController::class, "sub3ZA"])->name("kategori_gruplari_sub3ZA");
        Route::get("/sistem-paneli/kategori-gruplari/sub4AZ", [CategoryGroupsListPageController::class, "sub4AZ"])->name("kategori_gruplari_sub4AZ");
        Route::get("/sistem-paneli/kategori-gruplari/sub4ZA", [CategoryGroupsListPageController::class, "sub4ZA"])->name("kategori_gruplari_sub4ZA");
        Route::get("/sistem-paneli/kategori-gruplari/sub5AZ", [CategoryGroupsListPageController::class, "sub5AZ"])->name("kategori_gruplari_sub5AZ");
        Route::get("/sistem-paneli/kategori-gruplari/sub5ZA", [CategoryGroupsListPageController::class, "sub5ZA"])->name("kategori_gruplari_sub5ZA");
        Route::get("/sistem-paneli/kategori-gruplari/linkUrlAZ", [CategoryGroupsListPageController::class, "linkUrlAZ"])->name("kategori_gruplari_linkUrlAZ");
        Route::get("/sistem-paneli/kategori-gruplari/linkUrlZA", [CategoryGroupsListPageController::class, "linkUrlZA"])->name("kategori_gruplari_linkUrlZA");
    // KATEGORİ GRUBU DÜZENLE
        Route::get("/sistem-paneli/kategori-grubu/düzenle/{no}", [CategoryGroupEditPageController::class, "index"])->name("kategori_grubu_düzenle");
    // KATEGORİ GRUBU SİL
        Route::get("/sistem-paneli/kategori-grubu/sil", [CategoryGroupDeletePageController::class, "index"])->name("kategori_grubu_sil");
    // HABERLER LİSTESİ
        Route::get("/sistem-paneli/haberler", [SystemNewsListPageController::class, "index"])->name("haberler");
        Route::get("/sistem-paneli/haberler/no09", [SystemNewsListPageController::class, "no09"])->name("haberler_no09");
        Route::get("/sistem-paneli/haberler/no90", [SystemNewsListPageController::class, "no90"])->name("haberler_no90");
        Route::get("/sistem-paneli/haberler/contentAZ", [SystemNewsListPageController::class, "contentAZ"])->name("haberler_contentAZ");
        Route::get("/sistem-paneli/haberler/contentZA", [SystemNewsListPageController::class, "contentZA"])->name("haberler_contentZA");
        Route::get("/sistem-paneli/haberler/authorAZ", [SystemNewsListPageController::class, "authorAZ"])->name("haberler_authorAZ");
        Route::get("/sistem-paneli/haberler/authorZA", [SystemNewsListPageController::class, "authorZA"])->name("haberler_authorZA");
        Route::get("/sistem-paneli/haberler/categoryAZ", [SystemNewsListPageController::class, "categoryAZ"])->name("haberler_categoryAZ");
        Route::get("/sistem-paneli/haberler/categoryZA", [SystemNewsListPageController::class, "categoryZA"])->name("haberler_categoryZA");
        Route::get("/sistem-paneli/haberler/resourcePlatformAZ", [SystemNewsListPageController::class, "resourcePlatformAZ"])->name("haberler_resourcePlatformAZ");
        Route::get("/sistem-paneli/haberler/resourcePlatformZA", [SystemNewsListPageController::class, "resourcePlatformZA"])->name("haberler_resourcePlatformZA");
        Route::get("/sistem-paneli/haberler/publishDateAZ", [SystemNewsListPageController::class, "publishDateAZ"])->name("haberler_publishDateAZ");
        Route::get("/sistem-paneli/haberler/publishDateZA", [SystemNewsListPageController::class, "publishDateZA"])->name("haberler_publishDateZA");
        Route::get("/sistem-paneli/haberler/writeTimeAZ", [SystemNewsListPageController::class, "writeTimeAZ"])->name("haberler_writeTimeAZ");
        Route::get("/sistem-paneli/haberler/writeTimeZA", [SystemNewsListPageController::class, "writeTimeZA"])->name("haberler_writeTimeZA");
    // HABER DÜZENLE
        Route::get("/sistem-paneli/haber/düzenle/{no}", [NewsEditPageController::class, "index"])->name("haber_düzenle");
    // HABER İSTATİSTİKLERİ
        Route::get("/sistem-paneli/haberler/istatistikleri/{listType}", [NewsStatisticsPageController::class, "index"]);
        Route::get("/sistem-paneli/haberler/istatistikleri/zaman/{timeType}/{listType}", [NewsStatisticTimePageController::class, "index"]);
        Route::get("/sistem-paneli/haberler/istatistikleri/detay/{newsNo}", [NewsStatisticDetailPageController::class, "index"]);
    // SİSTEM PANELİ AYARLAR
        Route::get("/sistem-paneli/ayarlar/tema", [SystemSettingsPageController::class, "theme"])->name("sistem_paneli_ayarlar_tema");
        Route::get("/sistem-paneli/ayarlar/sabitler", [SystemSettingsPageController::class, "constants"])->name("ayarlar_sabitler");
    // SİSTEM PANELİ ÇIKIŞ YAP
        Route::get("/sistem-paneli/cikis-yap", [SystemSignOutPageController::class, "index"])->name("sistem_paneli_cikis_yap"); // controller değiştirilecek
/* FORM ROUTES */
    /* VİSİTOR PAGES */
        /* YAZAR GİRİŞİ */
            Route::post("/yazar-girisi", [SignInPageController::class, "form"]);
    /* AUTHOR PAGES */
        // HABER EKLE
            Route::post("/yazar-paneli/haber/ekle", [NewsCreatePageController::class, "form"]);
        // YAZAR PANELİ AYARLAR
            Route::post("/yazar-paneli/ayarlar/profilim", [AuthorSettingsPageController::class, "myAccountForm"]);
            Route::post("/yazar-paneli/ayarlar/tema", [AuthorSettingsPageController::class, "themeForm"]);
    /* SYSTEM PAGES */
        // KULLANICI TİPİ EKLE
            Route::post("/sistem-paneli/kullanici-tipi/ekle", [UserTypeCreatePageController::class, "form"]);
        // KULLANICI TİPLERİ LİSTESİ
            Route::post("/sistem-paneli/kullanici-tipleri/", [UserTypesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanici-tipleri/no09", [UserTypesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanici-tipleri/no90", [UserTypesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanici-tipleri/nameAZ", [UserTypesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanici-tipleri/nameZA", [UserTypesListPageController::class, "form"]);
        // KULLANICI TİPİ DÜZENLE
            Route::post("/sistem-paneli/kullanici-tipi/düzenle/{no}", [UserTypeEditPageController::class, "form"]);
        // KULLANICI EKLE
            Route::post("/sistem-paneli/kullanici/ekle", [UserCreatePageController::class, "form"]);
        // KULLANICILAR LİSTESİ
            Route::post("/sistem-paneli/kullanicilar/", [UsersListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanicilar/no09", [UsersListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanicilar/no90", [UsersListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanicilar/fullNameAZ", [UsersListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanicilar/fullNameZA", [UsersListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanicilar/usernameAZ", [UsersListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanicilar/usernameZA", [UsersListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanicilar/typeAZ", [UsersListPageController::class, "form"]);
            Route::post("/sistem-paneli/kullanicilar/typeZA", [UsersListPageController::class, "form"]);
        // KULLANICI DÜZENLE
            Route::post("/sistem-paneli/kullanici/düzenle/{no}", [UserEditPageController::class, "form"]);
        // KAYNAK SİTE EKLE
            Route::post("/sistem-paneli/kaynak-site/ekle", [ResourcePlatformCreatePageController::class, "form"]);
        // KAYNAK SİTELER
            Route::post("/sistem-paneli/kaynak-siteler/", [ResourcePlatformsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kaynak-siteler/no09", [ResourcePlatformsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kaynak-siteler/no90", [ResourcePlatformsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kaynak-siteler/nameAZ", [ResourcePlatformsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kaynak-siteler/nameZA", [ResourcePlatformsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kaynak-siteler/websiteLinkAZ", [ResourcePlatformsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kaynak-siteler/websiteLinkZA", [ResourcePlatformsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kaynak-siteler/linkUrlAZ", [ResourcePlatformsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kaynak-siteler/linkUrlZA", [ResourcePlatformsListPageController::class, "form"]);
        // KAYNAK SİTE DÜZENLE
            Route::post("/sistem-paneli/kaynak-site/düzenle/{no}", [ResourcePlatformEditPageController::class, "form"]);
        // KATEGORİ TİPİ EKLE
            Route::post("/sistem-paneli/kategori-tipi/ekle", [CategoryTypeCreatePageController::class, "form"]);
        // KATEGORİ TİPLERİ LİSTESİ
            Route::post("/sistem-paneli/kategori-tipleri", [CategoryTypesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-tipleri/no09", [CategoryTypesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-tipleri/no90", [CategoryTypesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-tipleri/nameAZ", [CategoryTypesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-tipleri/nameZA", [CategoryTypesListPageController::class, "form"]);
        // KATEGORİ TİPİ DÜZENLE
            Route::post("/sistem-paneli/kategori-tipi/düzenle/{no}", [CategoryTypeEditPageController::class, "form"]);
        // KATEGORİ EKLE
            Route::post("/sistem-paneli/kategori/ekle", [CategoryCreatePageController::class, "form"]);
        // KATEGORİ DÜZENLE
            Route::post("/sistem-paneli/kategori/düzenle/{no}", [CategoryEditPageController::class, "form"]);
        // KATEGORİLER
            Route::post("/sistem-paneli/kategoriler", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/no09", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/no90", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/nameAZ", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/nameZA", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/typeAZ", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/typeZA", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/mainCategoryAZ", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/mainCategoryZA", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/linkUrlAZ", [CategoriesListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategoriler/linkUrlZA", [CategoriesListPageController::class, "form"]);
        // KATEGORİ GRUBU EKLE
            Route::post("/sistem-paneli/kategori-grubu/ekle", [CategoryGroupCreatePageController::class, "form"]);
        // KATEGORİ GRUPLARI
            Route::post("/sistem-paneli/kategori-gruplari/", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/no09", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/no90", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/mainAZ", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/mainZA", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub1AZ", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub1ZA", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub2AZ", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub2ZA", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub3AZ", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub3ZA", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub4AZ", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub4ZA", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub5AZ", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/sub5ZA", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/linkUrlAZ", [CategoryGroupsListPageController::class, "form"]);
            Route::post("/sistem-paneli/kategori-gruplari/linkUrlZA", [CategoryGroupsListPageController::class, "form"]);
        // KATEGORİ GRUBU DÜZENLE
            Route::post("/sistem-paneli/kategori-grubu/düzenle/{no}", [CategoryGroupEditPageController::class, "form"]);
        // HABERLER LİSTESİ
            Route::post("/sistem-paneli/haberler", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/no09", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/no90", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/contentAZ", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/contentZA", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/authorAZ", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/authorZA", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/categoryAZ", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/categoryZA", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/resourcePlatformAZ", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/resourcePlatformZA", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/publishDateAZ", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/publishDateZA", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/writeTimeAZ", [SystemNewsListPageController::class, "form"]);
            Route::post("/sistem-paneli/haberler/writeTimeZA", [SystemNewsListPageController::class, "form"]);
        // HABER DÜZENLE
            Route::post("/sistem-paneli/haber/düzenle/{no}", [NewsEditPageController::class, "form"]);
        // SİSTEM PANELİ AYARLAR
            Route::post("/sistem-paneli/ayarlar/tema", [SystemSettingsPageController::class, "themeForm"]);
            Route::post("/sistem-paneli/ayarlar/sabitler", [SystemSettingsPageController::class, "constantsForm"]);
