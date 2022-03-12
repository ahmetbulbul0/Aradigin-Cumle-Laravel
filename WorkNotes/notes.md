**Notes**

*To Do List*
* FrontEnd [
    - yazar girişi sayfasının tasarımı ve responsive stili düzenlenecek
    - tüm butonlara 3d stili tanımlanacak 
    - [FİNİSH]açık tema tasarımı yapılacak
    - [FİNİSH]açık tema koyu tema geçisi yapılacak
    - [FİNİSH]genel hata kodları için hata sayfa şablonu yapılacak
]
* BackEnd [
    - [FİNİSH]çıkış yapma sistemi yapılacak
    - [FİNİSH]login ve ziyaretçi sistemindeki sessionlar için geliştirme yapılacak
    - form verisi olan yerlerdeki sayfa yenilemesindeki işlemi tekrarlama olayını çöz
    - [FİNİSH]users settings modelinin api controllerları yapılacak
    - [FİNİSH]resource urls modelinin api controllerları yapılacak
    - [FİNİSH]category group urls modelinin api controllerları yapılacak
    - listings modelinin api controllerları yapılacak
    - listings detail modelinin api controllerları yapılacak
    - readings modelinin api controllerları yapılacak
    - readings detail modelinin api controllerları yapılacak
    - visitors modelinin api controllerları yapılacak
    - writings modelinin api controllerları yapılacak
    - modeller için test verisi ekleme işini kolaylaştırmak için factory dosyaları yazılacak
    - lists view componentlerindeki title selectslerdeki url href alanları kontrol edilicek
    - lists api coontrollerlarındaki sorgularda is_deleted false koşulu eklenecek
    - update ve edit api controllerlarındaki check fonksiyonu içerisindeki var olma kontrollerine is_deleted false sorgusu eklenecek
    - my news list page controllerlarındaki list type sistemi yapılacak viewindeki title selectsler çalışır hale getirilicek
    - [FİNİSH]pagination sistemi geliştirilicek ve uyarlanıcak
    - çıkış yap için middleware yapılacak
]

*Models & Migrations*
* Models [
    * [FİNİSH]Categories
    * [FİNİSH]CategoryGroups
    * [FİNİSH]CategoryGroupUrls
    * [FİNİSH]CategoryTypes
    * [FİNİSH]ListingsDetail
    * [FİNİSH]Listings
    * [FİNİSH]News
    * [FİNİSH]ReadingsDetail
    * [FİNİSH]Readings
    * [FİNİSH]ResourcePlatforms
    * [FİNİSH]ResourceUrls
    * [FİNİSH]Users
    * [FİNİSH]UserTypes
    * [FİNİSH]Visitors
    * [FİNİSH]Writings
    * [FİNİSH]Constants
    * [FİNİSH]UserSettings
]

*Controllers*
* Pages [
    * Visitor [
        * [FİNİSH]HomePageController
        * [FİNİSH]NewsDetailPageController
        * [FİNİSH]SignInPageController
        * [FİNİSH]VisitorNewsListPageController
    ]
    * Author [
        * [FİNİSH]AuthorDashboardPageController
        * [FİNİSH]AuthorSettingsPageController
        * MyNewsDeletePageController
        * MyNewsEditPageController
        * MyNewsListPageController 
        * MyNewsStatisticDetailPageController
        * MyNewsStatisticsPageController
        * MyNewStatisticTimePageController
        * [FİNİSH]NewsCreatePageController
    ]
    * System [
        * [FİNİSH]CategoriesListPageController
        * [FİNİSH]CategoryCreatePageController
        * [FİNİSH]CategoryDeletePageController
        * [FİNİSH]CategoryEditPageController
        * [FİNİSH]CategoryGroupCreatePageController
        * [FİNİSH]CategoryGroupDeletePageController
        * [FİNİSH]CategoryGroupEditPageController
        * [FİNİSH]CategoryGroupsListPageController
        * [FİNİSH]CategoryTypeCreatePageController
        * [FİNİSH]CategoryTypeDeletePageController
        * [FİNİSH]CategoryTypeEditPageController
        * [FİNİSH]CategoryTypesListPageController
        * NewsStatisticDetailPageController
        * NewsStatisticsPageController
        * NewsStatisticTimePageController
        * [FİNİSH]ResourcePlatformCreatePageController
        * [FİNİSH]ResourcePlatformDeletePageController
        * [FİNİSH]ResourcePlatformEditPageController
        * [FİNİSH]ResourcePlatformsListPageController
        * [FİNİSH]SystemDashboardPageController
        * [FİNİSH]SystemNewsListPageController
        * [FİNİSH]SystemSettingsPageController
        * [FİNİSH]UserCreatePageController
        * [FİNİSH]UserDeletePageController
        * [FİNİSH]UserEditPageController
        * [FİNİSH]UsersListPageController
        * [FİNİSH]UserTypeCreatePageController
        * [FİNİSH]UserTypeDeletePageController
        * [FİNİSH]UserTypeEditPageController
        * [FİNİSH]UserTypesListPageController
    ]
]
* Api [
    * Categories [
        * [FİNİSH]CategoryCreateController
        * [FİNİSH]CategoryDeleteController
        * [FİNİSH]CategoryEditController
        * [FİNİSH]CategoriesListController
    ]
    * CategoryGroups [
        * [FİNİSH]CategoryGroupCreateController
        * [FİNİSH]CategoryGroupDeleteController
        * [FİNİSH]CategoryGroupEditController
        * [FİNİSH]CategoryGroupsListController
    ]
    * CategoryGroupUrls [
        * [FİNİSH]CategoryGroupUrlsCreateController
        * [FİNİSH]CategoryGroupUrlsDeleteController
        * [FİNİSH]CategoryGroupUrlsEditController
        * [FİNİSH]CategoryGroupUrlsListController
    ]
    * CategoryTypes [
        * [FİNİSH]CategoryTypesCreateController
        * [FİNİSH]CategoryTypesDeleteController
        * [FİNİSH]CategoryTypesEditController
        * [FİNİSH]CategoryTypesListController
    ]
    * Constants [
        * [FİNİSH]ConstantsListController
        * [FİNİSH]ConstantsUpdateController
    ]
    * ListingsDetail [
        * ListingsDetailCreateController
        * ListingsDetailDeleteController
        * ListingsDetailEditController
        * ListingsDetailListController
    ]
    * Listings [
        * ListingsCreateController
        * ListingsDeleteController
        * ListingsEditController
        * ListingsListController
    ]
    * News [
        * [FİNİSH]NewsCreateController
        * [FİNİSH]NewsDeleteController
        * [FİNİSH]NewsEditController
        * [FİNİSH]NewsListController
    ]
    * ReadingsDetail [
        * ReadingsDetailCreateController
        * ReadingsDetailDeleteController
        * ReadingsDetailEditController
        * ReadingsDetailListController
    ]
    * Readings [
        * ReadingsCreateController
        * ReadingsDeleteController
        * ReadingsEditController
        * ReadingsListController
    ]
    * ResourcePlatforms [
        * [FİNİSH]ResourcePlatformsCreateController
        * [FİNİSH]ResourcePlatformsDeleteController
        * [FİNİSH]ResourcePlatformsEditController
        * [FİNİSH]ResourcePlatformsListController
    ]
    * ResourceUrls [
        * [FİNİSH]ResourceUrlsCreateController
        * [FİNİSH]ResourceUrlsDeleteController
        * [FİNİSH]ResourceUrlsEditController
        * [FİNİSH]ResourceUrlsListController
    ]
    * Users [
        * [FİNİSH]UsersCreateController
        * [FİNİSH]UsersDeleteController
        * [FİNİSH]UsersEditController
        * [FİNİSH]UsersListController
    ]
    * UserTypes [
        * [FİNİSH]UserTypesCreateController
        * [FİNİSH]UserTypesDeleteController
        * [FİNİSH]UserTypesEditController
        * [FİNİSH]UserTypesListController
        * [FİNİSH]UserSignInController
    ]
    * UserSettings [
        * [FİNİSH]UserSettingsCreateController
        * [FİNİSH]UserSettingsDeleteController
        * [FİNİSH]UserSettingsEditController
        * [FİNİSH]UserSettingsListController
    ]
    * Visitors [
        * VisitorsCreateController
        * VisitorsDeleteController
        * VisitorsEditController
        * VisitorsListController
    ]
    * Writings [
        * WritingsCreateController
        * WritingsDeleteController
        * WritingsEditController
        * WritingsListController
    ]
]

*Pages / Views*
* Visitor [
    - [FİNİSH]Home
    - [FİNİSH]News List
    - [FİNİSH]News Detail
    - [FİNİSH]Sign In
]
* Author [
    - [FİNİSH]Dashboard
    - [FİNİSH]News Create
    - [FİNİSH]My News List
    - My News Edit
    - My News Delete
    - My News Statistics
    - My News Statistic Time
    - My News Statistic Detail
    - [FİNİSH]Settings [
        - [FİNİSH]My Account
        - [FİNİSH]Theme
    ]
]
* System [
    - [FİNİSH]Dashboard
    - [FİNİSH]User Type Create
    - [FİNİSH]User Type List
    - [FİNİSH]User Type Edit
    - [FİNİSH]User Type Delete
    - [FİNİSH]User Create
    - [FİNİSH]User List
    - [FİNİSH]User Edit
    - [FİNİSH]User Delete
    - [FİNİSH]Resource Platform Create
    - [FİNİSH]Resource Platform List
    - [FİNİSH]Resource Platform Edit
    - [FİNİSH]Resource Platform Delete
    - [FİNİSH]Category Type Create
    - [FİNİSH]Category Type List
    - [FİNİSH]Category Type Edit
    - [FİNİSH]Category Type Delete
    - [FİNİSH]Category Create
    - [FİNİSH]Category List
    - [FİNİSH]Category Edit
    - [FİNİSH]Category Delete
    - [FİNİSH]Category Group Create
    - [FİNİSH]Category Group List
    - [FİNİSH]Category Group Edit
    - [FİNİSH]Category Group Delete
    - [FİNİSH]News List 
    - [FİNİSH]News Edit 
    - [FİNİSH]News Delete
    - News Statistics
    - News Statistic Time
    - News Statistic Detail
    - [FİNİSH]Settings [
        - [FİNİSH]Theme
        - [FİNİSH]Constants
    ]
    - [FİNİSH]User Settings List 
    - [FİNİSH]User Setting Edit 
    - [FİNİSH]User Setting Delete 
    - [FİNİSH]Resource Urls List 
    - [FİNİSH]Resource Url Edit 
    - [FİNİSH]Resource Url Delete 
    - [FİNİSH]Category Group Urls List 
    - [FİNİSH]Category Group Url Edit 
    - [FİNİSH]Category Group Url Delete 
]

*MiddleWares*
* All [
    - isItAuthor [
        true => kullanıcı hesabı varsa ve kullanıcı yazar ise geçişe izin verilir
        false => kullanıcı hesabı yoksa yada kullanıcı yazar değilse 404 hata sayfasına yönlendirilir
    ]
    - isItSystem [
        true => kullanıcı hesabı varsa ve kullanıcı sistem ise geçişe izin verilir
        false => kullanıcı hesabı yoksa yada kullanıcı sistem değilse 404 hata sayfasına yönlendirilir
    ]
    - isItNotUser [
        true => kullanıcı hesabı yoksa girişe izin verilir
        false => kullanıcı hesabı varsa kullanıcı hesabı tipine göre panel yönlendirilmesi yapılır
    ]
    - userDataCheck [
        - true => kullanıcı hesabı varsa ve session üzerindeki kullanıcı bilgileri veritabanı ile uyuşuyorsa session güncellenir ve geçişe izin verilir
        - false => kullanıcı hesabı yoksa yada session üzerindeki kullanıcı bilgileri veritabanı ile uyuşmuyorsa userData session silinir 404 hata sayfasına yönlendirilir
    ]
    - isTheWebSiteSetup [
        - true => constants üzerindeki değerlerin varlığı kontrol edilir tamamı varsa ve tamamı geçerli değerler ise geçişe izin verilir
        - false => constants üzerindeki değerlerin varlığı kontrol edilir herhangi biri yoksa veya herhangi biri geçerli değer değil ise uygun olan kurulum aşamasına yönlendirilir
    ]
    - isTheWebSiteNotSetup [
        - true => constants üzerindeki değerlerin varlığı kontrol edilir herhangi biri yoksa veya herhangi biri geçerli değer değil ise geçişe izin verilir
        - false => constants üzerindeki değerlerin varlığı kontrol edilir tamamı varsa ve tamamı geçerli değerler ise anasayfa sayfasına yönlendirilir
    ]
    - isItVisitor [
        - true => userData session varsa geçişe izin verilir
        - true => userData session değeri yoksa ve visitorData session varsa geçişe izin verilir
        - true => hem userData değeri hem de visitorData değeri yoksa yeni bir visitor kaydı oluşturulup visitorData session değeri oluşturulur ve geçişe izin verilir
        - false => hem userData değeri hem de visitorData değeri varsa 403 hata sayfasına yönlendirilir
    ]
    - visitorDataCheck [
        - true => userData session varsa geçişe izin verilir
        - true => userData session değeri yoksa ve visitorData session değeri varsa visitorData içerisindeki değerler kontrol edilir değerler geçerli ise visitorData session değeri güncellenir ve geçişe izin verilir
        - false => visitorData session değeri yoksa bir önceki url adresine yönlendirilir
        - false => userData session değeri yoksa ve visitorData session değeri varsa visitorData içerisindeki değerler kontrol edilir değerler geçersiz ise visitorData session değeri silinir ve bi önceki url adresine yönlendirilir
    ]
    - userDataCheckIfIsUser [
        - true => userData session değeri yoksa geçişe izin verilir
        - true => userData session değeri varsa ve userData içerisindeki değerler kontrol edilir değerler geçerli ise userData session değeri güncellenir
        - false => userData session değeri varsa ve userData içerisindeki değerler kontrol edilir değerler geçersiz ise userData session değeri silinir ve yazar girişi sayfasına yönlendirilir
    ]
]



* webbsite kurulum aşamasında başlangıçta aşama 2 ye atıyor
* kurulum aşamasında responsive tasarımları düzelt
* asama 4 sonrası direk anasayfa attı
* açılır menü harici yere tıklanıldığında kapansın
* 