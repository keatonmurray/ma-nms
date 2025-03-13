<template>
    <div class="container-fluid p-0 h-auto">
        <div class="offcanvas offcanvas-start text-white" id="sidebar">
            <div class="offcanvas-header">
                <img :src="'assets/images/music-alley-logo-inverted.png'" alt="Logo">
                <h5 class="offcanvas-title">Music Alley</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-unstyled">
                    <li>
                        <a href="#" class="text-white text-decoration-none d-block py-2">
                            <i class="fa-solid fa-newspaper me-2"></i>
                            Active News
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none d-block py-2">
                            <i class="fa-solid fa-person-circle-check me-2"></i>
                            Approved
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none d-block py-2">
                            <i class="fa-solid fa-chalkboard-user me-2"></i>
                            Pending for Review
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none d-block py-2">
                            <i class="fa-solid fa-dollar-sign me-2"></i>
                            Expense Tracker
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <Header />
        <div id="admin">
            <div class="create-news d-flex justify-content-between align-items-center p-5">
                <h3>Dashboard</h3>
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create News</button>
            </div>
            <div class="row px-5">
                <div class="col-12 col-md-3 mb-3">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5>Total Spent</h5>
                            <h2>$1440</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5>Active News</h5>
                            <h2>40</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5>Approved</h5>
                            <h2>40</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5>Pending for Review</h5>
                            <h2>40</h2>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="mt-2 px-5">
                <div id="news-table">
                    <h4>Active News</h4>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Submitted By</th>
                                <th>Status</th>
                                <th>Date Added</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Breaking News</td>
                                <td>
                                    John Doe
                                </td>
                                <td>
                                    Approved 
                                    <i class="fa-solid fa-circle-check ms-1"></i>
                                </td>
                                <td>2025-02-22</td>
                                <td class="d-flex action-btn">
                                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#viewSubmissionModal"><i class="fa-solid fa-eye"></i></button>
                                    <button class="btn btn-sm btn-dark me-1"><i class="fa-solid fa-check"></i></button>
                                    <button class="btn btn-sm btn-dark me-1"><i class="fa-solid fa-xmark"></i></button>
                                    <button class="btn btn-sm btn-dark"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Latest Update</td>
                                <td>
                                    Francis Goswell
                                </td>
                                <td>
                                    Draft 
                                    <i class="fa-solid fa-clock ms-1"></i>
                                </td>
                                <td>2025-02-21</td>
                                <td class="d-flex action-btn">
                                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#viewSubmissionModal"><i class="fa-solid fa-eye"></i></button>
                                    <button class="btn btn-sm btn-dark me-1"><i class="fa-solid fa-check"></i></button>
                                    <button class="btn btn-sm btn-dark me-1"><i class="fa-solid fa-xmark"></i></button>
                                    <button class="btn btn-sm btn-dark"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Some News</td>
                                <td>
                                    Eric Someguy
                                </td>
                                <td>
                                    Under Review
                                    <i class="fa-solid fa-circle-question ms-1"></i>
                                </td>
                                <td>2025-02-21</td>
                                <td class="d-flex action-btn">
                                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#viewSubmissionModal"><i class="fa-solid fa-eye"></i></button>
                                    <button class="btn btn-sm btn-dark me-1"><i class="fa-solid fa-check"></i></button>
                                    <button class="btn btn-sm btn-dark me-1"><i class="fa-solid fa-xmark"></i></button>
                                    <button class="btn btn-sm btn-dark"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                         <!-- Modals -->
                        <CreateNews />
                        <EditNews />
                        <ViewSubmission />
                        <!-- End Modals -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Chart, LineController, LineElement, PointElement, LinearScale, CategoryScale, Title, Tooltip, Legend } from 'chart.js';
    import { nextTick } from 'vue';
    import Header from './partials/Header.vue';
    import CreateNews from './modals/CreateNews.vue';
    import EditNews from './modals/EditNews.vue';
    import ViewSubmission from './modals/ViewSubmission.vue';

    Chart.register(
        LineController,
        LineElement,
        PointElement,
        LinearScale,
        CategoryScale,
        Title,
        Tooltip,
        Legend
    );

    export default {
        components: {
            Header,
            CreateNews,
            EditNews,
            ViewSubmission
        }, 
        mounted() {
        const modal = document.getElementById('staticBackdrop');
        modal.addEventListener('shown.bs.modal', () => {
            if (!this.quill) {
            nextTick(() => {
                if (this.$refs.editorEl) {
                this.quill = new Quill(this.$refs.editorEl, {
                    theme: 'snow'
                });
                }
            });
            }
        });

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
            }
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
        }
    }
</script>

<style scoped>
    td .fa-clock {
        color:rgb(241, 241, 0); 
        margin-left: 70px !important;
    }
    td .fa-bars-progress {
        color: #fff;
    }
    td .fa-circle-check {
        color: green; 
        margin-left: 30px !important;
    }
    td .fa-circle-question {
        color: red;
    }
    header img {
        margin-top: 13px;
    }
</style>