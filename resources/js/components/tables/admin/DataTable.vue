<template>
    <div class="mt-2 px-5">
        <div id="news-table">
            <h4>Submissions</h4>
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
                    <tr v-for="(item, index) in submissions" :key="item.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.title }}</td>
                    <td>{{ item.user.name }}</td>
                    <td>
                        {{ item.status }}
                        <i v-if="item.status === 'Approved'" class="fa-solid fa-circle-check ms-1 text-success"></i>
                        <i v-else class="fa-solid fa-hourglass-half ms-1 text-muted"></i>
                    </td>
                    <td>{{ item.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      news: []
    }
  },
  methods: {
    getNews() {
      this.news.push({
        id: 1,
        title: 'Breaking News',
        user: { name: 'John Doe' },
        status: 'Approved',
        created_at: '2025-03-16'
      });
    }
  },
  mounted() {
    this.getNews();
  }
}
</script>
