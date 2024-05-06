<?= $this->extend('layouts/user/user_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-5 mb-4 d-flex justify-content-center" style="background: url(' <?= base_url('assets/static/images/background.png') ?>') no-repeat center center/cover;">
    <div class="p-5 mb-4 d-block col-xxl-7 col-lg-8 col-12">
        <div class="d-block">
            <h1 class="fw-bold text-center text-white">About Us</h1>
        </div>
    </div>
</div>


<div class="container">
    <div class="row my-5">
        <div class="col-lg-6">
            <h2 class="text-black">Welcome To PT Persada Jayaraya Abadi</h2>
            <p class="text-black pe-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="col-lg-6 bg-success rounded-4 p-5 d-flex flex-column justify-content-between">
            <div>
                <h1 class="text-white">VISION</h1>
                <p class="text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
            <div>
                <h1 class="text-white">MISION</h1>
                <ul class="text-white">
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, excepturi?</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, excepturi?</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, excepturi?</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, excepturi?</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, excepturi?</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, excepturi?</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, excepturi?</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row justify-content-end mb-5 position-relative">
        <div class="custom-card shadow">
            <h1 class="lh-base text-black fw-semibold m-4">We are nice people with a lot of experience</h1>
        </div>
        <div class="col-8">
            <img src="<?= base_url('assets/static/images/background.png') ?>" alt="background" class="img-fluid">
        </div>
        <div class="col-3 d-flex flex-column justify-content-start">
            <div class="bg-success rounded-3 p-3 mb-3">
                <h1 class="text-white">19 +</h1>
                <p class="text-white">Years of Experience</p>
            </div>
            <div class="bg-success rounded-3 p-3">
                <h1 class="text-white">100%</h1>
                <p class="text-white">Succesfull</p>
            </div>
        </div>
    </div>
    <div class="mb-5">
        <h2 class="text-center text-black mb-4">Gallery</h2>
        <div id="gallery-company" class="splide text-center">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img src="<?= base_url('assets/static/images/gallery.avif') ?>" alt="gallery company">
                    </li>
                    <li class="splide__slide">
                        <img src="<?= base_url('assets/static/images/gallery2.avif') ?>" alt="gallery company">
                    </li>
                    <li class="splide__slide">
                        <img src="<?= base_url('assets/static/images/gallery3.avif') ?>" alt="gallery company">
                    </li>
                    <li class="splide__slide">
                        <img src="<?= base_url('assets/static/images/gallery4.avif') ?>" alt="gallery company">
                    </li>
                    <li class="splide__slide">
                        <img src="<?= base_url('assets/static/images/gallery5.avif') ?>" alt="gallery company">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>