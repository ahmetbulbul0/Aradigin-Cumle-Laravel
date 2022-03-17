<div class="outSmall2ListOneBox">
    <div class="inSmall2ListOneBox">
        <div class="outList">
            <div class="outTitle">
                <span class="inTitle">
                    <a href="{{ $data['smallList2One'][0]['allListLink'] }}">
                        {{ $data['smallList2One'][0]['listTitle'] }}
                    </a>
                </span>
            </div>
            <div class="inList">
                @isset($data['smallList2One'][0]['data'])
                    @foreach ($data['smallList2One'][0]['data'] as $news)
                        @php App\Http\Controllers\Api\Listings\ListingCreateController::work($news["no"]); @endphp
                        <div class="item">
                            <div class="content">
                                <a href="{{ route('haber_detay', [$news['link_url']]) }}">
                                    {{ $news['content'] }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endisset
                <div class="outMore">
                    <a href="{{ $data['smallList2One'][0]['allListLink'] }}">Tüm Listeyi Görüntüle</a>
                </div>
            </div>
        </div>
        <div class="outList">
            <div class="outTitle">
                <span class="inTitle">
                    <a href="{{ $data['smallList2One'][1]['allListLink'] }}">
                        {{ $data['smallList2One'][1]['listTitle'] }}
                    </a>
                </span>
            </div>
            <div class="inList">
                @isset($data['smallList2One'][1]['data'])
                    @foreach ($data['smallList2One'][1]['data'] as $news)
                        @php App\Http\Controllers\Api\Listings\ListingCreateController::work($news["no"]); @endphp
                        <div class="item">
                            <div class="content">
                                <a href="{{ route('haber_detay', [$news['link_url']]) }}">
                                    {{ $news['content'] }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endisset
                <div class="outMore">
                    <a href="{{ $data['smallList2One'][1]['allListLink'] }}">Tüm Listeyi Görüntüle</a>
                </div>
            </div>
        </div>
    </div>
</div>
