<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kaynak Linkler
            </div>
            <div class="titleSelects">
                <div class="listingTypeSelect">
                    <form method="POST" class="outSelectBox">
                        @csrf
                        <select name="listingType" onchange="if(this.value != 0) { this.form.submit(); }">
                            <option value="default" @if (Route::is('kaynak_siteleri')) selected @endif>Varsayılan
                            </option>
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
                <div class="w30">
                    <span>Haber</span>
                </div>
                <div class="20">
                    <span>Platform</span>
                </div>
                <div class="w30">
                    <span>Url</span>
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
                    <div class="w30">
                        <span>{{ $item['news_no']['content'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['resource_platform']['name'] }}</span>
                    </div>
                    <div class="w30">
                        <span>{{ $item['url'] }}</span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="/sistem-paneli/kaynak-linki/düzenle/{{ $item['no'] }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kaynak-linki/sil/{{ $item['no'] }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
