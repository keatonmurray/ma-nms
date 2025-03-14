<template>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">
              <i class="fa-solid fa-pen-to-square"></i>
              Create News
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="News Title">
              </div>
              <div class="input-group mb-3">
                <input type="file" class="form-control attachment-field" placeholder="Upload Banner Image">
              </div>
              <div class="mb-3">
                <label class="form-label">Content</label>
                <div ref="editorEl" class="editor" style="height: 200px;"></div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-dark px-3" @click="submitEntry()">Submit</button>
            <button type="button" class="btn btn-sm btn-dark px-3" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
    import { nextTick } from 'vue'
    import Quill from 'quill'
    import Swal from 'sweetalert2'
    import 'quill/dist/quill.snow.css'
    
    export default {
        data() {
          return {
              quill: null
          }
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
        },
        methods: {
          submitEntry() {
                Swal.fire({
                title: "Submit entry?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire("We'll be reviewing this, and get back to you!", "", "success");
                    } 
                });
            }
        }
    }
  </script>

  <style scoped>
      .attachment-field {
        line-height: 40px !important;
    }
  </style>
  