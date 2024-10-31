<div>
    <div>
        <!DOCTYPE html>
        <html lang="vi-VN">

        <head>
            <link rel="preload" href="/assets_livewire/teks/css/fonts/xn7gYHE41ni1AdIRggexSg.woff2" as="font"
                type="font/woff2" crossorigin>
            <link rel="preload" href="/assets_livewire/teks/css/fonts/xn7gYHE41ni1AdIRggixSuXd.woff2" as="font"
                type="font/woff2" crossorigin>
            <link rel="preload" href="/assets_livewire/teks/css/fonts/xn7gYHE41ni1AdIRggmxSuXd.woff2" as="font"
                type="font/woff2" crossorigin>
            <link rel="preload" href="/assets_livewire/teks/css/fonts/xn7gYHE41ni1AdIRggOxSuXd.woff2" as="font"
                type="font/woff2" crossorigin>
            <link rel="preload" href="/assets_livewire/teks/css/fonts/xn7gYHE41ni1AdIRggqxSuXd.woff2" as="font"
                type="font/woff2" crossorigin>
            <link rel="preload" href="/assets_livewire/teks/css/fonts/xn7gYHE41ni1AdIRggSxSuXd.woff2" as="font"
                type="font/woff2" crossorigin>
            <meta name="google-site-verification" content="9ifARzV85NXV1CAcz8bKd6Dc5t6jcDbT7Pn0J1gU8j8" />
            <meta charset="UTF-8">
            <link href="/assets_livewire/teks/css/icons.min.css?v=2342081531001" rel="stylesheet">
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
            <meta name="robots" content="noindex, nofollow">
            <meta name="csrf-param" content="_csrf-jobsgo-candidate">
            <meta name="csrf-token"
                content="dMyWkIl86nFBAdpOQ46lc6E-qeMZWVYWM8uNM4S86ONH-eHV6CSiKzh4tgg579wK7W_Eol5gAFpZ-bpq842yuw==">

            <title>Thay đổi mật khẩu</title>

            <link href="/assets_livewire/bolt/assets/css/icons/fontawesome/styles.min.css" rel="stylesheet"
                type="text/css">
            <link href="/assets_livewire/bolt/assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
            <link href="/assets_livewire/bolt/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="/assets_livewire/bolt/assets/css/core.min.css" rel="stylesheet" type="text/css">
            <link href="/assets_livewire/bolt/assets/css/components.min.css" rel="stylesheet" type="text/css">
            <link href="/assets_livewire/bolt/assets/css/colors.min.css" rel="stylesheet" type="text/css">
            <link href="/assets_livewire/bolt/assets/css/extras/animate.min.css" rel="stylesheet" type="text/css">
            <link href="/assets_livewire/bolt/assets/js/plugins/fancybox-master/dist/jquery.fancybox.min.css"
                rel="stylesheet" type="text/css">
            <link href="https://jobsgo.vn/cv_template/dist/css/introjs.css?v=2342081531001" rel="stylesheet"
                type="text/css">
            <link href="/assets_livewire/bolt/assets/css/main.css?colorgb=2342081531001" rel="stylesheet"
                type="text/css">
            <link href="https://jobsgo.vn/css/v2.css?colorgb=2342081531001" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="/assets_livewire/bolt/assets/js/core/libraries/jquery.min.js"></script>
            <script type="text/javascript" src="/assets_livewire/bolt/assets/js/core/libraries/jquery_ui/full.min.js">
            </script>
            <script type="text/javascript" src="/assets_livewire/bolt/assets/js/core/libraries/bootstrap.min.js">
            </script>





            <style>
                .footer {
                    position: absolute;
                    bottom: 10px;
                }

                @media (min-width: 769px) {
                    .heading-elements .icons-list {
                        margin-top: 12px;
                    }
                }

                .status_on {
                    color: #4CAF50 !important;
                }

                .status_off {
                    color: #FF5722 !important;
                }
            </style>

        </head>

        <body class=" navbar-top ">

            <!-- Main navbar -->
            @livewire('inc.header-candidate')
            <!-- /main navbar -->


            <!-- Page container -->
            <div class="page-container ">
                <!-- Page content -->
                <div class="page-content">


                    <!-- Main content -->
                    <div class="content-wrapper">

                        <div class="panel mb-0" style="margin: 0;border-bottom: 0;">

                            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">

                                <ul class="breadcrumb">
                                    <li><a href="/candidate/dashboard">Bảng tin</a></li>
                                    <li>Thay đổi mật khẩu</li>
                                </ul>

                                <div class=" heading-elements">
                                    <ul class="icons-list">
                                        <li>Lưu ý: các trường có dấu (<span style="color: red !important;">*</span>) là
                                            bắt buộc</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Detached content -->
                        <div class="container-detached">
                            <div class="content-detached">

                                <!-- Tab content -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="profile">

                                        <!-- Profile info -->
                                        <div class="panel panel-flat">


                                            <div class="panel-body">
                                                <form wire:submit.prevent="changePassword" class="form-horizontal">
                                                    <div class="form-group field-changepasswordform-new_password required">
                                                        <label class="control-label col-sm-4 text-right" for="new_password">Mật khẩu mới</label>
                                                        <div class="col-sm-4">
                                                            <input type="password" id="new_password" class="form-control"
                                                                wire:model.defer="new_password"
                                                                placeholder="Nhập mật khẩu mới" aria-required="true">

                                                            <p class="help-block help-block-error"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field-changepasswordform-confirm_password required">
                                                        <label class="control-label col-sm-4 text-right" for="confirm_password">Xác nhận mật khẩu</label>
                                                        <div class="col-sm-4">
                                                            <input type="password" id="confirm_password" class="form-control"
                                                                wire:model.defer="confirm_password"
                                                                placeholder="Nhập lại mật khẩu mới" aria-required="true">

                                                            <p class="help-block help-block-error"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-4 col-sm-5">
                                                            <button type="submit" class="btn btn-primary btn-ladda btn-ladda-spinner btn-ladda-progress" data-style="zoom-out">
                                                                <i class="icon-floppy-disk position-left"></i>
                                                                <span class="ladda-label">Lưu lại</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <!-- /profile info -->

                                    </div>

                                </div>
                                <!-- /tab content -->

                            </div>
                        </div>
                        <!-- /detached content -->
                        <!-- Detached sidebar -->
                        <div class="sidebar-detached hide">
                            <div class="sidebar sidebar-default sidebar-separate">
                                <div class="sidebar-content">

                                    <!-- User details -->
                                    <div class="content-group">
                                        <div class="panel-body bg-blue-800 text-center">
                                            <div class="content-group-sm">
                                                <a data-caption="Hồ sơ xin việc của bạn trong mắt nhà tuyển dụng"
                                                    data-fancybox data-type="iframe" class="text-white"
                                                    href="https://jobsgo.vn/candidate/detail?v=1727351239"
                                                    title="Hồ sơ xin việc của bạn trong mắt nhà tuyển dụng">
                                                    <h6 class="text-semibold no-margin-bottom">
                                                        web developer
                                                    </h6>
                                                    <span class="display-block">

                                                        N/A 49 tuổi <br> <span class="text-orange-300 text-uppercase"><i
                                                                class="hide icon-eye8"></i></span>
                                                    </span>


                                                </a>

                                                <div class="progress progress-striped active mt-10"
                                                    title="Hồ sơ xin việc đã hoàn thiện được 45%">
                                                    <div class="progress-bar progress-bar-success" style="width: 45%">
                                                        <span class="text-size-mini text-capitalize">45%</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="display-inline-block content-group-sm">
                                                <!-- User thumbnail -->

                                                <!-- /user thumbnail -->
                                            </div>

                                            <ul class="list-inline list-inline-condensed no-margin-bottom">
                                                <li><a href="javascript:void(0)"
                                                        class="btn bg-blue-800 btn-rounded btn-icon editable"
                                                        data-name="facebook"
                                                        title="Cập nhật địa chỉ trang cá nhân của bạn trên Facebook"><span
                                                            class="hide">https://</span></a></li>
                                                <li><a href="javascript:void(0)"
                                                        class="btn bg-blue-800 btn-rounded btn-icon editable"
                                                        data-name="google_plus"
                                                        title="Cập nhật địa chỉ trang cá nhân của bạn trên Google+"><span
                                                            class="hide">https://</span></a></li>
                                                <li><a href="javascript:void(0)"
                                                        class="btn bg-blue-800 btn-rounded btn-icon editable"
                                                        data-name="twitter"
                                                        title="Cập nhật địa chỉ trang cá nhân của bạn trên Twitter"><span
                                                            class="hide">https://</span></a></li>
                                                <li><a href="javascript:void(0)"
                                                        class="btn bg-blue-800 btn-rounded btn-icon editable"
                                                        data-name="linkedin"
                                                        title="Cập nhật địa chỉ trang cá nhân của bạn trên Linkedin"><span
                                                            class="hide">https://</span></a></li>
                                                <li><a href="javascript:void(0)"
                                                        class="btn bg-blue-800 btn-rounded btn-icon editable"
                                                        data-name="skype"
                                                        title="Cập nhật địa chỉ liên lạc của bạn qua Skype"><span
                                                            class="hide">live:</a></li>
                                            </ul>
                                        </div>

                                        <div class="panel no-border-top no-border-radius-top">
                                            <ul class="navigation">
                                                <li class="navigation-header">Cá nhân</li>
                                                <li><a href="candidate/profile"><i class="icon-file-text"></i> Hồ sơ xin
                                                        việc</a></li>
                                                <li><a href="candidate/document-attachment"><i
                                                            class="icon-file-media"></i> Đính kèm CV/chứng chỉ</a></li>
                                                <li><a href="candidate/import-linkedin-data"><i
                                                            class="icon-linkedin"></i>Nhập thông tin từ LinkedIn</a>
                                                </li>
                                                <li
                                                    data-intro='<h4 class="text-center">CV Go đã xuất hiện!</h4><p><strong>CV Go</strong> giúp bạn tạo CV cực chất trong chưa đầy 5 phút. Thử ngay!</p> <img width="200px" src="/cv_template/assets/images/theme/cv3.png" />'>
                                                    <a href="/candidate/pre-profile?tab=manage-resume"
                                                        target="_blank"><i class="icon-copy"></i>CV Go - Tạo CV cực
                                                        chất<span class="badge badge-danger">Mới!</span></a>
                                                </li>
                                                <li class="navigation-divider"></li>
                                                <li><a href="candidate/jobs-applied"
                                                        title="Danh sách việc làm đã ứng tuyển"><i
                                                            class="icon-stack-check"></i> Việc làm đã ứng tuyển</a></li>
                                                <li><a href="candidate/jobs-saved" title="Danh sách việc làm đã lưu"><i
                                                            class="icon-stack-star"></i> Việc làm đã lưu</a></li>
                                                <li><a href="candidate/jobs-matching"
                                                        title="Danh sách việc làm phù hợp"><i class="icon-stack4"></i>
                                                        Việc làm phù hợp</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /user details -->

                                </div>
                            </div>
                        </div>
                        <!-- /detached sidebar -->
                    </div>
                    <!-- /main content -->


                </div>
                <!-- /page content -->
                <!-- Footer -->
                <div class="footer text-muted hidden-xs">
                    <div class="mt-30">
                        &copy; 2024 Copyright RZCareer. All Rights Reserved.

                    </div>

                </div>
                <!-- /footer -->

            </div>
            <!-- /page container -->

            <div class="modal" id="colorgbIframeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="model-header">
                            <button type="button" class="close" data-dismiss="modal"
                                onclick="colorgbGridReload()">×</button>
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

            <!-- Modal -->

        </body>

        </html>
    </div>

</div>
