<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kullanıcı Tipi Düzenle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Kullanıcı Tipi Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="name" value="{{ $data['data']['name'] }}"
                            placeholder="Kullanıcı Tipi Adı...">
                    </div>
                </div>
                @isset($data['errors']['name'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['name'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <input type="hidden" name="no" value="{{ $data['data']['no'] }}">
                @isset($data['errors']['no'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['no'] }}
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
