<div class="footer">
    <div class="outFooter">
        <div class="inFooter">
            <div class="group">
                <div class="bar">
                    <div class="outLinksList">
                        <div class="inLinksList">
                            <div class="outTitle">
                                <span class="inTitle">
                                    Yardımcı Linkler
                                </span>
                            </div>
                            <div class="list">
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        Hakkımızda
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        İletişim
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        Api
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        Github
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bar">
                    <div class="outLinksList">
                        <div class="inLinksList">
                            <div class="outTitle">
                                <span class="inTitle">
                                    Bize Katılın
                                </span>
                            </div>
                            <div class="list">
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        Yazarlık Başvurusu
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        Editörlük Başvurusu
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="bar">
                    <div class="outLinksList">
                        <div class="inLinksList">
                            <div class="outTitle">
                                <span class="inTitle">
                                    Yazarlarımız
                                </span>
                            </div>
                            <div class="list">
                                @empty($data['footer']['authors'])
                                    <div class="item">
                                        <a href="/cok-yakinda">
                                            Hiç Yazar Yok
                                        </a>
                                    </div>
                                @endempty
                                @isset($data['footer']['authors'])
                                    @foreach ($data['footer']['authors'] as $author)
                                        <div class="item">
                                            <a href="/cok-yakinda">
                                                {{ Str::title($author['full_name']) }}
                                                [{{ $author['username'] }}]
                                            </a>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="outLinksList mt40">
                        <div class="inLinksList">
                            <div class="outTitle">
                                <span class="inTitle">
                                    Editörlerimiz
                                </span>
                            </div>
                            <div class="list">
                                @empty($data['footer']['editors'])
                                    <div class="item">
                                        <a href="/cok-yakinda">
                                            Hiç Editör Yok
                                        </a>
                                    </div>
                                @endempty
                                @isset($data['footer']['editors'])
                                    @foreach ($data['footer']['editors'] as $editor)
                                        <div class="item">
                                            <a href="/cok-yakinda">
                                                {{ Str::title($editor['full_name']) }}
                                                [{{ $editor['username'] }}]
                                            </a>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bar">
                    <div class="outSocialAccounts">
                        <div class="inSocialAccounts">
                            <div class="outTitle">
                                <span class="inTitle">
                                    Sosyal Medya Hesaplarımız
                                </span>
                            </div>
                            <div class="list">
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        <i class="fab fa-instagram"></i>
                                        <span>İnstagram</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        <i class="fab fa-facebook"></i>
                                        <span>Facebook</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="/cok-yakinda">
                                        <i class="fab fa-twitter"></i>
                                        <span>Twitter</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="/cok-yakinda">
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
    <div class="outMinFooter">
        <div class="inMinFooter">
            <span><strong>AradığınCümle.com</strong> Haberleri Gereksiz Metinlerden Arındırarak Asıl Bilmeniz Gereken
                Bilgiyi Sizlere Sade Ve Net Bir Şekilde Göstermeyi Amaçlayan Açık Kaynak Kodlu Bir Projedir, Katkı
                Sağlayabilir, Api'mizi Kullanarak Yeni Şeyler Üretebilirsiniz.</span>
        </div>
    </div>
</div>
