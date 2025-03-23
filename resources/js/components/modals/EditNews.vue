<template>
    <div class="modal fade" id="editNews" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editNewsLabel">Edit News</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="News Title">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control attachment-field" placeholder="Upload Banner Image">
                        </div>
                        <div class="mb-3">
                            <label for="editor" class="form-label">Content</label>
                            <div ref="editorEl" class="editor" style="height:450px;"></div>
                        </div>
                        <textarea name="content" id="content" hidden></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-dark px-3">Update</button>
                    <button type="button" class="btn btn-sm btn-dark px-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Quill from 'quill'
    import 'quill/dist/quill.snow.css'

    export default {
        data() {
            return {
                quill: null
            }
        },
        mounted() {
            const modal = document.getElementById('editNews');
            modal.addEventListener('shown.bs.modal', () => {
                if (!this.quill) {
                    this.quill = new Quill(this.$refs.editorEl, {
                        theme: 'snow'
                    });
                }
            });
        },
    }
</script>

<style scoped>
    .attachment-field {
        line-height: 40px !important;
    }
</style>