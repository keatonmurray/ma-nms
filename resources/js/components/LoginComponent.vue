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
            <div id="loginForm" class="position-absolute top-50 start-50 translate-middle text-center p-4 rounded">
                <form action="" class="p-4 bg-white shadow rounded">
                    <figure class="text-center mb-3">
                        <img :src="'assets/images/music-alley-logo.png'" alt="Logo" class="logo-img">
                    </figure>
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
                        Login
                    </button>
                    <p class="text-small text-center mt-4">
                        Don't have an account yet?
                        <router-link to="/register" class="text-dark fw-bold">Signup instead</router-link>
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>

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