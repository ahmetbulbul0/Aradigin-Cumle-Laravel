<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kullanıcı Tipi Ekle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Kullanıcı Tipi Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="userTypeName" placeholder="Kullanıcı Tipi Adı...">
                    </div>

                </div>
                @isset($data['errors']['userTypeName'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['userTypeName'] }}
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
