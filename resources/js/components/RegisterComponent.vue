<template>
    <div class="container-fluid p-0 vh-100">
        <header class="d-flex justify-content-center">
            <figure>
                <img :src="'assets/images/music-alley-logo-inverted.png'" alt="logo">
            </figure>    
        </header>
        <div class="hero position-relative w-100 h-100">
            <div class="overlay"></div>
            <img id="registerBg" :src="'assets/images/music-alley-bg.jpg'" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Login Background">
            <div id="registerForm" class="position-absolute top-50 start-50 translate-middle text-center p-3 rounded">
                <form @submit.prevent="registerAccount" class="p-3 bg-white shadow rounded">
                    <figure class="text-center mb-3">
                        <img :src="'assets/images/music-alley-logo.png'" alt="Logo" class="logo-img">
                    </figure>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i> 
                        </span>
                        <input v-model="form.name" name="name" type="text" class="form-control" placeholder="Full Name">
                    </div>
    
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i> 
                        </span>
                        <input v-model="form.email" name="email" type="email" class="form-control" placeholder="Email Address">
                    </div>
    
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input v-model="form.password" name="password" type="password" class="form-control" placeholder="Password">
                    </div>
    
                    <button @click="registerAccount" class="btn btn-dark w-100">
                        <i class="fa-solid fa-right-to-bracket me-1"></i>
                        Signup
                    </button>
    
                    <p class="text-small text-center mt-4">
                        Already have an account?
                        <InertiaLink href="/" class="text-dark fw-bold">Login instead</InertiaLink>
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { InertiaLink } from '@inertiajs/inertia-vue3';
    import { useForm } from '@inertiajs/inertia-vue3';
    import { Inertia } from '@inertiajs/inertia';
    import { ref } from 'vue';
    import Swal from 'sweetalert2';

    export default {
        setup() {
            const isSubmitting = ref(false)
            const form = useForm({
                name: '',
                email: '',
                password: ''
            })
            const registerAccount = async () => {
                event.preventDefault(); 
                const formData = new FormData()
                isSubmitting.value = true;
                formData.append('name', form.name)
                formData.append('email', form.email)
                formData.append('password', form.password)
                Inertia.post('register/store', formData, {
                    onFinish: () => {
                            Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Account created successfully!",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            form.reset();
                            setTimeout(() => {
                                Inertia.visit('/'); 
                            }, 500);
                        }).finally(() => {
                            isSubmitting.value = false;
                        })
                    }
                });
            }
            return {
                form,
                registerAccount,
                isSubmitting
            }
        },
        components: {
            InertiaLink,
        },
    };
</script>

<style scoped>
    .hero {
        height: 100vh;
    }
    #registerForm form {
        padding: 2px 33px !important;
    }
    #registerBg {
        animation: zoomInOut 10s ease-in-out infinite;
    }
    #registerForm {
        max-width: 563px;
        width: 100%;
    }
</style>