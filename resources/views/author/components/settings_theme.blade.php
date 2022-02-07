<div class="outSettings">
    <div class="inSettings">
        <div class="outSettingsMenu">
            <div class="outTitle">
                <div class="inTitle">
                    Ayarlar
                </div>
            </div>
            <div class="inSettingsMenu">
                <div class="outSettingsMenuItem">
                    <a href="#" class="inSettingsMenuItem">Profilim</a>
                </div>
                <div class="outSettingsMenuItem">
                    <a href="#" class="inSettingsMenuItem">Tema</a>
                </div>
            </div>
        </div>
        <div class="outSettingsContent">
            <div class="outTitle">
                <div class="inTitle">
                    Tema
                </div>
            </div>
            <div class="inSettingsContent">

                <div class="line">
                    <div class="changingTheme">
                        <label>WebSite Tema:</label>
                        <form class="values" method="POST">
                            @csrf
                            <button class='value @if ($data["user_settings"]["website_theme"] == "dark") active @endif' name="websiteTheme" value="dark">Koyu</button>
                            <button class='value @if ($data["user_settings"]["website_theme"] == "light") active @endif' name="websiteTheme" value="light">Açık</button>
                        </form>
                    </div>
                </div>

                <div class="line">
                    <div class="changingTheme">
                        <label>Panel Tema:</label>
                        <form class="values" method="POST">
                            @csrf
                            <button class='value @if ($data["user_settings"]["dashboard_theme"] == "dark") active @endif' name="dashboardTheme" value="dark">Koyu</button>
                            <button class='value @if ($data["user_settings"]["dashboard_theme"] == "light") active @endif' name="dashboardTheme" value="light">Açık</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
