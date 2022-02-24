<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kullanıcı Ayarları
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('kullanici_ayarlari')) selected @endif>Varsayılan</option>
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
                            @endempty</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['dashboard_theme'] }} @empty($item['dashboard_theme'])
                                -
                            @endempty</span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="/sistem-paneli/kullanici-ayari/düzenle/{{ $item['no'] }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kullanici-ayari/sil/{{ $item['no'] }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
