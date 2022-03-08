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
use App\Http\Controllers\Pages\Visitor\VisitorChangeWebSiteThemePageController;

Route::get("/kurulum/{stage?}", [WebSiteSetupPageController::class, "index"])->name("kurulum")->middleware(["isTheWebSiteNotSetup"]);

Route::prefix("/")->middleware(['isTheWebSiteSetup'])->group(function () {
    /* VİSİTOR PAGES */
        Route::middleware(["isItVisitor", "visitorDataCheck"])->group(function () {
            // ANASAYFA
            Route::get("/", [HomePageController::class, "index"])->name("anasayfa");
            // HABERLER LİSTESİ
                Route::get("/haberler/{listType}/{page?}", [VisitorNewsListPageController::class, "index"])->name("haberler_listesi");
                Route::get("/haberler/yazar/{authorUserName}/{listType}/{page?}", [VisitorNewsListPageController::class, "author"])->name("haberler_listesi_yazar");
                Route::get("/haberler/kaynak/{resourcePlatformLinkUrl}/{listType}/{page?}", [VisitorNewsListPageController::class, "resourcePlatform"])->name("haberler_listesi_kaynak");
                Route::get("/haberler/kategori/{categoryGroupLinkUrl}/{listType}/{page?}", [VisitorNewsListPageController::class, "category"])->name("haberler_listesi_kategori");
            // HABER DETAY
                Route::get("/haber/{newsLinkUrl}", [NewsDetailPageController::class, "index"])->name("haber_detay");
            // YAZAR GİRİŞİ
                Route::get("/yazar-girisi", [SignInPageController::class, "index"])->name("yazar_girisi")->middleware("isItNotUser");
        });
        // ÇIKIŞ YAP
            Route::get("/cikis-yap", [SignOutPageController::class, "index"])->name("cikis_yap");
    /* AUTHOR PAGES */
        Route::prefix("/yazar-paneli")->middleware(['isItAuthor', 'userDataCheck'])->group(function () {
            // YAZAR PANELİ ANA SAYFA
                Route::get("/", [AuthorDashboardPageController::class, "index"])->name("yazar_paneli_anapanel");
            // HABER EKLE
                Route::get("/haber/ekle", [NewsCreatePageController::class, "index"])->name("haber_ekle");
            // HABERLERİM    
                Route::prefix("/haberlerim")->group(function () {
                    // HABERLERİM LİSTESİ
                        Route::get("/", [MyNewsListPageController::class, "index"])->name("haberlerim");
                    // HABERLERİMDEN HABER DÜZENLE ?##?
                        Route::get("/düzenle/{no}", [MyNewsEditPageController::class, "index"])->name("haberlerim_düzenle");
                    // HABERLERİMDEN HABER SİL ?##?
                        Route::get("/sil/{no}", [MyNewsDeletePageController::class, "index"])->name("haberlerim_sil");
                });
            // HABERLERİM İSTATİSTİKLERİ ?##?
                Route::prefix("/haberlerim/istatistikleri")->group(function () {
                    Route::get("/", [MyNewsStatisticsPageController::class, "index"]);
                    Route::get("/zaman/{timeType}/{listType}", [MyNewsStatisticTimePageController::class, "index"]);
                    Route::get("/detay/{newsNo}", [MyNewsStatisticDetailPageController::class, "index"]);
                });
            // YAZAR PANELİ AYARLAR
                Route::controller(AuthorSettingsPageController::class)->group(function () {
                    // YAZAR PANELİ AYARLAR PROFİLİM
                    Route::get("/ayarlar/profilim", "myAccount")->name("yazar_paneli_ayarlar_profilim");
                    // YAZAR PANELİ AYARLAR TEMA
                    Route::get("/ayarlar/tema", "theme")->name("yazar_paneli_ayarlar_tema");
                });
        });
    /* SYSTEM PAGES */
        // SİSTEM PANELİ ANA SAYFA
            Route::get("/sistem-paneli", [SystemDashboardPageController::class, "index"])->name("sistem_paneli_anapanel")->middleware("isItSystem", "userDataCheck");
        // KULLANICI TİPİ EKLE
            Route::get("/sistem-paneli/kullanici-tipi/ekle", [UserTypeCreatePageController::class, "index"])->name("kullanici_tipi_ekle")->middleware("isItSystem", "userDataCheck");
        // KULLANICI TİPLERİ LİSTESİ
            Route::get("/sistem-paneli/kullanici-tipleri/", [UserTypesListPageController::class, "index"])->name("kullanici_tipleri")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanici-tipleri/no09", [UserTypesListPageController::class, "no09"])->name("kullanici_tipleri_no09")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanici-tipleri/no90", [UserTypesListPageController::class, "no90"])->name("kullanici_tipleri_no90")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanici-tipleri/nameAZ", [UserTypesListPageController::class, "nameAZ"])->name("kullanici_tipleri_nameAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanici-tipleri/nameZA", [UserTypesListPageController::class, "nameZA"])->name("kullanici_tipleri_nameZA")->middleware("isItSystem", "userDataCheck");
        // KULLANICI TİPİ DÜZENLE
            Route::get("/sistem-paneli/kullanici-tipi/düzenle/{no}", [UserTypeEditPageController::class, "index"])->name("kullanici_tipi_düzenle")->middleware("isItSystem", "userDataCheck");
        // KULLANICI TİPİ SİL
            Route::get("/sistem-paneli/kullanici-tipi/sil/{no}", [UserTypeDeletePageController::class, "index"])->name("kullanici_tipi_sil")->middleware("isItSystem", "userDataCheck");
        // KULLANICI EKLE
            Route::get("/sistem-paneli/kullanici/ekle", [UserCreatePageController::class, "index"])->name("kullanici_ekle")->middleware("isItSystem", "userDataCheck");
        // KULLANICILAR LİSTESİ
            Route::get("/sistem-paneli/kullanicilar/", [UsersListPageController::class, "index"])->name("kullanicilar")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanicilar/no09", [UsersListPageController::class, "no09"])->name("kullanicilar_no09")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanicilar/no90", [UsersListPageController::class, "no90"])->name("kullanicilar_no90")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanicilar/fullNameAZ", [UsersListPageController::class, "fullNameAZ"])->name("kullanicilar_fullNameAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanicilar/fullNameZA", [UsersListPageController::class, "fullNameZA"])->name("kullanicilar_fullNameZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanicilar/usernameAZ", [UsersListPageController::class, "usernameAZ"])->name("kullanicilar_usernameAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanicilar/usernameZA", [UsersListPageController::class, "usernameZA"])->name("kullanicilar_usernameZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanicilar/typeAZ", [UsersListPageController::class, "typeAZ"])->name("kullanicilar_typeAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kullanicilar/typeZA", [UsersListPageController::class, "typeZA"])->name("kullanicilar_typeZA")->middleware("isItSystem", "userDataCheck");
        // KULLANICI DÜZENLE
            Route::get("/sistem-paneli/kullanici/düzenle/{no}", [UserEditPageController::class, "index"])->name("kullanici_düzenle")->middleware("isItSystem", "userDataCheck");
        // KULLANICI SİL
            Route::get("/sistem-paneli/kullanici/sil/{no}", [UserDeletePageController::class, "index"])->name("kullanici_sil")->middleware("isItSystem", "userDataCheck");
        // KAYNAK SİTE EKLE
            Route::get("/sistem-paneli/kaynak-site/ekle", [ResourcePlatformCreatePageController::class, "index"])->name("kaynak_site_ekle")->middleware("isItSystem", "userDataCheck");
        // KAYNAK SİTELER LİSTESİ
            Route::get("/sistem-paneli/kaynak-siteler/", [ResourcePlatformsListPageController::class, "index"])->name("kaynak_siteler")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kaynak-siteler/no09", [ResourcePlatformsListPageController::class, "no09"])->name("kaynak_siteler_no09")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kaynak-siteler/no90", [ResourcePlatformsListPageController::class, "no90"])->name("kaynak_siteler_no90")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kaynak-siteler/nameAZ", [ResourcePlatformsListPageController::class, "nameAZ"])->name("kaynak_siteler_nameAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kaynak-siteler/nameZA", [ResourcePlatformsListPageController::class, "nameZA"])->name("kaynak_siteler_nameZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kaynak-siteler/websiteLinkAZ", [ResourcePlatformsListPageController::class, "websiteLinkAZ"])->name("kaynak_siteler_websiteLinkAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kaynak-siteler/websiteLinkZA", [ResourcePlatformsListPageController::class, "websiteLinkZA"])->name("kaynak_siteler_websiteLinkZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kaynak-siteler/linkUrlAZ", [ResourcePlatformsListPageController::class, "linkUrlAZ"])->name("kaynak_siteler_linkUrlAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kaynak-siteler/linkUrlZA", [ResourcePlatformsListPageController::class, "linkUrlZA"])->name("kaynak_siteler_linkUrlZA")->middleware("isItSystem", "userDataCheck");
        // KAYNAK SİTE DÜZENLE
            Route::get("/sistem-paneli/kaynak-site/düzenle/{no}", [ResourcePlatformEditPageController::class, "index"])->name("kaynak_site_düzenle")->middleware("isItSystem", "userDataCheck");
        // KAYNAK SİTE SİL
            Route::get("/sistem-paneli/kaynak-site/sil/{no}", [ResourcePlatformDeletePageController::class, "index"])->name("kaynak_site_sil")->middleware("isItSystem", "userDataCheck");
        // KAYNAK LİNKLERİ LİSTESİ
            Route::get("/sistem-paneli/kaynak-linkleri", [ResourceUrlsListPageController::class, "index"])->name("kaynak_linkler")->middleware("isItSystem", "userDataCheck");
        // KAYNAK LİNKİ SİL
            Route::get("/sistem-paneli/kaynak-linki/sil/{no}", [ResourceUrlDeletePageController::class, "index"])->name("kaynak_linki_sil")->middleware("isItSystem", "userDataCheck");
        // KAYNAK LİNKİ DÜZENLE
            Route::get("/sistem-paneli/kaynak-linki/düzenle/{no}", [ResourceUrlEditPageController::class, "index"])->name("kaynak_linki_düzenle")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ TİPİ EKLE
            Route::get("/sistem-paneli/kategori-tipi/ekle", [CategoryTypeCreatePageController::class, "index"])->name("kategori_tipi_ekle")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ TİPLERİ LİSTESİ
            Route::get("/sistem-paneli/kategori-tipleri", [CategoryTypesListPageController::class, "index"])->name("kategori_tipleri")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-tipleri/no09", [CategoryTypesListPageController::class, "no09"])->name("kategori_tipleri_no09")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-tipleri/no90", [CategoryTypesListPageController::class, "no90"])->name("kategori_tipleri_no90")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-tipleri/nameAZ", [CategoryTypesListPageController::class, "nameAZ"])->name("kategori_tipleri_nameAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-tipleri/nameZA", [CategoryTypesListPageController::class, "nameZA"])->name("kategori_tipleri_nameZA")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ TİPİ DÜZENLE
            Route::get("/sistem-paneli/kategori-tipi/düzenle/{no}", [CategoryTypeEditPageController::class, "index"])->name("kategori_tipi_düzenle")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ TİPİ SİL
            Route::get("/sistem-paneli/kategori-tipi/sil/{no}", [CategoryTypeDeletePageController::class, "index"])->name("kategori_tipi_sil")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ EKLE
            Route::get("/sistem-paneli/kategori/ekle", [CategoryCreatePageController::class, "index"])->name("kategori_ekle")->middleware("isItSystem", "userDataCheck");
        // KATEGORİLER LİSTESİ
            Route::get("/sistem-paneli/kategoriler", [CategoriesListPageController::class, "index"])->name("kategoriler")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/no09", [CategoriesListPageController::class, "no09"])->name("kategoriler_no09")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/no90", [CategoriesListPageController::class, "no90"])->name("kategoriler_no90")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/nameAZ", [CategoriesListPageController::class, "nameAZ"])->name("kategoriler_nameAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/nameZA", [CategoriesListPageController::class, "nameZA"])->name("kategoriler_nameZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/typeAZ", [CategoriesListPageController::class, "typeAZ"])->name("kategoriler_typeAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/typeZA", [CategoriesListPageController::class, "typeZA"])->name("kategoriler_typeZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/mainCategoryAZ", [CategoriesListPageController::class, "mainCategoryAZ"])->name("kategoriler_mainCategoryAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/mainCategoryZA", [CategoriesListPageController::class, "mainCategoryZA"])->name("kategoriler_mainCategoryZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/linkUrlAZ", [CategoriesListPageController::class, "linkUrlAZ"])->name("kategoriler_linkUrlAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategoriler/linkUrlZA", [CategoriesListPageController::class, "linkUrlZA"])->name("kategoriler_linkUrlZA")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ DÜZENLE
            Route::get("/sistem-paneli/kategori/düzenle/{no}", [CategoryEditPageController::class, "index"])->name("kategori_düzenle")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ SİL
            Route::get("/sistem-paneli/kategori/sil/{no}", [CategoryDeletePageController::class, "index"])->name("kategori_sil")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ GRUBU EKLE
            Route::get("/sistem-paneli/kategori-grubu/ekle", [CategoryGroupCreatePageController::class, "index"])->name("kategori_grubu_ekle")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ GRUPLARI LİSTESİ
            Route::get("/sistem-paneli/kategori-gruplari/", [CategoryGroupsListPageController::class, "index"])->name("kategori_gruplari")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/no09", [CategoryGroupsListPageController::class, "no09"])->name("kategori_gruplari_no09")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/no90", [CategoryGroupsListPageController::class, "no90"])->name("kategori_gruplari_no90")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/mainAZ", [CategoryGroupsListPageController::class, "mainAZ"])->name("kategori_gruplari_mainAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/mainZA", [CategoryGroupsListPageController::class, "mainZA"])->name("kategori_gruplari_mainZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub1AZ", [CategoryGroupsListPageController::class, "sub1AZ"])->name("kategori_gruplari_sub1AZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub1ZA", [CategoryGroupsListPageController::class, "sub1ZA"])->name("kategori_gruplari_sub1ZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub2AZ", [CategoryGroupsListPageController::class, "sub2AZ"])->name("kategori_gruplari_sub2AZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub2ZA", [CategoryGroupsListPageController::class, "sub2ZA"])->name("kategori_gruplari_sub2ZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub3AZ", [CategoryGroupsListPageController::class, "sub3AZ"])->name("kategori_gruplari_sub3AZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub3ZA", [CategoryGroupsListPageController::class, "sub3ZA"])->name("kategori_gruplari_sub3ZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub4AZ", [CategoryGroupsListPageController::class, "sub4AZ"])->name("kategori_gruplari_sub4AZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub4ZA", [CategoryGroupsListPageController::class, "sub4ZA"])->name("kategori_gruplari_sub4ZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub5AZ", [CategoryGroupsListPageController::class, "sub5AZ"])->name("kategori_gruplari_sub5AZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/sub5ZA", [CategoryGroupsListPageController::class, "sub5ZA"])->name("kategori_gruplari_sub5ZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/linkUrlAZ", [CategoryGroupsListPageController::class, "linkUrlAZ"])->name("kategori_gruplari_linkUrlAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/kategori-gruplari/linkUrlZA", [CategoryGroupsListPageController::class, "linkUrlZA"])->name("kategori_gruplari_linkUrlZA")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ GRUBU DÜZENLE
            Route::get("/sistem-paneli/kategori-grubu/düzenle/{no}", [CategoryGroupEditPageController::class, "index"])->name("kategori_grubu_düzenle")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ GRUBU SİL
            Route::get("/sistem-paneli/kategori-grubu/sil/{no}", [CategoryGroupDeletePageController::class, "index"])->name("kategori_grubu_sil")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ GRUBU LİNK METİNLERİ LİSTESİ
            Route::get("/sistem-paneli/kategori-grubu-link-metinleri", [CategoryGroupUrlsListPageController::class, "index"])->name("haber_kategori_grubu_linkleri")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ GRUBU LİNK METNİ SİL
            Route::get("/sistem-paneli/kategori-grubu-link-metni/sil/{no}", [CategoryGroupUrlsDeletePageController::class, "index"])->name("haber_kategori_grubu_linki_sil")->middleware("isItSystem", "userDataCheck");
        // KATEGORİ GRUBU LİNK METNİ DÜZENLE
            Route::get("/sistem-paneli/kategori-grubu-link-metni/düzenle/{no}", [CategoryGroupUrlEditPageController::class, "index"])->name("haber_kategori_grubu_linki_düzenle")->middleware("isItSystem", "userDataCheck");
        // HABERLER LİSTESİ
            Route::get("/sistem-paneli/haberler", [SystemNewsListPageController::class, "index"])->name("haberler")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/no09", [SystemNewsListPageController::class, "no09"])->name("haberler_no09")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/no90", [SystemNewsListPageController::class, "no90"])->name("haberler_no90")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/contentAZ", [SystemNewsListPageController::class, "contentAZ"])->name("haberler_contentAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/contentZA", [SystemNewsListPageController::class, "contentZA"])->name("haberler_contentZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/authorAZ", [SystemNewsListPageController::class, "authorAZ"])->name("haberler_authorAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/authorZA", [SystemNewsListPageController::class, "authorZA"])->name("haberler_authorZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/categoryAZ", [SystemNewsListPageController::class, "categoryAZ"])->name("haberler_categoryAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/categoryZA", [SystemNewsListPageController::class, "categoryZA"])->name("haberler_categoryZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/resourcePlatformAZ", [SystemNewsListPageController::class, "resourcePlatformAZ"])->name("haberler_resourcePlatformAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/resourcePlatformZA", [SystemNewsListPageController::class, "resourcePlatformZA"])->name("haberler_resourcePlatformZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/publishDateAZ", [SystemNewsListPageController::class, "publishDateAZ"])->name("haberler_publishDateAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/publishDateZA", [SystemNewsListPageController::class, "publishDateZA"])->name("haberler_publishDateZA")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/writeTimeAZ", [SystemNewsListPageController::class, "writeTimeAZ"])->name("haberler_writeTimeAZ")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/writeTimeZA", [SystemNewsListPageController::class, "writeTimeZA"])->name("haberler_writeTimeZA")->middleware("isItSystem", "userDataCheck");
        // HABER DÜZENLE
            Route::get("/sistem-paneli/haber/düzenle/{no}", [NewsEditPageController::class, "index"])->name("haber_düzenle")->middleware("isItSystem", "userDataCheck");
        // HABER SİL
            Route::get("/sistem-paneli/haber/sil/{no}", [NewsDeletePageController::class, "index"])->name("haber_sil")->middleware("isItSystem", "userDataCheck");
        // HABER İSTATİSTİKLERİ
            Route::get("/sistem-paneli/haberler/istatistikleri/{listType}", [NewsStatisticsPageController::class, "index"])->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/istatistikleri/zaman/{timeType}/{listType}", [NewsStatisticTimePageController::class, "index"])->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/haberler/istatistikleri/detay/{newsNo}", [NewsStatisticDetailPageController::class, "index"])->middleware("isItSystem", "userDataCheck");
        // SİSTEM PANELİ AYARLAR
            Route::get("/sistem-paneli/ayarlar/tema", [SystemSettingsPageController::class, "theme"])->name("sistem_paneli_ayarlar_tema")->middleware("isItSystem", "userDataCheck");
            Route::get("/sistem-paneli/ayarlar/sabitler", [SystemSettingsPageController::class, "constants"])->name("ayarlar_sabitler")->middleware("isItSystem", "userDataCheck");
    /* FORM ROUTES */
        /* VİSİTOR PAGES */
            // YAZAR GİRİŞİ
                Route::post("/yazar-girisi", [SignInPageController::class, "form"]);
            // ZİYARETÇİ TEMA DEĞİŞTİR
                Route::post("/ziyaretci-tema-degistir", [VisitorChangeWebSiteThemePageController::class, "form"])->name("visitor_website_theme_change");
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