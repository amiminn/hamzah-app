<template lang="">
    <card>
        <canvas id="myChart" class="w-auto"></canvas>
    </card>
</template>
<script>
import Chart from "chart.js/auto";

export default {
    mounted() {
        let delayed;
        new Chart(document.getElementById("myChart"), {
            type: "bar",
            data: {
                datasets: [
                    {
                        data: [
                            { x: "Januari", y: 1000000 },
                            { x: "Februari", y: 120000 },
                            { x: "mart", y: 520000 },
                            { x: "apr", y: 720000 },
                            { x: "mei", y: 320000 },
                            { x: "jun", y: 720000 },
                            { x: "jul", y: 520000 },
                            { x: "augs", y: 220000 },
                            { x: "sep", y: 320000 },
                            { x: "okt", y: 920000 },
                            { x: "nov", y: 520000 },
                            { x: "des", y: 220000 },
                        ],
                        label: "",
                        borderRadius: 8,
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                            "rgba(255, 205, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                        ],
                        borderColor: [
                            "rgb(255, 99, 132)",
                            "rgb(255, 159, 64)",
                            "rgb(255, 205, 86)",
                            "rgb(75, 192, 192)",
                            "rgb(54, 162, 235)",
                            "rgb(153, 102, 255)",
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                animation: {
                    onComplete: () => {
                        delayed = true;
                    },
                    delay: (context) => {
                        let delay = 0;
                        if (
                            context.type === "data" &&
                            context.mode === "default" &&
                            !delayed
                        ) {
                            delay =
                                context.dataIndex * 1000 +
                                context.datasetIndex * 500;
                        }
                        return delay;
                    },
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "pendapatan tahun 2023",
                    },
                },
            },
        });
    },
};
</script>
<style lang=""></style>
