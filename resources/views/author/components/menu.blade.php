<div class="outMenu">
    <div class="inMenu">
        <div class="bar">
            <span class="textBox">
                <a href="{{ route('yazar_paneli_anapanel') }}" class="strong">
                    <i class="far fa-newspaper"></i>
                    YazarPaneli
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="{{ route('haber_ekle') }}">Haber Ekle</a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="{{ route('haberlerim') }}">
                    Haberlerim
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="{{ route('haber_istatistiklerim') }}">
                    Haber İstatistiklerim
                </a>
            </span>
        </div>
        <div class="bar">
            <section class="brace"></section>
            <span class="iconBox">
                <i class="fas fa-bars menuBtn"></i>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <i class="fas fa-adjust themeBtn"></i>
            </span>
            <section class="brace">
            </section>
            <span class="iconBox">
                <a href="{{ route('yazar_paneli_ayarlar_tema') }}">
                    <i class="fas fa-cog"></i>
                </a>
            </span>
            <section class="brace">
            </section>
            <span class="iconBox">
                <a href="{{ route('anasayfa') }}" target="blank">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <a href="{{ route('cikis_yap') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </span>
            <section class="brace">
            </section>
        </div>
        <div class="outFullLine" id="fullLine">
            <div class="inFullLine">
                <div class="search" id="fullLineSearch">
                    <div class="outInputText">
                        <input type="text" placeholder="Aradığın cümle ile ilgili birkaç kelime yazabilirsin">
                        <i class="fas fa-search"></i>
                        <i class="fas fa-times closeSearch"></i>
                    </div>
                </div>
                <div class="outTheme" id="fullLineTheme">
                    <div class="inTheme">
                        <label for="#">Tema:</label>
                        <form method="POST" action="{{ route('author_user_fast_dashboard_theme_change') }}">
                            @csrf
                            <button class='@if (Session::get('userData.settings.dashboard_theme') == 'dark') active @endif' name="dashboardTheme"
                                value="dark">Koyu</button>
                            <button class='@if (Session::get('userData.settings.dashboard_theme') == 'light') active @endif' name="dashboardTheme"
                                value="light">Açık</button>
                        </form>
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
                <a href="{{ route('yazar_paneli_anapanel') }}">
                    <i class="far fa-newspaper"></i>
                    YazarPaneli
                </a>
            </span>
            <span class="iconBox">
                <i class="fas fa-search mobilSearchBtn"></i>
            </span>
        </div>
    </div>
</div>

<div class="outDropdown" id="dropdown">
    <div class="inDropdown">
        <div class="header">
            <div class="search">
                <div class="outInputText">
                    <input type="text" placeholder="Yazarlık İşleri İle İlgili Arama Yapabilirsin">
                    <div class="iconBox">
                        <i class="fas fa-search cP"></i>
                    </div>
                </div>
            </div>

            <div class="themeAndLinks">
                <div class="theme">
                    <label for="#">Tema:</label>
                    <form method="POST" action="{{ route('author_user_fast_dashboard_theme_change') }}">
                        @csrf
                        <button class='@if (Session::get('userData.settings.dashboard_theme') == 'dark') active @endif' name="dashboardTheme"
                            value="dark">Koyu</button>
                        <button class='@if (Session::get('userData.settings.dashboard_theme') == 'light') active @endif' name="dashboardTheme"
                            value="light">Açık</button>
                    </form>
                </div>

                <div class="linkBar">
                    <span>
                        <a href="{{ route('anasayfa') }}" target="blank">WebSite'yi
                            Görüntüle</a>
                    </span>
                    <span>
                        <a href="{{ route('cikis_yap') }}">Çıkış Yap</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="lists">
            <div class="listsBar">
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('haberlerim') }}">Haberlerim</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="{{ route('haber_ekle') }}">Haber Ekle</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="{{ route('haber_istatistiklerim') }}">
                                    Haber İstatistiklerim
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('yazar_paneli_ayarlar_profilim') }}">Ayarlar</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="{{ route('yazar_paneli_ayarlar_profilim') }}">Profilim</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="{{ route('yazar_paneli_ayarlar_tema') }}">Tema</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('src/js/admin_menu.js') }}"></script>
