<template>
    <div class="row px-5">
        <div class="col-12 col-md-3 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5>Total Spent</h5>
                    <h2>${{ totalSpent ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5>Submissions</h5>
                    <h2>{{ submissionCount }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5>Approved</h5>
                    <h2>{{ approvedCount }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5>Pending for Review</h5>
                    <h2>{{ pendingCount }}</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            totalSpent: Number,
            submissionCount: Number,
            approvedCount: Number,
            pendingCount: Number
        }
    }
</script>