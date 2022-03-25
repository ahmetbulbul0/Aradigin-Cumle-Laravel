<div class="outSettings">
    <div class="inSettings">
        @include('author.components.settings_menu')
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
