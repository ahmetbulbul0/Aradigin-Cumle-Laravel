const ctx = document.getElementById("myChart").getContext("2d");

let gradient = ctx.createLinearGradient(0, 0, 0, 400);

gradient.addColorStop(0, "rgba(218, 44, 77, 0.8)");
gradient.addColorStop(1, "rgba(248, 171, 55, 0.2)");

let delayed;

const labels = [
    "11/16",
    "11/17",
    "11/18",
    "11/19",
    "11/20",
    "11/21",
    "11/22"
];

const values1 = [
    1648,
    1352,
    1967,
    4034,
    894,
    1487,
    2486
];

const values2 = [
    659,
    540,
    786,
    1613,
    357,
    594,
    994
];

const data = {
    labels,
    datasets: [
        {
            data: values1,
            label: "Listelenme",
            fill: true,
            backgroundColor: "rgba(218, 44, 77, 0.2)",
            borderColor: "rgba(218, 44, 77, 0.6)",
            pointBackgroundColor: "rgba(218, 44, 77, 0.2)",
            tension: 0.5,
        },
        {
            data: values2,
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