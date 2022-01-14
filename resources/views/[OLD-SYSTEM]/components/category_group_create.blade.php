<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kategori Grubu Ekle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Ana Kategori:</span>
                    <div class="outSelectBox">
                        <select name="mainCategory">
                            <option selected disabled>Ana Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ $category['name'] }}</option>
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
                <div class="line">
                    <span class="inputLabel">1. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub1Category">
                            <option selected disabled>1. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub1Category'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub1Category'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">2. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub2Category">
                            <option selected disabled>2. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub2Category'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub2Category'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">3. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub3Category">
                            <option selected disabled>3. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub3Category'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub3Category'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">4. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub4Category">
                            <option selected disabled>4. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub4Category'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub4Category'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">5. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub5Category">
                            <option selected disabled>5. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub5Category'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub5Category'] }}
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
                @isset($data['errors']['categoryGroup'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['categoryGroup'] }}
                            </span>
                        </div>
                    </div>
                @endisset
            </form>
        </div>
    </div>
</div>
