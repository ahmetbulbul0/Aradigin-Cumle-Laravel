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
                    <span class="inputLabel">Kaynak Site Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="name" placeholder="Kaynak Site Adı...">
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
                    <span class="inputLabel">Kaynak Site Url:</span>
                    <div class="outInputText">
                        <input type="text" name="mainUrl" placeholder="Kaynak Site Linki...">
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
                @isset($data['errors']['resourcePlatform'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['resourcePlatform'] }}
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
