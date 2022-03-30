<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                {{ $data['page_title'] }}
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('kullanici_ayarlari')) selected @endif>Varsayılan</option>
                            <option value="no09" @if (Route::is('kullanici_ayarlari_no09')) selected @endif>No (0 - 9)</option>
                            <option value="no90" @if (Route::is('kullanici_ayarlari_no90')) selected @endif>No (9 - 0)</option>
                            <option value="userAZ" @if (Route::is('kullanici_ayarlari_userAZ')) selected @endif>Kullanıcı (A - Z)</option>
                            <option value="userZA" @if (Route::is('kullanici_ayarlari_userZA')) selected @endif>Kullanıcı (Z - A)</option>
                            <option value="webSiteThemeAZ" @if (Route::is('kullanici_ayarlari_webSiteThemeAZ')) selected @endif>WebSite Tema (A - Z)</option>
                            <option value="webSiteThemeZA" @if (Route::is('kullanici_ayarlari_webSiteThemeZA')) selected @endif>WebSite Tema (Z - A)</option>
                            <option value="dashboardThemeAZ" @if (Route::is('kullanici_ayarlari_dashboardThemeAZ')) selected @endif>Panel Tema (A - Z)</option>
                            <option value="dashboardThemeZA" @if (Route::is('kullanici_ayarlari_dashboardThemeZA')) selected @endif>Panel Tema (Z - A)</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="dbList">
            <div class="titleLine">
                <div class="w20">
                    <span>No</span>
                </div>
                <div class="w30">
                    <span>Kullanıcı</span>
                </div>
                <div class="w20">
                    <span>WebSite Tema</span>
                </div>
                <div class="w20">
                    <span>Panel Tema</span>
                </div>
                <div class="w10">
                    <span>İşlem</span>
                </div>
            </div>
            @foreach ($data['data'] as $item)
                <div class="line">
                    <div class="w20">
                        <span>{{ $item['no'] }}</span>
                    </div>
                    <div class="w30">
                        <span>{{ $item['user_no']['username'] }} [{{ $item['user_no']['full_name'] }}]</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['website_theme'] }} @empty($item['website_theme'])
                                -
                            @endempty
                        </span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['dashboard_theme'] }} @empty($item['dashboard_theme'])
                                -
                            @endempty
                        </span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="{{ route('kullanici_ayari_düzenle', $item['no']) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('kullanici_ayari_sil', $item['no']) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
