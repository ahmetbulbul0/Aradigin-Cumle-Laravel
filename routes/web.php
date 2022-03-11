<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Visitor\HomePageController;
use App\Http\Controllers\Pages\Visitor\SignInPageController;
use App\Http\Controllers\Pages\System\NewsEditPageController;
use App\Http\Controllers\Pages\System\UserEditPageController;
use App\Http\Controllers\Pages\Visitor\SignOutPageController;
use App\Http\Controllers\Pages\System\UsersListPageController;
use App\Http\Controllers\Pages\Author\MyNewsEditPageController;
use App\Http\Controllers\Pages\Author\MyNewsListPageController;
use App\Http\Controllers\Pages\Author\NewsCreatePageController;
use App\Http\Controllers\Pages\System\NewsDeletePageController;
use App\Http\Controllers\Pages\System\UserCreatePageController;
use App\Http\Controllers\Pages\System\UserDeletePageController;
use App\Http\Controllers\Pages\Visitor\NewsDetailPageController;
use App\Http\Controllers\Pages\Author\MyNewsDeletePageController;
use App\Http\Controllers\Pages\Common\WebSiteSetupPageController;
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
use App\Http\Controllers\Pages\System\ResourceUrlEditPageController;
use App\Http\Controllers\Pages\System\SystemDashboardPageController;
use App\Http\Controllers\Pages\System\UserSettingEditPageController;
use App\Http\Controllers\Pages\Author\MyNewsStatisticsPageController;
use App\Http\Controllers\Pages\System\CategoryTypeEditPageController;
use App\Http\Controllers\Pages\System\ResourceUrlsListPageController;
use App\Http\Controllers\Pages\Visitor\VisitorNewsListPageController;
use App\Http\Controllers\Pages\System\CategoryGroupEditPageController;
use App\Http\Controllers\Pages\System\CategoryTypesListPageController;
use App\Http\Controllers\Pages\System\NewsStatisticTimePageController;
use App\Http\Controllers\Pages\System\ResourceUrlDeletePageController;
use App\Http\Controllers\Pages\System\UserSettingDeletePageController;
use App\Http\Controllers\Pages\System\CategoryGroupsListPageController;
use App\Http\Controllers\Pages\System\CategoryTypeCreatePageController;
use App\Http\Controllers\Pages\System\CategoryTypeDeletePageController;
use App\Http\Controllers\Pages\Author\MyNewsStatisticTimePageController;
use App\Http\Controllers\Pages\System\CategoryGroupCreatePageController;
use App\Http\Controllers\Pages\System\CategoryGroupDeletePageController;
use App\Http\Controllers\Pages\System\NewsStatisticDetailPageController;
use App\Http\Controllers\Pages\System\CategoryGroupUrlEditPageController;
use App\Http\Controllers\Pages\System\ResourcePlatformEditPageController;
use App\Http\Controllers\Pages\Author\MyNewsStatisticDetailPageController;
use App\Http\Controllers\Pages\System\CategoryGroupUrlsListPageController;
use App\Http\Controllers\Pages\System\ResourcePlatformsListPageController;
use App\Http\Controllers\Pages\System\ResourcePlatformCreatePageController;
use App\Http\Controllers\Pages\System\ResourcePlatformDeletePageController;
use App\Http\Controllers\Pages\System\CategoryGroupUrlsDeletePageController;
use App\Http\Controllers\Pages\System\UserSettingsListPageController;
use App\Http\Controllers\Pages\Visitor\VisitorChangeWebSiteThemePageController;

Route::prefix("/kurulum")->controller(WebSiteSetupPageController::class)->group(function () {
    Route::get("/asama-1", "stage1")->name("website_setup_stage1")->middleware("isTheWebSiteNotSetup");
    Route::get("/asama-2", "stage2")->name("website_setup_stage2")->middleware("isTheWebSiteNotSetup");
    Route::get("/asama-3", "stage3")->name("website_setup_stage3")->middleware("isTheWebSiteNotSetup");
    Route::get("/asama-4", "stage4")->name("website_setup_stage4")->middleware("isTheWebSiteNotSetup");
    Route::get("/son", "finish")->name("website_setup_finish")->middleware("isTheWebSiteSetup");
});

Route::prefix("/")->middleware(['isTheWebSiteSetup'])->group(function () {
    /* VİSİTOR PAGES */
        Route::middleware(["isItVisitor", "visitorDataCheck", "userDataCheckIfIsUser"])->group(function () {
            // ANASAYFA
                Route::get("/", [HomePageController::class, "index"])->name("anasayfa");
            // HABERLER LİSTESİ
                Route::prefix("/haberler")->controller(VisitorNewsListPageController::class)->group(function () {
                    Route::get("/{listType}/{page?}", "index")->name("haberler_listesi");
                    Route::get("/yazar/{authorUserName}/{listType}/{page?}", "author")->name("haberler_listesi_yazar");
                    Route::get("/kaynak/{resourcePlatformLinkUrl}/{listType}/{page?}", "resourcePlatform")->name("haberler_listesi_kaynak");
                    Route::get("/kategori/{categoryGroupLinkUrl}/{listType}/{page?}", "category")->name("haberler_listesi_kategori");
                });
            // HABER DETAY
                Route::get("/haber/{newsLinkUrl}", [NewsDetailPageController::class, "index"])->name("haber_detay");
            // YAZAR GİRİŞİ
                Route::prefix("/yazar-girisi")->controller(SignInPageController::class)->middleware("isItNotUser")->group(function () {
                    Route::get("/", "index")->name("yazar_girisi");
                    Route::post("/", "form");
                });
            // ZİYARETÇİ TEMA DEĞİŞTİR
                Route::post("/ziyaretci-tema-degistir", [VisitorChangeWebSiteThemePageController::class, "form"])->name("visitor_website_theme_change");
            });
        // ÇIKIŞ YAP
            Route::get("/cikis-yap", [SignOutPageController::class, "index"])->name("cikis_yap");
    /* AUTHOR PAGES */
        Route::prefix("/yazar-paneli")->middleware(['isItAuthor', 'userDataCheck'])->group(function () {
            // YAZAR PANELİ ANA PANEL
                Route::get("/", [AuthorDashboardPageController::class, "index"])->name("yazar_paneli_anapanel");
            // HABER EKLE
                Route::get("/haber/ekle", [NewsCreatePageController::class, "index"])->name("haber_ekle");
            // HABERLERİM    
                Route::prefix("/haberlerim")->group(function () {
                    // HABERLERİM LİSTESİ "TODO"
                        Route::get("/", [MyNewsListPageController::class, "index"])->name("haberlerim");
                    // HABERLERİMDEN HABER DÜZENLE "TODO"
                        Route::get("/düzenle/{no}", [MyNewsEditPageController::class, "index"])->name("haberlerim_düzenle");
                    // HABERLERİMDEN HABER SİL "TODO"
                        Route::get("/sil/{no}", [MyNewsDeletePageController::class, "index"])->name("haberlerim_sil");
                });
            // HABERLERİM İSTATİSTİKLERİ "TODO"
                Route::prefix("/haberlerim/istatistikleri")->group(function () {
                    // HABERLERİM İSTATİSTİKLERİ "TODO"
                        Route::get("/", [MyNewsStatisticsPageController::class, "index"]);
                    // HABERLERİM İSTATİSTİKLERİ ZAMANA GÖRE "TODO"
                        Route::get("/zaman/{timeType}/{listType}", [MyNewsStatisticTimePageController::class, "index"]);
                    // HABERLERİM İSTATİSTİKLERİ DETAY "TODO"
                        Route::get("/detay/{newsNo}", [MyNewsStatisticDetailPageController::class, "index"]);
                });
            // YAZAR PANELİ AYARLAR
                Route::prefix("/ayarlar")->controller(AuthorSettingsPageController::class)->group(function () {
                    // YAZAR PANELİ AYARLAR PROFİLİM
                        Route::get("/profilim", "myAccount")->name("yazar_paneli_ayarlar_profilim");
                    // YAZAR PANELİ AYARLAR TEMA
                        Route::get("/tema", "theme")->name("yazar_paneli_ayarlar_tema");
                });
        });
    /* SYSTEM PAGES */
        Route::prefix("/sistem-paneli")->middleware(["isItSystem", "userDataCheck"])->group(function () {
            // SİSTEM PANELİ ANA PANEL
                Route::get("/", [SystemDashboardPageController::class, "index"])->name("sistem_paneli_anapanel");
            // KULLANICI TİPİ İŞLEMLERİ
                Route::prefix("/kullanici-tipi")->group(function () {
                    // KULLANICI TİPİ EKLE
                        Route::get("/ekle", [UserTypeCreatePageController::class, "index"])->name("kullanici_tipi_ekle");
                    // KULLANICI TİPİ DÜZENLE
                        Route::get("/düzenle/{no}", [UserTypeEditPageController::class, "index"])->name("kullanici_tipi_düzenle");
                    // KULLANICI TİPİ SİL
                        Route::get("/sil/{no}", [UserTypeDeletePageController::class, "index"])->name("kullanici_tipi_sil");
                });
            // KULLANICI TİPLERİ LİSTESİ
                Route::prefix("/kullanici-tipleri")->controller(UserTypesListPageController::class)->group(function () {
                    Route::get("/", "index")->name("kullanici_tipleri");
                    Route::get("/no09", "no09")->name("kullanici_tipleri_no09");
                    Route::get("/no90", "no90")->name("kullanici_tipleri_no90");
                    Route::get("/nameAZ", "nameAZ")->name("kullanici_tipleri_nameAZ");
                    Route::get("/nameZA", "nameZA")->name("kullanici_tipleri_nameZA");
                });
            // KULLANICI İŞLEMLERİ
                Route::prefix("/kullanici")->group(function () {
                    // KULLANICI EKLE
                        Route::get("/ekle", [UserCreatePageController::class, "index"])->name("kullanici_ekle");
                    // KULLANICI DÜZENLE
                        Route::get("/düzenle/{no}", [UserEditPageController::class, "index"])->name("kullanici_düzenle");
                    // KULLANICI SİL
                        Route::get("/sil/{no}", [UserDeletePageController::class, "index"])->name("kullanici_sil");
                });
            // KULLANICILAR LİSTESİ
                Route::prefix("/kullanicilar")->controller(UsersListPageController::class)->group(function () {
                    Route::get("/", "index")->name("kullanicilar");
                    Route::get("/no09", "no09")->name("kullanicilar_no09");
                    Route::get("/no90", "no90")->name("kullanicilar_no90");
                    Route::get("/fullNameAZ", "fullNameAZ")->name("kullanicilar_fullNameAZ");
                    Route::get("/fullNameZA", "fullNameZA")->name("kullanicilar_fullNameZA");
                    Route::get("/usernameAZ", "usernameAZ")->name("kullanicilar_usernameAZ");
                    Route::get("/usernameZA", "usernameZA")->name("kullanicilar_usernameZA");
                    Route::get("/typeAZ", "typeAZ")->name("kullanicilar_typeAZ");
                    Route::get("/typeZA", "typeZA")->name("kullanicilar_typeZA");
                });
            // KULLANICI AYARI İŞLEMLERİ
                Route::prefix("/kullanici-ayari")->group(function () {
                    // KULLANICI AYARI DÜZENLE
                        Route::get("/düzenle/{no}", [UserSettingEditPageController::class, "index"])->name("kullanici_ayari_düzenle");
                    // KULLANICI AYARI SİL
                        Route::get("/sil/{no}", [UserSettingDeletePageController::class, "index"])->name("kullanici_ayari_sil");
                });
            // KULLANICI AYARLARI LİSTESİ
                Route::prefix("/kullanici-ayarlari")->controller(UserSettingsListPageController::class)->group(function () {
                    Route::get("/", "index")->name("kullanici_ayarlari");
                });
            // KAYNAK SİTE İŞLEMLERİ
                Route::prefix("/kaynak-site")->group(function () {
                    // KAYNAK SİTE EKLE
                        Route::get("/ekle", [ResourcePlatformCreatePageController::class, "index"])->name("kaynak_site_ekle");
                    // KAYNAK SİTE DÜZENLE
                        Route::get("/düzenle/{no}", [ResourcePlatformEditPageController::class, "index"])->name("kaynak_site_düzenle");
                    // KAYNAK SİTE SİL
                        Route::get("/sil/{no}", [ResourcePlatformDeletePageController::class, "index"])->name("kaynak_site_sil");
                });
            // KAYNAK SİTELER LİSTESİ
                Route::prefix("/kaynak-siteler")->controller(ResourcePlatformsListPageController::class)->group(function () {
                    Route::get("/", "index")->name("kaynak_siteler");
                    Route::get("/no09", "no09")->name("kaynak_siteler_no09");
                    Route::get("/no90", "no90")->name("kaynak_siteler_no90");
                    Route::get("/nameAZ", "nameAZ")->name("kaynak_siteler_nameAZ");
                    Route::get("/nameZA", "nameZA")->name("kaynak_siteler_nameZA");
                    Route::get("/websiteLinkAZ", "websiteLinkAZ")->name("kaynak_siteler_websiteLinkAZ");
                    Route::get("/websiteLinkZA", "websiteLinkZA")->name("kaynak_siteler_websiteLinkZA");
                    Route::get("/linkUrlAZ", "linkUrlAZ")->name("kaynak_siteler_linkUrlAZ");
                    Route::get("/linkUrlZA", "linkUrlZA")->name("kaynak_siteler_linkUrlZA");
                });
            // KAYNAK LİNKLERİ İŞLEMLERİ
                Route::prefix("/kaynak-linki")->group(function () {
                    // KAYNAK LİNKİ SİL
                        Route::get("/sil/{no}", [ResourceUrlDeletePageController::class, "index"])->name("kaynak_linki_sil");
                    // KAYNAK LİNKİ DÜZENLE
                        Route::get("/düzenle/{no}", [ResourceUrlEditPageController::class, "index"])->name("kaynak_linki_düzenle");
                });
            // KAYNAK LİNKLERİ LİSTESİ
                Route::get("/kaynak-linkleri", [ResourceUrlsListPageController::class, "index"])->name("kaynak_linkler");
            // KAYNAK LİNKLERİ İŞLEMLERİ
                Route::prefix("/kategori-tipi")->group(function () {
                    // KATEGORİ TİPİ EKLE
                        Route::get("/ekle", [CategoryTypeCreatePageController::class, "index"])->name("kategori_tipi_ekle");
                    // KATEGORİ TİPİ DÜZENLE
                        Route::get("/düzenle/{no}", [CategoryTypeEditPageController::class, "index"])->name("kategori_tipi_düzenle");
                    // KATEGORİ TİPİ SİL
                        Route::get("/sil/{no}", [CategoryTypeDeletePageController::class, "index"])->name("kategori_tipi_sil");
                });
            // KATEGORİ TİPLERİ LİSTESİ
                Route::prefix("/kategori-tipleri")->controller(CategoryTypesListPageController::class)->group(function () {
                    Route::get("/", "index")->name("kategori_tipleri");
                    Route::get("/no09", "no09")->name("kategori_tipleri_no09");
                    Route::get("/no90", "no90")->name("kategori_tipleri_no90");
                    Route::get("/nameAZ", "nameAZ")->name("kategori_tipleri_nameAZ");
                    Route::get("/nameZA", "nameZA")->name("kategori_tipleri_nameZA");
                });
            // KATEGORİ İŞLEMLERİ
                Route::prefix("/kategori")->group(function () {
                    // KATEGORİ EKLE
                        Route::get("/ekle", [CategoryCreatePageController::class, "index"])->name("kategori_ekle");
                    // KATEGORİ DÜZENLE
                        Route::get("/düzenle/{no}", [CategoryEditPageController::class, "index"])->name("kategori_düzenle");
                    // KATEGORİ SİL
                        Route::get("/sil/{no}", [CategoryDeletePageController::class, "index"])->name("kategori_sil");
                });
            // KATEGORİLER LİSTESİ
                Route::prefix("/kategoriler")->controller(CategoriesListPageController::class)->group(function () {
                    Route::get("/", "index")->name("kategoriler");
                    Route::get("/no09", "no09")->name("kategoriler_no09");
                    Route::get("/no90", "no90")->name("kategoriler_no90");
                    Route::get("/nameAZ", "nameAZ")->name("kategoriler_nameAZ");
                    Route::get("/nameZA", "nameZA")->name("kategoriler_nameZA");
                    Route::get("/typeAZ", "typeAZ")->name("kategoriler_typeAZ");
                    Route::get("/typeZA", "typeZA")->name("kategoriler_typeZA");
                    Route::get("/mainCategoryAZ", "mainCategoryAZ")->name("kategoriler_mainCategoryAZ");
                    Route::get("/mainCategoryZA", "mainCategoryZA")->name("kategoriler_mainCategoryZA");
                    Route::get("/linkUrlAZ", "linkUrlAZ")->name("kategoriler_linkUrlAZ");
                    Route::get("/linkUrlZA", "linkUrlZA")->name("kategoriler_linkUrlZA");
                });
            // KATEGORİ İŞLEMLERİ
                Route::prefix("/kategori-grubu")->group(function () {
                    // KATEGORİ GRUBU EKLE
                        Route::get("/ekle", [CategoryGroupCreatePageController::class, "index"])->name("kategori_grubu_ekle");
                    // KATEGORİ GRUBU DÜZENLE
                        Route::get("/düzenle/{no}", [CategoryGroupEditPageController::class, "index"])->name("kategori_grubu_düzenle");
                    // KATEGORİ GRUBU SİL
                        Route::get("/sil/{no}", [CategoryGroupDeletePageController::class, "index"])->name("kategori_grubu_sil");
                });
            // KATEGORİ GRUPLARI LİSTESİ
                Route::prefix("/kategori-gruplari")->controller(CategoryGroupsListPageController::class)->group(function () {
                    Route::get("/", "index")->name("kategori_gruplari");
                    Route::get("/no09", "no09")->name("kategori_gruplari_no09");
                    Route::get("/no90", "no90")->name("kategori_gruplari_no90");
                    Route::get("/mainAZ", "mainAZ")->name("kategori_gruplari_mainAZ");
                    Route::get("/mainZA", "mainZA")->name("kategori_gruplari_mainZA");
                    Route::get("/sub1AZ", "sub1AZ")->name("kategori_gruplari_sub1AZ");
                    Route::get("/sub1ZA", "sub1ZA")->name("kategori_gruplari_sub1ZA");
                    Route::get("/sub2AZ", "sub2AZ")->name("kategori_gruplari_sub2AZ");
                    Route::get("/sub2ZA", "sub2ZA")->name("kategori_gruplari_sub2ZA");
                    Route::get("/sub3AZ", "sub3AZ")->name("kategori_gruplari_sub3AZ");
                    Route::get("/sub3ZA", "sub3ZA")->name("kategori_gruplari_sub3ZA");
                    Route::get("/sub4AZ", "sub4AZ")->name("kategori_gruplari_sub4AZ");
                    Route::get("/sub4ZA", "sub4ZA")->name("kategori_gruplari_sub4ZA");
                    Route::get("/sub5AZ", "sub5AZ")->name("kategori_gruplari_sub5AZ");
                    Route::get("/sub5ZA", "sub5ZA")->name("kategori_gruplari_sub5ZA");
                    Route::get("/linkUrlAZ", "linkUrlAZ")->name("kategori_gruplari_linkUrlAZ");
                    Route::get("/linkUrlZA", "linkUrlZA")->name("kategori_gruplari_linkUrlZA");
                });
            // KATEGORİ GRUBU LİNK METİNLERİ İŞLEMLERİ
                Route::prefix("/kategori-grubu-link-metni")->group(function () {
                    // KATEGORİ GRUBU LİNK METNİ DÜZENLE
                        Route::get("/düzenle/{no}", [CategoryGroupUrlEditPageController::class, "index"])->name("kategori_grubu_linki_düzenle");
                    // KATEGORİ GRUBU LİNK METNİ SİL
                        Route::get("/sil/{no}", [CategoryGroupUrlsDeletePageController::class, "index"])->name("kategori_grubu_linki_sil");
                });
            // KATEGORİ GRUBU LİNK METİNLERİ LİSTESİ
                Route::get("/kategori-grubu-link-metinleri", [CategoryGroupUrlsListPageController::class, "index"])->name("kategori_grubu_linkleri");
            // HABER İŞLEMLERİ
                Route::prefix("/haber")->group(function () {
                    // HABER DÜZENLE
                        Route::get("/düzenle/{no}", [NewsEditPageController::class, "index"])->name("haber_düzenle");
                    // HABER SİL
                        Route::get("/sil/{no}", [NewsDeletePageController::class, "index"])->name("haber_sil");
                });
            // HABERLER LİSTESİ
                Route::prefix("/haberler")->controller(SystemNewsListPageController::class)->group(function () {
                    Route::get("/", "index")->name("haberler");
                    Route::get("/no09", "no09")->name("haberler_no09");
                    Route::get("/no90", "no90")->name("haberler_no90");
                    Route::get("/contentAZ", "contentAZ")->name("haberler_contentAZ");
                    Route::get("/contentZA", "contentZA")->name("haberler_contentZA");
                    Route::get("/authorAZ", "authorAZ")->name("haberler_authorAZ");
                    Route::get("/authorZA", "authorZA")->name("haberler_authorZA");
                    Route::get("/categoryAZ", "categoryAZ")->name("haberler_categoryAZ");
                    Route::get("/categoryZA", "categoryZA")->name("haberler_categoryZA");
                    Route::get("/resourcePlatformAZ", "resourcePlatformAZ")->name("haberler_resourcePlatformAZ");
                    Route::get("/resourcePlatformZA", "resourcePlatformZA")->name("haberler_resourcePlatformZA");
                    Route::get("/publishDateAZ", "publishDateAZ")->name("haberler_publishDateAZ");
                    Route::get("/publishDateZA", "publishDateZA")->name("haberler_publishDateZA");
                    Route::get("/writeTimeAZ", "writeTimeAZ")->name("haberler_writeTimeAZ");
                    Route::get("/writeTimeZA", "writeTimeZA")->name("haberler_writeTimeZA");
                });
            // HABERLERİM İSTATİSTİKLERİ "TODO"
                Route::prefix("/haberler/istatistikleri")->group(function () {
                    // HABER İSTATİSTİKLERİ "TODO"
                        Route::get("/", [NewsStatisticsPageController::class, "index"]);
                    // HABER İSTATİSTİKLERİ ZAMANA GÖRE "TODO"
                        Route::get("/zaman/{timeType}/{listType}", [NewsStatisticTimePageController::class, "index"]);
                    // HABER İSTATİSTİKLERİ DETAY "TODO"
                        Route::get("/detay/{newsNo}", [NewsStatisticDetailPageController::class, "index"]);
                });



            // SİSTEM PANELİ AYARLAR
                Route::prefix("/ayarlar")->controller(SystemSettingsPageController::class)->group(function () {
                    // YAZAR PANELİ AYARLAR TEMA
                        Route::get("/tema", "theme")->name("sistem_paneli_ayarlar_tema");
                    // YAZAR PANELİ AYARLAR SABİTLER
                        Route::get("/sabitler", "constants")->name("ayarlar_sabitler");
                });
        });
    // FORM
        /* AUTHOR PAGES */
            // HABER EKLE
                Route::post("/yazar-paneli/haber/ekle", [NewsCreatePageController::class, "form"]);
            // YAZAR PANELİ AYARLAR
                Route::post("/yazar-paneli/ayarlar/profilim", [AuthorSettingsPageController::class, "myAccountForm"]);
                Route::post("/yazar-paneli/ayarlar/tema", [AuthorSettingsPageController::class, "themeForm"]);
                Route::post("/yazar-paneli/ayarlar/tema/panel-tema", [AuthorSettingsPageController::class, "dashboardThemeChange"]);
                Route::post("/yazar-paneli/ayarlar/tema/website-tema", [AuthorSettingsPageController::class, "websiteThemeChange"]);
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
            // KULLANICI TİPİ SİL
                Route::post("/sistem-paneli/kullanici-tipi/sil/{no}", [UserTypeDeletePageController::class, "form"]);
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
            // KULLANICI SİL
                Route::post("/sistem-paneli/kullanici/sil/{no}", [UserDeletePageController::class, "form"]);
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
            // KAYNAK SİTE SİL
                Route::post("/sistem-paneli/kaynak-site/sil/{no}", [ResourcePlatformDeletePageController::class, "form"]);
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
            // KATEGORİ TİPİ SİL
                Route::post("/sistem-paneli/kategori-tipi/sil/{no}", [CategoryTypeDeletePageController::class, "form"]);
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
            // KATEGORİ SİL
                Route::post("/sistem-paneli/kategori/sil/{no}", [CategoryDeletePageController::class, "form"]);
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
            // KATEGORİ GRUBU SİL
                Route::post("/sistem-paneli/kategori-grubu/sil/{no}", [CategoryGroupDeletePageController::class, "form"]);
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
            // HABER SİL
                Route::post("/sistem-paneli/haber/sil/{no}", [NewsDeletePageController::class, "form"]);
            // SİSTEM PANELİ AYARLAR
                Route::post("/sistem-paneli/ayarlar/tema", [SystemSettingsPageController::class, "themeForm"]);
                Route::post("/sistem-paneli/ayarlar/sabitler", [SystemSettingsPageController::class, "constantsForm"]);
            // KULLANICI AYARI DÜZENLE
                Route::post("/sistem-paneli/kullanici-ayari/düzenle/{no}", [UserSettingEditPageController::class, "form"]);
            // KULLANICI AYARI SİL
                Route::post("/sistem-paneli/kullanici-ayari/sil/{no}", [UserSettingDeletePageController::class, "form"]);
            // KAYNAK LİNKİ SİL
                Route::post("/sistem-paneli/kaynak-linki/sil/{no}", [ResourceUrlDeletePageController::class, "form"]);
            // KAYNAK LİNKİ DÜZENLE
                Route::post("/sistem-paneli/kaynak-linki/düzenle/{no}", [ResourceUrlEditPageController::class, "form"]);
            // KATEGORİ GRUBU LİNK METNİ SİL
                Route::post("/sistem-paneli/kategori-grubu-link-metni/sil/{no}", [CategoryGroupUrlsDeletePageController::class, "form"]);
            // KATEGORİ GRUBU LİNK METNİ DÜZENLE
                Route::post("/sistem-paneli/kategori-grubu-link-metni/düzenle/{no}", [CategoryGroupUrlEditPageController::class, "form"]);

});