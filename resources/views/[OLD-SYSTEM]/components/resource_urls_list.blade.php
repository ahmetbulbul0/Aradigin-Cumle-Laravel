<div class="outDbList">
    <div class="inDbList">
        <div class="outTitle">
            <div class="inTitle">
                Kaynak Linkler
            </div>
        </div>
        <div class="dbList">
            <div class="titleLine">
                <div class="w15">
                    <span>No</span>
                </div>
                <div class="w30">
                    <span>Haber</span>
                </div>
                <div class="w15">
                    <span>Platform</span>
                </div>
                <div class="w30">
                    <span>Url</span>
                </div>
                <div class="w10">
                    <span>İşlem</span>
                </div>
            </div>
            @foreach ($data['data'] as $item)
                <div class="line">
                    <div class="w15">
                        <span>{{ $item['no'] }}</span>
                    </div>
                    <div class="w30">
                        <span>{{ $item['news_no']["content"] }}</span>
                    </div>
                    <div class="w15">
                        <span>{{ $item['resource_platform']["name"] }}</span>
                    </div>
                    <div class="w30">
                        <span>{{ $item['url'] }}</span>
                    </div>
                    <div class="actions w10">
                        <span>
                            <a href="/sistem-paneli/kullanici-hesabi/{{ $item['no'] }}/düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/sistem-paneli/kullanici-hesabi/{{ $item['no'] }}/sil">
                                <i class="fas fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
