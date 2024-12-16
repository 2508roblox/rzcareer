<div>

    <head>
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
                .tf-logo{
                    padding-left: 10px !important;
                    width: 100px !important;
                }
            }
        </style>
        <link rel="preload" as="font" type="font/woff2" crossorigin="anonymous"
            href="/employer_assets/plugins/font-awesome/fonts/fontawesome-webfont.woff2?v=4.7.0">
        <link rel="preload" as="font" type="font/woff" crossorigin="anonymous"
            href="/employer_assets/plugins/fonts/themify.woff?-fvbane">
        <title>Ứng viên {{ $careerName }} - RZcareer</title> <!-- Font Awesome Icon -->
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
        <!-- Google Tag Manager (noscript) -->
        @livewire('employer.inc.header')
        <style>
            .inner-header-title:before {
                opacity: .4;
            }

            .ur-detail-wrap {
                padding-left: 0;
                padding-right: 0;
            }

            .candidate-list-layout,
            .newjob-list-layout {
                display: flex;
                width: 100%;
                margin-top: 10px;
                margin-bottom: 10px;
                background: #fff;
                overflow: hidden;
                position: relative;
                border-radius: 6px;
                padding: 20px 25px 0;
                border: 1px solid #e8e8e8;
                align-items: center;
                flex-wrap: wrap;
            }

            .cll-wrap {
                flex: 1;
            }

            .cll-thumb {
                max-width: 80px;
                display: inline-block;
                margin: 0 auto;
                overflow: hidden;
                height: 80px;
                float: left;
            }

            .cll-caption {
                display: inline-block;
            }

            .cll-thumb img {
                max-width: 80px;
            }

            .cll-caption h4 {
                padding-top: 0;
                margin-top: 0;
                font-size: 17px;
            }

            .mrg-r-5 {
                max-width: 220px;
                overflow: hidden;
                text-overflow: ellipsis;
                display: inline-block;
                text-transform: capitalize !important;
            }



            .cll-caption h4 small {
                margin-left: 5px;
                /*padding-left: 10px;
        border-left: 1px solid #dbe6ef;*/
                font-size: 14px;
                font-weight: 400;
                color: #8596b3;
                position: relative !important;
                top: -5px !important;
            }

            .cll-caption ul {
                margin: 0;
                padding: 0;
                margin-top: 1rem;
            }

            .cll-caption ul li:first-child {
                padding-left: 0;
            }

            .cll-caption ul li {
                font-size: 13px;
                display: inline-block;
                list-style: none;
                padding-right: 1rem;
                display: inline-block;
                list-style: none;
                padding-right: 1rem;
                /*border-right: 1px solid #dbe6ef;*/
                padding-left: 5px;
            }

            .cll-caption ul li:last-child {
                border-right: none;
            }

            .col-sm-9 .ur-detail-wrap-header {
                margin-bottom: 5px;
            }

            @media only screen and (min-width: 1000px) {
                .inner-header-title h1 {
                    font-size: 45px;
                }
            }

            @media only screen and (max-width: 500px) {
                .mrg-r-5 {
                    max-width: 140px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: inline-block;
                    text-transform: capitalize !important;
                }
            }
        </style>
        <div class="container pt-15" style="padding-top: 55px;">
            <div class="row">
                <div class="col-sm-12">
                    <ol style="background: transparent;padding: 20px 0 5px; margin-bottom: 5px;" class="breadcrumb"
                        itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a
                                style="color:#000" href="/" itemtype="https://schema.org/Thing" itemprop="item"> <span
                                    itemprop="name"> RZcareer</span> </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a
                                style="color:#000" href="/employer/candidates" itemtype="https://schema.org/Thing"
                                itemprop="item"> <span itemprop="name">Ứng viên theo ngành nghề</span> </a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li class="active"><span class="text-muted">{{ $careerName }} </span></li>
                    </ol>
                    <div class="row padd-bot-15 clearfix" style="padding-bottom: 15px;">
                        @foreach ($resumes as $resume)
                        <div class="col-sm-6">
                            <div class="candidate-list-layout">
                                <div class="cll-wrap">
                                    <div class="cll-caption" style="overflow: auto;width: 100%;">
                                        <h4>
                                            <strong class="text-capitalize text-info">
                                                <a style="color:#1eca1e;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; max-width: 300px;"
                                                   {{-- href="{{ route('candidate.details', ['id' => $resume->id]) }}" --}}>
                                                    {{ $resume->seekerProfile->user->full_name }}
                                                </a>
                                            </strong>
                                            <small> ({{ $resume->seekerProfile->birthday ? \Carbon\Carbon::parse($resume->seekerProfile->birthday)->format('Y-m-d') : 'N/A' }})</small>
                                            @php
                                            $isSaved = \App\Models\SavedResume::where('resume_id', $resume->id)->where('company_id', auth()->user()->company->id)->exists();
                                        @endphp

                                        <small
                                            wire:click="{{ !$isSaved ? 'saveCandidate(' . $resume->id . ')' : '' }}"
                                            style="color: {{ $isSaved ? '#ccc' : '#000000' }}; cursor: pointer;"
                                            {{ $isSaved ? 'disabled' : '' }}>
                                            {{ $isSaved ? 'Đã lưu' : 'Lưu hồ sơ' }}
                                        </small>
                                        </h4>

                                        <ul class="mrg-bot-10">
                                            <li><i class="glyphicon glyphicon-briefcase"></i> {{ $resume->position }}</li>
                                            <li><i class="glyphicon glyphicon-map-marker"></i> {{ $resume->seekerProfile->city_name }}</li>
                                            <li>
                                                @if($resume->file_url)
                                                    <i class="glyphicon glyphicon-paperclip"></i>
                                                    <a href="{{ url($resume->file_url) }}" target="_blank" style="color: #000000;">1 file đính kèm</a>
                                                @else
                                                    0 file đính kèm
                                                @endif
                                            </li>
                                        </ul>

                                        <p title="Các vị trí đã làm việc">
                                            <u>Các vị trí đã làm việc:</u>
                                            <span style="height: 56px; display: block; overflow: auto; margin-bottom: 1px; margin-top: 3px;">
                                                @foreach ($resume->experienceDetails as $experience)
                                                    <span style="background: #2b8fc0; padding: 3px 5px !important; margin-top: 2px; font-size: 11px;" class="label mrg-r-5">{{ $experience->job_name }}</span>
                                                @endforeach
                                            </span>
                                        </p>

                                        <i>Cập nhật hồ sơ: {{ $resume->updated_at }}</i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                        {{-- <div class="col-sm-6">
                            <div class="candidate-list-layout">
                                <div class="cll-wrap">
                                    <div class="cll-caption" style="overflow: auto;width: 100%;">
                                        <h4><strong class="text-capitalize text-info"><a
                                                    style="color:#1eca1e;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; max-width: 300px;"
                                                    href="/site/login?ref=%2Fsearch-cv%2Findex%3FSearchCv%5Brole%5D%5B%5D%3DTh%E1%BB%B1c+T%E1%BA%ADp+Sinh+%C4%90%C3%A0o+T%E1%BA%A1o%26cid%3DaXNUMU9xZ0xsOUh1czdpaThhL251UT09">Trần
                                                    Quí Lộc</a></strong><small> (1998-08-28)</small></h4>

                                        <ul class="mrg-bot-10">
                                            <li><i class="glyphicon glyphicon glyphicon-briefcase"></i> Nhân Viên/Chuyên
                                                Viên</li>
                                            <li><i class="glyphicon glyphicon-map-marker"></i> Hồ Chí Minh</li>
                                            <li><i class="glyphicon glyphicon-paperclip"></i> 3 file đính kèm</li>
                                        </ul>
                                        <p title="Các vị trí đã làm việc">
                                            <u>Các vị trí đã làm việc:</u>
                                            <span
                                                style="height: 56px; display: block; overflow: auto;margin-bottom: 1px;margin-top: 3px;">
                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Nhân Viên Kiểm Tra Chất Lượng Sản
                                                    Phẩm</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Nhân Viên Telesale</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Thực Tập Sinh Đào Tạo</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title=""></span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Nhân viên tư vấn Nhà hàng tiệc
                                                    cưới</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Thực tập sinh</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">nhân viên tinh luyện</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Nhân viên tính luyện</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Nhân viên tư vấn Nhà hàng</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Nhân viên bếp thớt và nhập liệu sản
                                                    phẩm</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Nhân viên thực tập</span>

                                                <span
                                                    style="background: #2b8fc0;padding: 3px 5px !important; margin-top: 2px;font-size: 11px"
                                                    class="label mrg-r-5" title="">Nhân viên PACK</span>

                                            </span>
                                            <i>
                                                Cập nhật hồ sơ: 01/10/2024 </i>
                                        </p>


                                    </div>

                                </div>
                            </div>
                        </div> --}}

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
