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
                            For Approval
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none d-block py-2">
                            <i class="fa-solid fa-clock me-2"></i>
                            Drafts
                        </a>
                    </li>
                </ul>
            </div>
        </div>
       <Header />
        <div id="user">
            <Subheader />
            <div class="row px-5">
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
                            <h2>12</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5>For Approval</h5>
                            <h2>10</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5>Drafts</h5>
                            <h2>17</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="mt-5 px-5">
                <div id="news-table">
                    <h4>Active News</h4>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
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
                                    Approved 
                                    <i class="fa-solid fa-circle-check ms-1"></i>
                                </td>
                                <td>2025-02-22</td>
                                <td class="d-flex action-btn">
                                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#editNews"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-sm btn-dark" @click="deleteSubmission()"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Latest Update</td>
                                <td>
                                    Draft 
                                    <i class="fa-solid fa-clock ms-1"></i>
                                </td>
                                <td>2025-02-21</td>
                                <td class="d-flex action-btn">
                                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#editNews"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-sm btn-dark" @click="deleteSubmission()"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Some News</td>
                                <td>
                                    Under Review
                                    <i class="fa-solid fa-circle-question ms-1"></i>
                                </td>
                                <td>2025-02-21</td>
                                <td class="d-flex action-btn">
                                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#editNews"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-sm btn-dark" @click="deleteSubmission()"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                         <!-- Modals -->
                        <CreateNews />
                        <EditNews />
                        <!-- End Modals -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2';
    import Header from './partials/Header.vue';
    import CreateNews from './modals/CreateNews.vue';
    import EditNews from './modals/EditNews.vue';
    import Subheader from './partials/Subheader.vue';

    export default {
        components: {
            Header,
            CreateNews,
            EditNews,
            Subheader
        }, 
        methods: {
            deleteSubmission() {
                Swal.fire({
                    title: "Do you want to delete this submission?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire("Submission Deleted!", "", "success");
                    }
                });
            }
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