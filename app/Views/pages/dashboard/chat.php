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
                            <li class="nav-item list-group-item" role="presentation">
                                <button class="nav-link px-0 w-100" data-bs-toggle="tab" data-bs-target="#user1" type="button" role="tab" aria-controls="user1" aria-selected="false">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <img src="<?= base_url('assets/static/images/user.png') ?>" class="rounded-circle mx-1" alt="user" width="40" height="40">
                                        <div class="ms-3 ">Agus Sahlan</div>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item list-group-item" role="presentation">
                                <button class="nav-link px-0 w-100" data-bs-toggle="tab" data-bs-target="#user2" type="button" role="tab" aria-controls="user2" aria-selected="false">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <img src="<?= base_url('assets/static/images/user.png') ?>" class="rounded-circle mx-1" alt="user" width="40" height="40">
                                        <div class="ms-3 ">Budi Luhur</div>
                                    </div>
                                </button>
                            </li>
                            <?php foreach ($user_chat as $uc) { ?>
                                <li class="nav-item list-group-item" role="presentation">
                                    <button class="nav-link px-0 w-100" data-bs-toggle="tab" data-bs-target="#<?= $uc->from->id ?>" type="button" role="tab" aria-controls="<?= $uc->from->id ?>" aria-selected="false">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <img src="<?= base_url('assets/static/images/user.png') ?>" class="rounded-circle mx-1" alt="user" width="40" height="40">
                                            <div class="flex-grow-1 ms-3">
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
                <div class="tab-pane" id="user1" role="tabpanel" tabindex="0">
                    <div class="card m-0">
                        <div class="card-header py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <img src="<?= base_url('assets/static/images/user.png') ?>" class="rounded-circle ms-1" alt="user" width="40" height="40">
                                <div class="flex-grow-1 ps-3"> Agus Sahlan </div>
                            </div>
                        </div>
                        <div class="card-body chat-body m-xl-0 m-3">
                            <div class="p-md-4 p-sm-2 p-1">
                                <div class="d-flex flex-column align-items-end mb-4">
                                    <div class="chat-right p-2 px-3 m-1">Hi helh, are you available to chat?</div>
                                </div>

                                <div class="d-flex flex-column align-items-start text-end justify-content-end mb-4">
                                    <div class="chat-left p-2 px-3 m-1">Sure</div>
                                    <div class="chat-left p-2 px-3 m-1 ">Let me know when you're available? </div>
                                </div>

                                <div class="d-flex flex-column align-items-end mb-4">
                                    <div class="chat-right p-2 px-3 m-1">3:00pm??</div>
                                </div>

                                <div class="d-flex flex-column align-items-start text-end justify-content-end mb-4">
                                    <div class="chat-left p-2 px-3 m-1">Cool</div>
                                </div>
                                <?php
                                foreach ($chats as $chat) {
                                    if ($chat->from == 'admin') { ?>
                                        <div class="d-flex flex-column align-items-end mb-4">
                                            <div class="chat-right p-2 px-3 m-1"><?= $chat->pesan ?></div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex flex-column align-items-start text-end justify-content-end mb-4">
                                            <div class="chat-left p-2 px-3 m-1"><?= $chat->pesan ?></div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card-footer py-2 px-4">
                            <div class="input-group ps-2">
                                <input type="text" class="form-control border-0" placeholder="Write a message..." name="message">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" id="csrf" />
                                <input type="hidden" name="from" value="<?= $_SESSION['id'] ?>" />

                                <div class="input-group-text bg-transparent border-0">
                                    <input type="hidden" id="csrf" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                    <input type="hidden" name="from" value="admin">
                                    <button class="btn-custom-success" type="submit" name="submit" id="send-chat"><i class="fa-regular fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="user2" role="tabpanel" tabindex="1">
                    <div class="card m-0">
                        <div class="card-header py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <img src="<?= base_url('assets/static/images/user.png') ?>" class="rounded-circle ms-1" alt="user" width="40" height="40">
                                <div class="flex-grow-1 ps-3">Budi Luhur</div>
                            </div>
                        </div>
                        <div class="card-body chat-body m-xl-0 m-3">
                            <div class="p-md-4 p-sm-2 p-1">
                                <div class="d-flex flex-column align-items-end mb-4">
                                    <div class="chat-right p-2 px-3 m-1">Hi helh, are you available to chat?</div>
                                </div>

                                <div class="d-flex flex-column align-items-start text-end justify-content-end mb-4">
                                    <div class="chat-left p-2 px-3 m-1">Sure</div>
                                    <div class="chat-left p-2 px-3 m-1 ">Let me know when you're available? </div>
                                </div>

                                <div class="d-flex flex-column align-items-end mb-4">
                                    <div class="chat-right p-2 px-3 m-1">3:00pm??</div>
                                </div>

                                <div class="d-flex flex-column align-items-start text-end justify-content-end mb-4">
                                    <div class="chat-left p-2 px-3 m-1">Cool</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-2 px-4">
                            <div class="input-group ps-2">
                                <input type="text" class="form-control border-0" placeholder="Write a message..." name="message">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" id="csrf" />
                                <input type="hidden" name="from" value="<?= $_SESSION['id'] ?>" />

                                <div class="input-group-text bg-transparent border-0">
                                    <button class="btn-custom-success" type="submit" name="submit" id="send-chat"><i class="fa-regular fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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