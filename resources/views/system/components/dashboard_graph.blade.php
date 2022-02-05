<div class="outChart">
    <div class="inChart">
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
<script src="{{ URL::asset('src/js/chart.js') }}"></script>



{{-- <div class="outChartAndWelcomeHowAreYou">
    <div class="inChartAndWelcomeHowAreYou">
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
        <div class="outWelcomeHowAreYou">
            <form class="inWelcomeHowAreYou">
                <div class="step" id="defaultOptions">
                    <div class="header">
                        <span>Hoşgeldin, Bugün Nasılsın?</span>
                    </div>
                    <div class="body">
                        <span>Hoşbuldum, iyiyim</span>
                    </div>
                    <div class="body">
                        <span>Hoşbulmadım</span>
                    </div>
                    <div class="body">
                        <div class="strong">
                            <span onclick="welcomeHowAreYouHaveDifferentThink()">Hoşbuldum, başka birşey var</span>
                        </div>
                    </div>
                </div>
                <div class="step" id="haveDifferentThink">
                    <div class="header">
                        <span>Hoşgeldin, Bugün Nasılsın?</span>
                    </div>
                    <div class="body">
                        <div class="outInputText">
                            <input type="text" placeholder="nasıl hissediyorsun bugün">
                        </div>
                    </div>
                    <div class="body">
                        <div class="strong">
                            <span>işte böyle</span>
                        </div>
                        <div class="strong">
                            <span onclick="welcomeHowAreYouHaveDefaultOption()">vazgeçtim</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}
{{-- <script src="{{ URL::asset('src/js/welcome_how_are_you.js') }}"></script> --}}