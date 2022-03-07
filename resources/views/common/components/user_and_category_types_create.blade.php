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
                        Mevcut <i class="fa-solid fa-circle-check green"></i>
                    @else
                        Tanımlanmamış <i class="fa-solid fa-circle-exclamation red"></i>
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
                        Mevcut <i class="fa-solid fa-circle-check green"></i>
                    @else
                        Tanımlanmamış <i class="fa-solid fa-circle-exclamation red"></i>
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
