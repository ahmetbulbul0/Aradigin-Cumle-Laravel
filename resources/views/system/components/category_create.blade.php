<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kategori Ekle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Kategori Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="categoryName" placeholder="Kategori adı...">
                    </div>
                </div>
                @isset($data['errors']['categoryName'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['categoryName'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Kategori Tipi:</span>
                    <div class="outSelectBox">
                        <select name="categoryType">
                            <option selected disabled>Kategori Tipi Seç</option>
                            @foreach ($data['categoryTypes'] as $categoryTypes)
                                <option value="{{ $categoryTypes['no'] }}">{{ $categoryTypes['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['categoryType'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['categoryType'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Ana Kategori:</span>
                    <div class="outSelectBox">
                        <select name="mainCategory">
                            <option value="default" selected disabled>Ana Kategoriyi Seç (Alt Kategori Ekliyorsanız)</option>
                            @foreach ($data['categories'] as $categories)
                                <option value="{{ $categories['no'] }}">{{ $categories['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['mainCategory'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['mainCategory'] }}
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
