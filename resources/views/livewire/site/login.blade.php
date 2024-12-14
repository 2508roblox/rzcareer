<div>
    <!-- <div>{{Auth::logout()}}</div> -->
    <!-- <div>{{Auth::user()}}</div> -->

    <!-- This website is like a Rocket, isn't it? Performance optimized by RZCareer Team --><!-- Please send your resume with cover letter to team@jobsgo.vn -->

    <head>
        <meta name="google-site-verification" content="9ifARzV85NXV1CAcz8bKd6Dc5t6jcDbT7Pn0J1gU8j8" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-param" content="_csrf-jobsgo-candidate">
        <meta name="csrf-token" content="m6GRiXQWcMY8qu3uDTSc9bDmAMOWGrPBm51IfnaZQi-olObMFU44nEXTgah3VeWM_LdtgtEj5Y3xr38nAagYdw==">
        <title>Đăng nhập hệ thống - Dành cho người tìm việc - RZCareer</title>

        <link href="/assets_livewire/bolt/assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/core.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/components.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/colors.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/extras/animate.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/js/plugins/fancybox-master/dist/jquery.fancybox.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/main.css?colorgb=2342081531001" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/css/v2.css?colorgb=2342081531001" rel="stylesheet" type="text/css">



        <style>
            body .has-title.fancybox-title:before {
                content: 'Việc làm đã ứng tuyển: ' !important;
                font-weight: 300;
            }

            .login-container .site-logo {
                position: relative;
                display: block;
                margin: 10px auto 30px;
                width: 170px;
            }

            .card .avatar {
                z-index: 10 !important;
            }

            .site-logo img {
                margin: 10px auto 20px;
            }

            tr td,
            tr td a,
            tr td button {
                font-size: 14px;
            }

            .popover-md {
                width: 190px !important;
                min-width: 100px !important;
            }
        </style>
        <!-- Global site tag (gtag.js) - Google Analytics -->

    </head>

    <body class=" access "   style="background-image: url(/assets_livewire/banner.png); background-size: cover; ">
        <!-- Google Tag Manager (noscript) -->
        <!--Start of Tawk.to Script--> <!--<div id="load-tawkto"><img src="https://jobsgo.vn/img/chat_icon.png"></div>--> <!-- Messenger Plugin chat Code -->
        <div id="fb-root"></div> <!-- Your Plugin chat code -->
        <div id="fb-customer-chat" class="fb-customerchat"></div>


        <style>
            #load-tawkto {
                width: 60px;
                height: 60px;
                position: fixed;
                bottom: 12px;
                right: 10px;
                z-index: 9999999
            }

            #load-tawkto img {
                width: 60px;
                height: 60px;
                cursor: pointer
            }

            .fb_dialog_mobile {
                z-index: 999999997 !important
            }

            .fb_customer_chat_bounce_in {
                z-index: 1000000001 !important
            }
        </style> <!--End of Tawk.to Script--> <!-- Global site tag (gtag.js) - AdWords: 791019431-->


        <!-- Page container -->
        <div class="page-container login-container" >
            <!-- Page content -->
            <div class="page-content">


                <!-- Main content -->
                <div class="content-wrapper">

                    <style>
                        .login-container .login-form {
                            width: 490px;
                        }

                        .modal-title {
                            color: #000;
                        }

                        .form-control {
                            background-color: #fffaf2;
                        }

                        .login-container {
                            background-color: #2f8cba;
                        }

                        .login-container.page-container {
                            padding-top: 0 !important;
                            margin-top: 0 !important;
                        }

                        @media (min-width: 769px) {
                            .modal-dialog {
                                width: 500px;
                                margin: 30px auto;
                            }
                        }

                        @media (max-width: 768px) {
                            .login-container.page-container {
                                padding: 0 10px !important;
                            }

                            html,
                            body {
                                overflow-x: hidden;
                            }

                            .login-container .login-form {
                                width: 100%;
                            }

                        }

                        @media all and (max-width: 768px) {
                            #load-tawkto {
                                display: none;
                            }
                        }
                    </style>

                    <form wire:submit.prevent="login" class="login-form">
                        <a title="RZCareer - Trang chủ" href="/" class="site-logo" style="
    justify-content: center;
    display: flex;
">
 <img src="/assets_livewire/logo-dark.svg" alt="">


                        </a>

                        <div class="panel panel-body">



                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" wire:model="email" class="form-control">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" id="password" wire:model="password" class="form-control">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" wire:model.defer="rememberMe"> Tự động đăng nhập
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a href="/site/request-password-reset">Quên mật khẩu?</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                <button onclick="window.location.href='{{ route('google.login', ['id' => 1]) }}'" class="btn btn-warning btn-block w-100" type="button" id="loginWithGoogle" fdprocessedid="gikn28">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z">
                                        </path>
                                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z">
                                        </path>
                                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z">
                                        </path>
                                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z">
                                        </path>
                                        <path fill="none" d="M0 0h48v48H0z"></path>
                                    </svg>

                                    Đăng nhập với Google
                                </button>
                                <style>
                                    #loginWithGoogle {
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        gap: 10px;
                                    }
                                    #loginWithGoogle svg {
                                        width: 20px;
                                        height: 20px;
                                    }
                                </style>
                            </div>

                            <div class="content-divider text-muted form-group"><span>Bạn chưa có tài khoản?</span></div>
                            <a href="/site/register" class="btn btn-default btn-block">Đăng ký nhanh</a>
                        </div>
                    </form>

                    <!-- The popup modal -->
                    <div class="modal fade" id="phoneAuthModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style=" padding: 15px 30px 5px !important;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="text-bold modal-title text-uppercase" id="phoneAuthModalLabel">Xác minh số điện thoại qua Zalo</h5>
                                </div>
                                <div class="modal-body">
                                    <form id="phoneAuthForm">
                                        <div class="form-group">
                                            <label for="phoneNumber">Số điện thoại Zalo:</label>
                                            <input maxlength="10" type="text" class="form-control" value="" id="phoneNumber" placeholder="Nhập SĐT Zalo của bạn">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Gửi mã xác thực</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The OTP verification modal -->
                    <div class="modal fade" id="otpVerificationModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style=" padding: 15px 30px 5px !important;">
                                    <h5 class="text-bold modal-title text-uppercase" id="otpVerificationModalLabel">Nhập mã xác thực OTP</h5>
                                </div>
                                <div class="modal-body">
                                    <form id="otpVerificationForm">
                                        <div class="form-group">
                                            <label for="otpCode">Mã OTP trên Zalo:</label>
                                            <input type="number" class="form-control" id="otpCode" placeholder="Nhập mã xác thực từ Zalo">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Xác minh & đăng nhập</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- /main content -->



            </div>
            <!-- /page content -->
            <!-- Footer -->
            <div class="footer text-muted hide">
                &copy; 2024 Copyright RZCareer. All Rights Reserved.

            </div>
            <!-- /footer -->

        </div>
        <!-- /page container -->

        <div class="modal" id="colorgbIframeModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="model-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="colorgbGridReload()">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="pace-demo colorgb-pace-demo">
                            <div class="theme_tail_circle">
                                <div class="pace_progress" data-progress-text="60%" data-progress="60"></div>
                                <div class="pace_activity"></div>
                            </div>
                        </div>
                        <iframe class="colorgb-content-wrapper" width="100%" height="100%" frameborder="0"></iframe>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </body>



</div>
