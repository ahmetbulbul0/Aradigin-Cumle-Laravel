<div class="bar">
    <div class="line title">
        <span class="title">
            Kullanıcı Ve Kategori Tipi Bilgileri (Sabitler)
        </span>
    </div>
    @foreach ($data['user_and_category_types_create']['constants']['userTypes'] as $constant)
        <div class="line @if (!$constant['value']) spanWithAction @endif">
            <div class="outLabel">
                <label>{{ $constant['name'] }}:</label>
            </div>
            <div class="outSpan">
                <span>
                    @if ($constant['value'])
                        Mevcut <i class="fa-solid fa-circle-check green" title="Bu Değer Hem Oluşturulmuş Hemde Tanımlanmış, Yani Sorun Yok, Tüm Değerler Mevcut İse İlerleyebilirsiniz"></i>
                    @else
                        Tanımlanmamış <i class="fa-solid fa-circle-exclamation red" title="Bu Değer Ya Oluşturulmamış Yada Tanımlanmamış, Oluştur Ve Tanımla Butonu Sayesinde Hızlı BirŞekilde Bu Değeri Oluşturup Sabitlerinize Tanımlayabilirsiniz, Bunu Yapmadan İlerlerseniz Sistem Çalışmaz."></i>
                    @endif
                </span>
            </div>
            @if (!$constant['value'])
                <form action="{{ route('api_website_kurulum_asama_2') }}" class="outButton" method="POST">
                    @csrf
                    <button name="actionType" value="{{ $constant['create'] }}">Oluştur Ve Tanımla</button>
                </form>
            @endif
        </div>
    @endforeach
</div>
<div class="bar">
    <div class="line title">
        <span class="title">
            Kategori Tipi Bilgileri (Sabitler)
        </span>
    </div>
    @foreach ($data['user_and_category_types_create']['constants']['categoryTypes'] as $constant)
        <div class="line @if (!$constant['value']) spanWithAction @endif">
            <div class="outLabel">
                <label>{{ $constant['name'] }}:</label>
            </div>
            <div class="outSpan">
                <span>
                    @if ($constant['value'])
                        Mevcut <i class="fa-solid fa-circle-check green" title="Bu Değer Hem Oluşturulmuş Hemde Tanımlanmış, Yani Sorun Yok, Tüm Değerler Mevcut İse İlerleyebilirsiniz"></i>
                    @else
                        Tanımlanmamış <i class="fa-solid fa-circle-exclamation red" title="Bu Değer Ya Oluşturulmamış Yada Tanımlanmamış, Oluştur Ve Tanımla Butonu Sayesinde Hızlı BirŞekilde Bu Değeri Oluşturup Sabitlerinize Tanımlayabilirsiniz, Bunu Yapmadan İlerlerseniz Sistem Çalışmaz."></i>
                    @endif
                </span>
            </div>
            @if (!$constant['value'])
                <form action="{{ route('api_website_kurulum_asama_2') }}" class="outButton" method="POST">
                    @csrf
                    <button name="actionType" value="{{ $constant['create'] }}">Oluştur Ve Tanımla</button>
                </form>
            @endif
        </div>
    @endforeach
</div>
