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
    <link rel="stylesheet" href="<?= base_url('assets/extensions/daterangepicker/daterangepicker.css') ?>">
</head>

<body class="bg-white overflow-x-hidden">
    <?= $this->include('components/user/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('components/user/chat'); ?>

    <?= $this->include('components/user/footer'); ?>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/splide/js/splide.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/daterangepicker/daterangepicker.js') ?>"></script>

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
            $("#chat-body").scrollTop($("#chat-body")[0].scrollHeight - $("#chat-body")[0].clientHeight);
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
        $(document).ready(function() {
            const base_url = `<?= base_url() ?>`
            const chat_body = $("#chat-body");
            const ws_url = base_url.replace(/http:\/\/|https:\/\//g, "ws://").replace(/\/$/, '');
            
            var conn = new WebSocket(`ws://localhost:8282?userId=<?= $_SESSION['id'] ?>`);
            
            conn.onopen = function(e) {
                console.log(e);
                console.log("Connection established!");
            };

            conn.onmessage = function(e) {
                getChat(base_url);
                console.log("Received message: ", e.data);
            };
            
            $(function() {
                getChat(base_url);
            })

            // Fungsi untuk mengirim pesan melalui WebSocket
            function sendWebSocketMessage(from, to, message) {
                var msg = JSON.stringify({
                    targetUserId: to,
                    from,
                    message
                });
                conn.send(msg);
            }

            function getChat(url) {
                $.ajax({
                    url: `${url}chats`,
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        response.chats.map(chat => {
                            const user_message = `
                                <div class="d-flex flex-column align-items-end text-end justify-content-end mb-4">
                                    <div class="chat-right p-2 px-3 m-1">${chat.pesan}</div>
                                </div>
                                `
                            const admin_message = `
                                <div class="d-flex flex-column align-items-start mb-4">
                                    <div class="chat-left p-2 px-3 m-1">${chat.pesan}</div>
                                </div>
                                `
                            chat.from == "admin" ? chat_body.append(admin_message) : chat_body.append(user_message)
                            chat_body.scrollTop(chat_body[0].scrollHeight - chat_body[0].clientHeight);
                        })
                    },
                    error: function(response) {
                        console.log('error', response);
                    }
                })
            }

            $("#send-chat").click(function(e) {
                e.preventDefault();
                const csrf = $('#csrf');
                const message = $("input[name='message']");
                const message_from = $("input[name='from']").val();
                const message_to = $("input[name='to']").val();
                const new_message = `
                            <div class="d-flex flex-column align-items-end text-end justify-content-end">
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
                        chat_body.scrollTop(chat_body[0].scrollHeight - chat_body[0].clientHeight);
                        
                        sendWebSocketMessage(message_from, message_to, message.val());
                    },
                    error: function(response) {
                        console.log('error', response);
                    }
                });
            });
        })
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
    <script>
        $(function() {
            $('input[name="payment-date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2000,
                maxYear: parseInt(moment().format('YYYY'), 10)
            });
        });
    </script>
</body>

</html>