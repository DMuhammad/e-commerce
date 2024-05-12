<div class="chat-container">
    <div class="chat-btn m-3"><i class="fa-solid fa-comment"></i></div>

    <div class="chat-popup p-0 shadow-lg d-none">
        <div class="card mx-auto mb-0 pb-0" style="width:350px; height:500px;">
            <div class="card-header bg-transparent border-bottom shadow-sm p-2">
                <div class="navbar navbar-expand p-0">
                    <ul class="navbar-nav me-auto align-items-center">
                        <li class="nav-item">
                            <a href="#!" class="nav-link">
                                <img src="<?= base_url('assets/static/images/faces/1.jpg') ?>" class="img-fluid rounded-circle" alt="" width="50">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">PT. Persada Jayaraya Abadi</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <button type="button" class="nav-link close-chat"><i class="fa-solid fa-xmark"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body p-4" id="chat-body" style="overflow: auto; background-color:#f5f5f5;">
            </div>
            <div class="card-footer m-0 p-1">
                <div class="input-group ps-2">
                    <input type="text" class="form-control border-0" placeholder="Write a message..." name="message">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" id="csrf" />
                    <input type="hidden" name="from" value="<?= $_SESSION['id'] ?>" />
                    <input type="hidden" name="to" value="admin" />

                    <div class="input-group-text bg-transparent border-0">
                        <button class="btn-custom-success" type="submit" name="submit" id="send-chat"><i class="fa-regular fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>