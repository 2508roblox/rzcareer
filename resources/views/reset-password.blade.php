<div>
    <!DOCTYPE html>
    <html lang="vi-VN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-param" content="_csrf-jobsgo-candidate">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Đặt lại mật khẩu - RZCareer</title>

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
                    <form action="/reset-password" method="POST" class="login-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <a href="/" class="site-logo" style="justify-content: center; display: flex;">
                            <img src="/assets_livewire/logo-dark.svg" alt="">
                        </a>

                        <div class="panel panel-body">
                            <div class="text-center">
                                <h5 class="content-group">Đặt lại mật khẩu</h5>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required  autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu mới</label>
                                <input type="password" name="password" id="password" class="form-control" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Xác nhận mật khẩu mới</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Đặt lại mật khẩu</button>
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