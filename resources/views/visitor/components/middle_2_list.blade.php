<div class="outMiddle2List">
    <div class="inMiddle2List">
        <div class="outList">
            <div class="outTitle">
                <span class="inTitle">
                    {{ $data['middle2List'][0]['title'] }}
                </span>
            </div>
            <div class="inList">
                @foreach ($data['middle2List'][0]['data'] as $news)
                    <div class="item">
                        <a class="content" href="/haber/{{ $news['link_url'] }}">
                            {{ $news['content'] }}
                        </a>
                        <span class="date">
                            {{ $news['publish_date']["text"] }}
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
                    {{ $data['middle2List'][1]['title'] }}
                </span>
            </div>
            <div class="inList">
                @foreach ($data['middle2List'][1]['data'] as $news)
                    <div class="item">
                        <a class="content" href="/haber/{{ $news['link_url'] }}">
                            {{ $news['content'] }}
                        </a>
                        <span class="date">
                            {{ $news['publish_date']["text"] }}
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
