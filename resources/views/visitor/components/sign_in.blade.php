<div class="outSignIn">
    <div class="inSignIn">
        <div class="outTitle">
            <div class="inTitle">
                Yazar Girişi
            </div>
        </div>
        <form class="signInForm" method="POST">
            <div class="formLine">
                <label>Hesap Numaranız: </label>
                <div class="outInputText">
                    <input type="text" placeholder="Yazar Hesap Numaranızı Giriniz" name="no" @if (!empty($data["data"]['no'])) value="{{ $data["data"]['no'] }}" @endif>
                </div>
            </div>
            @isset($data['errors']['no'])
                <div class="formLine">
                    <div class="outErrorBox">
                        <span>
                            {{ $data['errors']['no'] }}
                        </span>
                    </div>
                </div>
            @endisset
            <div class="formLine">
                <label>Hesap Parolanız: </label>
                <div class="outInputText">
                    <input type="password" placeholder="Yazar Hesap Parolanızı Giriniz" name="password">
                </div>
            </div>
            @isset($data['errors']['password'])
                <div class="formLine">
                    <div class="outErrorBox">
                        <span>
                            {{ $data['errors']['password'] }}
                        </span>
                    </div>
                </div>
            @endisset
            @isset($data['errors']['signIn'])
                <div class="formLine">
                    <div class="outErrorBox">
                        <span>
                            {{ $data['errors']['signIn'] }}
                        </span>
                    </div>
                </div>
            @endisset
            @csrf
            <div class="formLine">
                <div class="outButtonBox">
                    <button>Giriş Yap</button>
                </div>
            </div>
        </form>
    </div>
</div>
