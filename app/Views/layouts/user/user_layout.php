<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/static/css/custom.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/extensions/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/splide/css/splide.min.css') ?>">
</head>

<body class="bg-white overflow-x-hidden">
    <?= $this->include('components/user/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('components/user/chat'); ?>

    <?= $this->include('components/user/footer'); ?>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/splide/js/splide.min.js') ?>"></script>
    <script>
        window.onscroll = function() {
            if (window.location.pathname == "/") {
                if (window.scrollY > 100) {
                    $(".navbar").addClass("navbar-custom-home");
                    $(".navbar-toggler").removeClass("navbar-custom-toggle");
                } else {
                    $(".navbar").removeClass("navbar-custom-home");
                    $(".navbar-toggler").addClass("navbar-custom-toggle");
                    if ($(".navbar-collapse").hasClass("show")) {
                        $(".navbar-collapse").removeClass("show");
                    }
                }
            }

        };
    </script>
    <script>
        $(".chat-btn").click(function(e) {
            e.stopPropagation();
            $(".chat-popup").toggleClass("d-none");
        });

        $(".close-chat").click(function() {
            $(".chat-popup").addClass("d-none");
        });

        $(document).click(function(e) {
            if (
                !$(e.target).closest(".chat-popup").length &&
                !$(e.target).closest(".chat-btn").length
            ) {
                $(".chat-popup").addClass("d-none");
            }
        });
    </script>

    <script>
        $(document).on('click', '.number-spinner button', function() {
            var btn = $(this),
                oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                newVal = 0;

            if (btn.attr('data-dir') == 'up') {
                newVal = parseInt(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            btn.closest('.number-spinner').find('input').val(newVal);
        });
    </script>
    <script>
        if (window.location.pathname == "/detail-product") {
            const gallery = new Splide('#reference-products', {
                type: 'loop',
                perPage: 4,
                gap: 20,
                autoplay: true,
                pagination: false,
                breakpoints: {
                    576: {
                        perPage: 2,
                        gap: 10,
                    },
                    768: {
                        perPage: 3,
                    }
                },
            }).mount();
        }

        if (window.location.pathname == "/about-us") {
            const gallery = new Splide('#gallery-company', {
                type: 'loop',
                perPage: 4,
                autoplay: true,
                pagination: false,
                breakpoints: {
                    576: {
                        perPage: 1,
                    },
                    768: {
                        perPage: 2,
                    },
                    992: {
                        perPage: 3,
                    }
                }
            }).mount();
        }
    </script>
</body>

</html>