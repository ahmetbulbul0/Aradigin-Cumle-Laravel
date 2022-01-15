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
                    <span>Tam Adı</span>
                </div>
                <div class="w20">
                    <span>Kullanıcı Adı</span>
                </div>
                <div class="w20">
                    <span>Parola</span>
                </div>
                <div class="w10">
                    <span>Type</span>
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
                        <span>{{ $item['full_name'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['username'] }}</span>
                    </div>
                    <div class="w20">
                        <span>{{ $item['password'] }}</span>
                    </div>
                    <div class="w10">
                        <span>{{ $item['type']['name'] }}</span>
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
