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
                        <input type="text" name="name" placeholder="Kaynak Site adı...">
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
                        <input type="text" name="main_url" placeholder="Kaynak Site url...">
                    </div>
                </div>
                @isset($data['errors']['main_url'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['main_url'] }}
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
