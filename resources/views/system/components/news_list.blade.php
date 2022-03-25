<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Haberler
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('haberler')) selected @endif>Varsayılan</option>
                            <option value="no09" @if (Route::is('haberler_no09')) selected @endif>No (0 - 9)</option>
                            <option value="no90" @if (Route::is('haberler_no90')) selected @endif>No (9 - 0)</option>
                            <option value="contentAZ" @if (Route::is('haberler_contentAZ')) selected @endif>İçerik (A - Z)</option>
                            <option value="contentZA" @if (Route::is('haberler_contentZA')) selected @endif>İçerik (Z - A)</option>
                            <option value="authorAZ" @if (Route::is('haberler_authorAZ')) selected @endif>Yazar (A - Z)</option>
                            <option value="authorZA" @if (Route::is('haberler_authorZA')) selected @endif>Yazar (Z - A)</option>
                            <option value="categoryAZ" @if (Route::is('haberler_categoryAZ')) selected @endif>Kategori (A - Z)</option>
                            <option value="categoryZA" @if (Route::is('haberler_categoryZA')) selected @endif>Kategori (Z - A)</option>
                            <option value="resourcePlatformAZ" @if (Route::is('haberler_resourcePlatformAZ')) selected @endif>Kaynak Site (A - Z)</option>
                            <option value="resourcePlatformZA" @if (Route::is('haberler_resourcePlatformZA')) selected @endif> Kaynak Site (Z - A)</option>
                            <option value="publishDateAZ" @if (Route::is('haberler_publishDateAZ')) selected @endif>Yayın Zamanı (A - Z)</option>
                            <option value="publishDateZA" @if (Route::is('haberler_publishDateZA')) selected @endif>Yayın Zamanı (Z - A)</option>
                            <option value="writeTimeAZ" @if (Route::is('haberler_writeTimeAZ')) selected @endif>Yazılma Zamanı (A - Z)</option>
                            <option value="writeTimeZA" @if (Route::is('haberler_writeTimeZA')) selected @endif>Yazılma Zamanı (Z - A)</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="dbList">
            <div class="titleLine">
                <div class="w5">
                    <span>No</span>
                </div>
                <div class="w10">
                    <span>Yazar</span>
                </div>
                <div class="w10">
                    <span>Kategori</span>
                </div>
                <div class="w30">
                    <span>İçerik</span>
                </div>
                <div class="w10">
                    <span>Kaynak Site</span>
                </div>
                <div class="w15">
                    <span>Yayın Zamanı</span>
                </div>
                <div class="w15">
                    <span>Yazılma Zamanı</span>
                </div>
                <div class="w5">
                    <span>İşlem</span>
                </div>
            </div>
            @isset($data['data'])
                @foreach ($data['data'] as $item)
                    <div class="line">
                        <div class="w5">
                            <span>{{ $item['no'] }}</span>
                        </div>
                        <div class="w10">
                            <span>{{ $item['author']['username'] }}</span>
                        </div>
                        <div class="w10">
                            <span>{{ $item['category']['text'] }}</span>
                        </div>
                        <div class="w30">
                            <span>{{ $item['content'] }}</span>
                        </div>
                        <div class="w10">
                            <span>{{ $item['resource_platform']['name'] }}</span>
                        </div>
                        <div class="w15">
                            <span>{{ $item['publish_date']['text'] }}</span>
                        </div>
                        <div class="w15">
                            <span>{{ $item['write_time']['text'] }}</span>
                        </div>
                        <div class="actions w5">
                            <span>
                                <a href="/sistem-paneli/haber/düzenle/{{ $item['no'] }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/sistem-paneli/haber/sil/{{ $item['no'] }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('haber_istatistikleri_detay', [$item['no']]) }}">
                                    <i class="fas fa-chart-bar"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</div>
