<template>
     <div class="row px-5">
        <div class="col-12 col-md-3 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5>Active News</h5>
                    <h2>{{ newsCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5>Approved</h5>
                    <h2>{{ approvedNews ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5>For Approval</h5>
                    <h2>{{ pendingNews ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5>Drafts</h5>
                    <h2>{{ draftedNews ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            newsCount: Number,
            approvedNews: Number,
            pendingNews: Number,
            draftedNews: Number
        }
    }
</script>