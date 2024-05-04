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
                            <a href="#!" class="nav-link">Royhan</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <button type="button" class="nav-link close-chat"><i class="fa-solid fa-xmark"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body p-4" style="overflow: auto; background-color:#f5f5f5;">
                <div class="d-flex flex-column align-items-start mb-4">
                    <div class="chat-right p-2 px-3 m-1">Hi helh, are you available to chat?</div>
                </div>

                <div class="d-flex flex-column align-items-end text-end justify-content-end mb-4">
                    <div class="chat-left p-2 px-3 m-1">Sure</div>
                    <div class="chat-left p-2 px-3 m-1 ">Let me know when you're available? </div>
                </div>

                <div class="d-flex flex-column align-items-start mb-4">
                    <div class="chat-right p-2 px-3 m-1">3:00pm??</div>
                </div>

                <div class="d-flex flex-column align-items-end text-end justify-content-end mb-4">
                    <div class="chat-left p-2 px-3 m-1">Cool</div>
                    <div class="chat-left p-2 px-3 m-1 mb-5">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <a href=""><i class="fas fa-play"></i></a>
                            </div>
                            <div class="col">
                                <div class="progress" style="width:100px; height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="small fw-bold">0:34</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer position-absolute w-100 bottom-0 m-0 p-1">
                <div class="input-group ps-2">
                    <input type="text" class="form-control border-0" placeholder="Write a message...">

                    <div class="input-group-text bg-transparent border-0">
                        <button class="btn-custom-success"><i class="bi bi-send"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>