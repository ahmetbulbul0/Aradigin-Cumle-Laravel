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
                @foreach ($data['middle2List'][0]['data'] as $news)
                    <div class="item">
                        <a class="content" href="{{ route('haber_detay', [$news['link_url']]) }}">
                            {{ $news['content'] }}
                        </a>
                        <span class="date">
                            {{ $news['publish_date']['text'] }}
                        </span>
                    </div>
                @endforeach
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
                @foreach ($data['middle2List'][1]['data'] as $news)
                    <div class="item">
                        <a class="content" href="{{ route('haber_detay', [$news['link_url']]) }}">
                            {{ $news['content'] }}
                        </a>
                        <span class="date">
                            {{ $news['publish_date']['text'] }}
                        </span>
                    </div>
                @endforeach
                <div class="outMore">
                    <a href="{{ $data['middle2List'][1]['allListLink'] }}">Tüm Listeyi Görüntüle</a>
                </div>
            </div>
        </div>
    </div>
</div>
