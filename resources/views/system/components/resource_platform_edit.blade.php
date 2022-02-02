<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kaynak Site Düzenle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
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
                <div class="line">
                    <span class="inputLabel">Link Metni:</span>
                    <div class="outInputText">
                        <input type="text" name="linkUrl" value="{{ $data['data']['link_url'] }}"
                            placeholder="Kaynak Site url...">
                    </div>
                </div>
                @isset($data['errors']['linkUrl'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['linkUrl'] }}
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
