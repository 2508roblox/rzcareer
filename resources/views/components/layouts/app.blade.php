<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="csrf-token" content="9CoAncfdHy47rnzBRFrQvFyilPIcMLZy5A5RZXDK">
        <meta name="dmca-site-verification" content="QVlvMHUyWnMwUmpnaStkWDFQSk1BZz090" />
        <meta name="google-site-verification" content="9unXHJ2al_YE0rdbabAk_KfLJ8O4HIf9eSvFtk-WIfE" />
        <meta name="facebook-domain-verification" content="r3wyi71q6xjotcnmc4blsxst988du8" />
        <meta name="copyright" content="Công ty TNHH Eyeplus Online" />
        <meta name="distribution" content="global">
        <meta name="revisit-after" content="1 days">
        <meta property="fb:app_id" content="111638053939917" />
        <meta property="og:site_name" content="https://timviec.com.vn" />
        <meta property="og:locale" content="vi_VN" />
        <link rel="shortcut icon" type="image/x-icon" href="https://timviec.com.vn/favicon.png" id="favicon">
        <title>{{ $title ?? 'Page Title' }}</title>


        <meta name="description"
            content="Tìm kiếm việc làm nhanh 24h, hiệu quả ✔️ Đăng tin tuyển dụng và tìm ứng viên miễn phí ✔️ Tạo CV tìm việc và Ứng tuyển nhanh chóng!">
        <meta name="keywords"
            content="tim viec lam, viec lam, việc làm, tìm việc làm, tim viec nhanh, tìm việc nhanh, kiếm việc, tìm việc">
        <link rel="canonical" href="https://timviec.com.vn" />
        <meta property="og:title" content="Tìm Việc Làm Nhanh 24h, Tuyển Dụng Hiệu Quả Toàn Quốc 2024" />
        <meta property="og:description"
            content="Tìm kiếm việc làm nhanh 24h, hiệu quả ✔️ Đăng tin tuyển dụng và tìm ứng viên miễn phí ✔️ Tạo CV tìm việc và Ứng tuyển nhanh chóng!" />
        <meta property="og:type" content="website" />
        <meta property="og:image:url" content="https://timviec.com.vn/images/share_thumb_preview_v2.png" />
        <meta name="twitter:card" content="timviec.com.vn" />
        <meta name="twitter:site" content="@timviec" />
        <meta name="twitter:title" content="Tìm Việc Làm Nhanh 24h, Tuyển Dụng Hiệu Quả Toàn Quốc 2024" />
        <meta name="twitter:description"
            content="Tìm kiếm việc làm nhanh 24h, hiệu quả ✔️ Đăng tin tuyển dụng và tìm ứng viên miễn phí ✔️ Tạo CV tìm việc và Ứng tuyển nhanh chóng!" />
        <link rel="dns-prefetch" href="//google-analytics.com">
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
        <link rel="dns-prefetch" href="//fontawesome.com">
        <link rel="dns-prefetch" href="//connect.facebook.net">
        <link rel="dns-prefetch" href="//google.com">
        <link rel="dns-prefetch" href="//facebook.com">
        <link rel="dns-prefetch" href="//gstatic.com">
        <link rel="dns-prefetch" href="//staticxx.facebook.com">
        <link rel="prev" href="https:timviec.com.vn" />
       <!-- Thay đổi URL tĩnh thành URL động -->
<link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

<link href="{{ asset('assets/plugins/mcx-dialog-mobile/mcx-dialog-mobile.css') }}" rel="stylesheet">

<link href="{{ asset('assets/minify/minify.css') }}" rel="stylesheet">

<link href="{{ asset('assets/placeholder-loading/dist/css/placeholder-loading.min.css') }}" rel="stylesheet">

  <!-- Styles -->
  @livewireStyles


    </head>

<body>

    <!-- Header Include -->
    @include('partials._header')

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer Include -->
    @include('partials._footer')

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Custom Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- Custom JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- External JS Example -->

    <!-- Additional Inline Scripts if needed -->
    @stack('scripts')

</body>

<script type="text/javascript" src="{{ asset('assets/minify/minify.js') }}?v=sji79p"></script>
<script src="//js.pusher.com/7.0/pusher.min.js"></script>
<script>
    let user_id = "9db278f97a8a1e6ba1a8ca13be19d8f8"
    let channelUser
    if ("") {
        localStorage.removeItem("saler_chat_live_guest")
        localStorage.removeItem("user_guest_info")
        localStorage.removeItem("user_guest_id")
    } else {
        if (!localStorage.getItem("user_guest_id")) {
            localStorage.setItem("user_guest_id", user_id)
        }
        user_id = localStorage.getItem("user_guest_id")
        localStorage.removeItem("sale-current")
    }
    if (localStorage.getItem("user_guest_info") && localStorage.getItem("user_guest_id") && localStorage.getItem("saler_chat_live_guest") || localStorage.getItem("sale-current")) {
        let pusher = new Pusher("617c9ac6bd7bce513a59", {
            cluster: "ap1"
        });
        channelUser = pusher.subscribe(`channel-user-${user_id}`);
    }
</script>
<script src="https://timviec.com.vn/js/plugins/toastr/toastr.min.js"></script>
<style>
    #support-ticket-root {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        line-height: 1.5
    }

    #support-ticket-panel {
        bottom: 125px;
        /* bottom: 90px; */
        box-shadow: 0 4px 16px rgba(0, 0, 0, .08);
        max-width: 100%;
        min-height: 100px;
        overflow: hidden;
        right: 40px;
        background-color: #fff;
        border-radius: 8px;
        position: fixed;
        width: 360px;
        z-index: 1049;
        animation: ease 1s;
        display: none;
    }

    .support-ticket-panel-header {
        background-color: #3b78dc;
        background-position-x: right;
        background-position-y: center;
        background-repeat: no-repeat;
        background-size: 176px, 164px;
        border-radius: 8px 8px 0 0;
        color: #fff;
        font-size: 15px;
        padding: 15px;
    }

    .support-ticket-panel-header .support-ticket-panel-title {
        font-size: 25px;
        font-style: normal;
        font-weight: 700;
        line-height: 30px;
        margin-bottom: 20px;
        text-align: center;
        color: #fff;
    }

    .support-ticket-panel-header .support-ticket-panel-title span {
        border-bottom: solid 1px;
        padding-bottom: 5px;
    }

    .support-ticket-panel-header .support-ticket-panel-title img {
        margin-right: 8px;
        width: 24px;
    }

    .support-ticket-panel-header .support-ticket-cs {
        height: 56px;
    }

    .support-ticket-cs-people {
        align-items: center;
        display: flex;
        gap: 12px;
    }

    .support-ticket-panel-header .support-ticket-cs-avatar img {
        border-radius: 50%;
        height: 56px;
        width: 56px;
    }

    .support-ticket-panel-header .support-ticket-cs-name {
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 15px;
        margin-bottom: 8px;
    }

    .support-ticket-panel-header .support-ticket-cs-heading {
        font-size: 11px;
        font-style: normal;
        font-weight: 500;
        line-height: 16px;
    }

    .support-ticket-panel-body ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .support-ticket-panel-body li {
        background: #fff;
        border-bottom: 1px solid #e9eaec;
        margin: 0;
        padding: 0;
    }

    .support-ticket-panel-body li:hover a {
        color: #0091ce;
    }

    .support-ticket-panel-body li a {
        align-items: center;
        color: #212f3f;
        display: flex;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        gap: 20px;
        height: 50px;
        justify-content: flex-start;
        line-height: 20px;
        padding: 14px 20px;
        width: 100%;
        text-decoration: none;
    }

    .support-ticket-panel-body li a i {
        color: #0091ce;
        font-size: 20px;
        width: 26px;
        border-radius: 100px;
        background: white;
    }

    #support-ticket-launcher {
        align-items: center;
        background-color: #4285f4;
        border-radius: 50%;
        bottom: 15px;
        color: #fff;
        cursor: pointer;
        display: flex;
        font-size: 27px;
        height: 45px;
        width: 45px;
        right: 45px;
        bottom: 70px;
        justify-content: center;
        padding: 6px;
        position: fixed;
        text-align: center;
        transform: rotate(0);
        z-index: 99999;
        user-select: none;
    }

    #support-ticket-launcher img,
    #support-ticket-launcher i {
        user-select: none;
    }

    #support-ticket-launcher:hover {
        background: #3b78dc;
    }

    #support-ticket-launcher i {
        font-size: 25px;
        font-weight: 400;
    }

    .custom-point {
        content: "";
        width: 0;
        height: 0;
        border-left: 17px solid transparent;
        border-right: 18px solid transparent;
        border-top: 20px solid #3498db;
        position: absolute;
        bottom: -20px;
        left: 85%;
        transform: translateX(-50%);
    }

    .popup-title-suport-ticket-launcher {
        position: absolute;
        background: #3498db;
        width: 300px;
        right: -50%;
        font-size: 14px;
        bottom: 150%;
        font-weight: bold;
        display: flex;
        justify-content: space-around;
        border-radius: 5px;
        z-index: 9999;
    }
</style>
<div class="modal fade" id="modal-support-lien-he" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important;" role="document">
        <div class="modal-content" style="background-color: #f0f0f0; !important;">
            <div class="modal-header text-center" style="background: #0091ce;color: #ffff;justify-content: center">
                <div class="fs-20 mb-0 text-uppercase">Liên hệ</div>
            </div>
            <div class="modal-body">
                <p><b>Timviec.com.vn</b> cam kết sẽ xử lý các vấn đề của bạn trong vòng tối đa 24h.</p>
                <p>Hotline: 0981.441.766 và 0981.448.766</p>
                <p>Trong trường hợp không liên lạc được, vui lòng gửi hỗ trợ tới email: <a
                        href="/cdn-cgi/l/email-protection" class="__cf_email__"
                        data-cfemail="462e2932342906322f2b302f23256825292b683028">[email&#160;protected]</a></p>
                <p>Xin cảm ơn!</p>
            </div>
        </div>
    </div>
</div>
<div id="support-ticket-root">
    <div id="support-ticket-panel">
        <style>
            .inp-name,
            .inp-phone {
                height: 30px;
                font-size: 14px
            }

            .popup_suggest_chat {
                bottom: 15%;
                position: absolute;
                left: 20%;
                display: none;
            }

            .popup_suggest_chat-job {
                cursor: pointer;
                background: #fff;
                padding: 5px 10px;
                border-radius: 15px;
                font-weight: 400;
                margin-bottom: 10px;
            }

            .popup_suggest_chat-close {
                text-align: center;
                font-weight: 400;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('assets/chatapp/mini-box.css') }}">
        <div class="mini-box-chat-web-guest " data-sale style="display: none; height: 400px;">
            <div class="mini-box-chat-web-guest-header">
                <span class="btn-back-guest">
                    <i class="fas fa-chevron-left"></i>
                </span>
            </div>
            <div class="conversation">
                <div id="message-welcome" class="messages messages--received">
                </div>
                <div class="conversation-contents-chat"></div>
                <div class="card" style="width: 18rem; margin: auto">
                    <div class="card-body">
                        <p class="card-text">Chào Anh/Chị, hãy để lại SĐT và tên để được tư vấn chi tiết nhất nhé!</p>
                        <input type="text" class="form-control inp-name" placeholder="Nhập họ và tên...">
                        <br>
                        <input type="text" class="form-control inp-phone" placeholder="Nhập số điện thoại...">
                        <br>
                        <div class="box_type_customer d-flex justify-content-between"> Tôi là :
                            <label for="inp-uv"> Ứng viên
                                <input type="radio" name="type_customer" id="inp-uv" value="2">
                            </label>
                            <label for="inp-ntd"> Nhà tuyển dụng
                                <input type="radio" name="type_customer" id="inp-ntd" value="1">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-bar">
                <div class="text-bar__field">
                    <textarea type="text" class="chat-web-contents type_msg" placeholder="Nhập nội dung..."></textarea>
                </div>
                <div style="cursor: pointer"
                    class=" chatweb-btn-send text-bar__thumb d-flex justify-content-center align-items-center">
                    <i class="fas fa-location-arrow"></i>
                </div>
            </div>
            <div class="popup_suggest_chat">
                <div class="popup_suggest_chat-job">
                    <span>Bạn muốn hỏi về công việc này <i class="fas fa-question-square"
                            style="color: cadetblue"></i></span>
                </div>
                <div class="popup_suggest_chat-close">
                    <span style="    background: #fff;
            padding: 5px 10px;
            border-radius: 15px;
            cursor: pointer;">Đóng
                        <i class="fas fa-times-circle" style="color: #ff0000ad"></i></span>
                </div>
            </div>
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script>
            $(document).ready(function () {
                let i = 2 //page
                let user_id = localStorage.getItem('user_guest_id');
                let number_unread = $(`.number-un-read-guest`)
                let user_guest_info = JSON.parse(localStorage.getItem("user_guest_info"))
                let saler_chat_live_guest = JSON.parse(localStorage.getItem("saler_chat_live_guest"))
                let paramsSend = {
                    "user_id": user_id,
                    "user_type_id": user_guest_info?.user_type_id,
                    "name": user_guest_info?.name,
                    "phone": user_guest_info?.phone,
                    "to_user": saler_chat_live_guest?.id,
                    "contents": "",
                    "user_sent": user_id,
                    "job_id": 0,
                    "params": ""
                }
                let next_page = ""


                function initChannel() {
                    if (channelUser) {
                        channelUser.bind(`messages-with-${user_id}`, function (data) {
                            let mess = data.data;
                            if (mess?.so_chat_live_auto_chia) {
                                delete mess.user_id
                                let saler_chat_new = mess
                                localStorage.setItem("saler_chat_live_guest", JSON.stringify(saler_chat_new))
                                saler_chat_live_guest = JSON.parse(localStorage.getItem(
                                    "saler_chat_live_guest"))
                                setTimeout(() => window.location.reload(), 1000)
                                return toastr.info("Cuộc hội thoại đã được thay đổi người tư vấn");
                            }
                            if ($(".mini-box-chat-web-guest.clicked.visited").length > 0) {
                                callAjaxUpdateRead(mess.user_sent)
                                pushChat(mess)
                            } else {
                                let numberUnRead = Number(number_unread.text()) || 0
                                number_unread.text(numberUnRead + 1)
                                number_unread.css({
                                    "color": "#ffff",
                                    "font-size": "13px",
                                    "border-radius": "10px",
                                    "background": "red",
                                    "padding": "3px"
                                })
                                if (click_support % 2 == 0) {
                                    $("#support-ticket-launcher").append(
                                        `   <span class="flag-notification" style="position: absolute;color: red;top: -4px;right: -4px;font-size: 14px;border-radius:10px;">
            					<i style="font-size: 20px;" class="fad fa-circle"></i>
            				</span>`
                                    )
                                }

                            }
                        });
                    }
                }
                const renderChat = (dataChat) => {
                    $(".conversation-contents-chat").html("")
                    dataChat.reverse()
                    dataChat.map((item) => {
                        template(item)
                    })
                    scrollInto()
                }

                const template = (item, type = 0) => { //type = 0 : click vào hội thoại, type = 1: kéo xem tin nhắn
                    let htmlMess = ""
                    let contentItem = $(document.createTextNode(item.contents))
                    if (item.user_sent != item.user_id) {
                        let userCurentActive = item.user_sent != item.admin_id;
                        htmlMess = $(`

				<div id="message-${item.id}" class="messages messages--received">
                                            <pre  class=" message content-chat-item" style="margin-bottom:0;text-wrap: wrap;max-width:20vw;word-break: break-word;"></pre>
											<div class="msg_time fs-10 message-time mb-3" style=" display: none;text-align:left"">
                        <span>${formatDate(item.created_at)} <span style="color:${userCurentActive ? '#ff00008f' : '#00800094'}">${userCurentActive ? " (" + item?.r_admin_sent_in_history?.name + ") " : ""}</span></span>
                </div>
              	</div>


                            `)
                        htmlMess.find('.content-chat-item').append(contentItem)
                        if (type != 0) {
                            $(".conversation-contents-chat").prepend(htmlMess)
                        } else {
                            $(".conversation-contents-chat").append(htmlMess)
                        }
                    } else {
                        htmlMess = $(`

				<div class="messages messages--sent" id="message-${item.id}">
					<pre  class="message content-chat-item"  style="margin-bottom:0;text-wrap: wrap;max-width:20vw; word-break: break-word;"></pre>
					<div class="msg_time message-time fs-10" style=" display: none;text-align:right">
                                                <span>${formatDate(item.created_at)}</span>
                                            </div>
                </div>
               `)

                        htmlMess.find('.content-chat-item').append(contentItem)

                        if (type != 0) {
                            $(".conversation-contents-chat").prepend(htmlMess)

                        } else {
                            $(".conversation-contents-chat").append(htmlMess)
                        }
                    }

                }

                const formatDate = (dateNeedHandle) => {
                    const date = new Date(dateNeedHandle);
                    return formattedDate =
                        `${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getDate().toString().padStart(2, '0')}/${date.getFullYear()} | ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
                }
                const pushChat = (item) => {
                    template(item)
                    scrollInto()
                }

                const callAjaxSend = (params) => {
                    return new Promise((res, rej) => {
                        $.ajax({
                            type: "post",
                            url: "https://timviec.com.vn/ajax/chatweb-guest",
                            data: params,
                            dataType: "json",
                            success: function (response) {
                                if (response?.change_sale) {
                                    localStorage.setItem("saler_chat_live_guest", JSON
                                        .stringify(response.sale_new))
                                    saler_chat_live_guest = JSON.parse(localStorage.getItem(
                                        "saler_chat_live_guest"))
                                    setTimeout(() => window.location.reload(), 1000)
                                    return toastr.info(
                                        "Cuộc hội thoại đã được thay đổi người tư vấn");
                                }
                                pushChat(response)
                                scrollInto()
                                $(".chatweb-btn-send").attr("disabled", false);
                                if (window.location.href.indexOf("bang-gia-goi-loc-ho-so") > -
                                    1) {
                                    fillFormLandingPageBangGiaGoiLocHoSo()
                                }
                                res(true)
                            },
                            error: function (res) {
                                toastr.error(res.responseJSON.message);
                                localStorage.removeItem(
                                    "user_guest_info")
                                localStorage.removeItem(
                                    "saler_chat_live_guest")
                                saler_chat_live_guest = ""
                                user_guest_info = ""
                                rej(false)
                            }
                        });
                    })
                }

                const callAjaxShow = (user_id, page = 1) => {
                    if (typeof next_page == "boolean" && !next_page) {
                        return;
                    }
                    let url = "https://timviec.com.vn/ajax/chatweb-guest/" +
                        user_id +
                        "?saler=" + saler_chat_live_guest?.id +
                        "&page=" + page
                    if (next_page != "") {
                        url += "&next_page=" + next_page
                    }
                    return new Promise((res, rej) => {
                        $.ajax({
                            type: "get",
                            url: url,
                            dataType: "json",
                            success: function (response) {
                                next_page = response.data.next_page
                                let dataChat = response.data.dataChat
                                if (page != 1) {

                                    dataChat.map((item) => {
                                        template(item, 1)
                                    })
                                    if (dataChat.length > 0) {
                                        var element = document.getElementById(
                                            `message-${dataChat[0].id}`);
                                        $(".conversation").scrollTop(element.offsetTop)
                                    }

                                } else {
                                    renderChat(dataChat)
                                    $(".card-content-chat").removeAttr("style")
                                }
                                res(true)
                            },
                            error: function (res) {
                                rej(false)
                                toastr.error(res.responseJSON.message);
                            }
                        });
                    })
                }


                const callAjaxGetMessUnRead = () => {
                    $.ajax({
                        type: "get",
                        url: "https://timviec.com.vn/ajax/messages-unread-guest/" +
                            `?user_id=${user_id}&saler_id=${saler_chat_live_guest?.id}`,
                        dataType: "json",
                        success: function (response) {
                            if (response.count_number_unread > 0) {
                                number_unread.text(response.count_number_unread)
                                number_unread.css({
                                    "color": "#ffff",
                                    "font-size": "13px",
                                    "border-radius": "10px",
                                    "background": "red",
                                    "padding": "3px"
                                })
                                $("#support-ticket-launcher").append(
                                    `   <span class="flag-notification" style="position: absolute;color: red;top: -4px;right: -4px;font-size: 14px;border-radius: 10px;">
								<i style="font-size: 20px;" class="fad fa-circle"></i>
								</span>`
                                )
                            }
                        },
                        error: function (res) {
                            toastr.error(res.responseJSON.message);
                        }
                    });
                }


                const callAjaxUpdateRead = (saler_id) => {
                    $.ajax({
                        type: "put",
                        url: "https://timviec.com.vn/ajax/read-status-chatweb-guest",
                        data: {
                            user_id: user_id,
                            saler_id: saler_id
                        },
                        dataType: "json",
                        success: function (response) {

                        },
                    });
                }

                const scrollInto = () => {
                    $(".conversation").scrollTop(9999999999);
                }

                const debounce = (func, delay) => {
                    let timeoutId;

                    return function (...args) {
                        const context = this;

                        clearTimeout(timeoutId);

                        timeoutId = setTimeout(() => {
                            func.apply(context, args);
                        }, delay);
                    };
                }


                function validatePhone(input) {
                    const regex =
                        /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/;
                    return regex.test(input);
                }


                function checkInfoGuest() {
                    return new Promise((res, rej) => {
                        let htmlWelcome = ""
                        if (user_guest_info && saler_chat_live_guest) {
                            $(".mini-box-chat-web-guest-header").append(`
                    <div class="info-sale-chat" style="display: flex;align-items: flex-end;margin-bottom: 15px">
                        <img src="/images/supporter.png" alt="CSKH" style="width: 40px;height: 40px;">
                        <div class="fs-16 ml-10"><span class="fw-500" style="color: #ffff">${user_guest_info?.user_type_id == 2 ? 'Timviec.com.vn - Hỗ trợ khách hàng' : saler_chat_live_guest.name}</span>
                        </div>
                    </div>
                `)
                            if (user_guest_info.user_type_id != 2) {
                                htmlWelcome =
                                    `  <pre  class=" message content-chat-item" style="margin-bottom:0;text-wrap: wrap;max-width:20vw;word-break: break-word;">Chào Anh/Chị, Timviec.com.vn đã nhận thông tin và sẽ sớm phản hồi. Xin cảm ơn</pre>`

                            } else {
                                htmlWelcome =
                                    `  <pre  class=" message content-chat-item" style="margin-bottom:0;text-wrap: wrap;max-width:20vw;word-break: break-word;">Xin chào, Mình là BP.CSKH của Timviec.com.vn.
Mình có thể giúp gì cho bạn?</pre>`
                            }
                            $("#message-welcome").append(htmlWelcome)
                            $(".conversation .card").remove()
                        }
                        res(true)
                    })
                }

                const getSaler = (typeCustomer) => {
                    return new Promise((res, rej) => {
                        $.ajax({
                            type: "get",
                            url: "https://timviec.com.vn/ajax/saler-chat-live/" + "?type_customer=" +
                                typeCustomer,
                            dataType: "json",
                            success: function (response) {
                                res(response);
                            },
                            error: function (res) {
                                toastr.error(res.responseJSON.message);
                                rej(res)
                            }
                        });
                    })
                }
                const fillFormLandingPageBangGiaGoiLocHoSo = () => {
                    let form = $("#formRegisterService")
                    let inpName = form.find("input[name=name]")
                    let inpPhone = form.find("input[name=phone]")
                    let inpCompanyName = form.find("input[name=company]")
                    if (saler_chat_live_guest && user_guest_info) {
                        $(inpName).val(user_guest_info?.name)
                        $(inpPhone).val(user_guest_info?.phone)
                        $(inpCompanyName).val(user_guest_info?.name)
                    }
                }

                function initPusher() {
                    let pusher = new Pusher("617c9ac6bd7bce513a59", {
                        cluster: "ap1"
                    });
                    channelUser = pusher.subscribe(`channel-user-${user_id}`);
                    initChannel()
                }

                initChannel()
                fillFormLandingPageBangGiaGoiLocHoSo()
                checkInfoGuest()

                document.addEventListener('scroll', debounce(function (e) {

                    if ($(e.target).hasClass("conversation")) {
                        let element = $(e.target);
                        if ($(element[0]).scrollTop() == 0) {
                            callAjaxShow(user_id, i)
                            i++
                        }
                    }
                }, 200), true)

                $(window).on('load', function () {
                    if (user_guest_info && saler_chat_live_guest) {
                        callAjaxGetMessUnRead()
                    }
                });
                $("#support-btn-chat-live").click(function () {
                    if (saler_chat_live_guest && user_guest_info) {
                        i = 2 //config lại giá trị page
                        next_page = ""
                        $(".mini-box-chat-web-guest").addClass("clicked")
                        number_unread.text("")
                        number_unread.removeAttr("style")
                        $(".mini-box-chat-web-guest").addClass("visited")
                        callAjaxShow(user_id).then(() => {
                            callAjaxGetMessUnRead()
                        })
                    }
                })
                if (window.location.href.indexOf("utm_source") > -1) {
                    paramsSend.params = window.location.href.substring(window.location.href.indexOf(
                        "utm_source"))
                }
                if (/-\d+\.html/.test(window.location.href)) {
                    if (saler_chat_live_guest && user_guest_info) {
                        $(".popup_suggest_chat").css("display", "block")
                    }
                }
                $(document).on("click", ".chatweb-btn-send", debounce(function (e) {
                    e.preventDefault();
                    let contents = $(".chat-web-contents").val().trim();
                    let inpName = ""
                    let inpPhone = ""
                    if (contents == "") {
                        return toastr.error("Vui lòng nhập nội dung");
                    }

                    $(this).attr("disabled", true);
                    if (!user_guest_info && saler_chat_live_guest || user_guest_info && !
                        saler_chat_live_guest) {
                        localStorage.removeItem("user_guest_id")
                        localStorage.removeItem("saler_chat_live_guest")
                        toastr.info("Trang web sẽ tải lại do thiếu thông tin")
                        setTimeout(() => {
                            return location.reload()
                        }, 1000)
                    }
                    if (!user_guest_info && !saler_chat_live_guest) {
                        inpName = $(".inp-name").val().trim();
                        inpPhone = $(".inp-phone").val();
                        inpTypeCustomer = $("input[name='type_customer']:checked").val()

                        if (inpName == "") {
                            return toastr.error("Vui lòng nhập tên");
                        }
                        if (inpPhone == "") {
                            return toastr.error("Vui lòng nhập số điện thoại");
                        }
                        if (!inpTypeCustomer) {
                            return toastr.error("Vui lòng chọn loại khách hàng");
                        }
                        if (!validatePhone(inpPhone)) {
                            return toastr.error("Số điện thoại chưa phù hợp");
                        }

                        $(".chat-web-contents").val("");
                        $(".mini-box-chat-web-guest").addClass("visited")
                        $(".mini-box-chat-web-guest").addClass("clicked")
                        //khởi tạo pusher
                        if (!localStorage.getItem("user_guest_info") &&
                            !localStorage.getItem("saler_chat_live_guest")) {
                            initPusher()
                        }
                        getSaler(inpTypeCustomer).then((values) => {
                            localStorage.setItem("saler_chat_live_guest", JSON.stringify(
                                values))
                            localStorage.setItem("user_guest_info", JSON.stringify({
                                name: inpName,
                                phone: inpPhone,
                                user_type_id: inpTypeCustomer
                            }))
                            user_guest_info = JSON.parse(localStorage.getItem(
                                "user_guest_info"))
                            saler_chat_live_guest = JSON.parse(localStorage.getItem(
                                "saler_chat_live_guest"))
                            paramsSend.contents = contents
                            paramsSend.name = user_guest_info.name
                            paramsSend.user_type_id = user_guest_info.user_type_id
                            paramsSend.phone = user_guest_info.phone
                            paramsSend.to_user = saler_chat_live_guest.id
                            paramsSend.chat_started = 1
                            callAjaxSend(paramsSend).then(() => {
                                checkInfoGuest()
                            })
                        })
                    }
                    if (saler_chat_live_guest && user_guest_info) {
                        paramsSend.contents = contents
                        callAjaxSend(paramsSend)
                        $(".chat-web-contents").val("");
                    }
                }, 200));
                $(".chat-web-contents").keydown(function (e) {
                    if (e.keyCode == 13) {
                        if (e.ctrlKey) {
                            var $textarea = $(e.target);
                            if ($textarea.is('textarea')) {
                                var content = $textarea.val();
                                var caretPos = $textarea.prop("selectionStart");
                                $textarea.val(content.substring(0, caretPos) + "\n" + content.substring(
                                    caretPos));
                                $textarea.prop("selectionStart", caretPos + 1);
                                $textarea.prop("selectionEnd", caretPos + 1);
                            }
                        } else {
                            e.preventDefault();
                            $(".chatweb-btn-send").click();
                        }
                    }
                });
                $(document).on("click", ".popup_suggest_chat-close", function () {
                    $(".popup_suggest_chat").css("display", "none")
                })
                $(document).on("click", ".popup_suggest_chat-job", function () {
                    paramsSend.job_id = $(".save-job-detail").attr('data-job')
                    paramsSend.contents =
                        `Tôi muốn được tư vấn về công việc ${$(".tv-job-detail-top .list-unstyled li h1").text()} của ${$(".tv-job-detail-top .list-unstyled li a[data-company_id]").text().trim()} có khu vực tuyển dụng tại ${$(".tv-job-detail-top .list-unstyled li a")[3].innerText}`
                    $(".popup_suggest_chat").css("display", "none")
                    callAjaxSend(paramsSend)
                })
                $(document).on('click', ".content-chat-item", function () {
                    $(this).next().toggle();
                })
            });
        </script>
        <div class="support-ticket-box">
            <div class="support-ticket-panel-header">
                <div class="support-ticket-panel-title">
                    <div><span>Yêu cầu hỗ trợ</span></div>
                </div>
                <div class="support-ticket-cs">
                    <div class="support-ticket-cs-people">
                        <div class="support-ticket-cs-avatar">
                            <img src="/images/yeu_cau_ho_tro.png" alt="Timviec.com.vn hỗ trợ dịch vụ"
                                title="Timviec.com.vn hỗ trợ dịch vụ">
                        </div>
                        <div>
                            <div class="support-ticket-cs-name">Hotline: 0981.448.766</div>
                            <div class="support-ticket-cs-heading">TIMVIEC.COM.VN thường phản hồi trong vòng 24h
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="support-ticket-panel-body">
                <ul>
                    <li>
                        <a href="javascript:void(0)" id="support-btn-chat-live">
                            <i class="fa fa-comment"></i>
                            <span>Chat live </span>
                            <span class="number-un-read-guest"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" id="support-btn-lien-he">
                            <i class="fa fa-phone-alt"></i>
                            <span>Liên hệ Timviec.com.vn</span>
                        </a>
                    </li>
                    <li>
                        <a href="/bang-gia-goi-loc-ho-so" target="_blank">
                            <i class="fa fa-address-card"></i>
                            Tìm hiểu dịch vụ tuyển dụng
                        </a>
                    </li>
                    <li>
                        <a href="https://cv.timviec.com.vn" target="_blank">
                            <i class="fa fa-envelope-open"></i>
                            Tạo CV xin việc
                        </a>
                    </li>
                    <li>
                        <a href="/faq.html" target="_blank">
                            <i class="fa fa-question-circle"></i>
                            Các câu hỏi khác
                        </a>
                    </li>
                    <li style="padding: 16px">
                        <div style="text-align: center">
                            <img src="/images/logo.png" alt="timviec.com.vn">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="support-ticket-launcher">
        <div class="popup-title-suport-ticket-launcher">
            <span class="custom-point"></span>
            <span style="padding: 20px;
                text-align: -webkit-left;">Trợ giúp, tư vấn và báo giá cho
                bạn tại đây.</span>
            <i class="fa fa-times close-popup-title" style="padding: 10px;"></i>
        </div>
        <img src="/images/chat.png" alt="timviec support">
    </div>
    <div id="btn-zalo-support">
        <a href="javascript:void(0)"> <svg width="45" height="45" viewBox="-4 -9 60 60" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M22.782 0.166016H27.199C33.2653 0.166016 36.8103 1.05701 39.9572 2.74421C43.1041 4.4314 45.5875 6.89585 47.2557 10.0428C48.9429 13.1897 49.8339 16.7347 49.8339 22.801V27.1991C49.8339 33.2654 48.9429 36.8104 47.2557 39.9573C45.5685 43.1042 43.1041 45.5877 39.9572 47.2559C36.8103 48.9431 33.2653 49.8341 27.199 49.8341H22.8009C16.7346 49.8341 13.1896 48.9431 10.0427 47.2559C6.89583 45.5687 4.41243 43.1042 2.7442 39.9573C1.057 36.8104 0.166016 33.2654 0.166016 27.1991V22.801C0.166016 16.7347 1.057 13.1897 2.7442 10.0428C4.43139 6.89585 6.89583 4.41245 10.0427 2.74421C13.1707 1.05701 16.7346 0.166016 22.782 0.166016Z"
                    fill="#0068FF" />
                <path opacity="0.12" fill-rule="evenodd" clip-rule="evenodd"
                    d="M49.8336 26.4736V27.1994C49.8336 33.2657 48.9427 36.8107 47.2555 39.9576C45.5683 43.1045 43.1038 45.5879 39.9569 47.2562C36.81 48.9434 33.265 49.8344 27.1987 49.8344H22.8007C17.8369 49.8344 14.5612 49.2378 11.8104 48.0966L7.27539 43.4267L49.8336 26.4736Z"
                    fill="#001A33" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.779 43.5892C10.1019 43.846 13.0061 43.1836 15.0682 42.1825C24.0225 47.1318 38.0197 46.8954 46.4923 41.4732C46.8209 40.9803 47.1279 40.4677 47.4128 39.9363C49.1062 36.7779 50.0004 33.22 50.0004 27.1316V22.7175C50.0004 16.629 49.1062 13.0711 47.4128 9.91273C45.7385 6.75436 43.2461 4.28093 40.0877 2.58758C36.9293 0.894239 33.3714 0 27.283 0H22.8499C17.6644 0 14.2982 0.652754 11.4699 1.89893C11.3153 2.03737 11.1636 2.17818 11.0151 2.32135C2.71734 10.3203 2.08658 27.6593 9.12279 37.0782C9.13064 37.0921 9.13933 37.1061 9.14889 37.1203C10.2334 38.7185 9.18694 41.5154 7.55068 43.1516C7.28431 43.399 7.37944 43.5512 7.779 43.5892Z"
                    fill="white" />
                <path
                    d="M20.5632 17H10.8382V19.0853H17.5869L10.9329 27.3317C10.7244 27.635 10.5728 27.9194 10.5728 28.5639V29.0947H19.748C20.203 29.0947 20.5822 28.7156 20.5822 28.2606V27.1421H13.4922L19.748 19.2938C19.8428 19.1801 20.0134 18.9716 20.0893 18.8768L20.1272 18.8199C20.4874 18.2891 20.5632 17.8341 20.5632 17.2844V17Z"
                    fill="#0068FF" />
                <path d="M32.9416 29.0947H34.3255V17H32.2402V28.3933C32.2402 28.7725 32.5435 29.0947 32.9416 29.0947Z"
                    fill="#0068FF" />
                <path
                    d="M25.814 19.6924C23.1979 19.6924 21.0747 21.8156 21.0747 24.4317C21.0747 27.0478 23.1979 29.171 25.814 29.171C28.4301 29.171 30.5533 27.0478 30.5533 24.4317C30.5723 21.8156 28.4491 19.6924 25.814 19.6924ZM25.814 27.2184C24.2785 27.2184 23.0273 25.9672 23.0273 24.4317C23.0273 22.8962 24.2785 21.645 25.814 21.645C27.3495 21.645 28.6007 22.8962 28.6007 24.4317C28.6007 25.9672 27.3685 27.2184 25.814 27.2184Z"
                    fill="#0068FF" />
                <path
                    d="M40.4867 19.6162C37.8516 19.6162 35.7095 21.7584 35.7095 24.3934C35.7095 27.0285 37.8516 29.1707 40.4867 29.1707C43.1217 29.1707 45.2639 27.0285 45.2639 24.3934C45.2639 21.7584 43.1217 19.6162 40.4867 19.6162ZM40.4867 27.2181C38.9322 27.2181 37.681 25.9669 37.681 24.4124C37.681 22.8579 38.9322 21.6067 40.4867 21.6067C42.0412 21.6067 43.2924 22.8579 43.2924 24.4124C43.2924 25.9669 42.0412 27.2181 40.4867 27.2181Z"
                    fill="#0068FF" />
                <path
                    d="M29.4562 29.0944H30.5747V19.957H28.6221V28.2793C28.6221 28.7153 29.0012 29.0944 29.4562 29.0944Z"
                    fill="#0068FF" />
            </svg></a>
    </div>
    <div class="support-ticket-box-zalo">
        <div class="support-ticket-panel-body">
            <ul>
                <li>
                    <a href="https://zalo.me/566028631548433769" target="_blank" rel="nofollow">
                        <i class="fad fa-user"></i>
                        Bạn là ứng viên
                    </a>
                </li>
                <li>
                    <a href="https://zalo.me/3892734881637817913" target="_blank" rel="nofollow">
                        <i class="fas fa-user-tie"></i>
                        Bạn là nhà tuyển dụng
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <style>
        .support-ticket-box-zalo {
            bottom: 67px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .08);
            max-width: 100%;
            min-height: 100px;
            overflow: hidden;
            right: 40px;
            background-color: #fff;
            border-radius: 8px;
            position: fixed;
            width: 360px;
            z-index: 111111;
            animation: ease 1s;
            display: none;
        }

        #btn-zalo-support {
            align-items: center;
            background-color: #4285f4;
            border-radius: 50%;
            bottom: 15px;
            color: #fff;
            cursor: pointer;
            display: flex;

            height: 45px;
            width: 45px;
            right: 45px;
            justify-content: center;
            padding: 6px;
            position: fixed;
            text-align: center;
            transform: rotate(0);
            z-index: 99999;
            user-select: none;
        }
    </style>
    <script>
        let btnZaloSupportFlag = 0
        $("#btn-zalo-support").click(function () {
            if (btnZaloSupportFlag != 0) {
                $(".support-ticket-box-zalo").css("display", "none");
                btnZaloSupportFlag = 0
            } else {
                $(".support-ticket-box-zalo").css("display", "block");
                btnZaloSupportFlag = 1
            }
        })
    </script>
</div>
<script>
    let click_support = 0;
    $(".close-popup-title").click(function (event) {
        event.stopPropagation()
        $(".popup-title-suport-ticket-launcher").css("display", "none")
    })
    $("#support-ticket-launcher").click(function () {
        click_support++;
        $("#support-ticket-panel").toggle(100);
        if (click_support % 2 == 0) {
            $("#support-ticket-launcher").html(`<img src="/images/chat.png" alt="timviec support">`);
            if ($(".mini-box-chat-web-guest.clicked.visited").length > 0) {
                $(".btn-back-guest").click()
            }
            if (Number($(".number-un-read-guest").text()) > 0) {
                $("#support-ticket-launcher").append(
                    `   <span class="flag-notification"
                    style="position: absolute;color: red;top: -4px;right: -4px;font-size: 14px;border-radius: 10px;"><i style="font-size: 20px;" class="fad fa-circle"></i></span>`
                )
            }
        } else {
            $("#support-ticket-launcher").html(`<i class="fa fa-times"></i>`);
        }
    });
    $("#support-btn-lien-he").click(function () {
        $("#support-ticket-launcher").click();
        $("#modal-support-lien-he").modal('show');
    })
    $("#support-btn-chat-live").click(function () {
        $(".support-ticket-box").css("display", "none")
        $(".mini-box-chat-web-guest").css("display", "block")
    })
    $(".btn-back-guest").click(function () {
        $(".support-ticket-box").css("display", "block")
        $(".mini-box-chat-web-guest").css("display", "none")
        $(".mini-box-chat-web-guest").removeClass("clicked")
    })
    $("#support-btn-yeu-cau-ho-tro").click(function () {
        $("#support-ticket-launcher").click();
        $("#modal-support-yeu-cau-ho-tro").modal('show');
    })
































































</script>
<script src="{{ asset('assets/hr_tuyendung/js/owl.carousel.min.js') }} "></script>
<script>
    $(".slide-job-viec-lam-hot").on('initialized.owl.carousel', function (event) {
        $('.show-placeholder').css('display', 'none');
        $('.slide-job-viec-lam-hot').css({
            'height': '520px',
            'opacity': 1
        });
        $('.slide-job-hap-dan').css({
            'height': '460px',
            'opacity': 1
        });
        $(".slide-nganh-nghe-noi-bat").css({
            "height": "515px",
            "opacity": 1
        });
        //        $('.slide-job-luong-cao').css({
        //            'height': '510px',
        //            'opacity': 1
        //        });
    });

    // https://copyprogramming.com/howto/owl-carousel-nav-arrows-styling
    function counter(event) {
        var element = event.target; // DOM element, in this example .owl-carousel
        var items = event.item.count; // Number of items
        var item = event.item.index + 1; // Position of the current item
        // it loop is true then reset counter from 1
        if (item > items) {
            item = item - items
        }
        try {
            $(element).closest('.owl-carousel-custom').find(".feature-job-page .current_page_nav").html(item);
            $(element).closest('.owl-carousel-custom').find(".feature-job-page .count_page_nav").html(items);
        } catch (e) { }
    }
    var owlContainers = jQuery('.owl-carousel-custom');
    owlContainers.each(function (index, owlItem) {
        var $owlContainer = $(owlItem);
        var $owl = $owlContainer.find('.owl-carousel');
        $owl.owlCarousel({
            // navText: ["<em class='porto-icon-left-open-big'></em>", "<em class='porto-icon-right-open-big'></em>"],
            nav: false,
            dots: false,
            loop: false,
            margin: 0,
            items: 1,
            autoplay: 2000,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            },
            onInitialized: counter,
            onTranslated: counter,
        });
        $owlContainer.find('.btn-feature-jobs-next').click(function () {
            $owl.trigger('next.owl.carousel');
        });
        $owlContainer.find('.btn-feature-jobs-pre').click(function () {
            $owl.trigger('prev.owl.carousel', [300]);
        });
    })
    $(".slide-logo-candidate").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
</script>
<script>
    $(function () {
        $(".from-news-slide").owlCarousel({
            loop: true,
            margin: 30,
            stagePadding: 5,
            nav: false,
            dot: true,
            autoplay: true,
            autoplayTimeout: 5000,
            navText: ["<span class=\"icon-chevron-left\">", "<span class=\"icon-chevron-right\">"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    })
</script>
<script>
    $(function () {
        $('.news-table-mininew-box').owlCarousel({
            items: 4,
            loop: false,
            margin: 20,
            // nav: true,
            // responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 4,
                }
            }
        });
    });
</script>
<script>
    window.lazySizesConfig = window.lazySizesConfig || {};
    window.lazySizesConfig.lazyClass = 'lazyloaded';
    window.lazySizesConfig.loadedClass = 'lazy_is_loaded';
    window.lazySizesConfig.loadMode = 1;
    jQuery(window).load(function () {
        $(".tv-banner-not-slide").fadeOut(500, function () {
            $('#tv-home-banner').fadeIn();
            $('.tv-banner-not-slide').remove();
        });
        // $(".tv-banner-not-slide").fadeOut(500, function () {
        //     $('#tv-home-banner').css('display', 'block');
        //     $('.tv-banner-not-slide').css('display', 'none');
        // });
    });
    if (typeof (Storage) !== 'undefined') {
        setTimeout(function () {
            var nowTime = '1726747226';
            if (localStorage.getItem('show_popup_app')) {
                var timeShowPopup = localStorage.getItem('show_popup_app');
                if ((nowTime - timeShowPopup) / 86400 > 1) {
                    localStorage.setItem('show_popup_app', nowTime);
                    $('#modal-popup-create-cv').modal('show');
                }
            } else {
                localStorage.setItem('show_popup_app', nowTime);
                $('#modal-popup-create-cv').modal('show');
            }
        }, 5000);
    }
</script>
<script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
<script src="{{ asset('assets/plugins/mcx-dialog-mobile/mcx-dialog-mobile.js') }}"></script>


<script async src="//www.googletagmanager.com/gtag/js?id=UA-141604555-31"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-141604555-31');
</script>
<script async src="//www.googletagmanager.com/gtag/js?id=UA-141604555-30"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-141604555-30');
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-121SK2W80H"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-121SK2W80H');
</script>




<div id="fb-root" class="notPrint"></div>


<script type="text/javascript">
    (function (c, l, a, r, i, t, y) {
        c[a] = c[a] || function () {
            (c[a].q = c[a].q || []).push(arguments)
        };
        t = l.createElement(r);
        t.async = 1;
        t.src = "//www.clarity.ms/tag/" + i;
        y = l.getElementsByTagName(r)[0];
        y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "3zf8y8eqbi");
</script>


<div>
    <img src="https://cv.timviec.com.vn/redirecting?type=logout" style="display: none !important;">
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '9CoAncfdHy47rnzBRFrQvFyilPIcMLZy5A5RZXDK'
        }
    });
    $.fn.button = function (action) {
        if (action === 'loading' && this.data('loading-text')) {
            this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            this.addClass('btnLoading');
        }
        if (action === 'reset' && this.data('original-text')) {
            this.html(this.data('original-text')).prop('disabled', false);
            this.removeClass('btnLoading');
        }
    };

</script>
<script>
    function slugify(str) {
        str = str.replace(/^\s+|\s+$/g, '');
        str = str.toLowerCase();
        str = str.replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        return str;
    }

    function log_search1(form, url_search = '') {
        let settings = {
            "url": "https://log.timviec.com.vn/api/v1/log1/create",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };
        form.append("ee", url_search);
        form.append("zz", '');
        try {
            form.append("ff", window.navigator.platform);
            form.append("gg", (typeof localStorage !== 'undefined'));
        } catch (e) {
        }
        form.append("hh", "desktop");

        $.ajax(settings);
    }

    //xóa giá trị null trên form submit
    $('form#home-search,form#jobs-search-form,form#jobs-advance-search,form#candidate-search-form,form#candidate-advance-search,form#company-seach').submit(function (event) {
        $('input[name!=_token],select', this).each(function () {
            this.disabled = !($(this).val());
        });
    });

    $('form#home-search,form#jobs-search-form,form#jobs-advance-search').submit(function (event) {
        event.preventDefault();

        var slug = $(this).attr('action');
        var newParams = "?";
        var Params = "?" + $('input[name!=_token],select', this).serialize();
        var ParamsArray = $('input[name!=_token],select', this).serializeArray();
        var str_url = slug + Params;
        var url = new URL(str_url);
        var searchParams = new URLSearchParams(url.search);
        var matches = str_url.match(/[a-z\d]+=[a-z\d]+/gi);
        var count = matches ? matches.length : 0;

        var form = new FormData();

        form.append("aa", "");
        form.append("bb", "0");
        form.append("cc", "https://timviec.com.vn");
        form.append("dd", "https://timviec.com.vn/ung-tuyen-thanh-cong-68996");
        $.each(ParamsArray, function (i, field) {
            form.append(field.name, field.value);
        });


        var url_search = str_url;
        //trường hợp tìm kiếm theo kiểu SEO
        if (count > 0) {
            var select_one = "";

            //trường hợp 1 Params
            if (searchParams.has('c')) {
                select_one = $(this).find("select[name='c'] option:selected")[0];
                if (select_one) {
                    slug = $(select_one).data('slug');
                    $.each(ParamsArray, function (i, field) {
                        if (field.name != 'c')
                            newParams += field.name + "=" + encodeURIComponent(field.value) + "&";
                    });
                }
                if (searchParams.has('l')) {
                    newParams = "?";
                    select_one_2 = $(this).find("select[name='l'] option:selected")[0];
                    if (select_one_2) {
                        slug = "tim-viec-lam-" + slug + "-tai-" + $(select_one_2).data('slug');
                    }
                    $.each(ParamsArray, function (i, field) {
                        if (field.name != 'c' && field.name != 'l')
                            newParams += field.name + "=" + encodeURIComponent(field.value) + "&";
                    });
                }
                url_search = slug + newParams;
                if (url_search.endsWith("&") || url_search.endsWith("?")) {
                    url_search = url_search.substring(0, url_search.length - 1)
                }
                location.href = '/' + url_search;
                log_search1(form, url_search);
                return true;
            } else if (searchParams.has('l')) {
                select_one = $(this).find("select[name='l'] option:selected")[0];
                if (select_one) {
                    slug = "viec-lam-tai-" + $(select_one).data('slug-id');
                    $.each(ParamsArray, function (i, field) {
                        if (field.name != 'l')
                            newParams += field.name + "=" + encodeURIComponent(field.value) + "&";
                    });
                }
                url_search = slug + newParams;
                if (url_search.endsWith("&") || url_search.endsWith("?")) {
                    url_search = url_search.substring(0, url_search.length - 1)
                }
                location.href = '/' + url_search;
                log_search1(form, url_search);
                return true;
            } else if (searchParams.has('t')) {
                select_one = $(this).find("select[name='t'] option:selected")[0];
                if (select_one) {
                    if ($(select_one).data('slug')) {
                        slug = "tim-viec-lam-" + $(select_one).data('slug');
                        $.each(ParamsArray, function (i, field) {
                            if (field.name != 't')
                                newParams += field.name + "=" + encodeURIComponent(field.value) + "&";
                        });
                    }
                }
                url_search = slug + newParams;
                if (url_search.endsWith("&") || url_search.endsWith("?")) {
                    url_search = url_search.substring(0, url_search.length - 1)
                }
                location.href = '/' + url_search;
                log_search1(form, url_search);
                return true;
            }

            if (slug && newParams.length > 3) {
                url_search = slug + newParams;
            } else {
                $.each(ParamsArray, function (i, field) {
                    newParams += field.name + "=" + encodeURIComponent(field.value) + "&";
                });
                url_search = slug + newParams;
            }
        }
        if (url_search.endsWith("&") || url_search.endsWith("?")) {
            url_search = url_search.substring(0, url_search.length - 1)
        }
        location.href = url_search;
        log_search1(form, url_search);
        return true;
    });
    $(".btn-candidate-show-modal").click(function () {
        localStorage.setItem('modalShowCandidate', 'true');
    });
</script>
<script>
    function check_jobs_viewd_client() {
        if (typeof (Storage) !== 'undefined') {
            if (localStorage.getItem('data_viewd_jobs')) {
                dataViewdJobs = JSON.parse(localStorage.getItem('data_viewd_jobs'));
                dataViewdJobs.forEach(function (item) {
                    let element = $('*[data-id=' + item + ']');
                    if (!element.has('span.label-watched').length) {
                        element.append('<span class="label-watched ml-5">Đã xem</span>');
                        element.addClass('titleItemJobHasViewd');
                    }
                });
            }
        }
    }

    $(function () {
        check_jobs_viewd_client();
    });
</script>
<script>
    if ($('.home-category-list ul#tv-category-list')) {
        let ul_category_list = $('.home-category-list ul#tv-category-list');
        let heightFull_ul_category_list = ul_category_list.outerHeight();
        ul_category_list.height(235);
        $(document).on('click', '.home-category-list div.tv-category-list-more-view button', function (event) {
            if ($(this).children('span').html() == 'Xem thêm') {
                ul_category_list.height(heightFull_ul_category_list);
                $(this).children('span').html('Thu gọn');
            } else {
                ul_category_list.height(235);
                $(this).children('span').html('Xem thêm');
            }

        });
    }
    if ($('.home-category-list ul#home-job-cities')) {
        let ul_home_job_cities = $('.home-category-list ul#home-job-cities');
        let heightFull_ul_home_job_cities = ul_home_job_cities.outerHeight();
        ul_home_job_cities.height(235);
        $(document).on('click', '.home-category-list div.home-job-cities-more-view button', function (event) {
            if ($(this).children('span').html() == 'Xem thêm') {
                ul_home_job_cities.height(heightFull_ul_home_job_cities);
                $(this).children('span').html('Thu gọn');
            } else {
                ul_home_job_cities.height(235);
                $(this).children('span').html('Xem thêm');
            }

        })
    }

    function showMcxDialogMessageCheckAjax(error, custom_errors = {}, one_message = true, return_msg = false) {
        console.log(error);
        let msg = "Có lỗi xảy ra, vui lòng kiểm tra lại.";
        if (error.ok === 0) {
            let array_errors = error.errors;
            let errors = Object.keys(error.errors);
            errors.forEach(key => {
                msg = array_errors[key][0];
                if (return_msg) {
                    return msg;
                }
                mcxDialog.toast(msg, 0)
            });
        } else {
            if (custom_errors[error.status]) {
                msg = custom_errors[error.status];
            }
            if (error.status === 500) {
                if (error.data) { // axiot
                    mcxDialog.toast((error.data?.message || msg), 0)
                } else if (error.responseJSON) { // ajax
                    if (error.responseJSON?.message) {
                        msg = error.responseJSON.message.substring(0, 500);
                    }
                    if (return_msg) {
                        return msg;
                    }
                    mcxDialog.toast(msg, 0)
                }
            } else if (error.status === 422) {
                let loi = [];
                let errors = [];
                if (error.responseJSON) {
                    errors = error.responseJSON.errors;
                } else if (error.data?.errors) {
                    errors = error.data.errors;
                }
                let array_errors = Object.keys(errors);
                if (array_errors.length > 0) {
                    array_errors.forEach(key => {
                        loi.push(errors[key][0]);
                    });
                    if (one_message) {
                        msg = loi[0]
                        if (return_msg) {
                            return msg;
                        }
                        mcxDialog.toast(msg, 0)
                    } else {
                        array_errors.forEach(key => {
                            mcxDialog.toast(errors[key][0], 0)
                        });
                    }
                } else {
                    msg = 'Lỗi dữ liệu đầu vào, vui lòng kiểm tra lại dữ liệu'
                    if (return_msg) {
                        return msg;
                    }
                    mcxDialog.toast(msg, 0)
                }
            } else {
                if (return_msg) {
                    return msg;
                }
                mcxDialog.toast(msg, 0)
            }
        }
    }

    function getHtmlXacMinhCty(company_ids_string, object_class = ".show_html_xac_minh") {
        if (company_ids_string.length > 1) {
            $.ajax({
                method: 'GET',
                url: 'https://timviec.com.vn/ajax/getIconXacMinhCongTy',
                data: "company_ids=" + company_ids_string,
            }).done(function (response) {
                if (response.ok === 1 && response.data) {
                    data_cty = response.data;
                    data_cty.forEach(function (item) {
                        let element = $(object_class + '[data-company_id=' + item.company_id + ']:not(.da_show_html_xac_minh)');
                        if (element) {
                            element.append(item.html_xac_minh);
                            element.addClass('da_show_html_xac_minh')
                        }
                    });
                    $('[data-toggle="tooltip_ct"]').tooltip({
                        "show": 1,
                        "hide": 10
                    });
                }
            });
        }
    }

    function inHtmlXacMinh(object_class = ".show_html_xac_minh") {
        let company_ids = [];
        setTimeout(function () {
            $(object_class).toArray().map(function (c) {
                if ($(c).data('company_id') > 0 && !$(c).find('i.html_xac_minh').length) {
                    company_ids.push($(c).data('company_id'))
                }
            });
            company_ids = [...new Set(company_ids)];
            // console.log(company_ids);
            const chunkSize = 400;
            for (let i = 0; i < company_ids.length; i += chunkSize) {
                const chunk = company_ids.slice(i, i + chunkSize);
                getHtmlXacMinhCty(chunk.join(','), object_class);
            }
        }, 10)
    }
</script>
<script>
    $(function () {
        var isCheck = '';
        var checkRegister = '';
        var checkApply = '';
        if (isCheck) {
            if (typeof (Storage) !== 'undefined') {
                if (isCheck == 'update_info')
                    localStorage.setItem('user_check_from_email', '');
                else if (isCheck == 'post_job')
                    localStorage.setItem('user_email_marketing_post_job_first', '');
                else if (isCheck == 'apply' && checkApply) {
                    localStorage.setItem('utm_check_apply', '{"utm_source":null,"utm_campaign":null,"utm_medium":null}');
                    localStorage.setItem('utm_checking', '{"utm_source":null,"utm_campaign":null,"utm_medium":null}');
                } else if (isCheck == 'apply_ads_service' && checkApply) {
                    localStorage.setItem('utm_check_apply_job_service', '{"utm_source":null,"utm_campaign":null,"utm_job":0}');
                } else if (isCheck && checkRegister) {
                    localStorage.setItem('utm_checking', '{"utm_source":null,"utm_campaign":null,"utm_medium":null}');

                }
            }
        }
    });
</script>


<script>
    $(function () {
        inHtmlXacMinh();

        $("#search-category").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#tv-category-list li a").filter(function () {
                var parent = $(this).parent();
                $(parent).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        function redirectSSO(sso_url, is_employer) {
            if (is_employer) {
                var s_url_redirect = 'https://timviec.com.vn/employer';
            } else
                var s_url_redirect = 'https://timviec.com.vn/login';

            setTimeout(function () {
                window.location.href = s_url_redirect;
            }, 100);
        }

        $(".btn-manager-candidate, .btn-job-apply, .btn-create-candidate-form, .btn-complete-candidate").on(
            "click",
            function (e) {
                e.preventDefault();
                redirectSSO($(this).data("link"), false);

            });
        $(".btn-post-job").on("click", function (e) {
            e.preventDefault();
            redirectSSO($(this).data("link"), true);
        });
    });
</script>
<script>
    if ($(".item-slide-banner").length > 1) {
        $(".slide-banner-home").on('initialized.owl.carousel', function (event) {
            $('.show-placeholder').css('display', 'none');
            $('.slide-banner-home').css({
                'height': 'auto',
                'opacity': 1
            });

            setInterval(function () {
                $(".slide-banner-home").trigger('next.owl.carousel');
            }, 4000);
        });
        $(".slide-banner-home").owlCarousel({
            items: 1,
            loop: true,
            autoplay: false,
        });
    }
</script>

</html>
