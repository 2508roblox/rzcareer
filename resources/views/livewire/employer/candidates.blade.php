<div>



    <head>
        <link rel="canonical" href="https://employer.RZcareer.vn/" />
        <style>
            ::-webkit-scrollbar {
                width: 10px;
                background-color: #eee;
            }

            ::-webkit-scrollbar-thumb {
                background-color: #ccc;
            }

            ::-webkit-scrollbar-track {
                background-color: #eee;
            }

            @media (max-width: 767px) {
                .tf-logo {
                    padding-left: 10px !important;
                    width: 100px !important;
                }
            }
        </style>
        <link rel="preload" as="font" type="font/woff2" crossorigin="anonymous"
            href="/employer_assets/plugins/font-awesome/fonts/fontawesome-webfont.woff2?v=4.7.0">
        <link rel="preload" as="font" type="font/woff" crossorigin="anonymous"
            href="/employer_assets/plugins/fonts/themify.woff?-fvbane">
        <title>Ứng viên theo ngành nghề - RZcareer</title> <!-- Font Awesome Icon -->
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/plugins/font-awesome/css/font-awesome.min.css?v=1.2"> <!-- Plugin-CSS -->
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/plugins/css/bootstrap.min.css">
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/plugins/css/owl.carousel.min.css">
        <style>
            .overlay {
                position: relative;
                max-height: 548px;
                overflow: hidden;
            }
        </style>
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/plugins/css/themify-icons.css?v=22">
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/plugins/css/magnific-popup.css">
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/plugins/css/animate.css"> <!-- Main-Stylesheets -->
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/plugins/css/normalize.css">
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/layout/css/style.css?v=1.3247">
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/layout/css/responsive.css?v=1.3247">
        <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
            href="/employer_assets/layout/css/base.colorgb.css?v=1.3247">
        <!--Vendor-JS-->

    </head>

    <body data-spy="scroll" data-target="#primary-menu">
        @livewire('employer.inc.header')
        <style>
            .inner-header-title:before {
                opacity: .4;
            }

            .ur-detail-wrap {
                padding-left: 0;
                padding-right: 0;
            }

            .ur-detail-wrap-header h4 {
                color: #3098dd;
            }

            .ur-detail-wrap-header {
                padding: 18px 0 5px 0;
                border-bottom: 1px solid #3098dd;
                margin-bottom: 1.5em;
            }

            ul.advance-list list-unstyled li {
                padding: 8px 0;
            }

            .ur-detail-wrap-header {
                margin-bottom: 5px;
            }

            .txt {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 180px;
                display: inline-block;
                line-height: 1;
            }

            @media only screen and (min-width: 1000px) {
                .inner-header-title h1 {
                    font-size: 45px;
                }
            }
        </style>
        <div class="container pt-15" style="padding-top: 55px;">
            <div class="row">

                <div class="col-sm-12">
                    <ol style="background: transparent;padding: 20px 0 5px; margin-bottom: 5px;" class="breadcrumb"
                        itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a
                                style="color:#000" href="/" itemtype="https://schema.org/Thing" itemprop="item">
                                <span itemprop="name"> RZcareer</span> </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li class="active"><span class="text-muted" style="color:#888!important">Ứng viên theo ngành
                                nghề </span></li>
                    </ol>
                    <div class="row">

                        <div class="container">
                            <h3 class="text-center">Danh sách ngành nghề và số lượng hồ sơ</h3>
                            <div class="row">
                                @foreach ($careers as $career)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                                        <div class="card career-card">
                                            <div class="card-body d-flex align-items-center">
                                                <img class="career-icon" src="{{ Storage::url($career->icon_url) }}"
                                                    alt="{{ $career->name }}">
                                                <div class="career-info ms-3">
                                                    <h5 class="card-title">{{ $career->name }}</h5>
                                                    <p class="card-text">Số lượng hồ sơ: {{ $career->resumes_count }}
                                                    </p>
                                                    <a href="{{ route('employer.candidate', ['id' => $career->id]) }}"
                                                        style="
                                                    width: 100px;
                                                "
                                                        class="btn btn-primary btn-sm">Xem chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <style>
                            .container {
                                margin-top: 20px;
                            }

                            .card.career-card {
                                border: 1px solid #dee2e6;
                                border-radius: 8px;
                                transition: box-shadow 0.3s ease;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                padding: 15px;
                                display: flex;
                                align-items: center;
                            }

                            .card.career-card:hover {
                                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                            }

                            .card-body {
                                display: flex;
                                align-items: center;
                                gap: 3rem;
                            }

                            .career-icon {
                                width: 50px;
                                height: 50px;
                                object-fit: cover;
                            }

                            .career-info {
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                                text-align: left;
                            }

                            .card-title {
                                font-size: 16px;
                                font-weight: bold;
                                margin-bottom: 5px;
                                color: #0071dc;
                            }

                            .card-text {
                                font-size: 14px;
                                margin-bottom: 10px;
                                color: #555;
                            }

                            .btn-primary {
                                background-color: #0071dc;
                                border-color: #0071dc;
                                padding: 5px 10px;
                                font-size: 12px;
                            }

                            .btn-primary:hover {
                                background-color: #005bb5;
                                border-color: #005bb5;
                            }

                            .row {
                                display: flex;
                                flex-wrap: wrap;
                            }

                            .col-md-6,
                            .col-lg-4 {
                                padding: 10px;
                            }

                            h3 {
                                color: #0071dc;
                                margin-bottom: 30px;
                            }
                        </style>








                    </div>
                </div>
            </div>


        </div>
        {{-- @livewire('employer.inc.footer') --}}


    </body>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>

    <div class="zalo-chat-widget" data-oaid="1715225565559061022"
        data-welcome-message="Rzcareer.site Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="100"
        data-height="200"></div>
</div>
