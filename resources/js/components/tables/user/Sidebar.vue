<template>
    <div class="offcanvas offcanvas-start text-white" id="sidebar">
        <div class="offcanvas-header">
            <img :src="'assets/images/music-alley-logo-inverted.png'" alt="Logo">
            <h5 class="offcanvas-title">Music Alley</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li>
                    <a href="#" class="text-white text-decoration-none d-block py-2">
                        <i class="fa-solid fa-newspaper me-2"></i>
                        Active News
                    </a>
                </li>
                <li>
                    <a href="#" class="text-white text-decoration-none d-block py-2">
                        <i class="fa-solid fa-person-circle-check me-2"></i>
                        Approved
                    </a>
                </li>
                <li>
                    <a href="#" class="text-white text-decoration-none d-block py-2">
                        <i class="fa-solid fa-chalkboard-user me-2"></i>
                        For Approval
                    </a>
                </li>
                <li>
                    <a href="#" class="text-white text-decoration-none d-block py-2">
                        <i class="fa-solid fa-clock me-2"></i>
                        Drafts
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>