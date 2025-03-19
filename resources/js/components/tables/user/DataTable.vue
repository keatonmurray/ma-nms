<template>
<div>
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
            <tr v-for="(item, index) in news" :key="item.id">
                <td>{{ index + 1 }}</td>
                <td>{{ item.title }}</td>
                <td>
                    {{ item.status }}
                    <i v-if="item.status == 'Pending'" class="fa-solid fa-clock"></i>
                    <i v-if="item.status == 'Approved'" class="fa-solid fa-circle-check"></i>
                    <i v-if="item.status == 'Drafts'" class="fa-solid fa-circle-question"></i>
                    <i v-if="item.status == 'Denied'" class="fa-solid fa-ban"></i>
                </td>
                <td>{{ formatDate(item.created_at) }}</td>
                <td class="d-flex action-btn">
                    <button class="btn btn-sm btn-dark me-1" data-bs-toggle="modal" data-bs-target="#editNews"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-sm btn-dark"@click="$emit('delete-news', item.id)"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "Submissions"
        },
        news: Array
    },
    methods: {
        formatDate(dateStr) {
            const date = new Date(dateStr);
                return date.toLocaleDateString(undefined, {
                    year: "numeric",
                    month: "short",
                    day: "numeric"
                });
            }
        }
    }   
</script>

<style scoped>
    td .fa-clock {
        color:rgb(241, 241, 0); 
        margin-left: 70px;
    }
    td .fa-bars-progress {
        color: #fff;
    }
    td .fa-circle-check {
        color: green; 
        margin-left: 55px;
    }
    td .fa-ban {
        color: red;
        margin-left: 80px;
    }
    td .fa-circle-question {
        color: red;
        margin-left: 90px;
    }
</style>