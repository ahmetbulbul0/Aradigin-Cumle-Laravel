<div class="outSettings">
    <div class="inSettings">
        <div class="outSettingsMenu">
            <div class="outTitle">
                <div class="inTitle">
                    Ayarlar
                </div>
            </div>
            <div class="inSettingsMenu">
                <div class="outSettingsMenuItem active">
                    <a href="{{ route('yazar_paneli_ayarlar_profilim') }}" class="inSettingsMenuItem">Profilim</a>
                </div>
                <div class="outSettingsMenuItem">
                    <a href="{{ route('yazar_paneli_ayarlar_tema') }}" class="inSettingsMenuItem">Tema</a>
                </div>
            </div>
        </div>
        <div class="outSettingsContent">
            <div class="outTitle">
                <div class="inTitle">
                    Profilim
                </div>
            </div>
            <div class="inSettingsContent">
                <div class="line">
                    <div class="notChangeOneValue">
                        <label>No:</label>
                        <span>#{{ $data['user_data']['no'] }}</span>
                    </div>
                </div>

                <div class="line">
                    <div class="changingOneValue" id="usernameChangedValue">
                        <label>Kullanıcı Adı:</label>
                        <span>{{ $data['user_data']['username'] }}</span>
                    </div>

                    <form method="POST" class="changingForm" id="usernameChangingForm">
                        <div class="changingInput">
                            <div class="label">
                                <label>Kullanıcı Adı:</label>
                            </div>
                            <div class="outInputText">
                                <input type="text" name="username" value="{{ $data['user_data']['username'] }}">
                            </div>
                        </div>
                        @csrf
                        <div class="changingActions">
                            <button>Kullanılabilirliği Denetle</button>
                            <button>Değiştir</button>
                            <button id="usernameChangingCancel">İptal</button>
                        </div>
                    </form>

                    <div class="changeLink" id="usernameChangingOpen">
                        <span>değiştir</span>
                    </div>
                </div>

                <div class="line">
                    <div class="changingOneValue" id="fullNameChangedValue">
                        <label>Tam Adı:</label>
                        <span>{{ $data['user_data']['full_name'] }}</span>
                    </div>

                    <form method="POST" class="changingForm" id="fullNameChangingForm">
                        <div class="changingInput">
                            <div class="label">
                                <label>Tam Adı:</label>
                            </div>
                            <div class="outInputText">
                                <input type="text" name="fullName" value="{{ $data['user_data']['full_name'] }}">
                            </div>
                        </div>
                        @csrf
                        <div class="changingActions">
                            <button>Değiştir</button>
                            <button id="fullNameChangingCancel">İptal</button>
                        </div>
                    </form>

                    <div class="changeLink" id="fullNameChangingOpen">
                        <span>değiştir</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('src/js/settings_my_account.js') }}"></script>
