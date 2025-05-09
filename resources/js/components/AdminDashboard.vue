<template>
    <div class="container-fluid pb-5 px-0 h-auto">
        <Sidebar />
        <Header :user="user"/>
        <div id="admin">
            <Subheader />
            <Cards 
                :totalSpent="totalSpent" 
                :submissionCount="submissionCount"
                :approvedCount="approvedCount"
                :pendingCount="pendingCount"
            />
            <Charts />
            <div class="mt-2 px-5">
                <div id="news-table">
                    <DataTable
                        :news="news"
                        title="Submissions"
                        @show="displayEntry"
                        @approve="approveSubmission"
                        @deny="denySubmission"
                        @pending="pendingSubmission"
                        @delete="deleteSubmission"
                    />
                    <!-- Modals -->
                    <CreateNews :postUrl="`/news/store/${user.id}`" />
                    <EditNews />
                    <ViewSubmission :entry="selectedEntry" />
                    <!-- End Modals -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Inertia } from '@inertiajs/inertia';
    import { nextTick } from 'vue';
    import Swal from 'sweetalert2';
    import Header from './partials/Header.vue';
    import CreateNews from './modals/CreateNews.vue';
    import EditNews from './modals/EditNews.vue';
    import ViewSubmission from './modals/ViewSubmission.vue';
    import Subheader from './partials/Subheader.vue';
    import DataTable from './tables/admin/DataTable.vue';
    import Cards from './tables/admin/Cards.vue';
    import Charts from './tables/admin/Charts.vue';
    import Sidebar from './tables/admin/Sidebar.vue';

    export default {
        components: {
            Header,
            CreateNews,
            EditNews,
            ViewSubmission,
            Subheader,
            DataTable,
            Cards,
            Charts,
            Sidebar
        }, 
        computed: {
            countAll() {
                    return this.news.length;
                }
        },
        data() {
            return {
                selectedEntry: null
            }
        },
        props: {
            news: Array,
            totalSpent: Number,
            submissionCount: Number,
            approvedCount: Number,
            pendingCount: Number,
            user: Object,
            entry: Object
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
            })
          
            this.news,
            this.totalSpent,
            this.submissionCount,
            this.approvedCount,
            this.pendingCount,
            this.user
            this.entry
        },
        methods: {
            approveSubmission(item) {
                Swal.fire({
                title: "Do you want to approve of this submission?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    }).then((result) => {
                        if (result.isConfirmed) {
                        item.status = 'Approved'
                        Inertia.put(`/news/update/${item.id}`, {
                            status: item.status 
                        }, {
                            preserveScroll: true,
                            onSuccess: () => {
                            Swal.fire("Submission Approved!", "", "success");
                            }
                        });
                    }
                });
            },
            denySubmission(item) {
                Swal.fire({
                    title: "Do you want to deny this submission?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    if (result.isConfirmed) {
                        item.status = 'Denied';
                        Inertia.put(`/news/update/${item.id}`, {
                            status: item.status
                        }, {
                            preserveScroll: true,
                            onSuccess: () => {
                                Swal.fire("Submission Denied!", "", "success");
                            }
                        });
                    }
                });
            },

            pendingSubmission(item) {
                Swal.fire({
                    title: "Do you want to leave this submission on pending?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    if (result.isConfirmed) {
                        item.status = 'Pending';
                        Inertia.put(`/news/update/${item.id}`, {
                            status: item.status
                        }, {
                            preserveScroll: true,
                            onSuccess: () => {
                                Swal.fire("Submission Still Pending", "", "success");
                            }
                        });
                    }
                });
            },
            deleteSubmission(item) {
                Swal.fire({
                    title: "Do you want to delete this submission?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Inertia.delete(`/news/delete/${item.id}`, {
                            data: {
                                id: item.id
                            },
                            preserveScroll: true,
                            onSuccess: () => {
                                Swal.fire("Submission Deleted!", "", "success");
                            }
                        });
                    }
                });
            },
            displayEntry(item) {
                this.selectedEntry = item
            },
            formatDate(dateString) {
                const options = { year: 'numeric', month: 'short', day: 'numeric' };
                return new Date(dateString).toLocaleDateString('en-US', options);
            }
        }
    }
</script>

<style scoped>
    header img {
        margin-top: 13px;
    }
</style>