**Notes**

*To Do List*
* FrontEnd [
    - yazar girişi sayfasının tasarımı ve responsive stili düzenlenecek
    - tüm butonlara 3d stili tanımlanacak 
]
* BackEnd [
    - çıkış yapma sistemi yapılacak
    - login ve ziyaretçi sistemindeki sessionlar için geliştirme yapılacak
    - form verisi olan yerlerdeki sayfa yenilemesindeki işlemi tekrarlama olayını çöz
    - users settings modelinin api controllerları yapılacak
    - resource urls modelinin api controllerları yapılacak
    - category group urls modelinin api controllerları yapılacak
    - listings modelinin api controllerları yapılacak
    - listings detail modelinin api controllerları yapılacak
    - readings modelinin api controllerları yapılacak
    - readings detail modelinin api controllerları yapılacak
    - visitors modelinin api controllerları yapılacak
    - writings modelinin api controllerları yapılacak
    - modeller için test verisi ekleme işini kolaylaştırmak için factory dosyaları yazılacak
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
    * [FİNİSH]UsersSettings
]

*Controllers*
* Pages [
    * Visitor [
        * HomePageController
        * NewsDetailPageController
        * [FİNİSH]SignInPageController
        * VisitorNewsListPageController
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
        * CategoryDeletePageController
        * [FİNİSH]CategoryEditPageController
        * [FİNİSH]CategoryGroupCreatePageController
        * CategoryGroupDeletePageController
        * [FİNİSH]CategoryGroupEditPageController
        * [FİNİSH]CategoryGroupsListPageController
        * [FİNİSH]CategoryTypeCreatePageController
        * CategoryTypeDeletePageController
        * [FİNİSH]CategoryTypeEditPageController
        * [FİNİSH]CategoryTypesListPageController
        * NewsStatisticDetailPageController
        * NewsStatisticsPageController
        * NewsStatisticTimePageController
        * [FİNİSH]ResourcePlatformCreatePageController
        * ResourcePlatformDeletePageController
        * [FİNİSH]ResourcePlatformEditPageController
        * [FİNİSH]ResourcePlatformsListPageController
        * [FİNİSH]SystemDashboardPageController
        * [FİNİSH]SystemNewsListPageController
        * [FİNİSH]SystemSettingsPageController
        * [FİNİSH]UserCreatePageController
        * UserDeletePageController
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
        * CategoryDeleteController
        * [FİNİSH]CategoryEditController
        * [FİNİSH]CategoriesListController
    ]
    * CategoryGroups [
        * [FİNİSH]CategoryGroupCreateController
        * CategoryGroupDeleteController
        * [FİNİSH]CategoryGroupEditController
        * [FİNİSH]CategoryGroupsListController
    ]
    * CategoryGroupUrls [
        * CategoryGroupUrlsCreateController
        * CategoryGroupUrlsDeleteController
        * CategoryGroupUrlsEditController
        * CategoryGroupUrlsListController
    ]
    * CategoryTypes [
        * [FİNİSH]CategoryTypesCreateController
        * CategoryTypesDeleteController
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
        * NewsDeleteController
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
        * ResourcePlatformsDeleteController
        * [FİNİSH]ResourcePlatformsEditController
        * [FİNİSH]ResourcePlatformsListController
    ]
    * ResourceUrls [
        * ResourceUrlsCreateController
        * ResourceUrlsDeleteController
        * ResourceUrlsEditController
        * ResourceUrlsListController
    ]
    * Users [
        * [FİNİSH]UsersCreateController
        * UsersDeleteController
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
        * [CREATİNG]UserSettingsCreateController
        * UserSettingsDeleteController
        * UserSettingsEditController
        * UserSettingsListController
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
    - Home
    - News List
    - News Detail
    - [FİNİSH]Sign In
]
* Author [
    - [FİNİSH]Dashboard
    - [FİNİSH]News Create
    - My News List
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
    - User Delete
    - [FİNİSH]Resource Platform Create
    - [FİNİSH]Resource Platform List
    - [FİNİSH]Resource Platform Edit
    - Resource Platform Delete
    - [FİNİSH]Category Type Create
    - [FİNİSH]Category Type List
    - [FİNİSH]Category Type Edit
    - Category Type Delete
    - [FİNİSH]Category Create
    - [FİNİSH]Category List
    - [FİNİSH]Category Edit
    - Category Delete
    - [FİNİSH]Category Group Create
    - [FİNİSH]Category Group List
    - [FİNİSH]Category Group Edit
    - Category Group Delete
    - [FİNİSH]News List 
    - [FİNİSH]News Edit 
    - News Delete
    - News Statistics
    - News Statistic Time
    - News Statistic Detail
    - [FİNİSH]Settings [
        - [FİNİSH]Theme
        - [FİNİSH]Constants
    ]
]