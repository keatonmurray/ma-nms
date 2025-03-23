<template>
    <div class="container-fluid pb-5 px-0 h-auto">
        <Sidebar />
        <Header :user="user" />
        <div id="user">
            <Subheader />
            <Cards 
                :newsCount="newsCount"
                :approvedCount="approvedCount"
                :pendingNews="pendingNews"
                :draftedNews="draftedNews"
            />
            <br>
            <div class="mt-5 px-5">
                <div id="news-table">
                    <DataTable 
                        :news="news" 
                        @show="displayEntry"
                        @delete-news="deleteSubmission"
                        @set-draft="updateSubmission"
                    />
                     <!-- Modals -->
                    <CreateNews />
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
    import Swal from 'sweetalert2';
    import Header from './partials/Header.vue';
    import CreateNews from './modals/CreateNews.vue';
    import EditNews from './modals/EditNews.vue';
    import ViewSubmission from './modals/ViewSubmission.vue';
    import Subheader from './partials/Subheader.vue';
    import DataTable from './tables/user/DataTable.vue';
    import Sidebar from './tables/user/Sidebar.vue';
    import Cards from './tables/user/Cards.vue';

    export default {
        components: {
                Header,
                CreateNews,
                EditNews,
                ViewSubmission,
                Subheader,
                DataTable,
                Sidebar,
                Cards   
            }, 
            data() {
                return {
                    selectedEntry: null
                }
            },
            computed: {
                countAll() {
                    return this.news.length;
                }
            },
            props: {
                news: Array,
                newsCount: Number,
                approvedCount: Number,
                pendingNews: Number,
                draftedNews: Number,
                user: Object,
                entry: Object
            },
            mounted() {
                this.news
                this.newsCount
                this.approvedCount
                this.pendingNews
                this.draftedNews
                this.user
                this.entry
            },
            methods: {
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
                updateSubmission(item) {
                    Swal.fire({
                        title: "Do you want to draft this submission?",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            item.status = 'Draft'
                            Inertia.put(`/news/update/${item.id}`, {
                                status: item.status 
                            }, {
                                preserveScroll: true,
                                onSuccess: () => {
                                Swal.fire("Submission Drafted!", "", "success");
                                }
                            });
                        }
                    });
                },
                displayEntry(item) {
                    this.selectedEntry = item
                }
        }
    }
</script>

<style scoped>

    header img {
        margin-top: 13px;
    }
</style>