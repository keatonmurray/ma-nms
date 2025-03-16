<template>
    <div class="container-fluid p-0 vh-100">
        <header class="d-flex justify-content-center">
            <figure>
                <img :src="'assets/images/music-alley-logo-inverted.png'" alt="Logo">
            </figure>    
        </header>
        <div class="hero position-relative w-100 h-100">
            <div class="overlay"></div>
            <img id="loginBg" :src="'assets/images/music-alley-bg.jpg'" class="position-absolute top-0 start-0 w-100 h-100 object-fit-fill" alt="Login Background">
            <div id="loginForm" class="position-absolute top-50 start-50 translate-middle text-center p-4">
                <form @submit.prevent="authenticateUser" class="p-4 bg-white shadow">
                    <figure class="text-center mb-3">
                        <img :src="'assets/images/music-alley-logo.png'" alt="Logo" class="logo-img">
                    </figure>
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
                    <button @click="authenticateUser" class="btn btn-dark w-100">
                        <i class="fa-solid fa-right-to-bracket me-1"></i>
                        Login
                    </button>
                    <p class="text-small text-center mt-4">
                        Don't have an account yet?
                        <InertiaLink href="/register" class="text-dark fw-bold">Signup instead</InertiaLink>
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { InertiaLink, useForm } from '@inertiajs/inertia-vue3';
    import { Inertia } from '@inertiajs/inertia';
    import { ref } from 'vue';
    import Swal from 'sweetalert2';

    export default {
        components: {
            InertiaLink
        },
        setup() {
            const form = useForm({
                email: '',
                password: ''
            })
            const errors = ref({})
            const authenticateUser = async () => {
                event.preventDefault();
                const formData = new FormData();
                formData.append('email', form.email)
                formData.append('password', form.password)

                Inertia.post('/login/auth', formData, {
                    onError: (errors) => {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Login failed!",
                            text: errors.email || errors.password || 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                });
            }
            return {
                form,
                authenticateUser
            }
        }
    };
</script>

<style scoped>
    #loginForm form {
        padding: 2px 33px !important;
    }
    #loginBg {
        animation: zoomInOut 10s ease-in-out infinite;
    }
    #loginForm {
        max-width: 563px;
        width: 100%
    }
</style>