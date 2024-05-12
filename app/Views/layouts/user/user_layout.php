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

    <link rel="stylesheet" href="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.css') ?>">
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
    <script src="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/lightbox-bs5/lightbox.js') ?>"></script>

    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "<?= session()->getFlashdata('success') ?>",
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>


    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "<?= session()->getFlashdata('error') ?>",
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

    <script>
        // Function to reset all labels to default color
        function resetLabels() {
            document.querySelectorAll('.variant-label').forEach(function(label) {
                label.style.backgroundColor = '#f8f9fa';
                label.style.color = '#198754';
            });
        }

        // Get all variant radio buttons
        var radios = document.querySelectorAll('.variant-radio');

        // Add a change event listener to each radio button
        radios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                // Reset the color of all labels
                resetLabels();

                // Change the color of the selected label
                if (this.checked) {
                    var label = document.querySelector('label[for="' + this.id + '"]');
                    label.style.backgroundColor = '#198754';
                    label.style.color = '#fff';

                    // Redirect to the detail page of the selected variant
                    window.location.href = '/detail-product/' + this.value;
                }
            });
        });

        // Check the radio button of the current variant and change the color of its label
        var currentVariantId = window.location.pathname.split('/').pop();
        var selectedVariant = document.querySelector('.variant-radio[value="' + currentVariantId + '"]');
        if (selectedVariant) {
            selectedVariant.checked = true;
            resetLabels(); // Reset all labels before setting the selected one
            var selectedLabel = document.querySelector('label[for="' + selectedVariant.id + '"]');
            if (selectedLabel) {
                selectedLabel.style.backgroundColor = '#198754';
                selectedLabel.style.color = '#fff';
            }
        }
    </script>


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
                        chat_body.empty();
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
        if (window.location.pathname == "/about-us") {
            const gallery = new Splide('#gallery-company', {
                type: 'loop',
                perPage: 4,
                perMove: 1,
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
        } else {
            let element = document.querySelectorAll('.products');

            element.forEach((el) => {
                new Splide(el, {
                    type: 'loop',
                    perPage: 4,
                    perMove: 1,
                    autoplay: true,
                    trimSpace: false,
                    gap: 20,
                    pagination: false,
                    breakpoints: {
                        576: {
                            perPage: 1,
                        },
                        768: {
                            perPage: 2,
                            gap: 10,
                        },
                        992: {
                            perPage: 3,
                        }

                    },
                }).mount();
            });
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
    <script>
        function deleteItem() {
            document.querySelector('.delete-form').submit();
        }
    </script>

    <script>
        const input = document.getElementById('input-search');
        input.addEventListener('input', function() {
            event.preventDefault();
            const search = input.value.toLowerCase();

            const items = document.querySelectorAll('.list-products');
            items.forEach(item => {
                const title = item.querySelector('.custom-card-title').textContent.toLowerCase();
                if (title.includes(search)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>