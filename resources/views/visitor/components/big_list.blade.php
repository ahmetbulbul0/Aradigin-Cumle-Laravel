<div class="outBigList">
    <div class="inBigList">
        <div class="outTitle">
            <span class="inTitle">
                <a href="{{ $data['bigList']['allListLink'] }}">
                    {{ $data['bigList']['listTitle'] }}
                </a>
            </span>
        </div>
        <div class="bigList">
            @foreach ($data['bigList']['data'] as $news)
                <div class="item">
                    <div class="category">
                        <a href="{{ route('haberler_listesi_kategori', [$news['category']['link_url']['link_url'],$data['bigList']['listType'],null]) }}">
                            {{ $news['category']['text'] }}
                        </a>
                    </div>
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
        </div>

        @include('visitor.components.pagination')
    </div>
</div>
