<div>
    <!DOCTYPE html>
    <html lang="vi-VN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-param" content="_csrf-jobsgo-candidate">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Quên mật khẩu - RZCareer</title>

        <link href="/assets_livewire/bolt/assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/core.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/components.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/colors.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_livewire/bolt/assets/css/main.css" rel="stylesheet" type="text/css">

        <style>
            .login-container .site-logo {
                position: relative;
                display: block;
                margin: 10px auto 30px;
                width: 170px;
            }
            .login-container .login-form {
                width: 490px;
            }
            .form-control {
                background-color: #fffaf2;
            }
            .login-container {
                background-color: #2f8cba;
            }
            @media (max-width: 768px) {
                .login-container .login-form {
                    width: 100%;
                }
            }
        </style>
    </head>

    <body class="access" style="background-color: #050515">
        <div class="page-container login-container">
            <div class="page-content">
                <div class="content-wrapper">
                    <form wire:submit.prevent="sendResetLink" class="login-form">
                        <a href="/" class="site-logo" style="justify-content: center; display: flex;">
                            <img src="/assets_livewire/logo-dark.svg" alt="">
                        </a>

                        <div class="panel panel-body">
                            <div class="text-center">
                                <h5 class="content-group">Quên mật khẩu?</h5>
                                <p class="content-group">Nhập email của bạn để nhận link reset mật khẩu</p>
                            </div>

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" id="email" wire:model="email" class="form-control" placeholder="Nhập email của bạn">
                                @error('email') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Gửi link reset mật khẩu</button>
                            </div>

                            <div class="text-center">
                                <a href="/site/login">Quay lại đăng nhập</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="footer text-muted hide">
                &copy; 2024 Copyright RZCareer. All Rights Reserved.
            </div>
        </div>
    </body>
    </html>
</div>
