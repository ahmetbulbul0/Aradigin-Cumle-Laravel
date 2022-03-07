<div class="outBigList">
    <div class="inBigList">
        <div class="outTitle">
            <span class="inTitle">
                <a href="{{ $data["bigList"]["allListLink"] }}">
                    {{ $data["bigList"]["listTitle"] }}
                </a>
            </span>
        </div>
        <div class="bigList">
            @foreach ($data['bigList']['data'] as $news)
                <div class="item">
                    <a class="category" href="{{ route("haberler_listesi_kategori", [$news["category"]["link_url"]["link_url"], $data["bigList"]["listType"], NULL]) }}">
                        {{ $news['category']["text"] }}
                    </a>
                    <a class="content" href="{{ route("haber_detay", [$news['link_url']]) }}">
                        {{ $news['content'] }}
                    </a>
                    <span class="date">
                        {{ $news['publish_date']["text"] }}
                    </span>
                </div>
            @endforeach
        </div>

        @include("visitor.components.pagination")
    </div>
</div>
