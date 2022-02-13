<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kaynak Siteler
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('kaynak_siteler')) selected @endif>Varsayılan</option>
                            <option value="no09" @if (Route::is('kaynak_siteler_no09')) selected @endif>No (0 - 9)</option>
                            <option value="no90" @if (Route::is('kaynak_siteler_no90')) selected @endif>No (9 - 0)</option>
                            <option value="nameAZ" @if (Route::is('kaynak_siteler_nameAZ')) selected @endif>Ad (A - Z)</option>
                            <option value="nameZA" @if (Route::is('kaynak_siteler_nameZA')) selected @endif>Ad (Z - A)</option>
                            <option value="websiteLinkAZ" @if (Route::is('kaynak_siteler_websiteLinkAZ')) selected @endif>Site Linki (A - Z)</option>
                            <option value="websiteLinkZA" @if (Route::is('kaynak_siteler_websiteLinkZA')) selected @endif>Site Linki (Z - A)</option>
                            <option value="linkUrlAZ" @if (Route::is('kaynak_siteler_linkUrlAZ')) selected @endif>Link Metni (A - Z)</option>
                            <option value="linkUrlZA" @if (Route::is('kaynak_siteler_linkUrlZA')) selected @endif>Link Metni (Z - A)</option>
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
                <div class="w20">
                    <span>Adı</span>
                </div>
                <div class="w20">
                    <span>Site Linki</span>
                </div>
                <div class="w20">
                    <span>Link</span>
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
                    <div class="w20">
                        <span>{{ $item['name'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['main_url'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['link_url'] }}</span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="/sistem-paneli/kaynak-site/düzenle/{{ $item["no"] }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kaynak-site/sil/{{ $item["no"] }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
