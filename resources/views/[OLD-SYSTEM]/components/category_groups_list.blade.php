<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kategoriler
            </div>
        </div>
        <div class="dbList">
            <div class="titleLine">
                <div class="w10">
                    <span>No</span>
                </div>
                <div class="w10">
                    <span>Ana</span>
                </div>
                <div class="w10">
                    <span>1. Alt</span>
                </div>
                <div class="w10">
                    <span>2. Alt</span>
                </div>
                <div class="w10">
                    <span>3. Alt</span>
                </div>
                <div class="w10">
                    <span>4. Alt</span>
                </div>
                <div class="w10">
                    <span>5. Alt</span>
                </div>
                <div class="w20">
                    <span>Link</span>
                </div>
                <div class="w10">
                    <span>İşlem</span>
                </div>
            </div>
            @foreach ($data['data'] as $item)
                <div class="line">
                    <div class="w10">
                        <span>{{ $item['no'] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['main']["name"] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub1']["name"] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub2']["name"] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub3']["name"] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub4']["name"] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['sub5']["name"] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['link_url']["link_url"] }}</span>
                    </div>

                    <div class="actions w10">
                        <span>
                            <a href="/sistem-paneli/kategori-tipi/{{ $item['no'] }}/düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kategori-tipi/{{ $item['no'] }}/sil">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
