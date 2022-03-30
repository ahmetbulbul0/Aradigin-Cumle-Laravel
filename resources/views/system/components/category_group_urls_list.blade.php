<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kategori Grup Link Metinleri
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('kategori_grubu_linkleri')) selected @endif>Varsayılan</option>
                            <option value="no09" @if (Route::is('kategori_grubu_linkleri_no09')) selected @endif>No (0 - 9)</option>
                            <option value="no90" @if (Route::is('kategori_grubu_linkleri_no90')) selected @endif>No (9 - 0)</option>
                            <option value="categoryGroupAZ" @if (Route::is('kategori_grubu_linkleri_categoryGroupAZ')) selected @endif>Kategori Grubu (A - Z)</option>
                            <option value="categoryGroupZA" @if (Route::is('kategori_grubu_linkleri_categoryGroupZA')) selected @endif>Kategori Grubu (Z - A)</option>
                            <option value="linkUrlAZ" @if (Route::is('kategori_grubu_linkleri_linkUrlAZ')) selected @endif>Link Metni (A - Z)</option>
                            <option value="linkUrlZA" @if (Route::is('kategori_grubu_linkleri_linkUrlZA')) selected @endif>Link Metni (Z - A)</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="dbList">
            <div class="titleLine">
                <div class="w10">
                    <span>No</span>
                </div>
                <div class="w40">
                    <span>Kategori Grubu</span>
                </div>
                <div class="w40">
                    <span>Link Metni</span>
                </div>
                <div class="w10">
                    <span>İşlem</span>
                </div>
            </div>
            @foreach ($data['data'] as $item)
                <div class="line">
                    <div class="w10">
                        <span>{{ $item['no'] }}</span>
                    </div>
                    <div class="w40">
                        <span>{{ $item['group_no'] }}</span>
                    </div>
                    <div class="w40">
                        <span>{{ $item['link_url'] }}</span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="{{ route("kategori_grubu_linki_düzenle", $item['no']) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route("kategori_grubu_linki_sil", $item['no']) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
