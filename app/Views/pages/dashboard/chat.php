<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading email-application overflow-hidden">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="fw-semibold text-dark">Chat</h3>
                <p class="text-subtitle text-muted">Unleashing the power of seamless communication with our cutting-edge chat application.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section chat-window">
        <div class="row justify-content-start h-100 gy-3">
            <div class="col-12 col-lg-4 col-xl-3 flex-column border-end border-1 bg-white">
                <div class="px-4">
                    <form class="my-3" role="search">
                        <input type="search" class="form-control" id="search-users" placeholder="Search...">
                    </form>
                    <div class="chat-list-users card-body mb-3">
                        <ul class="nav nav-tabs flex-column bg-white rounded-3 " role="tablist">
                            <?php foreach ($user_chat as $uc) { ?>
                                <li class="nav-item list-group-item" role="presentation">
                                    <button class="nav-link px-0 w-100 show-chat" data-bs-toggle="tab" data-bs-target="#<?= $uc->from->id ?>" type="button" role="tab" aria-controls="<?= $uc->from->id ?>" aria-selected="false">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <img src="<?= base_url('assets/static/images/user.png') ?>" class="rounded-circle mx-1" alt="user" width="40" height="40">
                                            <div class="flex-grow-1 ms-3 text-start nama-lengkap">
                                                <?= $uc->from->nama_lengkap ?>
                                            </div>
                                        </div>
                                    </button>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-9 tab-content bg-white p-md-0 p-1 chat-content">
                <div class="first-content h-100">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <h5 class="fw-semibold text-dark">Your Message</h5>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>