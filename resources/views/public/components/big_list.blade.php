<div class="outBigList">
    <div class="inBigList">
        <div class="outTitle">
            <span class="inTitle">
                {{ $data['bigList']['title'] }}
            </span>
        </div>
        <div class="bigList">
            @foreach ($data['bigList']['data'] as $news)
                <div class="item">
                    <a class="category" href="/haberler/kategori/{{ $news["category"]["link_url"]["link_url"] }}/{{ $data["bigList"]["listType"] }}">
                        {{ $news['category']["main"]["name"] }}
                    </a>
                    <a class="content" href="/haber/{{ $news['link_url'] }}">
                        {{ $news['content'] }}
                    </a>
                    <span class="date">
                        {{ $news['publish_date']["text"] }}
                    </span>
                </div>
            @endforeach
        </div>
        <div class="outPaginate">
            <div class="inPaginate">
                <!-- <span class="icon">
                    <a href="#dd">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </span>
                <span class="emptiess">...</span> -->
                <span class="number active">
                    <a href="#11">1</a>
                </span>
                <span class="number">
                    <a href="#12">2</a>
                </span>
                <span class="number">
                    <a href="#13">3</a>
                </span>
                <span class="number">
                    <a href="#14">4</a>
                </span>
                <span class="number">
                    <a href="#15">5</a>
                </span>
                <span class="emptiess">...</span>
                <span class="icon">
                    <a href="#dd">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </span>

            </div>
        </div>
    </div>
</div>
