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
                <a href="xxxx">
                    Kategori
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="xxxx">
                    Kategori
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="xxxx">
                    Kategori
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="xxxx">
                    Kategori
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
                <i class="fas fa-search" id="openFullLineSearchIcon"></i>
            </span>
            <section class="brace"></section>
            <span class="iconBox">
                <i class="fas fa-adjust" id="openFullLineThemeIcon"></i>
            </span>
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
                        <a href="#">Koyu</a>
                        <a href="#">Açık</a>
                        <i class="fas fa-times" id="closeFullLineThemeIcon"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="mobile_bar">
            <span class="iconBox">
                <i class="fas fa-bars"></i>
            </span>
            <span class="logoBox">
                <a href="{{ route('anasayfa') }}">
                    <i class="far fa-newspaper"></i>
                    Aradığın Cümle
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
                    <input type="text" placeholder="Aradığın Cümle İle İlgili Arama Yapabilirsin">
                    <div class="iconBox">
                        <i class="fas fa-search cP"></i>
                    </div>
                </div>
            </div>

            <div class="themeAndLinks">
                <div class="theme">
                    <label for="#">Tema:</label>
                    <a href="#">Koyu</a>
                    <a href="#">Açık</a>
                </div>

                <div class="linkBar">

                    @if (!Session::get('userData'))
                        <span>
                            <a href="{{ route('yazar_girisi') }}">Giriş Yap</a>
                        </span>
                    @endif
                    @if (Session::get('userData'))
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
                            <a href="####">Ana Kategori</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="####">Ana Kategori</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="####">Ana Kategori</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="####">Ana Kategori</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="listsBar">
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="####">Ana Kategori</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="####">Ana Kategori</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="####">Ana Kategori</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="####">Ana Kategori</a>
                        </span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                        <div class="item">
                            <span>
                                <a href="####">Alt Kategori</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('src/js/menu.js') }}"></script>
