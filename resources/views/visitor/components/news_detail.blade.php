<div class="out3ColumnsBox">
    <div class="in3ColumnsBox">
        <div class="smColumn leftBar">
            <div class="outSmListVertical">
                <div class="inSmListVertical">
                    <div class="outTitle">
                        <span class="inTitle">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['link_url']['link_url'],'son-yayinlananlar']) }}">Son Yayınlanan Benzer Haberler</a>
                        </span>
                    </div>
                    <div class="newsList">
                        @foreach ($data["someRecentNews"] as $someRecentNews)
                            @if ($someRecentNews["no"] != $data["newsDetail"]["data"]["no"])
                                <div class="item">
                                    <a>
                                        {{ $someRecentNews["content"] }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt40 outSmListVertical">
                <div class="inSmListVertical">
                    <div class="outTitle">
                        <span class="inTitle">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['link_url']['link_url'],'son-yayinlananlar']) }}">Çok Okunan Benzer Haberler</a>
                        </span>
                    </div>
                    <div class="newsList">
                        @foreach ($data["mostReadNews"] as $mostReadNews)
                            @if ($mostReadNews["no"] != $data["newsDetail"]["data"]["no"])
                                <div class="item">
                                    <a>
                                        {{ $mostReadNews["content"] }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt40 outSmListVertical">
                <div class="inSmListVertical">
                    <div class="outTitle">
                        <span class="inTitle">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['link_url']['link_url'],'son-yayinlananlar']) }}">Az Okunan Benzer Haberler</a>
                        </span>
                    </div>
                    <div class="newsList">
                        @foreach ($data["lessReadNews"] as $lessReadNews)
                            @if ($lessReadNews["no"] != $data["newsDetail"]["data"]["no"])
                                <div class="item">
                                    <a>
                                        {{ $lessReadNews["content"] }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mdColumn middle">
            <div class="outNewsDetail">
                <div class="inNewsDetail">
                    <div class="line">
                        <span class="date">{{ $data['newsDetail']['data']['publish_date']['text'] }}</span>
                        <span class="writer">Yazar: <a href="{{ route('haberler_listesi_yazar', [$data['newsDetail']['data']['author']['username'], 'son-yayinlananlar']) }}">{{ Str::title($data['newsDetail']['data']['author']['full_name']) }}</a></span>
                    </div>
                    <div class="line">
                        <span class="content">{{ $data['newsDetail']['data']['content'] }}</span>
                    </div>
                    <div class="line category">
                        <span class="category">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['main']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                {{ Str::title($data['newsDetail']['data']['category']['main']['name']) }}
                            </a>
                            @isset($data['newsDetail']['data']['category']['sub1'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub1']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub1']['name']) }}
                                </a>
                            @endisset
                            @isset($data['newsDetail']['data']['category']['sub2'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub2']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub2']['name']) }}
                                </a>
                            @endisset
                            @isset($data['newsDetail']['data']['category']['sub3'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub3']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub3']['name']) }}
                                </a>
                            @endisset
                            @isset($data['newsDetail']['data']['category']['sub4'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub4']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub4']['name']) }}
                                </a>
                            @endisset
                            @isset($data['newsDetail']['data']['category']['sub5'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub5']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub5']['name']) }}
                                </a>
                            @endisset
                        </span>
                        <span class="category">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['link_url']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientText">
                                Bu Kategorideki Diğer Haberler
                            </a>
                        </span>
                    </div>
                    <div class="line resource">
                        <span class="resource">Kaynak: <a href="{{ $data['newsDetail']['data']['resource_platform']['main_url'] }}">{{ $data['newsDetail']['data']['resource_platform']['name'] }}</a></span>
                        <span class="resource">
                            <a href="{{ $data['newsDetail']['data']['resource_url']['url'] }}" target="blank">Kaynak
                                Haber Linki
                            </a>
                        </span>
                        <span class="resource">
                            <a href="{{ route('haberler_listesi_kaynak', [$data['newsDetail']['data']['resource_platform']['name'],'son-yayinlananlar']) }}" target="blank">
                                Bu Kaynak Haber Sitesine Ait Diğer Haberler
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="smColumn rightBar">
            <div class="outSmListVertical">
                <div class="inSmListVertical">
                    <div class="inSmNewsListVertical">
                        <div class="outTitle">
                            <span class="inTitle">
                                Sosyal Medya'da AradığınCümle
                            </span>
                        </div>
                        <div class="socialAccountsList">
                            <div class="item">
                                <a href="instagram.com">
                                    <i class="fab fa-instagram"></i>
                                    <span>İnstagram</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="facebook.com">
                                    <i class="fab fa-facebook"></i>
                                    <span>Facebook</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="twitter.com">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="telegram.com">
                                    <i class="fab fa-telegram"></i>
                                    <span>Telegram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="out3ColumnsBox">
    <div class="in3ColumnsBox">
        <div class="smColumn leftBar">
            <div class="outSmListVertical">
                <div class="inSmListVertical">
                    <div class="outTitle">
                        <span class="inTitle">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['link_url']['link_url'],'son-yayinlananlar']) }}">Son Yayınlanan Benzer Haberler</a>
                        </span>
                    </div>
                    <div class="newsList">
                        @foreach ($data["someRecentNews"] as $someRecentNews)
                            @if ($someRecentNews["no"] != $data["newsDetail"]["data"]["no"])
                                <div class="item">
                                    <a>
                                        {{ $someRecentNews["content"] }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt40 outSmListVertical">
                <div class="inSmListVertical">
                    <div class="outTitle">
                        <span class="inTitle">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['link_url']['link_url'],'son-yayinlananlar']) }}">Çok Okunan Benzer Haberler</a>
                        </span>
                    </div>
                    <div class="newsList">
                        @foreach ($data["mostReadNews"] as $mostReadNews)
                            @if ($mostReadNews["no"] != $data["newsDetail"]["data"]["no"])
                                <div class="item">
                                    <a>
                                        {{ $mostReadNews["content"] }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt40 outSmListVertical">
                <div class="inSmListVertical">
                    <div class="outTitle">
                        <span class="inTitle">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['link_url']['link_url'],'son-yayinlananlar']) }}">Az Okunan Benzer Haberler</a>
                        </span>
                    </div>
                    <div class="newsList">
                        @foreach ($data["lessReadNews"] as $lessReadNews)
                            @if ($lessReadNews["no"] != $data["newsDetail"]["data"]["no"])
                                <div class="item">
                                    <a>
                                        {{ $lessReadNews["content"] }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mdColumn middle">
            <div class="outNewsDetail">
                <div class="inNewsDetail">
                    <div class="line">
                        <span class="date">{{ $data['newsDetail']['data']['publish_date']['text'] }}</span>
                        <span class="writer">Yazar: <a href="{{ route('haberler_listesi_yazar', [$data['newsDetail']['data']['author']['username'], 'son-yayinlananlar']) }}">{{ Str::title($data['newsDetail']['data']['author']['full_name']) }}</a></span>
                    </div>
                    <div class="line">
                        <span class="content">{{ $data['newsDetail']['data']['content'] }}</span>
                    </div>
                    <div class="line category">
                        <span class="category">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['main']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                {{ Str::title($data['newsDetail']['data']['category']['main']['name']) }}
                            </a>
                            @isset($data['newsDetail']['data']['category']['sub1'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub1']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub1']['name']) }}
                                </a>
                            @endisset
                            @isset($data['newsDetail']['data']['category']['sub2'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub2']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub2']['name']) }}
                                </a>
                            @endisset
                            @isset($data['newsDetail']['data']['category']['sub3'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub3']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub3']['name']) }}
                                </a>
                            @endisset
                            @isset($data['newsDetail']['data']['category']['sub4'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub4']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub4']['name']) }}
                                </a>
                            @endisset
                            @isset($data['newsDetail']['data']['category']['sub5'])
                                <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['sub5']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientBackground">
                                    {{ Str::title($data['newsDetail']['data']['category']['sub5']['name']) }}
                                </a>
                            @endisset
                        </span>
                        <span class="category">
                            <a href="{{ route('haberler_listesi_kategori', [$data['newsDetail']['data']['category']['link_url']['link_url'],'son-yayinlananlar']) }}" class="onlyGradientText">
                                Bu Kategorideki Diğer Haberler
                            </a>
                        </span>
                    </div>
                    <div class="line resource">
                        <span class="resource">Kaynak: <a href="{{ $data['newsDetail']['data']['resource_platform']['main_url'] }}">{{ $data['newsDetail']['data']['resource_platform']['name'] }}</a></span>
                        <span class="resource">
                            <a href="{{ $data['newsDetail']['data']['resource_url']['url'] }}" target="blank">Kaynak
                                Haber Linki
                            </a>
                        </span>
                        <span class="resource">
                            <a href="{{ route('haberler_listesi_kaynak', [$data['newsDetail']['data']['resource_platform']['name'],'son-yayinlananlar']) }}" target="blank">
                                Bu Kaynak Haber Sitesine Ait Diğer Haberler
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="smColumn rightBar">
            <div class="outSmListVertical">
                <div class="inSmListVertical">
                    <div class="inSmNewsListVertical">
                        <div class="outTitle">
                            <span class="inTitle">
                                Sosyal Medya'da AradığınCümle
                            </span>
                        </div>
                        <div class="socialAccountsList">
                            <div class="item">
                                <a href="instagram.com">
                                    <i class="fab fa-instagram"></i>
                                    <span>İnstagram</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="facebook.com">
                                    <i class="fab fa-facebook"></i>
                                    <span>Facebook</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="twitter.com">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="telegram.com">
                                    <i class="fab fa-telegram"></i>
                                    <span>Telegram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

