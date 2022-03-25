<div class="outNewsStatisticDetail">
    <div class="inNewsStatisticDetail">
        <div class="outNewsDetailAndGraph">
            <div class="inNewsDetailAndGraph">
                <div class="outNewsDetail">
                    <div class="outTitle">
                        <span class="inTitle">
                            Haber Detay
                        </span>
                    </div>
                    <div class="inNewsDetail">
                        <div class="line">
                            <label>No:</label>
                            <span id="darkLight">#{{ $data['news']['no'] }}</span>
                        </div>
                        <div class="line">
                            <label>Yazar:</label>
                            <span id="gradient">{{ $data['news']['author']['username'] }}
                                ({{ Str::title($data['news']['author']['full_name']) }})</span>
                        </div>
                        <div class="line">
                            <label>Yayınlanma:</label>
                            <span id="darkLight">{{ $data['news']['publish_date']['text'] }}</span>
                        </div>
                        <div class="line">
                            <label>Kategori:</label>
                            <span id="gradient">{{ $data['news']['category']['text'] }}</span>
                        </div>
                        <div class="line" id="bgDarkLight">
                            <label>İçerik:</label>
                            <span id="thin">{{ $data['news']['content'] }}</span>
                        </div>
                        <div class="line">
                            <label>Kaynak Platform:</label>
                            <span id="darkLight">{{ $data['news']['resource_platform']['name'] }}</span>
                        </div>
                        <div class="line">
                            <label>Kaynak Link:</label>
                            <span id="darkLight">{{ $data['news']['resource_url']['url'] }}</span>
                        </div>
                        <div class="line">
                            <label>Toplam Listelenme:</label>
                            <span id="gradient">{{ $data['news']['listing'] }}</span>
                        </div>
                        <div class="line">
                            <label>Toplam Okunma:</label>
                            <span id="gradient">{{ $data['news']['reading'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="outGraph">
                    <div class="inGraph">

                        <div class="value">
                            <div>
                                <div class="outTitle">
                                    <span class="inTitle">
                                        Yayın Süresi
                                    </span>
                                </div>
                                <div class="outValue">
                                    <span class="inValue">
                                        18 Gün
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="value">
                            <div>
                                <div class="outTitle">
                                    <span class="inTitle">
                                        Toplam Listelenme
                                    </span>
                                </div>
                                <div class="outValue">
                                    <span class="inValue">
                                        197.683
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="value">
                            <div>
                                <div class="outTitle">
                                    <span class="inTitle">
                                        Toplam Okunma
                                    </span>
                                </div>
                                <div class="outValue">
                                    <span class="inValue">
                                        163.864
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="outNewsDetailStatistics">
            <div class="inNewsDetailStatistics">
                <div class="outTitle">
                    <div class="inTitle">
                        Haber İstatistikleri
                    </div>
                    <div class="titleSelects">
                        <div class="statisticListingSelect">
                            <div class="outSelectBox">
                                <select name="Kategori Seç">
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
                                <select name="Kategori Seç">
                                    <option value="" selected>Sırala</option>
                                    <option value="">Yayınlanma (Önce En Yeni)</option>
                                    <option value="">Yayınlanma (Önce En Eski)</option>
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
                        <div class="bar">
                            <div class="date">
                                <span>Tarih</span>
                            </div>
                            <div class="dateStart">
                                <span>Başlangıç</span>
                            </div>
                            <div class="dateFinish">
                                <span>Bitiş</span>
                            </div>
                        </div>
                        <div class="bar">
                            <div class="listinng">
                                <span>Listelenme</span>
                            </div>
                            <div class="reading">
                                <span>Okunma</span>
                            </div>
                            <div class="listingReadingRate">
                                <span>Listelenme/Okunma Oranı</span>
                            </div>
                        </div>
                    </div>
                    @isset ($data['news_statistics'])
                        @foreach ($data['news_statistics'] as $newsStatistic)
                            <div class="line">
                                <div class="bar">
                                    <div class="date">
                                        <label>Tarih:</label>
                                        <span>{{ $newsStatistic['date'] }}</span>
                                    </div>
                                    <div class="dateStart">
                                        <label>Başlangıç:</label>
                                        <span>{{ $newsStatistic['time_start'] }}</span>
                                    </div>
                                    <div class="dateFinish">
                                        <label>Bitiş:</label>
                                        <span>{{ $newsStatistic['time_finish'] }}</span>
                                    </div>
                                </div>
                                <div class="bar">
                                    <div class="listinng">
                                        <label>Listelenme:</label>
                                        <span>{{ $newsStatistic['listings'] }}</span>
                                    </div>
                                    <div class="reading">
                                        <label>Okunma:</label>
                                        <span>{{ $newsStatistic['readings'] }}</span>
                                    </div>
                                    <div class="listingReadingRate">
                                        <label>Listelenme/Okunma Oranı:</label>
                                        <span>{{ $newsStatistic['ratio'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
