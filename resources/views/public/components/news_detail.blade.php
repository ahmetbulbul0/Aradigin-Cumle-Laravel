<div class="outNewsDetail">
    <div class="inNewsDetail">
        <div class="header">
            <span class="category">{{ $data["newsDetail"]["data"]["categories"] }}</span>
            <span class="date">{{ $data["newsDetail"]["data"]["publish_date"]["text"] }}</span>
        </div>
        <div class="body">
            <span class="content">
                {{ $data["newsDetail"]["data"]["content"] }}
            </span>
        </div>
        <div class="footer">
            <span class="resource">Kaynak: BLABLA</span>
            <span class="writer">Yazar: {{ $data["newsDetail"]["data"]["author"]["username"] }}</span>
        </div>
    </div>
</div>
