<template>
    <header class="d-flex justify-content-between align-items-center px-5">
        <div>
            <i class="fa-solid fa-bars-progress" data-bs-target="#sidebar" data-bs-toggle="offcanvas"></i>
        </div>
        <figure>
            <img :src="'assets/images/music-alley-logo-inverted.png'" alt="logo">
        </figure>    
        <a href="" class="text-decoration-none fw-bold text-white">Keaton Murray <i class="fa-solid fa-caret-down ms-1"></i></a>
    </header>
</template>

<style scoped>
    header .fa-bars-progress {
        color: #fff;
    }
    figure {
        margin: 0 !important;
    }
</style>