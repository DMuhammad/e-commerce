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

    <link rel="stylesheet" href="<?= base_url('assets/extensions/daterangepicker/daterangepicker.css') ?>">
</head>

<body>
    <div id="app">
        <?= $this->include('components/admin/sidebar'); ?>

        <div id="main">
            <?= $this->include('components/admin/header'); ?>

            <?= $this->renderSection('content'); ?>

            <?= $this->include('components/admin/footer'); ?>
        </div>
    </div>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

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
    <script src="<?= base_url('assets/extensions/daterangepicker/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/daterangepicker/daterangepicker.js') ?>"></script>

    <!-- Scrollbar -->
    <script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

    <!-- ChartJS -->
    <script src="<?= base_url('assets/extensions/chart.js/chart.umd.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/ui-chartjs.js') ?>"></script>

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
</body>

</html>