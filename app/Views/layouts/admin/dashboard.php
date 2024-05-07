<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
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

    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/chat-application.css') ?>">

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

    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

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
            const chat_body = $("#chat-body");
            console.log(`${base_url}chat/send`);
            $("#send-chat").click(function(e) {
                e.preventDefault();
                const csrf = $('#csrf');
                const message = $("input[name='message']");
                const message_from = $("input[name='from']").val();
                const new_message = `
                            <div class="chat-message-right mb-4">
                                <div>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
                                    <div class="text-muted small text-nowrap mt-2">2:43 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                <div class="font-weight-bold mb-1">You</div>
                                ${message.val()}
                                </div>
                                </div>
                                `

                console.log(message.val());
                console.log(message_from);
                console.log(csrf.attr('name'));
                console.log(csrf.val());
                $.ajax({
                    url: `${base_url}chat/send`,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    method: 'post',
                    data: {
                        from: message_from,
                        message: message.val(),
                        [csrf.attr('name')]: csrf.val()
                    },
                    dataType: 'json',
                    success: function(response) {
                        csrf.val(response.token)
                        chat_body.append(new_message);
                        message.val('')
                        chat_body.scrollTop(chat_body[0].scrollHeight - chat_body[0].clientHeight);
                        console.log(response);
                    },
                    error: function(response) {
                        console.log('error', response);
                    }
                });
            });
            // $.ajax({
            //     url: `${base_url}chats`,
            //     method: 'get',
            //     dataType: 'json',
            //     success: function(response) {
            //         response.chats.map(chat => {
            //             const new_message = `
            //                 <div class="d-flex flex-column align-items-end text-end justify-content-end mb-4">
            //                     <div class="chat-left p-2 px-3 m-1">${chat.pesan}</div>
            //                 </div>
            //                 `
            //             chat_body.append(new_message)
            //         })
            //     },
            //     error: function(response) {
            //         console.log('error', response);
            //     }
            // })
        })
    </script>
</body>

</html>