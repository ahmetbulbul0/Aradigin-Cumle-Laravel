<div class="bar">
    <div class="line title">
        <span class="title">
            Sistem Kullanıcısı Kontrölü
        </span>
    </div>
    <div class="line">
        <div class="outLabel">
            <label>Sistem Kullanıcısı:</label>
        </div>
        <div class="outSpan">
            <span>
                @if ($data['system_user']['hasSystemUser'])
                    Mevcut <i class="fa-solid fa-circle-check green"></i>
                @else
                    Tanımlanmamış <i class="fa-solid fa-circle-exclamation red"></i>
                @endif
            </span>
        </div>
    </div>
</div>
@if (!$data['system_user']['hasSystemUser'])
    <form method="POST" action="{{ route('api_website_kurulum_asama_3') }}" class="bar">
        <div class="line title">
            <span class="title">
                Sistem Kullanıcısı Oluştur
            </span>
        </div>
        <div class="line labelWithInputText">
            <div class="outLabel">
                <label>Sistem Kullanıcı Tam Adı:</label>
            </div>
            <div class="outInputText">
                <input type="text" name="systemUserFullName">
            </div>
        </div>
        <div class="line labelWithInputText">
            <div class="outLabel">
                <label>Sistem Kullanıcı Adı:</label>
            </div>
            <div class="outInputText">
                <input type="text" name="systemUserName">
            </div>
        </div>
        <div class="line labelWithInputText">
            <div class="outLabel">
                <label>Sistem Kullanıcı Parola:</label>
            </div>
            <div class="outInputText">
                <input type="text" name="systemUserPassword">
            </div>
        </div>
        @csrf
        <div class="line oneButton">
            <div class="outButton">
                <button name="actionType" value="systemUserCreate">Oluştur</button>
            </div>
        </div>
    </form>
@endif
@if ($data['system_user']['hasSystemUser'])
    <div class="bar">
        <div class="line title">
            <span class="title">
                Sistem Kullanıcısı Bilgileri
            </span>
        </div>
        <div class="line">
            <div class="outLabel">
                <label>Sistem Kullanıcı No:</label>
            </div>
            <div class="outSpan">
                <span>
                    {{ $data['system_user']['hasSystemUser']['no'] }}
                </span>
            </div>
        </div>
        <div class="line">
            <div class="outLabel">
                <label>Sistem Kullanıcı Tam Adı:</label>
            </div>
            <div class="outSpan">
                <span>
                    {{ $data['system_user']['hasSystemUser']['full_name'] }}
                </span>
            </div>
        </div>
        <div class="line">
            <div class="outLabel">
                <label>Sistem Kullanıcı Adı:</label>
            </div>
            <div class="outSpan">
                <span>
                    {{ $data['system_user']['hasSystemUser']['username'] }}
                </span>
            </div>
        </div>
        <div class="line">
            <div class="outLabel">
                <label>Sistem Kullanıcı Parola:</label>
            </div>
            <div class="outSpan">
                <span>
                    {{ $data['system_user']['hasSystemUser']['password'] }}
                </span>
            </div>
        </div>
    </div>
@endif
