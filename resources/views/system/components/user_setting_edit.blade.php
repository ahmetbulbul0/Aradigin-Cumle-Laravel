<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kullanıcı AyarıDüzenle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">WebSite Tema:</span>
                    <div class="outSelectBox">
                        <select name="websiteTheme">
                            <option selected disabled>WebSite Tema Seç</option>
                            <option value="dark" @if ($data['data']['website_theme'] == 'dark') selected @endif>Koyu</option>
                            <option value="light" @if ($data['data']['website_theme'] == 'light') selected @endif>Açık</option>
                        </select>
                    </div>
                </div>
                <div class="line">
                    <span class="inputLabel">Panel Tema:</span>
                    <div class="outSelectBox">
                        <select name="dashboardTheme">
                            <option selected disabled>Panel Tema Seç</option>
                            <option value="dark" @if ($data['data']['dashboard_theme'] == 'dark') selected @endif>Koyu</option>
                            <option value="light" @if ($data['data']['dashboard_theme'] == 'light') selected @endif>Açık</option>
                        </select>
                    </div>
                </div>
                @csrf
                <div class="line">
                    <div class="outSubmitBox">
                        <button>
                            İşlemi Tamamla
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
