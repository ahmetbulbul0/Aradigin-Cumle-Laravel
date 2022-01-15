<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kaynak Site Ekle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Kaynak Site Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="resourceName" placeholder="Kaynak Site adı...">
                    </div>
                </div>
                @isset($data['errors']['resourceName'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['resourceName'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Kaynak Site Url:</span>
                    <div class="outInputText">
                        <input type="text" name="resourceUrl" placeholder="Kaynak Site url...">
                    </div>
                </div>
                @isset($data['errors']['resourceUrl'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['resourceUrl'] }}
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
