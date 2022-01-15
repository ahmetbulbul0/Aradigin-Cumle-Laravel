<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kullanıcı Ekle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Tam Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="userFullName" placeholder="Tam Adı...">
                    </div>
                </div>
                @isset($data['errors']['userFullName'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['userType'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Kullanıcı Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="userName" placeholder="Kullanıcı Adı...">
                    </div>
                </div>
                @isset($data['errors']['userName'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['userName'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Parola:</span>
                    <div class="outInputText">
                        <input type="text" name="userPassword" placeholder="Parola...">
                    </div>
                </div>
                @isset($data['errors']['userPassword'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['userPassword'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Kullanıcı Tipi:</span>
                    <div class="outSelectBox">
                        <select name="userType">
                            <option selected disabled>Kullanıcı Tipi Seç</option>
                            @foreach ($data['userTypes'] as $userType)
                                <option value="{{ $userType['no'] }}">{{ $userType['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['userType'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['userType'] }}
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
