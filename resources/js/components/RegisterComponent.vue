<template>
    <div class="container-fluid p-0 min-vh-100">
        <header class="d-flex justify-content-center">
            <figure>
                <img :src="'assets/images/music-alley-logo-inverted.png'" alt="logo">
            </figure>    
        </header>
        <div class="hero w-100 h-auto d-flex justify-content-center align-items-center">
            <div class="overlay"></div>
            <img id="registerBg" :src="'assets/images/music-alley-bg.jpg'" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Login Background">
            <div id="registerForm" class="position-absolute top-50 start-50 translate-middle text-center p-3 rounded">
                <form action="" class="p-3 bg-white shadow rounded">
                    <figure class="text-center mb-3">
                        <img :src="'assets/images/music-alley-logo.png'" alt="Logo" class="logo-img">
                    </figure>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i> 
                        </span>
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
    
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i> 
                        </span>
                        <input type="email" class="form-control" placeholder="Email Address">
                    </div>
    
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
    
                    <button type="submit" class="btn btn-dark w-100">
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

    export default {
        components: {
            InertiaLink
        }
    };
</script>

<style scoped>
    #registerForm form {
        padding: 2px 33px !important;
    }
    #registerBg {
        animation: zoomInOut 10s ease-in-out infinite;
    }
    #registerForm {
        max-width: 563px;
        width: 100%
    }
</style>