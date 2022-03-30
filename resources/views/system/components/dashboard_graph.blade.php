<div class="outChart">
    <div class="inChart">
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
<script>
    const ctx = document.getElementById("myChart").getContext("2d");

    let gradient = ctx.createLinearGradient(0, 0, 0, 400);

    gradient.addColorStop(0, "rgba(218, 44, 77, 0.8)");
    gradient.addColorStop(1, "rgba(248, 171, 55, 0.2)");

    let delayed;

    const labels = {!! json_encode($data['graph']['labels']) !!};

    const listings = {!! json_encode($data['graph']['listings']) !!};

    const readings = {!! json_encode($data['graph']['readings']) !!};

    const data = {
        labels,
        datasets: [{
                data: listings,
                min: -100,
                label: "Listelenme",
                fill: true,
                backgroundColor: "rgba(218, 44, 77, 0.2)",
                borderColor: "rgba(218, 44, 77, 0.6)",
                pointBackgroundColor: "rgba(218, 44, 77, 0.2)",
                tension: 0.5,
            },
            {
                data: readings,
                min: -100,
                label: "Okunma",
                fill: true,
                backgroundColor: "rgba(248, 171, 55, 0.2)",
                borderColor: "rgba(248, 171, 55, 0.6)",
                pointBackgroundColor: "rgba(248, 171, 55, 0.2)",
                tension: 0.5,
            }
        ]
    }

    const config = {
        type: 'line',
        data: data,
        options: {
            radius: 5,
            hitRadius: 30,
            hoverRadius: 10,
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                onComplete: () => {
                    delayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === "data" && context.mode === "default" && !delayed) {
                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Son 1 Haftanın Haber Grafiği '
                }
            },
        },
    };

    const myChart = new Chart(ctx, config);
</script>
