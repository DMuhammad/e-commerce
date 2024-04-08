<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/icoonly.css') ?>">

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
</head>

<body>
    <div id="app">
        <?= $this->include('components/sidebar'); ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <?= $this->renderSection('content'); ?>

            <?= $this->include('components/footer'); ?>
        </div>
    </div>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/datatables.net/js/dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/datatables.net/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/datatables.net-bs5/js/responsive.bootstrap5.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/datatables.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/choices.js/public/assets/scripts/choices.min.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/summernote/summernote-lite.min.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/summernote.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/filepond/filepond.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/filepond.js') ?>"></script>

</body>

</html>