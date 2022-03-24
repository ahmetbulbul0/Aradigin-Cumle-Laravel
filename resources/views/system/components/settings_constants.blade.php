<div class="outSettings">
    <div class="inSettings">
        @include('system.components.settings_menu')
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
                            <div class="outSelectBox">
                                <select name="categoryTypeMain">
                                    <option disabled>Ana Kategori Tipi</option>
                                    @foreach ($data['categoryTypes'] as $categoryType)
                                        <option value="{{ $categoryType['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'category_type_main') @if ($constant["value"] == $categoryType['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryType['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Alt Kategori Tipi:</label>
                            <div class="outSelectBox">
                                <select name="categoryTypeSub">
                                    <option disabled>Alt Kategori Tipi</option>
                                    @foreach ($data['categoryTypes'] as $categoryType)
                                        <option value="{{ $categoryType['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'category_type_sub') @if ($constant["value"] == $categoryType['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryType['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Yazar Kullanıcı Tipi:</label>
                            <div class="outSelectBox">
                                <select name="userTypeAuthor">
                                    <option disabled>Yazar Kullanıcı Tipi</option>
                                    @foreach ($data['userTypes'] as $userType)
                                        <option value="{{ $userType['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'user_type_author') @if ($constant["value"] == $userType['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($userType['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Sistem Kullanıcı Tipi:</label>
                            <div class="outSelectBox">
                                <select name="userTypeSystem">
                                    <option disabled>Sistem  Kullanıcı Tipi</option>
                                    @foreach ($data['userTypes'] as $userType)
                                        <option value="{{ $userType['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'user_type_system') @if ($constant["value"] == $userType['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($userType['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Site Menü 1.Kategori:</label>
                            <div class="outSelectBox">
                                <select name="webSiteVisitorMenuCategory1">
                                    <option disabled>Site Menü 1.Kategori</option>
                                    @foreach ($data['categoryGroups'] as $categoryGroup)
                                        <option value="{{ $categoryGroup['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'website_visitor_menu_category1') @if ($constant["value"] == $categoryGroup['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryGroup["main"]['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Site Menü 2.Kategori:</label>
                            <div class="outSelectBox">
                                <select name="webSiteVisitorMenuCategory2">
                                    <option disabled>Site Menü 2.Kategori</option>
                                    @foreach ($data['categoryGroups'] as $categoryGroup)
                                        <option value="{{ $categoryGroup['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'website_visitor_menu_category2') @if ($constant["value"] == $categoryGroup['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryGroup["main"]['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Site Menü 3.Kategori:</label>
                            <div class="outSelectBox">
                                <select name="webSiteVisitorMenuCategory3">
                                    <option disabled>Site Menü 3.Kategori</option>
                                    @foreach ($data['categoryGroups'] as $categoryGroup)
                                        <option value="{{ $categoryGroup['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'website_visitor_menu_category3') @if ($constant["value"] == $categoryGroup['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryGroup["main"]['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Site Menü 4.Kategori:</label>
                            <div class="outSelectBox">
                                <select name="webSiteVisitorMenuCategory4">
                                    <option disabled>Site Menü 4.Kategori</option>
                                    @foreach ($data['categoryGroups'] as $categoryGroup)
                                        <option value="{{ $categoryGroup['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'website_visitor_menu_category4') @if ($constant["value"] == $categoryGroup['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryGroup["main"]['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Site Menü 5.Kategori:</label>
                            <div class="outSelectBox">
                                <select name="webSiteVisitorMenuCategory5">
                                    <option disabled>Site Menü 5.Kategori</option>
                                    @foreach ($data['categoryGroups'] as $categoryGroup)
                                        <option value="{{ $categoryGroup['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'website_visitor_menu_category5') @if ($constant["value"] == $categoryGroup['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryGroup["main"]['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Site Menü 6.Kategori:</label>
                            <div class="outSelectBox">
                                <select name="webSiteVisitorMenuCategory6">
                                    <option disabled>Site Menü 6.Kategori</option>
                                    @foreach ($data['categoryGroups'] as $categoryGroup)
                                        <option value="{{ $categoryGroup['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'website_visitor_menu_category6') @if ($constant["value"] == $categoryGroup['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryGroup["main"]['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="changeListItem">
                        <div class="bar">
                            <label>Site Menü 7.Kategori:</label>
                            <div class="outSelectBox">
                                <select name="webSiteVisitorMenuCategory7">
                                    <option disabled>Site Menü 7.Kategori</option>
                                    @foreach ($data['categoryGroups'] as $categoryGroup)
                                        <option value="{{ $categoryGroup['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'website_visitor_menu_category7') @if ($constant["value"] == $categoryGroup['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryGroup["main"]['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="bar">
                            <label>Site Menü 8.Kategori:</label>
                            <div class="outSelectBox">
                                <select name="webSiteVisitorMenuCategory8">
                                    <option disabled>Site Menü 8.Kategori</option>
                                    @foreach ($data['categoryGroups'] as $categoryGroup)
                                        <option value="{{ $categoryGroup['no'] }}" @foreach ($data['constants'] as $constant) @if ($constant['key'] == 'website_visitor_menu_category8') @if ($constant["value"] == $categoryGroup['no']) selected @endif @endif @endforeach>
                                            {{ Str::title($categoryGroup["main"]['name']) }}
                                        </option>
                                    @endforeach
                                </select>
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
