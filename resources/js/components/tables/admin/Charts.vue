<template>
    <div class="row py-5 px-5">
        <h4>Statistics</h4>
        <div class="col-12 col-md-6 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <canvas id="userEngagement" width="400" height="280"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <canvas id="monthlySales" width="400" height="280"></canvas>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Chart, LineController, LineElement, PointElement, LinearScale, CategoryScale, Title, Tooltip, Legend } from 'chart.js';

    Chart.register(
        LineController,
        LineElement,
        PointElement,
        LinearScale,
        CategoryScale,
        Title,
        Tooltip,
        Legend,
    );

    export default {
        mounted() {
            // User Engagement Chart
            const engagementCtx = document.getElementById('userEngagement').getContext('2d');
            new Chart(engagementCtx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                    datasets: [{
                    label: "User Engagement",
                    data: [10, 25, 40, 30, 50, 70],
                    borderColor: "green",
                    backgroundColor: "rgba(0, 123, 255, 0.1)",
                    borderWidth: 2,
                    tension: 0.4
                    }]
                    },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                },
                
            });
             // Monthly Sales Chart
            const salesCtx = document.getElementById('monthlySales').getContext('2d');
                new Chart(salesCtx, {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                        datasets: [{
                        label: "Monthly Sales",
                        data: [10, 80, 40, 20, 50, 90],
                        borderColor: "green",
                        backgroundColor: "rgba(0, 123, 255, 0.1)",
                        borderWidth: 2,
                        tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            },
        };

</script>