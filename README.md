![aradigin_cumle_landspace_poster](https://i.hizliresim.com/hcy8bom.png)

WebSite Link: [AradiginCumle.com](https://aradigincumle.com/)

# Notes

## To Do List

* FrontEnd
  * yazar girişi sayfasının tasarımı ve responsive stili düzenlenecek
  * tüm butonlara 3d stili tanımlanacak
  * html elementine "lang" özelliği eklenecek
  * renkler ve font kalınlık-boyut değerleri düzeltilecek
* BackEnd
  * form verisi olan yerlerdeki sayfa yenilemesindeki işlemi tekrarlama olayını çöz
  * listings modelinin api controllerları yapılacak
  * listings detail modelinin api controllerları yapılacak
  * readings modelinin api controllerları yapılacak
  * readings detail modelinin api controllerları yapılacak
  * visitors modelinin api controllerları yapılacak
  * writings modelinin api controllerları yapılacak
  * lists view componentlerindeki title selectslerdeki url href alanları kontrol edilicek
  * my news list page controllerlarındaki list type sistemi yapılacak viewindeki title selectsler çalışır hale getirilicek

## Models & Migrations

* Models
  * Categories
  * CategoryGroups
  * CategoryGroupUrls
  * CategoryTypes
  * ListingsDetail
  * Listings
  * News
  * ReadingsDetail
  * Readings
  * ResourcePlatforms
  * ResourceUrls
  * Users
  * UserTypes
  * Visitors
  * Writings
  * Constants
  * UserSettings

## Controllers*

* Pages
  * Visitor
    * HomePageController
    * NewsDetailPageController
    * SignInPageController
    * VisitorNewsListPageController
  * Author
    * AuthorDashboardPageController
    * AuthorSettingsPageController
    * MyNewsDeletePageController
    * MyNewsEditPageController
    * MyNewsListPageController
    * MyNewsStatisticDetailPageController
    * MyNewsStatisticsPageController
    * MyNewStatisticTimePageController
    * NewsCreatePageController
  * System
    * CategoriesListPageController
    * CategoryCreatePageController
    * CategoryDeletePageController
    * CategoryEditPageController
    * CategoryGroupCreatePageController
    * CategoryGroupDeletePageController
    * CategoryGroupEditPageController
    * CategoryGroupsListPageController
    * CategoryTypeCreatePageController
    * CategoryTypeDeletePageController
    * CategoryTypeEditPageController
    * CategoryTypesListPageController
    * NewsStatisticDetailPageController
    * NewsStatisticsPageController
    * NewsStatisticTimePageController
    * ResourcePlatformCreatePageController
    * ResourcePlatformDeletePageController
    * ResourcePlatformEditPageController
    * ResourcePlatformsListPageController
    * SystemDashboardPageController
    * SystemNewsListPageController
    * SystemSettingsPageController
    * UserCreatePageController
    * UserDeletePageController
    * UserEditPageController
    * UsersListPageController
    * UserTypeCreatePageController
    * UserTypeDeletePageController
    * UserTypeEditPageController
    * UserTypesListPageController
* Api
  * Categories
    * CategoryCreateController
    * CategoryDeleteController
    * CategoryEditController
    * CategoriesListController
  * CategoryGroups
    * CategoryGroupCreateController
    * CategoryGroupDeleteController
    * CategoryGroupEditController
    * CategoryGroupsListController
  * CategoryGroupUrls
    * CategoryGroupUrlsCreateController
    * CategoryGroupUrlsDeleteController
    * CategoryGroupUrlsEditController
    * CategoryGroupUrlsListController
  * CategoryTypes
    * CategoryTypesCreateController
    * CategoryTypesDeleteController
    * CategoryTypesEditController
    * CategoryTypesListController
  * Constants
    * ConstantsListController
    * ConstantsUpdateController
  * ListingsDetail
    * ListingsDetailCreateController
    * ListingsDetailDeleteController
    * ListingsDetailEditController
    * ListingsDetailListController
  * Listings
    * ListingsCreateController
    * ListingsDeleteController
    * ListingsEditController
    * ListingsListController
  * News
    * NewsCreateController
    * NewsDeleteController
    * NewsEditController
    * NewsListController
  * ReadingsDetail
    * ReadingsDetailCreateController
    * ReadingsDetailDeleteController
    * ReadingsDetailEditController
    * ReadingsDetailListController
  * Readings
    * ReadingsCreateController
    * ReadingsDeleteController
    * ReadingsEditController
    * ReadingsListController
  * ResourcePlatforms
    * ResourcePlatformsCreateController
    * ResourcePlatformsDeleteController
    * ResourcePlatformsEditController
    * ResourcePlatformsListController
  * ResourceUrls
    * ResourceUrlsCreateController
    * ResourceUrlsDeleteController
    * ResourceUrlsEditController
    * ResourceUrlsListController
  * Users
    * UsersCreateController
    * UsersDeleteController
    * UsersEditController
    * UsersListController
  * UserTypes
    * UserTypesCreateController
    * UserTypesDeleteController
    * UserTypesEditController
    * UserTypesListController
    * UserSignInController
  * UserSettings
    * UserSettingsCreateController
    * UserSettingsDeleteController
    * UserSettingsEditController
    * UserSettingsListController
  * Visitors
    * VisitorsCreateController
    * VisitorsDeleteController
    * VisitorsEditController
    * VisitorsListController
  * Writings
    * WritingsCreateController
    * WritingsDeleteController
    * WritingsEditController
    * WritingsListController

## Pages / Views

* Visitor
  * Home
  * News List
  * News Detail
  * Sign In
* Author
  * Dashboard
  * News Create
  * My News List
  * My News Edit
  * My News Delete
  * My News Statistics
  * My News Statistic Time
  * My News Statistic Detail
  * Settings
    * My Account
    * Theme
* System
  * Dashboard
  * User Type Create
  * User Type List
  * User Type Edit
  * User Type Delete
  * User Create
  * User List
  * User Edit
  * User Delete
  * Resource Platform Create
  * Resource Platform List
  * Resource Platform Edit
  * Resource Platform Delete
  * Category Type Create
  * Category Type List
  * Category Type Edit
  * Category Type Delete
  * Category Create
  * Category List
  * Category Edit
  * Category Delete
  * Category Group Create
  * Category Group List
  * Category Group Edit
  * Category Group Delete
  * News List
  * News Edit
  * News Delete
  * News Statistics
  * News Statistic Time
  * News Statistic Detail
  * Settings
    * Theme
    * Constants
  * User Settings List
  * User Setting Edit
  * User Setting Delete
  * Resource Urls List
  * Resource Url Edit
  * Resource Url Delete
  * Category Group Urls List
  * Category Group Url Edit
  * Category Group Url Delete

## MiddleWares

* All
  * isItAuthor
    * true => kullanıcı hesabı varsa ve kullanıcı yazar ise geçişe izin verilir
    * false => kullanıcı hesabı yoksa yada kullanıcı yazar değilse 404 hata sayfasına yönlendirilir
  * isItSystem
    * true => kullanıcı hesabı varsa ve kullanıcı sistem ise geçişe izin verilir
    * false => kullanıcı hesabı yoksa yada kullanıcı sistem değilse 404 hata sayfasına yönlendirilir
  * isItNotUser
    * true => kullanıcı hesabı yoksa girişe izin verilir
    * false => kullanıcı hesabı varsa kullanıcı hesabı tipine göre panel yönlendirilmesi yapılır
  * userDataCheck
    * true => kullanıcı hesabı varsa ve session üzerindeki kullanıcı bilgileri veritabanı ile uyuşuyorsa session güncellenir ve geçişe izin verilir
    * false => kullanıcı hesabı yoksa yada session üzerindeki kullanıcı bilgileri veritabanı ile uyuşmuyorsa userData session silinir 404 hata sayfasına yönlendirilir
  * isTheWebSiteSetup
    * true => constants üzerindeki değerlerin varlığı kontrol edilir tamamı varsa ve tamamı geçerli değerler ise geçişe izin verilir
    * false => constants üzerindeki değerlerin varlığı kontrol edilir herhangi biri yoksa veya herhangi biri geçerli değer değil ise uygun olan kurulum aşamasına yönlendirilir
  * isTheWebSiteNotSetup
    * true => constants üzerindeki değerlerin varlığı kontrol edilir herhangi biri yoksa veya herhangi biri geçerli değer değil ise geçişe izin verilir
    * false => constants üzerindeki değerlerin varlığı kontrol edilir tamamı varsa ve tamamı geçerli değerler ise anasayfa sayfasına yönlendirilir
  * isItVisitor
    * true => userData session varsa geçişe izin verilir
    * true => userData session değeri yoksa ve visitorData session varsa geçişe izin verilir
    * true => hem userData değeri hem de visitorData değeri yoksa yeni bir visitor kaydı oluşturulup visitorData session değeri oluşturulur ve geçişe izin verilir
    * false => hem userData değeri hem de visitorData değeri varsa 403 hata sayfasına yönlendirilir
  * visitorDataCheck
    * true => userData session varsa geçişe izin verilir
    * true => userData session değeri yoksa ve visitorData session değeri varsa visitorData içerisindeki değerler kontrol edilir değerler geçerli ise visitorData session değeri güncellenir ve geçişe izin verilir
    * false => visitorData session değeri yoksa bir önceki url adresine yönlendirilir
    * false => userData session değeri yoksa ve visitorData session değeri varsa visitorData içerisindeki değerler kontrol edilir değerler geçersiz ise visitorData session değeri silinir ve bi önceki url adresine yönlendirilir
  * userDataCheckIfIsUser
    * true => userData session değeri yoksa geçişe izin verilir
    * true => userData session değeri varsa ve userData içerisindeki değerler kontrol edilir değerler geçerli ise userData session değeri güncellenir
    * false => userData session değeri varsa ve userData içerisindeki değerler kontrol edilir değerler geçersiz ise userData session değeri silinir ve yazar girişi sayfasına yönlendirilir
