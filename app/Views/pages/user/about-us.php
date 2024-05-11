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
            <h2 class="text-black">Welcome To <?= $admin->nama_lengkap ?></h2>
            <p class="text-black pe-4"><?= $company->deskripsi ?></p>
        </div>
        <div class="col-lg-6 bg-success rounded-4 p-5 d-flex flex-column justify-content-start">
            <div>
                <h1 class="text-white">VISION</h1>
                <p class="text-white">
                    <?= $company->visi ?>
                </p>
            </div>
            <div>
                <h1 class="text-white">MISSION</h1>
                <span class="text-white">
                    <?= $company->misi ?>
                </span>
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
                        <a href="<?= base_url('assets/static/images/gallery.avif') ?>" data-toggle="lightbox">
                        <img src="<?= base_url('assets/static/images/gallery.avif') ?>" alt="gallery company" class="img-fluid">
                        </a>
                    </li>
                    <li class="splide__slide">
                    <a href="<?= base_url('assets/static/images/gallery2.avif') ?>" data-toggle="lightbox">
                        <img src="<?= base_url('assets/static/images/gallery2.avif') ?>" alt="gallery company" class="img-fluid">
                        </a>
                    </li>
                    <li class="splide__slide">
                    <a href="<?= base_url('assets/static/images/gallery3.avif') ?>" data-toggle="lightbox">
                        <img src="<?= base_url('assets/static/images/gallery3.avif') ?>" alt="gallery company" class="img-fluid">
                        </a>
                    </li>
                    <li class="splide__slide">
                    <a href="<?= base_url('assets/static/images/gallery4.avif') ?>" data-toggle="lightbox">
                        <img src="<?= base_url('assets/static/images/gallery4.avif') ?>" alt="gallery company" class="img-fluid">
                        </a>
                    </li>
                    <li class="splide__slide">
                    <a href="<?= base_url('assets/static/images/gallery5.avif') ?>" data-toggle="lightbox">
                        <img src="<?= base_url('assets/static/images/gallery5.avif') ?>" alt="gallery company" class="img-fluid">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>