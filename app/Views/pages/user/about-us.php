<?= $this->extend('layouts/user/user_layout') ?>
<?= $this->section('content') ?>

<div class="hero-section d-flex flex-column justify-content-center align-items-center text-center" style="height: 50vh;">
    <div class="w-50">
        <h2 class="text-white">About Us</h2>
    </div>
</div>
<div class="container">
    <div class="row my-5">
        <div class="col-lg-6">
            <h3 class="fw-light text-success">ABOUT US</h3>
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
    <div class="row my-5">
        <img src="<?= base_url('assets/static/images/background.png') ?>" alt="" class="col-9">
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
    <div class="my-5">
        <h1 class="text-center text-black">Gallery</h1>
        <div class="row row-cols-1 row-cols-lg-3 mt-4 mb-3">
            <img src="<?= base_url('assets/static/images/background.png') ?>" alt="" class="col">
            <img src="<?= base_url('assets/static/images/background.png') ?>" alt="" class="col">
            <img src="<?= base_url('assets/static/images/background.png') ?>" alt="" class="col">
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        Prev
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link active" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        Next
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?= $this->endSection() ?>