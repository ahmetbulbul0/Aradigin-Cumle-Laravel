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
                            <option value="default" @if (Route::is('ziyaretciler')) selected @endif>Varsayılan </option>
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
                    <span>İp</span>
                </div>
                <div class="w50">
                    <span>Tarayıcı</span>
                </div>
                <div class="w15">
                    <span>Son Giriş Tarihi</span>
                </div>
                <div class="w10">
                    <span>WebSite Tema</span>
                </div>
                <div class="w5">
                    <span>İşlem</span>
                </div>
            </div>
            @if ($data['data'])
                @foreach ($data['data'] as $item)
                    <div class="line @if ($item['is_banned'] == true) banned @endif">
                        <div class="w10">
                            <span>{{ $item['no'] }}</span>
                        </div>
                        <div class="w10">
                            <span>{{ $item['ip'] }}</span>
                        </div>
                        <div class="w50">
                            <span>{{ $item['browser'] }}</span>
                        </div>
                        <div class="w15">
                            <span>{{ $item['last_login_time']['text'] }}</span>
                        </div>
                        <div class="w10">
                            <span>{{ $item['website_theme'] }}</span>
                        </div>
                        <div class="actions w5">
                            <span>
                                @if ($item['is_banned'] == true)
                                    <a href="{{ route('ziyaretci_yasak_kaldir', $item['no']) }}">
                                        <i class="fas fa-eye-slash"></i>
                                    </a>
                                @endif
                                @if ($item['is_banned'] == false)
                                    <a href="{{ route('ziyaretci_yasakla', $item['no']) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
