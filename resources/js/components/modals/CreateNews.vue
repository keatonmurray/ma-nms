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
          <form @submit.prevent="submitEntry">
            <div class="input-group mb-3">
              <input v-model="form.title" name="title" type="text" class="form-control" placeholder="News Title">
            </div>

            <div class="input-group mb-3">
              <input @change="handleFileUpload" name="attachments" type="file" class="form-control attachment-field">
            </div>

            <div class="mb-3">
              <label class="form-label">Content</label>
              <div ref="editorEl" class="editor" style="height: 200px;"></div>
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
import { nextTick, ref } from 'vue'
import { useForm } from '@inertiajs/vue3' 
import Quill from 'quill'
import Swal from 'sweetalert2'
import { Inertia } from '@inertiajs/inertia'
import 'quill/dist/quill.snow.css'

export default {
  setup() {
    const editorEl = ref(null)  
    const quill = ref(null)   
    const isSubmitting = ref(false)

    const form = useForm({
      title: '',        
      body: '',       
      attachments: null,
      errors: {}
    })

    const handleFileUpload = (event) => {
      form.attachments = event.target.files[0]
    }

    const submitEntry = async () => {
      form.body = quill.value.root.innerHTML

      const result = await Swal.fire({
        title: 'Submit entry?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
      })

      if (result.isConfirmed) {
        isSubmitting.value = true

        try {
          const formData = new FormData()
          formData.append('title', form.title)
          formData.append('body', form.body)
          formData.append('attachments', form.attachments)

          Inertia.post('/news/store/1', formData, {
            onError: (error) => {
              form.errors = error.response.data.errors || {}
            },
            onSuccess: () => {
                Swal.fire({
                title: 'Success!',
                text: 'We will be reviewing this shortly',
                icon: 'success',
                confirmButtonText: 'Okay', 
                backdrop: false, 
              }).then(() => {
                const modalBackdrop = document.querySelector('.modal-backdrop');
                const modalOpen = document.body;

                if (modalBackdrop) {
                  modalBackdrop.remove(); 
                }

                modalOpen.style.overflow = 'auto';
                Inertia.visit('/admin');
              });
              form.reset();
              quill.value.setContents([]);
            }
          })
        } catch (error) {
          console.error('An error occurred:', error)
        } finally {
          isSubmitting.value = false
        }
      }
    }

    nextTick(() => {
      if (editorEl.value && !quill.value) {
        quill.value = new Quill(editorEl.value, {
          theme: 'snow'
        })
      }
    })

    return {
      editorEl,
      quill,
      form,
      isSubmitting,
      handleFileUpload,
      submitEntry
    }
  }
}
</script>

<style scoped>
  .attachment-field {
    line-height: 40px !important;
  }
</style>
