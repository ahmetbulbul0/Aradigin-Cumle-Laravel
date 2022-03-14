<div class="outBigForm">
    <div class="inBigForm">
        <div class="outBigFormTitle">
            <span class="inBigFormTitle">
                Haber Düzenle
            </span>
        </div>
        <div class="outBigFormContent">
            <form class="inBigFormContent" method="POST">
                <div class="line">
                    <span class="inputLabel">Haber İçerik:</span>
                    <div class="outInputText">
                        <input type="text" name="content" value="{{ $data['data']['content'] }}"
                            placeholder="Haber adı...">
                    </div>
                </div>
                @isset($data['errors']['content'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['content'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Haber Kategori:</span>
                    <div class="outSelectBox">
                        <select name="category">
                            <option selected disabled>Kategori Seç</option>
                            @foreach ($data['categoryGroups'] as $category)
                                <option value="{{ $category['no'] }}" @if ($category['no'] == $data['data']['category']['no']) selected @endif>
                                    #{{ $category['main']['name'] }}
                                    @isset($category['sub1']['name'])
                                        #{{ $category['sub1']['name'] }}
                                    @endisset
                                    @isset($category['sub2']['name'])
                                        #{{ $category['sub2']['name'] }}
                                    @endisset
                                    @isset($category['sub3']['name'])
                                        #{{ $category['sub3']['name'] }}
                                    @endisset
                                    @isset($category['sub4']['name'])
                                        #{{ $category['sub4']['name'] }}
                                    @endisset
                                    @isset($category['sub5']['name'])
                                        #{{ $category['sub5']['name'] }}
                                    @endisset
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['category'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['category'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Yayın Tarihi:</span>
                    <div class="outRadioBox" id="outRadioBox">
                        <label>
                            Şimdi Yayınla
                            <input type="radio" name="publishDate" value="now">
                        </label>
                        <label>
                            Taslak Bırak
                            <input type="radio" name="publishDate" value="task">
                        </label>
                        <label class="strong" id="openDateAndTimeBoxBtn">
                            Tarih Seç
                            <input type="radio" name="publishDate" value="specialDate" checked>
                        </label>
                    </div>
                    <div class="outDateAndTimeBox" id="outDateAndTimeBox">
                        <input type="date" name="speDate" value="{{ date("Y-m-d", $data["data"]["publish_date"]) }}">
                        <input type="time" name="speTime" value="{{ date("H:i", $data["data"]["publish_date"]) }}">
                        <span class="turnBack" id="closeDateAndTimeBoxBtn">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                </div>
                @isset($data['errors']['publishDate'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['publishDate'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                @isset($data['errors']['speDate'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['speDate'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                @isset($data['errors']['speTime'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['speTime'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Haber Kaynağı:</span>
                    <div class="outSelectBox">
                        <select name="resourcePlatform">
                            <option selected disabled>Kaynak Site Seç</option>
                            @foreach ($data['resourcePlatforms'] as $resource)
                                <option value="{{ $resource['no'] }}" @if ($resource['no'] == $data['data']['resource_platform']['no']) selected @endif>
                                    {{ $resource['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['resourcePlatform'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['resourcePlatform'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Haber Kaynak Linki:</span>
                    <div class="outInputText">
                        <input type="text" name="resourceUrl" value="{{ $data['data']['resource_url']['url'] }}"
                            placeholder="Haber Kaynak Linki...">
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
                <div class="line">
                    <span class="inputLabel">Haber Url Metni:</span>
                    <div class="outInputText">
                        <input type="text" name="linkUrl" value="{{ $data['data']['link_url'] }}"
                            placeholder="Haber Url Metni...">
                    </div>
                </div>
                @isset($data['errors']['linkurl'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['linkUrl'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                @isset($data['errors']['author'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['author'] }}
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
<script src="{{ URL::asset('src/js/news_create.js') }}"></script>
