<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/static/css/custom.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/extensions/fontawesome/css/all.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/extensions/datatables.net-bs5/css/responsive.bootstrap5.min.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('assets/extensions/choices.js/public/assets/styles/choices.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/extensions/summernote/summernote-lite.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/form-editor-summernote.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/extensions/filepond/filepond.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/filepond.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/extensions/daterangepicker/daterangepicker.css') ?>">
</head>

<body>
    <div id="app" style="background-color: #F3F4F3;">
        <?= $this->include('components/admin/sidebar'); ?>

        <div id="main">
            <?= $this->include('components/admin/header'); ?>

            <?= $this->renderSection('content'); ?>
        </div>
    </div>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>

    <!-- Sweetalert / Swalfire -->
    <script src="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/swalfire.js') ?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url('assets/extensions/datatables.net/js/dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/datatables.net/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/datatables.net-bs5/js/responsive.bootstrap5.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/datatables.js') ?>"></script>

    <!-- Choices -->
    <script src="<?= base_url('assets/extensions/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/choices.js') ?>"></script>

    <!-- Summernote -->
    <script src="<?= base_url('assets/extensions/summernote/summernote-lite.min.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/summernote.js') ?>"></script>

    <!-- Filepond -->
    <script src="<?= base_url('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/filepond/filepond.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/filepond.js') ?>"></script>

    <!-- Datepicker -->
    <script src="<?= base_url('assets/extensions/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/daterangepicker/daterangepicker.js') ?>"></script>

    <!-- ChartJS -->
    <script src="<?= base_url('assets/extensions/chart.js/chart.umd.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/ui-chartjs.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/lightbox-bs5/lightbox.js') ?>"></script>

    <script>
        const rupiahToNumeric = (rupiah) => {
            const numericString = rupiah.replace(/[^\d]/g, '');
            const numericValue = parseFloat(numericString);

            return numericValue;
        }

        $('.price-product').on('input', function() {
            const input = $(this).val()
            const numericValue = rupiahToNumeric(input)
            $(this).val(`Rp. ${numericValue.toLocaleString('id-ID')}`)

            if (isNaN(numericValue)) {
                $(this).val('Rp. 0')
            }
        })
    </script>

    <script>
        function previewImages() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        };
    </script>
    <script>
        $(document).ready(function() {
            const base_url = `<?= base_url() ?>`
            const pathName = $(location).attr('pathname');
            const chat_content = $(".chat-content");
            const btn_show_chat = $(".show-chat");
            let id, nama_lengkap;
            const conn = new WebSocket('ws://localhost:8282?userId=admin');

            conn.onopen = function(e) {
                console.log("Connection established!");
            };

            conn.onmessage = function(e) {
                console.log("Received message: ", e.data);
                showChat(base_url, id, nama_lengkap);
            };
            
            function scrollMsgBottom(){
                const d = $('.chat-body');
                d.scrollTop(d.prop("scrollHeight"));
            }

            // Fungsi untuk mengirim pesan melalui WebSocket
            function sendWebSocketMessage(to, message) {
                var msg = JSON.stringify({
                    targetUserId: to,
                    message: message
                });
                conn.send(msg);
            }

            function showChat(url, id, nama_lengkap) {
                $.ajax({
                    url: `${url}chats/${id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        chat_content.empty();
                        const content = `
                            <div class="tab-pane active show" id="${id}" role="tabpanel" tabindex="0">
                                <div class="card m-0">
                                    <div class="card-header py-2 px-4 border-bottom d-none d-lg-block">
                                        <div class="d-flex align-items-center py-1">
                                            <img src="<?= base_url('assets/static/images/user.png') ?>" class="rounded-circle ms-1" alt="user" width="40" height="40">
                                            <div class="flex-grow-1 ps-3"> ${nama_lengkap} </div>
                                        </div>
                                    </div>
                                    <div class="card-body m-xl-0 m-3">
                                        <div class="p-md-4 p-sm-2 p-1 chat-body">
                                            ${response.chats.map(chat => {
                                                if (chat.from == id) {
                                                    return `<div class="d-flex flex-column align-items-start justify-content-end">
                                                                <div class="chat-left p-2 px-3 m-1">${chat.pesan}</div>
                                                            </div>`
                                                }
                                                return `<div class="d-flex flex-column align-items-end">
                                                            <div class="chat-right p-2 px-3 m-1"> ${chat.pesan} </div> 
                                                        </div>`
                                            })}
                                        </div>
                                    </div>
                                    <div class="card-footer py-2 px-4">
                                        <div class="input-group ps-2">
                                            <input type="text" class="form-control border-0" placeholder="Write a message..." name="message">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="${response.token}" id="csrf" />
                                            <input type="hidden" name="from" value="admin" />
                                            <input type="hidden" name="to" value="${id}" />
    
                                            <div class="input-group-text bg-transparent border-0">
                                                <button class="btn-custom-success" type="submit" name="submit" id="send-chat"><i class="fa-regular fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                        chat_content.append(content);
                        scrollMsgBottom();
                    },
                    error: function(response) {
                        console.log('error', response);
                    }
                })
            }

            $(btn_show_chat).click(function(e) {
                id = $(this).attr('aria-controls');
                nama_lengkap = $(this).find('.nama-lengkap').text();

                showChat(base_url, id, nama_lengkap);
            })

            chat_content.on('click', '#send-chat', function(e) {
                e.preventDefault();
                const csrf = $('#csrf');
                const message = $("input[name='message']");
                const message_from = $("input[name='from']").val();
                const message_to = $("input[name='to']").val();
                const chat_body = $(".chat-body");

                const new_message = `
                                <div class="d-flex flex-column align-items-end">
                                    <div class="chat-right p-2 px-3 m-1">${message.val()}</div>
                                </div>
                            `

                $.ajax({
                    url: `${base_url}chat/send`,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    method: 'post',
                    data: {
                        from: message_from,
                        to: message_to,
                        message: message.val(),
                        [csrf.attr('name')]: csrf.val()
                    },
                    dataType: 'json',
                    success: function(response) {
                        csrf.val(response.token)
                        chat_body.append(new_message);
                        message.val('')
                        scrollMsgBottom();
                        sendWebSocketMessage(message_to, message.val());
                    },
                    error: function(response) {
                        console.log('error', response);
                    }
                });
            });

            $('#search-users').on('input', function() {
                let value = $(this).val().toLowerCase();

                $('.list-group-item').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // ketika llist group item child button di click
            $('.list-group-item').click(function() {
                $('.first-content').addClass('d-none');
            })

        })
    </script>
</body>

</html>