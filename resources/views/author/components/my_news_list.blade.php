<div class="outMyNews">
    <div class="inMyNews">
        <div class="outTitle">
            <div class="inTitle">
                Haberlerim
            </div>
            <div class="titleSelects">
                <div class="actions">
                    <a href="{{ route('haber_ekle') }}" target="blank">Yeni Haber Oluştur</a>
                </div>
                <div class="statisticListingSelect">
                    <div class="outSelectBox">
                        <select name="Kategori Seç" disabled>
                            <option value="" selected>Tüm Zamanlar</option>
                            <option value="">24 Saat</option>
                            <option value="">1 Hafta</option>
                            <option value="">1 Ay</option>
                            <option value="">1 Yıl</option>
                        </select>
                    </div>
                </div>
                <div class="statisticListingSelect">
                    <div class="outSelectBox">
                        <select name="Kategori Seç" disabled>
                            <option value="" selected>Sırala</option>
                            <option value="">Yayınlanma (Önce En Yeni)</option>
                            <option value="">Yayınlanma (Önce En Eski)</option>
                            <option value="">Kategori (A - Z)</option>
                            <option value="">Kategori (Z - A)</option>
                            <option value="">İçerik (A - Z)</option>
                            <option value="">İçerik (Z - A)</option>
                            <option value="">Kaynak (A - Z)</option>
                            <option value="">Kaynak (Z - A)</option>
                            <option value="">Listelenme (Önce En Çok)</option>
                            <option value="">Listelenme (Önce En Az)</option>
                            <option value="">Okunma (Önce En Çok)</option>
                            <option value="">Okunma (Önce En Az)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="myNewsList">
            <div class="titleLine">
                <div class="no">
                    <span>No</span>
                </div>
                <div class="publish_date">
                    <span>Yayınlanma</span>
                </div>
                <div class="category">
                    <span>Kategori</span>
                </div>
                <div class="content">
                    <span>İçerik</span>
                </div>
                <div class="resource">
                    <span>Kaynak</span>
                </div>
                <div class="listing">
                    <span>Listelenme</span>
                </div>
                <div class="reading">
                    <span>Okunma</span>
                </div>
                <div class="actions">
                    <span>İşlem</span>
                </div>
            </div>
            @isset($data['data'])
                @foreach ($data['data'] as $item)
                    <div class="line">
                        <div class="no">
                            <span>
                                #{{ $item['no'] }}
                            </span>
                        </div>
                        <div class="publish_date">
                            <span>
                                {{ $item['publish_date']['text'] }}
                            </span>
                        </div>
                        <div class="category">
                            <span>
                                {{ $item['category']['text'] }}
                            </span>
                        </div>
                        <div class="content">
                            <span>
                                {{ $item['content'] }}
                            </span>
                        </div>
                        <div class="resource">
                            <span>
                                {{ $item['resource_platform']['name'] }}
                            </span>
                        </div>
                        <div class="listing">
                            <span>
                                {{ $item['listing'] }}
                            </span>
                        </div>
                        <div class="reading">
                            <span>
                                {{ $item['reading'] }}
                            </span>
                        </div>
                        <div class="actions">
                            <span>
                                <a href="{{ route('haberlerim_düzenle', [$item['no']]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('haberlerim_sil', [$item['no']]) }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</div>
