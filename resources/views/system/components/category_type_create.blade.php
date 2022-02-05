<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kategori Tipi Ekle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Kategori Tipi Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="name" placeholder="Kategori Tipi adı...">
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
