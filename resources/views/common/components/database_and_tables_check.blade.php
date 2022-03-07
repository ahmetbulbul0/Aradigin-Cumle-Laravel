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
                            <i class="fa-solid fa-circle-check green"></i>
                        @break

                        @case('Bulunamadı')
                            <i class="fa-solid fa-circle-exclamation red"></i>
                        @break
                    @endswitch
                </span>
            </div>
        </div>
    @endforeach
</div>
