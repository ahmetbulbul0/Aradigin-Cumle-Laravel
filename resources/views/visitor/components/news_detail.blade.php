<div class="outNewsDetail">
    <div class="inNewsDetail">
        <div class="header">
            <span class="category">{{ $data['newsDetail']['data']['category']['text'] }}</span>
            <span class="date">{{ $data['newsDetail']['data']['publish_date']['text'] }}</span>
        </div>
        <div class="body">
            <span class="content">
                {{ $data['newsDetail']['data']['content'] }}
            </span>
        </div>
        <div class="footer">
            <span class="resource">Kaynak: {{ $data['newsDetail']['data']['resource_platform']['name'] }}</span>
            <span class="writer">Yazar: <a
                    href="{{ route('haberler_listesi_yazar', [$data['newsDetail']['data']['author']['username'], 'son-yayinlananlar']) }}">{{ $data['newsDetail']['data']['author']['username'] }}</a></span>
        </div>
    </div>
</div>
