<template>
    <header class="d-flex justify-content-between align-items-center px-5">
        <div>
            <i class="fa-solid fa-bars-progress" data-bs-target="#sidebar" data-bs-toggle="offcanvas"></i>
        </div>
        <figure>
            <img :src="'/assets/images/music-alley-logo-inverted.png'" alt="logo">
        </figure>    
        <div class="dropdown">
            <a href="#" class="text-decoration-none fw-bold text-white dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Keaton Murray 
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Profile Settings</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </div>
    </header>
</template>

<style scoped>
    header .fa-bars-progress {
        color: #fff;
    }
    figure {
        margin: 0 !important;
    }
    .dropdown-menu li:hover {
        background-color: #000 !important;
    }

    .dropdown-menu .dropdown-item:hover {
        color: #fff !important;
        background-color: #000 !important;
    }
</style>