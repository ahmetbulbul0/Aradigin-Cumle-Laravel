<div class="outMenu">
    <div class="inMenu">
        <div class="bar">
            <span class="textBox">
                <a href="#" class="strong">
                    <i class="far fa-newspaper"></i>
                    <span>AradığınCümle</span>
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="#">
                    Teknoloji
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="#">
                    Gündem
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="#">
                    Ekonomi
                </a>
            </span>
            <span class="brace"></span>
            <span class="textBox">
                <a href="#">
                    Global
                </a>
            </span>
        </div>
        <div class="bar">
            <section class="brace"></section>
            <span class="iconBox" id="homeIconBox">
                <i class="far fa-newspaper"></i>
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
            <!-- <section class="brace"></section>
            <span class="iconBox">
                <i class="fas fa-user"></i>
            </span> -->
            <section class="brace"></section>
            <span class="iconBox">
                <!-- <i class="fas fa-sign-out-alt"></i> -->
                <i class="fas fa-sign-in-alt"></i>
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
    </div>
</div>

<div class="outDropdown" id="dropdown">
    <div class="inDropdown">
        <div class="header">
            <div class="outInputText">
                <input type="text" placeholder="Aradığın cümle ile ilgili birkaç kelime yazabilirsin">
                <div class="iconBox">
                    <i class="fas fa-search cP"></i>
                </div>
            </div>

            <div class="theme">
                <label for="#">Tema:</label>
                <a href="#" class="active">Koyu</a>
                <a href="#">Açık</a>
            </div>

            <div class="linkBar">
                <a href="#">Yazar Girişi</a>
            </div>
        </div>
        <div class="lists">
            <div class="listsBar">
                @foreach ($data["menu"]["categories"] as $category)
                <div class="outList">
                    <div class="titleBox">
                        <span>
                            <a href="/haberler/kategori/{{ $category['link_url'] }}/son-yayinlananlar">
                                {{ Str::title($category["name"]) }}
                            </a>
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="listsBar">
                <div class="outList">
                    <div class="titleBox">
                        <span>Başlıkuzl</span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>Başlıkuzl</span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>Başlıkuzl</span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                    </div>
                </div>
                <div class="outList">
                    <div class="titleBox">
                        <span>Başlıkuzl</span>
                    </div>
                    <div class="list">
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                        <div class="item">
                            <span>Ipsum</span>
                        </div>
                        <div class="item">
                            <span>Lorem</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('src/js/menu.js') }}"></script>