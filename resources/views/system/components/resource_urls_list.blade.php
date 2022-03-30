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
                            <option value="default" @if (Route::is('kaynak_linkler')) selected @endif>Varsayılan</option>
                            <option value="no09" @if (Route::is('kaynak_linkler_no09')) selected @endif>No (0 - 9)</option>
                            <option value="no90" @if (Route::is('kaynak_linkler_no90')) selected @endif>No (9 - 0)</option>
                            <option value="newsAZ" @if (Route::is('kaynak_linkler_newsAZ')) selected @endif>Haber (A - Z)</option>
                            <option value="newsZA" @if (Route::is('kaynak_linkler_newsZA')) selected @endif>Haber (Z - A)</option>
                            <option value="resourcePlatformAZ" @if (Route::is('kaynak_linkler_resourcePlatformAZ')) selected @endif>Kaynak Platform (A - Z)</option>
                            <option value="resourcePlatformZA" @if (Route::is('kaynak_linkler_resourcePlatformZA')) selected @endif>Kaynak Platform (Z - A)</option>
                            <option value="urlAZ" @if (Route::is('kaynak_linkler_urlAZ')) selected @endif>Url (A - Z)</option>
                            <option value="urlZA" @if (Route::is('kaynak_linkler_urlZA')) selected @endif>Url (Z - A)</option>
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
                <div class="w20">
                    <span>Platform</span>
                </div>
                <div class="w30">
                    <span>Url</span>
                </div>
                <div class="w10">
                    <span>İşlem</span>
                </div>
            </div>
            @if ($data['data'])
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
                                <a href="{{ route('kaynak_linki_düzenle', $item['no']) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('kaynak_linki_sil', $item['no']) }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
