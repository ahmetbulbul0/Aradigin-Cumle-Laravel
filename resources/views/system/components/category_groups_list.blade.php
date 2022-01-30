<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kategoriler
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('kategori_gruplari')) selected @endif>Varsayılan</option>
                            <option value="no09" @if (Route::is('kategori_gruplari_no09')) selected @endif>No (0 - 9)</option>
                            <option value="no90" @if (Route::is('kategori_gruplari_no90')) selected @endif>No (9 - 0)</option>
                            <option value="mainAZ" @if (Route::is('kategori_gruplari_mainAZ')) selected @endif>Ana Kategori (A - Z)</option>
                            <option value="mainZA" @if (Route::is('kategori_gruplari_mainZA')) selected @endif>Ana Kategori (Z - A)</option>
                            <option value="sub1AZ" @if (Route::is('kategori_gruplari_sub1AZ')) selected @endif>1. Alt Kategori (A - Z)</option>
                            <option value="sub1ZA" @if (Route::is('kategori_gruplari_sub1ZA')) selected @endif>1. Alt Kategori (Z - A)</option>
                            <option value="sub2AZ" @if (Route::is('kategori_gruplari_sub2AZ')) selected @endif>2. Alt Kategori (A - Z)</option>
                            <option value="sub2ZA" @if (Route::is('kategori_gruplari_sub2ZA')) selected @endif>2. Alt Kategori (Z - A)</option>
                            <option value="sub3AZ" @if (Route::is('kategori_gruplari_sub3AZ')) selected @endif>3. Alt Kategori (A - Z)</option>
                            <option value="sub3ZA" @if (Route::is('kategori_gruplari_sub3ZA')) selected @endif>3. Alt Kategori (Z - A)</option>
                            <option value="sub4AZ" @if (Route::is('kategori_gruplari_sub4AZ')) selected @endif>4. Alt Kategori (A - Z)</option>
                            <option value="sub4ZA" @if (Route::is('kategori_gruplari_sub4ZA')) selected @endif>4. Alt Kategori (Z - A)</option>
                            <option value="sub5AZ" @if (Route::is('kategori_gruplari_sub5AZ')) selected @endif>5. Alt Kategori (A - Z)</option>
                            <option value="sub5ZA" @if (Route::is('kategori_gruplari_sub5ZA')) selected @endif>5. Alt Kategori (Z - A)</option>
                            <option value="linkUrlAZ" @if (Route::is('kategori_gruplari_linkUrlAZ')) selected @endif>Link Metni (A - Z)</option>
                            <option value="linkUrlZA" @if (Route::is('kategori_gruplari_linkUrlZA')) selected @endif>Link Metni (Z - A)</option>
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
                <div class="w10">
                    <span>Ana</span>
                </div>
                <div class="w10">
                    <span>1. Alt</span>
                </div>
                <div class="w10">
                    <span>2. Alt</span>
                </div>
                <div class="w10">
                    <span>3. Alt</span>
                </div>
                <div class="w10">
                    <span>4. Alt</span>
                </div>
                <div class="w10">
                    <span>5. Alt</span>
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
                    <div class="w10">
                        <span>{{ $item['no'] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['main']["name"] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub1']["name"] ?? "-" }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub2']["name"] ?? "-" }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub3']["name"] ?? "-" }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub4']["name"] ?? "-" }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub5']["name"] ?? "-" }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['link_url']["link_url"] }}</span>
                    </div>

                    <div class="actions w10">
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
