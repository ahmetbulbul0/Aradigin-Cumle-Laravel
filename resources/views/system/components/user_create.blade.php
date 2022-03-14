<div class="outBigForm">
    <div class="inBigForm">
        <div class="outBigFormTitle">
            <span class="inBigFormTitle">
                {{ $data['page_title'] }}
            </span>
        </div>
        <div class="outBigFormContent">
            <form class="inBigFormContent" method="POST">
                <div class="line">
                    <span class="inputLabel">Tam Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="fullName" placeholder="Tam Adı...">
                    </div>
                </div>
                @isset($data['errors']['fullName'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['fullName'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Kullanıcı Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="username" placeholder="Kullanıcı Adı...">
                    </div>
                </div>
                @isset($data['errors']['username'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['username'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Parola:</span>
                    <div class="outInputText">
                        <input type="text" name="password" placeholder="Parola...">
                    </div>
                </div>
                @isset($data['errors']['password'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['password'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Kullanıcı Tipi:</span>
                    <div class="outSelectBox">
                        <select name="type">
                            <option selected disabled>Kullanıcı Tipi Seç</option>
                            @foreach ($data['userTypes'] as $userType)
                                <option value="{{ $userType['no'] }}">{{ Str::title($userType['name']) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['type'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['type'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                @isset($data['errors']['user_no'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                Kullanıcı Ayarı Oluşturulurken Bir Hata Meydana Geldi: {{ $data['errors']['user_no'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                @csrf
                <div class="line">
                    <div class="outSubmitBox">
                        <button>
                            İşlemi Tamamla
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
