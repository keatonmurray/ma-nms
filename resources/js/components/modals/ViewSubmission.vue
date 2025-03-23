<template>
    <div class="modal fade" id="viewSubmissionModal" tabindex="-1" aria-labelledby="viewSubmissionModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" v-if="entry">
          <div class="modal-header">
            <h5 class="modal-title" id="viewSubmissionModalLabel">Submission Content</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
          <div class="modal-body">
            <div class="w-100">
                <img 
                    :src="entry.attachments ? getAttachmentPath(entry.attachments) : '/assets/images/default-image.jpg'" 
                    alt="Cover Image" 
                    class="img-fluid w-100"
                >
            </div>
  
            <div class="w-100 d-flex justify-content-center mb-4">
              <h3 class="text-center text-uppercase my-4 w-80 fw-bold">
                {{ entry.title }}
                <span class="d-block subheading">
                  {{ entry.author_name }}
                </span>
              </h3>
            </div>
            <p class="paragraph" v-html="entry.body"></p>
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-dark">
              <i class="fa-solid fa-download me-2"></i>
              Download Attachments
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      entry: {
        type: Object,
        default: null
      }
    },
    mounted() {
      this.entry
    },
    methods: {
        getAttachmentPath(path) {
            if (!path) return '';
            const cleanedPath = path.replace(/^"+|"+$/g, '');
            return `/storage/${cleanedPath}`;
        }
    }
  }
  </script>
  
  <style scoped>
  .subheading {
    font-weight: 500;
    font-size: 18px;
    text-transform: none !important;
    color: #1c1c1c;
    margin-top: 5px;
  }
  .paragraph {
    font-size: 16px;
  }
  </style>
  