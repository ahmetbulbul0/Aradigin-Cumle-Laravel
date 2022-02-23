<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Haber Kategori Grubu Link Metni Düzenle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Haber Kategori Grubu Link Metni:</span>
                    <div class="outInputText">
                        <input type="text" name="linkUrl" value="{{ $data['data']['link_url'] }}"
                            placeholder="Haber Kategori Grubu Link Metni...">
                    </div>
                </div>
                @isset($data['errors']['name'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['link_url'] }}
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
