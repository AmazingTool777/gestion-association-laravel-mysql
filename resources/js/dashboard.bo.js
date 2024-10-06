import {
    Chart,
    BarController,
    CategoryScale,
    LinearScale,
    BarElement,
    DoughnutController,
    ArcElement,
    Legend,
    Tooltip,
} from "chart.js";

import { animateCounter } from "./animations/counter";

Chart.register(
    BarController,
    CategoryScale,
    LinearScale,
    BarElement,
    DoughnutController,
    ArcElement,
    Legend,
    Tooltip
);

function plotLatestDonations() {
    const dateFormatter = new Intl.DateTimeFormat("fr", {
        year: "numeric",
        month: "numeric",
        day: "numeric",
    });
    // Data for the chart
    const data = {
        labels: donationsCollectedAmountLastSevenDays.map((data) =>
            dateFormatter.format(new Date(data.date))
        ),
        datasets: [
            {
                label: "Donations",
                data: donationsCollectedAmountLastSevenDays.map((data) =>
                    Math.floor(data.amount / 1000)
                ),
                borderWidth: 1,
                backgroundColor: "#efc600",
            },
        ],
    };
    // Configuration options
    const config = {
        type: "bar",
        data: data,
        options: {
            responsive: true,
            y: {
                beginAtZero: true,
            },
        },
    };
    // Creating the chart
    const ctx = document.getElementById("revenueChart").getContext("2d");
    new Chart(ctx, config);
}

function plotDonationCallsChart() {
    // Data for the chart
    const data = {
        labels: donationCallsPerType.map((data) => data.type),
        datasets: [
            {
                label: "Appels aux dons",
                data: donationCallsPerType.map((data) => data.count),
                backgroundColor: [
                    "rgba(244, 67, 54, 0.6)", // Red
                    "rgba(63, 81, 181, 0.6)", // Indigo
                    "rgba(0, 188, 212, 0.6)", // Cyan
                    "rgba(255, 193, 7, 0.6)", // Amber
                    "rgba(156, 39, 176, 0.6)", // Deep Purple
                    "rgba(76, 175, 80, 0.6)", // Green
                    "rgba(233, 30, 99, 0.6)", // Pink
                    "rgba(121, 85, 72, 0.6)",
                ],
            },
        ],
    };
    // Configuration options
    const config = {
        type: "doughnut",
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: "top",
                },
                tooltip: {
                    enabled: true,
                },
            },
        },
    };
    // Creating the chart
    const ctx = document.getElementById("donationCallChart").getContext("2d");
    new Chart(ctx, config);
}

function animateCounters() {
    const numberFormatter = new Intl.NumberFormat("fr");
    const counterElts = document.querySelectorAll(`[data-counter]`);
    for (const elt of counterElts) {
        animateCounter({
            duration: 1500,
            startCount: 0,
            targetCount: parseInt(elt.getAttribute("data-counter")),
            updateFn(count) {
                elt.textContent = numberFormatter.format(count);
            },
        });
    }
}

animateCounters();
plotLatestDonations();
plotDonationCallsChart();
