<template>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            <i class="fa-solid fa-pen-to-square"></i>
            Create News
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form @submit.prevent="submitEntry">
            <div class="input-group mb-3">
              <input v-model="form.title" name="title" type="text" class="form-control" placeholder="News Title">
            </div>

            <div class="input-group mb-3">
              <input @change="handleFileUpload" name="attachments" type="file" class="form-control attachment-field">
            </div>

            <div class="mb-3">
              <label class="form-label">Content</label>
              <div ref="editorEl" class="editor" style="height: 450px;"></div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-dark px-3" @click="submitEntry">Submit</button>
          <button type="button" class="btn btn-sm btn-dark px-3" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Quill from 'quill'
import Swal from 'sweetalert2'
import { useForm } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'
import 'quill/dist/quill.snow.css'

export default {
  props: {
    postUrl: {
      type: String,
      required: true
    },
  },

  data() {
    return {
      editorEl: null,
      quill: null,
      isSubmitting: false,
      form: useForm({
        title: '',
        body: '',
        attachments: null,
        errors: {}
      })
    }
  },

  mounted() {
    this.quill = new Quill(this.$refs.editorEl, {
      theme: 'snow'
    })
  },

  methods: {
    handleFileUpload(event) {
      this.form.attachments = event.target.files[0]
    },

    async submitEntry() {
      this.form.body = this.quill.root.innerHTML

      const result = await Swal.fire({
        title: 'Submit entry?',
        showCancelButton: true,
        confirmButtonText: 'Yes'
      })

      if (result.isConfirmed) {
        this.isSubmitting = true

        try {
          const formData = new FormData()
          formData.append('title', this.form.title)
          formData.append('body', this.form.body)
          formData.append('attachments', this.form.attachments)

          Inertia.post(this.postUrl, formData, {
            onError: (error) => {
              this.form.errors = error.response?.data?.errors || {}
            },
            onSuccess: () => {
              Swal.fire({
                title: 'Success!',
                text: 'We will be reviewing this shortly',
                icon: 'success',
                confirmButtonText: 'Okay',
                backdrop: false
              }).then(() => {
                const modalBackdrop = document.querySelector('.modal-backdrop')
                const modalElement = document.getElementById('staticBackdrop')
                const modalInstance = bootstrap.Modal.getInstance(modalElement)

                if (modalInstance) modalInstance.hide()
                if (modalBackdrop) modalBackdrop.remove()

                document.body.style.overflow = 'auto'
              })

              this.form.reset()
              this.quill.setContents([])
            }
          })
        } catch (error) {
          console.error('An error occurred:', error)
        } finally {
          this.isSubmitting = false
        }
      }
    }
  }
}
</script>


<style scoped>
  .attachment-field {
    line-height: 40px !important;
  }
</style>
