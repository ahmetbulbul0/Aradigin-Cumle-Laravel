<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kullanıcı Hesapları
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
                    <span>Site Linki</span>
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
                    <div class="w20">
                        <span>{{ $item['no'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['name'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['main_url'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['link_url'] }}</span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="/sistem-paneli/kaynak-site/{{ $item['no'] }}/düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kaynak-site/{{ $item['no'] }}/sil">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
