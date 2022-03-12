<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                {{ $data["page_title"] }}
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Ana Kategori:</span>
                    <div class="outSelectBox">
                        <select name="main">
                            <option selected value="default" disabled>Ana Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ Str::title($category['name']) }}</option>
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
                            <option selected value="default">1. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ Str::title($category['name']) }}</option>
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
                            <option selected value="default">2. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ Str::title($category['name']) }}</option>
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
                            <option selected value="default">3. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ Str::title($category['name']) }}</option>
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
                            <option selected value="default">4. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ Str::title($category['name']) }}</option>
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
                            <option selected value="default">5. Alt Kategoriyi Seç</option>
                            @foreach ($data['categories'] as $category)
                                <option value="{{ $category['no'] }}">{{ Str::title($category['name']) }}</option>
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
