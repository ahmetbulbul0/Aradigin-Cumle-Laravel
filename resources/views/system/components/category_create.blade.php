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
                    <span class="inputLabel">Kategori Adı:</span>
                    <div class="outInputText">
                        <input type="text" name="name" placeholder="Kategori Adı...">
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
                    <span class="inputLabel">Kategori Tipi:</span>
                    <div class="outSelectBox">
                        <select name="type">
                            <option selected disabled>Kategori Tipi Seç</option>
                            @foreach ($data['categoryTypes'] as $categoryTypes)
                                <option value="{{ $categoryTypes['no'] }}">{{ Str::title($categoryTypes['name']) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['type'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['type'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Ana Kategori:</span>
                    <div class="outSelectBox">
                        <select name="mainCategory">
                            <option value="default" selected>Ana Kategoriyi Seç (Alt Kategori Ekliyorsanız)</option>
                            @foreach ($data['categories'] as $categories)
                                <option value="{{ $categories['no'] }}">{{ Str::title($categories['name']) }}
                                </option>
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
