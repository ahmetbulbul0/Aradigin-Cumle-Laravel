**Notes**

*Need Models&Migrations*
* UnCategorized [
    * Categories [TAMAMLANDI]
    * CategoryGroups [TAMAMLANDI]
    * CategoryGroupUrls [TAMAMLANDI]
    * CategoryTypes [TAMAMLANDI]
    * ListingsDetail [TAMAMLANDI]
    * Listings [TAMAMLANDI]
    * News [TAMAMLANDI]
    * ReadingsDetail [TAMAMLANDI]
    * Readings [TAMAMLANDI]
    * ResourcePlatforms [TAMAMLANDI]
    * ResourceUrls [TAMAMLANDI]
    * Users [TAMAMLANDI]
    * UserTypes [TAMAMLANDI]
    * Visitors [TAMAMLANDI]
    * Writings [TAMAMLANDI]
]

*Need Controllers*
* public [
    - Home
    - NewsList
    - NewsDetail
    - SignIn
]
* private [
    * Dashboard
    * NewsCreate
    * Settings
    * NewsList
    * NewsCreate
    * NewsStatisticDetail
    * NewsStatisticTime
    * NewsStatistics

    * ResourceCreate
    * CategoryCreate
    * CategoryGroupCreate
    * CategoryTypeCreate
    * UserCreate
    * UserTypeCreate
]

*Need Views*
* public [
    * pages [
        * home
        * news_list
        * news_detail
        * sign_in
    ]
    * components [

    ]
]
* private [
    * pages [
        * dashboard
        * news_create
        * my_news
        * settings [
            * my_account
            * theme
        ]
        * my_news_statistics
        * my_news_statistic_detail
        * my_news_statistic_time
        * resource_platforms_create
        * category_types_create
        * category_groups_create
        * user_types_create
        * users_create
    ]
    * components [
        
    ]
]

*Pages As For User Types*
* Visitor [
    - Home
    - News List
    - News Detail
    - Sign In
]
* Author [
    - Dashboard
    - News Create
    - My News List
    - My News Edit
    - My News Delete
    - My News Statistics
    - My News Statistic Time
    - My News Statistic Detail
    - Settings [
        - My Account
        - Theme
    ]
]
* System [
    - Dashboard
    - User Type Create
    - User Type List
    - User Type Edit
    - User Type Delete
    - User Create
    - User List
    - User Edit
    - User Delete
    - Resource Platform Create
    - Resource Platform List
    - Resource Platform Edit
    - Resource Platform Delete
    - Category Type Create
    - Category Type List
    - Category Type Edit
    - Category Type Delete
    - Category Create
    - Category List
    - Category Edit
    - Category Delete
    - Category Group Create
    - Category Group List
    - Category Group Edit
    - Category Group Delete
    - News List 
    - News Statistics
    - News Statistic Time
    - News Statistic Detail
    - Settings [
        - Theme
        - Constants
    ]
]