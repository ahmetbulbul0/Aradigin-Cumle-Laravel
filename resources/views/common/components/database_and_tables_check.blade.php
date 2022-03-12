<div class="bar">
    <div class="line title">
        <span class="title">
            Genel VeriTabanı Bilgileri
        </span>
    </div>
    <div class="line">
        <div class="outLabel">
            <label>VeriTabanı Adı:</label>
        </div>
        <div class="outSpan">
            <span>
                @if (env('DB_DATABASE'))
                    {{ env('DB_DATABASE') }}
                @else
                    -
                @endif
                <i class="fa-solid fa-circle-info gray" title="Bu Veriyi Manuel Olarak Kontrol Etmelisiniz, Değişiklik Gerekiyorsa Env Dosyanızdan Manuel Olarak Değiştirmelisiniz."></i>
            </span>
        </div>
    </div>
    <div class="line">
        <div class="outLabel">
            <label>VeriTabanı Kullanıcı Adı:</label>
        </div>
        <div class="outSpan">
            <span>
                @if (env('DB_USERNAME'))
                    {{ env('DB_USERNAME') }}
                @else
                    -
                @endif
                <i class="fa-solid fa-circle-info gray" title="Bu Veriyi Manuel Olarak Kontrol Etmelisiniz, Değişiklik Gerekiyorsa Env Dosyanızdan Manuel Olarak Değiştirmelisiniz."></i>
            </span>
        </div>
    </div>
    <div class="line">
        <div class="outLabel">
            <label>VeriTabanı Kullanıcı Parola:</label>
        </div>
        <div class="outSpan">
            <span>
                @if (env('DB_PASSWORD'))
                    {{ env('DB_PASSWORD') }}
                @else
                    -
                @endif
                <i class="fa-solid fa-circle-info gray" title="Bu Veriyi Manuel Olarak Kontrol Etmelisiniz, Değişiklik Gerekiyorsa Env Dosyanızdan Manuel Olarak Değiştirmelisiniz."></i>
            </span>
        </div>
    </div>
    <div class="line">
        <div class="outLabel">
            <label>VeriTabanı Sunucu:</label>
        </div>
        <div class="outSpan">
            <span>
                @if (env('DB_HOST'))
                    {{ env('DB_HOST') }}
                @else
                    -
                @endif
                <i class="fa-solid fa-circle-info gray" title="Bu Veriyi Manuel Olarak Kontrol Etmelisiniz, Değişiklik Gerekiyorsa Env Dosyanızdan Manuel Olarak Değiştirmelisiniz."></i>
            </span>
        </div>
    </div>
    <div class="line">
        <div class="outLabel">
            <label>VeriTabanı Port:</label>
        </div>
        <div class="outSpan">
            <span>
                @if (env('DB_PORT'))
                    {{ env('DB_PORT') }}
                @else
                    -
                @endif
                <i class="fa-solid fa-circle-info gray" title="Bu Veriyi Manuel Olarak Kontrol Etmelisiniz, Değişiklik Gerekiyorsa Env Dosyanızdan Manuel Olarak Değiştirmelisiniz."></i>
            </span>
        </div>
    </div>
    <div class="line">
        <div class="outLabel">
            <label>VeriTabanı Bağlantısı:</label>
        </div>
        <div class="outSpan">
            <span>
                @if (env('DB_CONNECTION'))
                    {{ env('DB_CONNECTION') }}
                @else
                    -
                @endif
                <i class="fa-solid fa-circle-info gray" title="Bu Veriyi Manuel Olarak Kontrol Etmelisiniz, Değişiklik Gerekiyorsa Env Dosyanızdan Manuel Olarak Değiştirmelisiniz."></i>
            </span>
        </div>
    </div>
</div>
<div class="bar">
    <div class="line title">
        <span class="title">
            Tablo Bilgileri
        </span>
    </div>
    @foreach ($data['database_tables_check']['tables'] as $table)
        <div class="line">
            <div class="outLabel">
                <label>{{ $table['name'] }} [{{ $table['dbName'] }}]:</label>
            </div>
            <div class="outSpan">
                <span>{{ $table['hasTable'] }} @switch($table["hasTable"])
                        @case('Mevcut')
                            <i class="fa-solid fa-circle-check green" title="Bu Tablo VeriTabanınızda Mevcut Ve Erişilebiliyor, Yani Sorun Yok."></i>
                        @break

                        @case('Bulunamadı')
                            <i class="fa-solid fa-circle-exclamation red" title="Bu Tablo VeriTabanınızda Yok Veya Erişilemiyor, Yani Sorun Var, Sunucunuza Ssh İle Bağlanıp Bu Komutu Çalıştırmanız Gerekmektedir '[php artisan migrate] yada [php artisan migrate:fresh]', Komutu Çalıştırdıktan Sonra Tekrar Kontrol Edilmesi İçin Sayfayı Yenilemelisiniz."></i>
                        @break
                    @endswitch
                </span>
            </div>
        </div>
    @endforeach
</div>
