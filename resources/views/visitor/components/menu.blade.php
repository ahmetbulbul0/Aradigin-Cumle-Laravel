<div class="outMenu">
    <div class="inMenu">
        <div class="bar">
            <span class="textBox">
                <a href="{{ route('anasayfa') }}" class="strong">
                    <i class="far fa-newspaper"></i>
                    AradığınCümle
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a
                    href="{{ route('haberler_listesi_kategori', [$data['menu']['category1']['link_url']['link_url'],'son-yayinlananlar']) }}">
                    {{ Str::title($data['menu']['category1']['main']['name']) }}
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a
                    href="{{ route('haberler_listesi_kategori', [$data['menu']['category2']['link_url']['link_url'],'son-yayinlananlar']) }}">
                    {{ Str::title($data['menu']['category2']['main']['name']) }}
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a
                    href="{{ route('haberler_listesi_kategori', [$data['menu']['category3']['link_url']['link_url'],'son-yayinlananlar']) }}">
                    {{ Str::title($data['menu']['category3']['main']['name']) }}
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a
                    href="{{ route('haberler_listesi_kategori', [$data['menu']['category4']['link_url']['link_url'],'son-yayinlananlar']) }}">
                    {{ Str::title($data['menu']['category4']['main']['name']) }}
                </a>
            </span>
        </div>

        {{-- @if (Session::get('visitorData'))
            Hoşgeldin, Merhaba Ziyaretçi
        @endif
        @if (Session::get('userData'))
            @switch(Session::get("userData.type.name"))
                @case('author')
                    Hoşgeldin, Merhaba[{{ Session::get('userData.full_name') }}]
                @break

                @case('system')
                    Hoşgeldin, Merhaba [{{ Session::get('userData.full_name') }}]
                @break

                @default
            @endswitch
        @endif --}}

        <div class="bar">
            <section class="brace"></section>
            <span class="iconBox">
                <i class="fas fa-bars menuBtn"></i>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <i class="fas fa-adjust themeBtn"></i>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <i class="fas fa-search searchBtn"></i>
            </span>
            @if (Session::get('userData'))
                <section class="brace"></section>
                <span class="iconBox">
                    @if (Session::get('userData.type.no') == App\Http\Controllers\Api\Constants\ConstantsListController::getUserTypeAuthorOnlyNotDeleted())
                        <a href="{{ route('yazar_paneli_anapanel') }}" target="blank">
                            <i class="fas fa-book-reader"></i>
                        </a>
                    @endif

                    @if (Session::get('userData.type.no') == App\Http\Controllers\Api\Constants\ConstantsListController::getUserTypeSystemOnlyNotDeleted())
                        <a href="{{ route('sistem_paneli_anapanel') }}" target="blank">
                            <i class="fas fa-tools"></i>
                        </a>
                    @endif
                </span>
            @endif
            <section class="brace"></section>
            <span class="iconBox">
                @if (!Session::get('userData'))
                    <a href="{{ route('yazar_girisi') }}">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                @endif
                @if (Session::get('userData'))
                    <a href="{{ route('cikis_yap') }}">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                @endif
            </span>
            <section class="brace"></section>
        </div>
        <div class="outFullLine" id="fullLine">
            <div class="inFullLine">
                <div class="search">
                    <div class="outInputText">
                        <input type="text" placeholder="Aradığın cümle ile ilgili birkaç kelime yazabilirsin">
                        <i class="fas fa-search"></i>
                        <i class="fas fa-times closeSearch"></i>
                    </div>
                </div>
                <div class="outTheme">
                    <div class="inTheme">
                        <label for="#">Tema:</label>

                        @if (Session::get('userData'))
                            @if (Session::get('userData.type.no') == App\Http\Controllers\Api\Constants\ConstantsListController::getUserTypeAuthorOnlyNotDeleted())
                                <form method="POST" action="{{ route('author_user_fast_website_theme_change') }}">
                            @endif

                            @if (Session::get('userData.type.no') == App\Http\Controllers\Api\Constants\ConstantsListController::getUserTypeSystemOnlyNotDeleted())
                                <form method="POST" action="{{ route('system_user_fast_website_theme_change') }}">
                            @endif

                            @csrf
                            <button class='@if (Session::get('userData.settings.website_theme') == 'dark') active @endif' name="websiteTheme"
                                value="dark">Koyu</button>
                            <button class='@if (Session::get('userData.settings.website_theme') == 'light') active @endif' name="websiteTheme"
                                value="light">Açık</button>
                            </form>
                        @endif

                        @if (Session::get('visitorData'))
                            <form method="POST" action="{{ route('visitor_website_theme_change') }}">
                                @csrf
                                <button class='@if (Session::get('visitorData.website_theme') == 'dark') active @endif' name="websiteTheme"
                                    value="dark">Koyu</button>
                                <button class='@if (Session::get('visitorData.website_theme') == 'light') active @endif' name="websiteTheme"
                                    value="light">Açık</button>
                            </form>
                        @endif

                        <i class="fas fa-times closeTheme"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile_bar">
            <span class="iconBox">
                <i class="fas fa-bars mobilMenuBtn"></i>
            </span>
            <span class="logoBox">
                <a href="{{ route('anasayfa') }}">
                    <i class="far fa-newspaper"></i>
                    Aradığın Cümle
                </a>
            </span>
            <span class="iconBox">
                <i class="fas fa-search mobilSearchBtn"></i>
            </span>
        </div>
    </div>
</div>

<div class="outDropdown">
    <div class="inDropdown">
        <div class="header">
            <div class="search">
                <div class="outInputText">
                    <input type="text" placeholder="Aradığın Cümle İle İlgili Arama Yapabilirsin">
                    <div class="iconBox">
                        <i class="fas fa-search cP"></i>
                    </div>
                </div>
            </div>

            <div class="themeAndLinks">
                <div class="theme">
                    <label for="#">Tema:</label>
                    @if (Session::get('userData'))
                        @if (Session::get('userData.type.no') == App\Http\Controllers\Api\Constants\ConstantsListController::getUserTypeAuthorOnlyNotDeleted())
                            <form method="POST" action="{{ route('author_user_fast_website_theme_change') }}">
                        @endif

                        @if (Session::get('userData.type.no') == App\Http\Controllers\Api\Constants\ConstantsListController::getUserTypeSystemOnlyNotDeleted())
                            <form method="POST" action="{{ route('system_user_fast_website_theme_change') }}">
                        @endif

                        @csrf
                        <button class='@if (Session::get('userData.settings.website_theme') == 'dark') active @endif' name="websiteTheme"
                            value="dark">Koyu</button>
                        <button class='@if (Session::get('userData.settings.website_theme') == 'light') active @endif' name="websiteTheme"
                            value="light">Açık</button>
                        </form>
                    @endif
                    @if (Session::get('visitorData'))
                        <form method="POST" action="{{ route('visitor_website_theme_change') }}">
                            @csrf
                            <button class='@if (Session::get('visitorData.website_theme') == 'dark') active @endif' name="websiteTheme"
                                value="dark">Koyu</button>
                            <button class='@if (Session::get('visitorData.website_theme') == 'light') active @endif' name="websiteTheme"
                                value="light">Açık</button>
                        </form>
                    @endif
                </div>

                <div class="linkBar">

                    @if (!Session::get('userData'))
                        <span>
                            <a href="{{ route('yazar_girisi') }}">Giriş Yap</a>
                        </span>
                    @endif
                    @if (Session::get('userData'))
                        <span>
                            @if (Session::get('userData.type.no') == App\Http\Controllers\Api\Constants\ConstantsListController::getUserTypeAuthorOnlyNotDeleted())
                                <a href="{{ route('yazar_paneli_anapanel') }}">Yazar Paneli</a>
                            @endif

                            @if (Session::get('userData.type.no') == App\Http\Controllers\Api\Constants\ConstantsListController::getUserTypeSystemOnlyNotDeleted())
                                <a href="{{ route('sistem_paneli_anapanel') }}">Sistem Paneli</a>
                            @endif
                        </span>
                        <span>
                            <a href="{{ route('cikis_yap') }}">Çıkış Yap</a>
                        </span>
                    @endif


                </div>
            </div>
        </div>
        <div class="lists">
            <div class="listsBar">
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a
                                href="{{ route('haberler_listesi_kategori', [$data['menu']['category1']['link_url']['link_url'],'son-yayinlananlar']) }}">{{ Str::title($data['menu']['category1']['main']['name']) }}</a>
                        </span>
                    </div>
                    <div class="list">
                        @foreach ($data['menu']['category1SubGroups'] as $subCategory)
                            <div class="item">
                                <span>
                                    <a
                                        href="{{ route('haberler_listesi_kategori', [$subCategory['link_url']['link_url'], 'son-yayinlananlar']) }}">{{ $subCategory['sub1']['name'] }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a
                                href="{{ route('haberler_listesi_kategori', [$data['menu']['category2']['link_url']['link_url'],'son-yayinlananlar']) }}">{{ Str::title($data['menu']['category2']['main']['name']) }}</a>
                        </span>
                    </div>
                    <div class="list">
                        @foreach ($data['menu']['category2SubGroups'] as $subCategory)
                            <div class="item">
                                <span>
                                    <a
                                        href="{{ route('haberler_listesi_kategori', [$subCategory['link_url']['link_url'], 'son-yayinlananlar']) }}">{{ $subCategory['sub1']['name'] }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a
                                href="{{ route('haberler_listesi_kategori', [$data['menu']['category3']['link_url']['link_url'],'son-yayinlananlar']) }}">{{ Str::title($data['menu']['category3']['main']['name']) }}</a>
                        </span>
                    </div>
                    <div class="list">
                        @foreach ($data['menu']['category3SubGroups'] as $subCategory)
                            <div class="item">
                                <span>
                                    <a
                                        href="{{ route('haberler_listesi_kategori', [$subCategory['link_url']['link_url'], 'son-yayinlananlar']) }}">{{ $subCategory['sub1']['name'] }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a
                                href="{{ route('haberler_listesi_kategori', [$data['menu']['category4']['link_url']['link_url'],'son-yayinlananlar']) }}">{{ Str::title($data['menu']['category4']['main']['name']) }}</a>
                        </span>
                    </div>
                    <div class="list">
                        @foreach ($data['menu']['category4SubGroups'] as $subCategory)
                            <div class="item">
                                <span>
                                    <a
                                        href="{{ route('haberler_listesi_kategori', [$subCategory['link_url']['link_url'], 'son-yayinlananlar']) }}">{{ $subCategory['sub1']['name'] }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="listsBar">
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a
                                href="{{ route('haberler_listesi_kategori', [$data['menu']['category5']['link_url']['link_url'],'son-yayinlananlar']) }}">{{ Str::title($data['menu']['category5']['main']['name']) }}</a>
                        </span>
                    </div>
                    <div class="list">
                        @foreach ($data['menu']['category5SubGroups'] as $subCategory)
                            <div class="item">
                                <span>
                                    <a
                                        href="{{ route('haberler_listesi_kategori', [$subCategory['link_url']['link_url'], 'son-yayinlananlar']) }}">{{ $subCategory['sub1']['name'] }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a
                                href="{{ route('haberler_listesi_kategori', [$data['menu']['category6']['link_url']['link_url'],'son-yayinlananlar']) }}">{{ Str::title($data['menu']['category6']['main']['name']) }}</a>
                        </span>
                    </div>
                    <div class="list">
                        @foreach ($data['menu']['category6SubGroups'] as $subCategory)
                            <div class="item">
                                <span>
                                    <a
                                        href="{{ route('haberler_listesi_kategori', [$subCategory['link_url']['link_url'], 'son-yayinlananlar']) }}">{{ $subCategory['sub1']['name'] }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a
                                href="{{ route('haberler_listesi_kategori', [$data['menu']['category7']['link_url']['link_url'],'son-yayinlananlar']) }}">{{ Str::title($data['menu']['category7']['main']['name']) }}</a>
                        </span>
                    </div>
                    <div class="list">
                        @foreach ($data['menu']['category7SubGroups'] as $subCategory)
                            <div class="item">
                                <span>
                                    <a
                                        href="{{ route('haberler_listesi_kategori', [$subCategory['link_url']['link_url'], 'son-yayinlananlar']) }}">{{ $subCategory['sub1']['name'] }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a
                                href="{{ route('haberler_listesi_kategori', [$data['menu']['category8']['link_url']['link_url'],'son-yayinlananlar']) }}">{{ Str::title($data['menu']['category8']['main']['name']) }}</a>
                        </span>
                    </div>
                    <div class="list">
                        @foreach ($data['menu']['category8SubGroups'] as $subCategory)
                            <div class="item">
                                <span>
                                    <a
                                        href="{{ route('haberler_listesi_kategori', [$subCategory['link_url']['link_url'], 'son-yayinlananlar']) }}">{{ $subCategory['sub1']['name'] }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('src/js/menu.js') }}"></script>
