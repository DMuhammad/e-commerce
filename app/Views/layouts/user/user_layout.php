<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/fontawesome/css/all.min.css') ?>">

    <style>
        .hero-section {
            background-image: url('<?= base_url('assets/static/images/hero-img.png') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            /* display: flex;
            justify-content: center;
            align-items: center; */
        }
    </style>
</head>

<body class="bg-white overflow-x-hidden">
    <?= $this->include('components/user/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('components/user/footer'); ?>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
</body>

</html>