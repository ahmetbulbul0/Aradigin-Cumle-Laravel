<div class="outMiddle2List">
    <div class="inMiddle2List">
        <div class="outList">
            <div class="outTitle">
                <span class="inTitle">
                    <a href="{{ $data['middle2List'][0]['allListLink'] }}">
                        {{ $data['middle2List'][0]['listTitle'] }}
                    </a>
                </span>
            </div>
            <div class="inList">
                @empty($data['middle2List'][0]['data'])
                    <div class="item">
                        <div class="anyNewsText">
                            <span>
                                Hiç Haber Bulunamadı
                            </span>
                        </div>
                    </div>
                @endempty
                @isset($data['middle2List'][0]['data'])
                    @foreach ($data['middle2List'][0]['data'] as $news)
                        @php App\Http\Controllers\Pages\Visitor\NewsListingsWorkPageController::index($news["no"]) @endphp
                        <div class="item">
                            <div class="content">
                                <a href="{{ route('haber_detay', [$news['link_url']]) }}">
                                    {{ $news['content'] }}
                                </a>
                            </div>
                            <div class="date">
                                <span>
                                    {{ $news['publish_date']['text'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @endisset
                <div class="outMore">
                    <a href="{{ $data['middle2List'][0]['allListLink'] }}">Tüm Listeyi Görüntüle</a>
                </div>
            </div>
        </div>
        <div class="outList">
            <div class="outTitle">
                <span class="inTitle">
                    <a href="{{ $data['middle2List'][1]['allListLink'] }}">
                        {{ $data['middle2List'][1]['listTitle'] }}
                    </a>
                </span>
            </div>
            <div class="inList">
                @empty($data['middle2List'][1]['data'])
                    <div class="item">
                        <div class="anyNewsText">
                            <span>
                                Hiç Haber Bulunamadı
                            </span>
                        </div>
                    </div>
                @endempty
                @isset($data['middle2List'][1]['data'])
                    @foreach ($data['middle2List'][1]['data'] as $news)
                        @php App\Http\Controllers\Pages\Visitor\NewsListingsWorkPageController::index($news["no"]) @endphp
                        <div class="item">
                            <div class="content">
                                <a href="{{ route('haber_detay', [$news['link_url']]) }}">
                                    {{ $news['content'] }}
                                </a>
                            </div>
                            <div class="date">
                                <span>
                                    {{ $news['publish_date']['text'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @endisset
                <div class="outMore">
                    <a href="{{ $data['middle2List'][1]['allListLink'] }}">Tüm Listeyi Görüntüle</a>
                </div>
            </div>
        </div>
    </div>
</div>
