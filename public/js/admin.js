const liseur = document.querySelector("#liseur");
const ecrivain = document.querySelector("#ecrivain");
const livres = document.querySelector("#livres");
const liseurEcrivain = document.querySelector("#liseur-ecrivain");

function createPieCahrt(config, item) {
    return new Chart(item, {
        type: "pie",
        data: config,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}

createPieCahrt(
    {
        labels: [
            "Abonnement Gratuit",
            "Abonnement Premium",
            "Abonnement Basique",
        ],
        datasets: [
            {
                label: "Abonnement des liseur",
                data: readerSubPlan,
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 15)",
                ],
                hoverOffset: 4,
            },
        ],
    },
    liseur
);

createPieCahrt(
    {
        labels: [
            "Abonnement Gratuit",
            "Abonnement Premium",
            "Abonnement Basique",
        ],
        datasets: [
            {
                label: "Abonnement des écrivains",
                data: writerSubPlan,
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                ],
                hoverOffset: 4,
            },
        ],
    },
    ecrivain
);

createPieCahrt(
    {
        labels: ["Liseur", "Ecrivain"],
        datasets: [
            {
                label: "Liseurs et Ecrivans",
                data: reader_writer,
                backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)"],
                hoverOffset: 4,
            },
        ],
    },
    livres
);

createPieCahrt(
    {
        labels: books.category,
        datasets: [
            {
                label: "Propotion des Livres",
                data: books.data,
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                    "rgb(25, 25, 6)",
                    "#fe4551",
                ],
                hoverOffset: 4,
            },
        ],
    },
    liseurEcrivain
);
