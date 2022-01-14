<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kategoriler
            </div>
        </div>
        <div class="dbList">
            <div class="titleLine">
                <div class="w20">
                    <span>No</span>
                </div>
                <div class="w20">
                    <span>Adı</span>
                </div>
                <div class="w20">
                    <span>Tipi</span>
                </div>
                <div class="w20">
                    <span>Ana Kategori</span>
                </div>
                <div class="w20">
                    <span>İşlem</span>
                </div>
            </div>
            @foreach ($data['data'] as $item)
                <div class="line">
                    <div class="w20">
                        <span>{{ $item['no'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['name'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['type']["name"] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['main_category']["name"] ?? "-" }}</span>
                    </div>
                    <div class="actions w20">
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
