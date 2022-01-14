<div class="outSmall2ListOneBox">
    <div class="inSmall2ListOneBox">
        <div class="outList">
            <div class="outTitle">
                <span class="inTitle">
                    {{ $data["smallList2One"][0]["title"] }}
                </span>
            </div>
            <div class="inList">
                @foreach ($data["smallList2One"][0]["data"] as $news)
                    <div class="item">
                        <a href="/haber/{{ $news["link_url"] }}">
                            {{ $news["content"] }}
                        </a>
                    </div>
                @endforeach
                <div class="outMore">
                    <a href="{{ $data["smallList2One"][0]["allListLink"] }}">Tüm Listeyi Görüntüle</a>
                </div>
            </div>
        </div>
        <div class="outList">
            <div class="outTitle">
                <span class="inTitle">
                    {{ $data["smallList2One"][1]["title"] }}
                </span>
            </div>
            <div class="inList">
                @foreach ($data["smallList2One"][1]["data"] as $news)
                    <div class="item">
                        <a href="/haber/{{ $news["link_url"] }}">
                            {{ $news["content"] }}
                        </a>
                    </div>
                @endforeach
                <div class="outMore">
                    <a href="{{ $data["smallList2One"][1]["allListLink"] }}">Tüm Listeyi Görüntüle</a>
                </div>
            </div>
        </div>
    </div>
</div>