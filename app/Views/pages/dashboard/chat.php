<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading email-application overflow-hidden">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Chat</h3>
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

    <section class="section">
        <div class="card">
            <div class="row m-2">
                <div class="col-12 col-lg-5 col-xl-3 border-right list-group chat-list">
                    <div class="px-4 d-none d-md-block">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <input type="text" class="form-control my-3" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                    <?php
                    foreach ($user_chat as $uc) { ?>
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <div class="d-flex align-items-start">
                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mx-1" alt="Vanessa Tucker" width="40" height="40">
                                <div class="flex-grow-1 ms-3">
                                    <?= $uc->from->nama_lengkap ?>
                                    <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <div class="d-flex align-items-start">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mx-1" alt="Doris Wilder" width="40" height="40">
                            <div class="flex-grow-1 ms-3">
                                Doris Wilder
                                <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <div class="d-flex align-items-start">
                            <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle mx-1" alt="Haley Kennedy" width="40" height="40">
                            <div class="flex-grow-1 ms-3">
                                Haley Kennedy
                                <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <div class="d-flex align-items-start">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mx-1" alt="Jennifer Chang" width="40" height="40">
                            <div class="flex-grow-1 ms-3">
                                Jennifer Chang
                                <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <div class="d-flex align-items-start">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mx-1" alt="Jennifer Chang" width="40" height="40">
                            <div class="flex-grow-1 ms-3">
                                Jennifer Chang
                                <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <div class="d-flex align-items-start">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mx-1" alt="Jennifer Chang" width="40" height="40">
                            <div class="flex-grow-1 ms-3">
                                Jennifer Chang
                                <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                            </div>
                        </div>
                    </a>

                    <hr class="d-block d-lg-none mt-1 mb-0">
                </div>
                <div class="col-12 col-lg-7 col-xl-9">
                    <div class="py-2 px-4 border-bottom d-none d-lg-block">
                        <div class="d-flex align-items-center py-1">
                            <div class="position-relative">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle ms-1" alt="Sharon Lessman" width="40" height="40">
                            </div>
                            <div class="flex-grow-1 ps-3">
                                <strong>Sharon Lessman</strong>
                                <div class="text-muted small"><em>Typing...</em></div>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative">
                        <div class="chat-messages p-4" id="chat-body">

                            <div class="chat-message-right pb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                    <div class="font-weight-bold mb-1">You</div>
                                    Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                </div>
                            </div>

                            <div class="chat-message-left pb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                    <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                    Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                                </div>
                            </div>

                            <div class="chat-message-right mb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:35 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                    <div class="font-weight-bold mb-1">You</div>
                                    Cum ea graeci tractatos.
                                </div>
                            </div>

                            <div class="chat-message-left pb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:36 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                    <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                    Sed pulvinar, massa vitae interdum pulvinar, risus lectus porttitor magna, vitae commodo lectus mauris et velit.
                                    Proin ultricies placerat imperdiet. Morbi varius quam ac venenatis tempus.
                                </div>
                            </div>

                            <div class="chat-message-left pb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:37 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                    <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                    Cras pulvinar, sapien id vehicula aliquet, diam velit elementum orci.
                                </div>
                            </div>

                            <div class="chat-message-right mb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:38 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                    <div class="font-weight-bold mb-1">You</div>
                                    Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                </div>
                            </div>

                            <div class="chat-message-left pb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:39 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                    <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                    Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                                </div>
                            </div>

                            <div class="chat-message-right mb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:40 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                    <div class="font-weight-bold mb-1">You</div>
                                    Cum ea graeci tractatos.
                                </div>
                            </div>

                            <div class="chat-message-right mb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:41 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                    <div class="font-weight-bold mb-1">You</div>
                                    Morbi finibus, lorem id placerat ullamcorper, nunc enim ultrices massa, id dignissim metus urna eget purus.
                                </div>
                            </div>

                            <div class="chat-message-left pb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:42 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                    <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                    Sed pulvinar, massa vitae interdum pulvinar, risus lectus porttitor magna, vitae commodo lectus mauris et velit.
                                    Proin ultricies placerat imperdiet. Morbi varius quam ac venenatis tempus.
                                </div>
                            </div>

                            <div class="chat-message-right mb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:43 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                    <div class="font-weight-bold mb-1">You</div>
                                    Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                </div>
                            </div>

                            <div class="chat-message-left pb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:44 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                    <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                    Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                                </div>
                            </div>

                            <?php

                            use CodeIgniter\I18n\Time;

                            foreach ($chats as $chat) {
                                $time = Time::parse($chat->created_at);
                                if ($chat->from == 'admin') { ?>
                                    <div class="chat-message-right mb-4">
                                        <div>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2"><?= $time->toLocalizedString('h:mm a') ?></div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                            <div class="font-weight-bold mb-1">You</div>
                                            <?= $chat->pesan ?>
                                        </div>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="chat-message-left pb-4">
                                        <div>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2"><?= $time->toLocalizedString('h:mm a') ?></div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                            <?= $chat->pesan ?>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>

                    <div class="flex-grow-0 py-3 px-4 border-top">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type your message" name="message">
                            <input type="hidden" id="csrf" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                            <input type="hidden" name="from" value="admin">
                            <button class="btn btn-primary" type="submit" name="submit" id="send-chat">Send</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<script>
    const chatList = document.querySelector('.chat-list');

    if (chatList.querySelectorAll('a').length > 9) {
        chatList.style.height = '100vh';
        chatList.style.overflowY = 'scroll';
    }
</script>


<?= $this->endSection(); ?>