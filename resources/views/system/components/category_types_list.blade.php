<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kategori Tipleri
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('kategori_tipleri')) selected @endif>Varsayılan</option>
                            <option value="no09" @if (Route::is('kategori_tipleri_no09')) selected @endif>No (0 - 9)</option>
                            <option value="no90" @if (Route::is('kategori_tipleri_no90')) selected @endif>No (9 - 0)</option>
                            <option value="nameAZ" @if (Route::is('kategori_tipleri_nameAZ')) selected @endif>Ad (A - Z)</option>
                            <option value="nameZA" @if (Route::is('kategori_tipleri_nameZA')) selected @endif>Ad (Z - A)</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="dbList">
            <div class="titleLine">
                <div class="w40">
                    <span>No</span>
                </div>
                <div class="w40">
                    <span>Adı</span>
                </div>
                <div class="w20">
                    <span>İşlem</span>
                </div>
            </div>
            @foreach ($data['data'] as $item)
                <div class="line">
                    <div class="w40">
                        <span>{{ $item['no'] }}</span>
                    </div>
                    <div class="w40">
                        <span>{{ $item['name'] }}</span>
                    </div>
                    <div class="actions w20">
                        <span>
                            <a href="/sistem-paneli/kategori-tipi/{{ $item['no'] }}/düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kategori-tipi/{{ $item['no'] }}/sil">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
