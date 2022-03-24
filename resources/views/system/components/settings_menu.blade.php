<div class="outSettingsMenu"> 
    <div class="outTitle">
        <div class="inTitle">
            Ayarlar
        </div>
    </div>
    <div class="inSettingsMenu mobile">
        <div class="outSettingsMenuItem">
            <span>
                <i class="fas fa-ellipsis-v settingsMobilMenuBtn"></i>
            </span>
        </div>
    </div>
    <div class="inSettingsMenu desktop">
        <div class="outSettingsMenuItem @if (Route::is('sistem_paneli_ayarlar_profilim')) active @endif">
            <a href="{{ route('sistem_paneli_ayarlar_profilim') }}" class="inSettingsMenuItem">Profilim</a>
        </div>
        <div class="outSettingsMenuItem @if (Route::is('sistem_paneli_ayarlar_tema')) active @endif">
            <a href="{{ route('sistem_paneli_ayarlar_tema') }}" class="inSettingsMenuItem">Tema</a>
        </div>
        <div class="outSettingsMenuItem @if (Route::is('ayarlar_sabitler')) active @endif">
            <a href="{{ route('ayarlar_sabitler') }}" class="inSettingsMenuItem">Sabitler</a>
        </div>
    </div>
</div>
<div class="outSettingsMobilMenu">
    <div class="inSettingsMobilMenu">
        <div class="outSettingsMenuItem @if (Route::is('sistem_paneli_ayarlar_profilim')) active @endif">
            <a href="{{ route('sistem_paneli_ayarlar_profilim') }}" class="inSettingsMenuItem">Profilim</a>
        </div>
        <div class="outSettingsMenuItem @if (Route::is('sistem_paneli_ayarlar_tema')) active @endif">
            <a href="{{ route('sistem_paneli_ayarlar_tema') }}" class="inSettingsMenuItem">Tema</a>
        </div>
        <div class="outSettingsMenuItem @if (Route::is('ayarlar_sabitler')) active @endif">
            <a href="{{ route('ayarlar_sabitler') }}" class="inSettingsMenuItem">Sabitler</a>
        </div>
    </div>
</div>
<script src="{{ URL::asset('src/js/settings_menu_mobil.js') }}"></script>