<div class="outMenu">
    <div class="inMenu">
        <div class="bar">
            <span class="textBox">
                <a href="{{ route('sistem_paneli_anapanel') }}" class="strong">
                    <i class="far fa-newspaper"></i>
                    YazarPaneli
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="{{ route('haberler') }}">
                    Haber Ekle
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="{{ route('kategoriler') }}">
                    Haberlerim
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="{{ route('kategori_gruplari') }}">
                    Haberlerim İstatistikleri
                </a>
            </span>
        </div>
        <div class="bar">
            <section class="brace"></section>
            <span class="iconBox" id="homeIconBox">
                <a href="{{ route('sistem_paneli_anapanel') }}">
                    <i class="far fa-newspaper"></i>
                </a>
            </span>
            <section class="brace" id="homeIconBrace"></section>
            <span class="iconBox">
                <i class="fas fa-bars" id="openMenuIcon"></i>
                <i class="fas fa-bars" id="closeMenuIcon"></i>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <a href="{{ route('anasayfa') }}">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <i class="fas fa-adjust" id="openFullLineThemeIcon"></i>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <a href="{{ route('sistem_paneli_ayarlar_tema') }}">
                    <i class="fas fa-cog"></i>
                </a>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <a href="{{ route('sistem_paneli_cikis_yap') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </span>
            <section class="brace"></section>
        </div>
        <div class="outFullLine" id="fullLine">
            <div class="inFullLine">
                <div class="search" id="fullLineSearch">
                    <div class="outInputText">
                        <input type="text" placeholder="Aradığın cümle ile ilgili birkaç kelime yazabilirsin">
                        <i class="fas fa-search"></i>
                        <i class="fas fa-times" id="closeFullLineSearchIcon"></i>
                    </div>
                </div>
                <div class="outTheme" id="fullLineTheme">
                    <div class="inTheme">
                        <label for="#">Tema:</label>
                        <a href="#" class="active">Koyu</a>
                        <a href="#">Açık</a>
                        <i class="fas fa-times" id="closeFullLineThemeIcon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile_bar">
            <span class="iconBox">
                <i class="fas fa-bars" id="openMenuIcon1"></i>
                <i class="fas fa-bars" id="closeMenuIcon1"></i>
            </span>
            <span class="logoBox">
                <a href="{{ route('sistem_paneli_anapanel') }}">
                    <i class="far fa-newspaper"></i>
                    SistemPaneli
                </a>
            </span>
            <span class="iconBox">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>
</div>

<div class="outDropdown" id="dropdown">
    <div class="inDropdown">
        <div class="header">
            <div class="search">
                <div class="outInputText">
                    <input type="text" placeholder="Sistem İşleri İle İlgili Arama Yapabilirsin">
                    <div class="iconBox">
                        <i class="fas fa-search cP"></i>
                    </div>
                </div>
            </div>

            <div class="themeAndLinks">
                <div class="theme">
                    <label for="#">Tema:</label>
                    <a href="#" class="active">Koyu</a>
                    <a href="google.com">Açık</a>
                </div>

                <div class="linkBar">
                    <span>
                        <a href="{{ route('anasayfa') }}">WebSite'yi Görüntüle</a>
                    </span>
                    <span>
                        <a href="{{ route('sistem_paneli_cikis_yap') }}">Çıkış Yap</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="lists">
            <div class="listsBar">
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('kullanici_tipleri') }}">Kullanıcı Tipleri</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="{{ route('kullanici_tipi_ekle') }}">Kullanıcı Tipi Ekle</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('kullanicilar') }}">Kullanıcılar</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="{{ route('kullanici_ekle') }}">Kullanıcı Ekle</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('kaynak_siteler') }}">Kaynak Siteleri</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="{{ route('kaynak_site_ekle') }}">Kaynak Site Ekle</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('kategori_tipleri') }}">Kategori Tipleri</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="{{ route('kategori_tipi_ekle') }}">Kategori Tipi Ekle</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="listsBar">
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('kategoriler') }}">Kategoriler</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="{{ route('kategori_ekle') }}">Kategori Ekle</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('kategori_gruplari') }}">Kategori Grupları</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="{{ route('kategori_grubu_ekle') }}">Kategori Grubu Ekle</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="{{ route('haberler') }}">Haberler</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="/haber-istatisikleri-gelecek-route-buraya">Haber İstatistikleri</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="/ayarlar">Ayarlar</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="/ayarlar/tema">Tema</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="/ayarlar/sabitler">Sabitler</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="/ayarlar/site-istatistikleri">Site İstatistikleri</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('src/js/admin_menu.js') }}"></script>
