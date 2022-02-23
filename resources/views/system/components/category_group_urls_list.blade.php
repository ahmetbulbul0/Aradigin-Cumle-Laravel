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
                            <option value="default" @if (Route::is('haber_kategori_grubu_linkleri')) selected @endif>Varsayılan
                            </option>
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
                <div class="w40">
                    <span>Kategori Grubu</span>
                </div>
                <div class="w30">
                    <span>Link Metni</span>
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
                    <div class="w40">
                        <span>{{ $item['group_no'] }}</span>
                    </div>
                    <div class="w30">
                        <span>{{ $item['link_url'] }}</span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="/sistem-paneli/kategori-grubu-link-metni/düzenle/{{ $item['no'] }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kategori-grubu-link-metni/sil/{{ $item['no'] }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
