<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kullanıcı Hesapları
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('kullanicilar')) selected @endif>Varsayılan</option>
                            <option value="no09" @if (Route::is('kullanicilar_no09')) selected @endif>No (0 - 9)</option>
                            <option value="no90" @if (Route::is('kullanicilar_no90')) selected @endif>No (9 - 0)</option>
                            <option value="fullNameAZ" @if (Route::is('kullanicilar_fullNameAZ')) selected @endif>Tam Ad (A - Z)</option>
                            <option value="fullNameZA" @if (Route::is('kullanicilar_fullNameZA')) selected @endif>Tam Ad (Z - A)</option>
                            <option value="usernameAZ" @if (Route::is('kullanicilar_usernameAZ')) selected @endif>Kullanıcı Adı (A - Z)</option>
                            <option value="usernameZA" @if (Route::is('kullanicilar_usernameZA')) selected @endif>Kullanıcı Adı (Z - A)</option>
                            <option value="typeAZ" @if (Route::is('kullanicilar_typeAZ')) selected @endif>Tip (A - Z)</option>
                            <option value="typeZA" @if (Route::is('kullanicilar_typeZA')) selected @endif>Tip (Z - A)</option>
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
                    <span>Tam Adı</span>
                </div>
                <div class="w20">
                    <span>Kullanıcı Adı</span>
                </div>
                <div class="w20">
                    <span>rİP</span>
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
                        <span>{{ $item['full_name'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['username'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['type']['name'] }}</span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="/sistem-paneli/kullanici-hesabi/{{ $item['no'] }}/düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kullanici-hesabi/{{ $item['no'] }}/sil">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
