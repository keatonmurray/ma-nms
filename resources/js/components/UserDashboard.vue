<template>
    <div class="container-fluid pb-5 px-0 h-auto">
        <Sidebar />
        <Header />
        <div id="user">
            <Subheader />
            <Cards />
            <br>
            <div class="mt-5 px-5">
                <div id="news-table">
                    <DataTable 
                        :news="news" 
                        @delete-news="deleteSubmission"
                    />
                     <!-- Modals -->
                    <CreateNews />
                    <EditNews />
                    <!-- End Modals -->
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
    import DataTable from './tables/user/DataTable.vue';
    import Sidebar from './tables/user/Sidebar.vue';
    import Cards from './tables/user/Cards.vue';

    export default {
        components: {
            Header,
            CreateNews,
            EditNews,
            Subheader,
            DataTable,
            Sidebar,
            Cards   
        }, 
        props: {
            news: Array
        },
        mounted() {
            this.news
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
            },
        }
    }
</script>

<style scoped>

    header img {
        margin-top: 13px;
    }
</style>