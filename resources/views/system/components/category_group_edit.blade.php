<div class="outBigForm">
    <div class="inBigForm">
        <div class="outBigFormTitle">
            <span class="inBigFormTitle">
                Kategori Grubu Düzenle
            </span>
        </div>
        <div class="outBigFormContent">
            <form class="inBigFormContent" method="POST">
                <div class="line">
                    <span class="inputLabel">Ana Kategori:</span>
                    <div class="outSelectBox">
                        <select name="main">
                            <option disabled>Ana Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}"
                                @if ($category['no'] == $data['data']['main']["no"]) selected @endif>
                                    {{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['main'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['main'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">1. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub1">
                            <option value="null" @empty($data['data']['sub1']) selected @endempty>1. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}" @isset($data['data']['sub1']) @if ($category['no'] == $data['data']['sub1']["no"]) selected @endif @endisset>{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub1'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub1'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">2. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub2">
                            <option value="null" @empty($data['data']['sub2']) selected @endempty>2. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}" @isset($data['data']['sub2']) @if ($category['no'] == $data['data']['sub2']["no"]) selected @endif @endisset>{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub2'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub2'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">3. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub3">
                            <option value="null" @empty($data['data']['sub3']) selected @endempty>3. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}" @isset($data['data']['sub3']) @if ($category['no'] == $data['data']['sub3']["no"]) selected @endif @endisset>{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub3'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub3'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">4. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub4">
                            <option value="null" @empty($data['data']['sub4']) selected @endempty>4. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}" @isset($data['data']['sub4']) @if ($category['no'] == $data['data']['sub4']["no"]) selected @endif @endisset>{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub4'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub4'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">5. Alt Kategori:</span>
                    <div class="outSelectBox">
                        <select name="sub5">
                            <option value="null" @empty($data['data']['sub5']) selected @endempty>5. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}" @isset($data['data']['sub5']) @if ($category['no'] == $data['data']['sub5']["no"]) selected @endif @endisset>{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['sub5'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['sub5'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                @isset($data['errors']['categoryGroup'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['categoryGroup'] }}
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
