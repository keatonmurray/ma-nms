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
              <input @change="handleFileUpload" type="file" class="form-control attachment-field">
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
import 'quill/dist/quill.snow.css'

export default {
  setup() {
    const editorEl = ref(null)  
    const quill = ref(null)   

    //Inertia Object
    const form = useForm({
      title: '',        
      body: '',       
      attachments: null 
    })

    const handleFileUpload = (event) => {
      form.attachments = event.target.files[0]
    }

    const submitEntry = () => {
      form.body = quill.value.root.innerHTML

      Swal.fire({
        title: 'Submit entry?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
      }).then((result) => {
        if (result.isConfirmed) {
          //Submit POST Data to Laravel Controller
          form.post(route('news.store', { id: 1 }), {
            onSuccess: () => {
              Swal.fire('Success!', 'News has been submitted.', 'success')
              form.reset() 
              quill.value.setContents([]) 
            },
            onError: () => {
              Swal.fire('Oops!', 'There were some errors.', 'error')
            }
          })
        }
      })
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
