<div class="outSettings">
    <div class="inSettings">
        <div class="outSettingsMenu">
            <div class="outTitle">
                <div class="inTitle">
                    Ayarlar
                </div>
            </div>
            <div class="inSettingsMenu">
                <div class="outSettingsMenuItem">
                    <a href="{{ route('sistem_paneli_ayarlar_tema') }}" class="inSettingsMenuItem">Tema</a>
                </div>
                <div class="outSettingsMenuItem">
                    <a href="{{ route('ayarlar_sabitler') }}" class="inSettingsMenuItem">Sabitler</a>
                </div>
            </div>
        </div>
        <div class="outSettingsContent">
            <div class="outTitle">
                <div class="inTitle">
                    Sabitler
                </div>
            </div>
            <form class="inSettingsContent" method="POST">
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Ana Kategori Tipi:</label>
                            <div class="outInputText">
                                <input type="text" name="categoryTypeMain" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'category_type_main')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Alt Kategori Tipi:</label>
                            <div class="outInputText">
                                <input type="text" name="categoryTypeSub" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'category_type_sub')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Yazar Kullanıcı Tipi:</label>
                            <div class="outInputText">
                                <input type="text" name="userTypeAuthor" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'user_type_author')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Sistem Kullanıcı Tipi:</label>
                            <div class="outInputText">
                                <input type="text" name="userTypeSystem" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'user_type_system')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Site Menü 1.Kategori:</label>
                            <div class="outInputText">
                                <input type="text" name="webSiteVisitorMenuCategory1" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'website_visitor_menu_category1')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Site Menü 2.Kategori:</label>
                            <div class="outInputText">
                                <input type="text" name="webSiteVisitorMenuCategory2" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'website_visitor_menu_category2')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Site Menü 3.Kategori:</label>
                            <div class="outInputText">
                                <input type="text" name="webSiteVisitorMenuCategory3" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'website_visitor_menu_category3')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Site Menü 4.Kategori:</label>
                            <div class="outInputText">
                                <input type="text" name="webSiteVisitorMenuCategory4" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'website_visitor_menu_category4')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Site Menü 5.Kategori:</label>
                            <div class="outInputText">
                                <input type="text" name="webSiteVisitorMenuCategory5" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'website_visitor_menu_category5')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Site Menü 6.Kategori:</label>
                            <div class="outInputText">
                                <input type="text" name="webSiteVisitorMenuCategory6" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'website_visitor_menu_category6')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Site Menü 7.Kategori:</label>
                            <div class="outInputText">
                                <input type="text" name="webSiteVisitorMenuCategory7" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'website_visitor_menu_category7')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Site Menü 8.Kategori:</label>
                            <div class="outInputText">
                                <input type="text" name="webSiteVisitorMenuCategory8" @foreach ($data['constants'] as $constant)
                                @if ($constant['key'] == 'website_visitor_menu_category8')
                                    value="{{ $constant['value'] }}"
                                @endif
                                @endforeach>
                            </div>
                        </div>
                    </div>
                </div>
                @csrf
                <div class="line">
                    <div class="changeListSubmit">
                        <button>
                            Değişiklikleri Uygula
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
