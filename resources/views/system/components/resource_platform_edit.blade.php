<div class="outBigForm">
    <div class="inBigForm">
        <div class="outBigFormTitle">
            <span class="inBigFormTitle">
                Kaynak Site Düzenle
            </span>
        </div>
        <div class="outBigFormContent">
            <form class="inBigFormContent" method="POST">
                <div class="line">
                    <span class="inputLabel">Kaynak Site Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="name" value="{{ $data['data']['name'] }}"
                            placeholder="Kaynak Site adı...">
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
                <div class="line">
                    <span class="inputLabel">Site Linki:</span>
                    <div class="outInputText">
                        <input type="text" name="mainUrl" value="{{ $data['data']['main_url'] }}"
                            placeholder="Kaynak Site adı...">
                    </div>
                </div>
                @isset($data['errors']['mainUrl'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['mainUrl'] }}
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
