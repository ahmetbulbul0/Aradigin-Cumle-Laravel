<div class="outNewsStatistics">
    <div class="inNewsStatistics">
        <div class="outTitle">
            <div class="inTitle">
                {{ $data['page_title'] }}
            </div>

            <div class="titleSelects">
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
                            <option value="">Yazar (A - Z)</option>
                            <option value="">Yazar (Z - A)</option>
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
        <div class="statisticList">
            <div class="titleLine">
                <div class="no">
                    <span>No</span>
                </div>
                <div class="writer">
                    <span>Yazar</span>
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
                <div class="detail">
                    <span>Detay</span>
                </div>
            </div>
            @if ($data['news'])
                @foreach ($data['news'] as $news)
                    <div class="line">
                        <div class="no">
                            <span>#{{ $news['no'] }}</span>
                        </div>
                        <div class="writer">
                            <span>{{ $news['author']['username'] }}</span>
                        </div>
                        <div class="publish_date">
                            <span>{{ $news['publish_date']['text'] }}</span>
                        </div>
                        <div class="category">
                            <span>{{ $news['category']['text'] }}</span>
                        </div>
                        <div class="content">
                            <span>{{ $news['content'] }}</span>
                        </div>
                        <div class="resource">
                            <span>{{ $news['resource_platform']['name'] }}</span>
                        </div>
                        <div class="listing">
                            <span>{{ $news['listing'] }}</span>
                        </div>
                        <div class="reading">
                            <span>{{ $news['reading'] }}</span>
                        </div>
                        <div class="detail">
                            <span>
                                <a href="{{ route("haber_istatistikleri_detay", [$news["no"]]) }}">Detay</a>
                            </span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
