<div>


    <head>
        <title>{{ $company->company_name }} - Rzcareer</title>
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

        <link rel="preload" href="/assets_livewire/teks/css/fonts/boxicons.woff2" as="font" type="font/woff2"
            crossorigin>
        <link href="/assets_livewire/teks/css/icons.min.css?v=234208153092" rel="stylesheet">
        <link href="/assets_livewire/teks/css/base.min.css?v=234208153092" rel="stylesheet">
        <link href="/assets_livewire/css/custom.css?v=1727319941" rel="stylesheet">
        <script defer src="/assets_livewire/teks/js/base.min.js?v=234208153092"></script>
        <script data-type="lazy" data-src="https://www.googletagmanager.com/gtag/js?id=G-EHD5KK9TRQ"></script>

        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', 'G-EHD5KK9TRQ');
            gtag('config', 'AW-10876503189');
        </script>

        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "WebSite",
                "url": "https://Rzcareer.vn/",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://Rzcareer.vn/viec-lam.html?k={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }
        </script>





    </head>

    <body class="">

        @livewire('inc.header')
        <main>
            <link rel="stylesheet" href="/assets_livewire/teks/css/employer.min.css?v=234208153092">
            <style>
                .content.hideContent {
                    font-size: 14px;
                    line-height: 20px;
                }
            </style>
            <script>
                window.addEventListener("load", function() {

                    var $h = $('.get-touch').height();
                    var $hc = $('.hideContent');
                    var $content = $(".content");
                    var $sm = $(".show-more");
                    //$hc.css('min-height',$h-33);

                    if ($hc.height() > $h) {
                        $content.css('height', $h - 60).css('min-height', 'initial').addClass('content-hide');
                        $sm.removeClass('d-none');
                    }

                    $('.btn-view-all-job').click(function(e) {
                        e.preventDefault();
                        $("html, body").animate({
                            scrollTop: ($content.offset().top - 168)
                        });
                        $('.nav-link[href="#menu2"]').tab('show');
                    });

                    $(".show-more > a").on("click", function() {
                        var $this = $(this);
                        var linkText = $this.html();

                        if (linkText === 'Xem thêm <i class="bx bxs-chevron-down"></i>') {
                            linkText = "<i class='bx bxs-chevron-up'></i> Thu gọn";
                            $content.css('height', 'auto').removeClass('content-hide');
                        } else {
                            linkText = 'Xem thêm <i class="bx bxs-chevron-down"></i>';
                            $("html, body").animate({
                                scrollTop: ($content.offset().top - 168)
                            });
                            $content.css('height', $h - 60).addClass('content-hide');
                        }

                        $this.html(linkText);
                    });

                    $('.btn-follow').click(function() {
                        var txt = $(this).find('span');
                        $.ajax({
                            url: "/api/set-cfe?id=39234",
                            success: function(result) {
                                txt.html(result);
                            }
                        });

                    });


                });
            </script>


            <style>
                .input-group-search {
                    border: 2px solid #1772bd !important;
                    border-radius: 50px;
                    padding: 3px;
                }

                .input-group-search:before {
                    position: absolute;
                    top: 13px;
                    left: 15px;
                    content: 'Từ khóa:';
                    z-index: 99;
                    color: #000;
                    font-weight: 700;
                }

                .input-group-search:after {
                    position: absolute;
                    top: 13px;
                    left: calc(50% - 60px);
                    content: 'Địa điểm:';
                    z-index: 99;
                    color: #000;
                    font-weight: 700;
                }

                #keyword {
                    border-left: 0;
                    border-top: 0;
                    border-bottom: 0;
                    border-top-left-radius: 50px;
                    border-bottom-left-radius: 50px;
                    padding-left: 85px;
                }

                #location {
                    border-right: 0;
                    border-top: 0;
                    border-bottom: 0;
                    border-top-right-radius: 50px;
                    border-bottom-right-radius: 50px;
                    margin-right: 10px;
                    padding-left: 100px;
                }

                #search {
                    border-radius: 50px;
                    padding-left: 25px;
                    padding-right: 25px;
                }

                .ui-widget.ui-widget-content li {
                    border: 1px solid #fff !important;
                }

                .ui-widget.ui-widget-content {
                    border: 1px solid transparent !important;
                    box-shadow: 0 20px 10px 5px rgb(0 0 0 / 20%) !important;
                }

                .input-group-search .form-control {
                    font-size: 15px;
                }

                @media (max-width: 600px) {

                    .input-group-search:before,
                    .input-group-search:after {
                        display: none;
                    }

                    #location,
                    #keyword {
                        padding-left: 10px;
                    }

                    .input-group-search .form-control {
                        font-size: 13px;
                    }

                    #search {
                        padding-left: 10px;
                        padding-right: 10px;
                    }
                }
            </style>
            <section class="minw-1180 detail-desc">

                <div class="container">


                    <div class="cover position-relative d-none d-sm-block">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                            width="100%" height="245" class="lazy"
                            data-src="{{ Storage::exists($company->company_cover_image_url) ? Storage::url($company->company_cover_image_url) : asset('assets_livewire/img/default-cover.png') }}"
                            alt="{{ $company->company_name }}">
                    </div>
                    <div class="box-top position-relative bg-white border shadow p-2 p-sm-3 rounded-4">
                        <img class="position-absolute top-0 end-0 lazy" width="75" height="66"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                            data-src="{{ asset('assets/teks/img/employer-verified.svg') }}"
                            alt="{{ $company->company_name }}">

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <a href=" ">
                                    <img width="100" height="100" class="img-fluid logo lazy"
                                        onerror="this.src='{{ asset('assets_livewire/img/default-company.svg') }}'"
                                        data-src="{{ Storage::url($company->company_image_url) }}"
                                        alt="{{ $company->company_name }}">
                                </a>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h1 class="fw-bolder text-dark fs-4 w-75">
                                    <p>{{ $company->company_name }}</p>
                                </h1>
                                <h2 class="d-block fw-normal fs-5 my-1">{{ $company->company_name }}</h2>


                            </div>
                        </div>

                        <div class="d-block border-top d-sm-none py-2">
                            <button
                                class="btn btn-follow btn-sm btn-primary position-absolute bottom-0 end-0 me-2 mb-2"
                                data-eid="{{ $company->id }}">
                                <span><i class='bx bx-bell'></i> Theo dõi</span>
                            </button>
                            <div class="d-block pt-1 w-75 text-truncate small">
                                <a target="_blank" href="">
                                    <span class="text-capitalize text-dark">{{ $company->field_operation }}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb" class="d-none">
                        <ol class="breadcrumb my-3">
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                                itemtype="https://schema.org/ListItem"><a class="text-body small"
                                    href="https://Rzcareer.vn">Rzcareer</a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                                itemtype="https://schema.org/ListItem"><a class="text-body small"
                                    href="/cong-ty">Công ty</a>
                                <meta itemprop="position" content="2">
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span class="small">
                                    <p>C&ocirc;ng Ty TNHH Ch&#7871; Bi&#7871;n N&#432;&#7899;c Ch&#7845;m Mekong</p>
                                    <br />
                                </span></li>
                        </ol>
                    </nav>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs my-2">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#menu1">Tổng quan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu3">Đánh giá <span
                                    class="text-primary"></span></a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content pt-2 mb-2">


                        <div class="tab-pane active" id="menu1">



                            <div class="row bottom-mrg padd-top-20">
                                <div class="col-md-8 col-sm-8">

                                    <div class="detail-desc-caption mb-lg-4 mb-2">

                                        <div class="card pt-2 rounded-4 pt-md-3 p-2 p-md-3 shadow mt-sm-3 border-0">
                                            <div class="teks-section-title mb-0">
                                                <h2 class="h3">Giới thiệu công ty</h2>
                                            </div>

                                            <div class="clearfix content hideContent">
                                                <p>
                                                    {!! $company->description ?? 'Thông tin công ty chưa có.' !!}
                                                </p>
                                                <br />
                                            </div>

                                            <div class="show-more pt-2 d-none">
                                                <a class="fw-bold" href="javascript:void(0)">Xem thêm <i
                                                        class="bx bxs-chevron-down"></i></a>
                                            </div>
                                        </div>




                                    </div>

                                    <div
                                        class="teks-section mb-0 card pt-2 mb-lg-4 mb-2 rounded-4 pt-md-3 p-2 p-md-3 shadow mt-sm-3 border-0">
                                        <div class="teks-section-title">
                                            <h2 class="h3">Việc đang tuyển ({{$jobPosts->count()}})</h2>
                                        </div>
                                        <div class="teks-section-content teks-swiper">

                                            <div id="carousel3" class="carousel slide" data-bs-interval="5000"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($jobPosts->chunk(2) as $index => $chunk)
                                                        {{-- Chunk 2 jobs
                                                    per carousel item --}}
                                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                            <div class="row row-cols-1 row-cols-lg-2 g-2">
                                                                @foreach ($chunk as $job)
                                                                    <div class="col">
                                                                        <a href="{{ url('viec-lam/' . $job->slug) }}"
                                                                            class="d-flex teks-item text-dark">
                                                                            <div
                                                                                class="flex-shrink-0 position-relative">
                                                                                <img class="lazy" width="80"
                                                                                    height="80"

                                                                                    src="{{   asset('assets_livewire/img/default-company.svg') }}"
                                                                                    data-src="{{   asset('assets_livewire/img/default-company.svg') }}"

                                                                                    alt="{{ $job->company->name }}">
                                                                            </div>
                                                                            <div class="flex-grow-1 ms-2">
                                                                                <h3 class="h5 tooltip">
                                                                                    {{ $job->job_name }}</h3>
                                                                                <div class="h6 text-muted">
                                                                                    {{ $job->company->name }}</div>
                                                                                <ul class="p-0">
                                                                                    <li
                                                                                        class="list-group-item list-group-item-action">
                                                                                        <i class='bx bx-money'></i>
                                                                                        {{ $job->salary_min
                                                                                            ? number_format($job->salary_min) .
                                                                                                ' - ' .
                                                                                                number_format($job->salary_max) .
                                                                                                '
                                                                                                                                                                                                                                                                                                                                                        VND'
                                                                                            : 'Thỏa thuận' }}
                                                                                    </li>
                                                                                    <li
                                                                                        class="list-group-item list-group-item-action">
                                                                                        <i class='bx bx-map'></i>
                                                                                        {{ optional($job->location)->name }}
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Add Carousel Controls if needed -->
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carousel3" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carousel3" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="get-touch bg-white pt-3 p-4 rounded-4 shadow mb-4 my-sm-3">
                                        <div class="teks-section-title mb-0">
                                            <h2 class="h3">Thông tin</h2>
                                        </div>
                                        <ul class="list-unstyled list-icon-box my-2">
                                            <li class="d-flex align-items-center">
                                                <i class='bx bx-map pb-3'></i>
                                                <span>
                                                    <p>{{ $company->address ?? 'Địa chỉ chưa có thông tin.' }}</p>
                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <i class='bx bx-globe pb-3'></i>
                                                <span>
                                                    <a target="_blank" rel="dofollow"
                                                        href="{{ $company->website_url ?? '#' }}">
                                                        <p>{{ $company->website_url ?? 'Chưa có website.' }}</p>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <i class='bx bx-envelope pb-3'></i>
                                                <span>
                                                    <a href="mailto:{{ $company->company_email ?? '#' }}">
                                                        <p>{{ $company->company_email ?? 'Chưa có email.' }}</p>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <i class='bx bx-phone pb-3'></i>
                                                <span>
                                                    <p>{{ $company->company_phone ?? 'Chưa có số điện thoại.' }}</p>
                                                </span>
                                            </li>
                                        </ul>

                                        <ul class="list-unstyled list-group list-group-vertical my-3">
                                            @if ($company->facebook_url)
                                                <li class="mb-2"><a target="_blank" rel="nofollow"
                                                        href="{{ $company->facebook_url }}"><i
                                                            class="bx bxl-facebook"></i>
                                                        Facebook</a></li>
                                            @endif
                                            @if ($company->youtube_url)
                                                <li class="mb-2"><a target="_blank" rel="nofollow"
                                                        href="{{ $company->youtube_url }}"><i
                                                            class="bx bxl-youtube"></i>
                                                        YouTube</a></li>
                                            @endif
                                            @if ($company->linkedin_url)
                                                <li class="mb-2"><a target="_blank" rel="nofollow"
                                                        href="{{ $company->linkedin_url }}"><i
                                                            class="bx bxl-linkedin"></i>
                                                        LinkedIn</a></li>
                                            @endif
                                        </ul>

                                        <iframe style="background: #ddd; height: 200px; width: 100%; border: 0;"
                                            class="mb-3 clearfix"
                                            src="https://maps.google.com/maps?q={{ urlencode($company->address) }}&output=embed"
                                            allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                </div>


                            </div>




                            <div class="teks-section mb-3 card card-body shadow border-0 mt-2">
                                <div class="teks-section-title">
                                    <h2 class="h3">Thư viện ảnh</h2>
                                </div>
                                <div class="teks-section-content">
                                    <div class="img-container-grid">
                                        @foreach ( $gallery as $imageCompany)
                                        <a data-fancybox="gallery" class="fancybox img-grid" rel="ligthbox"
                                            href="{{ Storage::exists($imageCompany->image_url) ? Storage::url($imageCompany->image_url) : asset('employer_assets/uploads/img/gallery_default.jpg') }}">
                                            <img width="100%" height="100%"
                                                onerror="this.src='{{ Storage::exists($imageCompany->image_url) ? Storage::url($imageCompany->image_url) : asset('employer_assets/uploads/img/gallery_default.jpg') }}'"
                                                class="img-grid-c lazy" alt="{{$company->name}}"
                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                data-src="{{ Storage::exists($imageCompany->image_url) ? Storage::url($imageCompany->image_url) : asset('employer_assets/uploads/img/gallery_default.jpg') }}" />
                                        </a>
                                        @endforeach


                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="tab-pane fade" id="menu3">

                            <div class="row">
                                <div class="col-sm-8">
                                    @foreach ($reviews as $review)
                                        <div class="row mb-4">
                                            <div class="col-sm-6">
                                                <div class="rating-block bg-secondary shadow-sm mt-3 text-white rounded-4">
                                                    <p class="ms-4 pt-3">Được đánh giá</p>
                                                    <p class="ms-4 bold padding-bottom-7 fs-1">
                                                        {{ round(($review->salary_benefit + $review->training_opportunity + $review->employee_care + $review->company_culture + $review->workplace_environment) / 5, 1) }}
                                                        <small>/ 5</small>
                                                    </p>
                                                    <div class="ms-4 pb-3">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align" style="background: linear-gradient(90deg, {{ $i <= round(($review->salary_benefit + $review->training_opportunity + $review->employee_care + $review->company_culture + $review->workplace_environment) / 5) ? '#f1c40f' : '#d8d8d8' }} 100%);">
                                                                <span class="bx bxs-star" aria-hidden="true"></span>
                                                            </button>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                @php
                                                    $fields = [
                                                        'Lương thưởng & phúc lợi' => $review->salary_benefit,
                                                        'Đào tạo & học hỏi' => $review->training_opportunity,
                                                        'Sự quan tâm đến nhân viên' => $review->employee_care,
                                                        'Văn hoá công ty' => $review->company_culture,
                                                        'Văn phòng làm việc' => $review->workplace_environment,
                                                    ];
                                                @endphp

                                                @foreach ($fields as $label => $value)
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div>{{ $label }}</div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-warning bg-secondary" role="progressbar" style="width: {{ $value * 20 }}%">
                                                                    <span class="sr-only d-none">{{ $value * 20 }}% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                                {{-- REVIEW FORM --}}
                                <livewire:company-review :company_id="$company->id" />
                            </div>

                        </div>
                    </div>


                </div>
            </section>
            <script>
                function saveJob(t) {
                    var savedJob = $(t).data('saved-job');
                    var jobId = $(t).data('jid');
                    if (savedJob == "1") {
                        $(t).html("<i class='bx bx-heart' ></i> Lưu lại");
                        $(t).attr("data-saved-job", "0");
                        strSavedJob = getCookie('jg_saved_job');
                        strSavedJob = strSavedJob.replace(jobId, "");
                        strSavedJob = strSavedJob.replace(",,", ",");
                        strSavedJob = strSavedJob.replace(/(^[,\s]+)|([,\s]+$)/g, '');
                        setCookie('jg_saved_job', strSavedJob, 365);
                    } else {
                        $(t).html("<i class='bx bxs-heart' ></i> Đã lưu");
                        $(t).attr("data-saved-job", "1");
                        strSavedJob = getCookie('jg_saved_job');
                        strSavedJob = strSavedJob + "," + jobId;
                        strSavedJob = strSavedJob.replace(/(^[,\s]+)|([,\s]+$)/g, '');
                        setCookie('jg_saved_job', strSavedJob, 365);
                    }
                    $.ajax({
                        url: '/api/set-jl?id=' + jobId
                    });
                }

                window.addEventListener('load', function() {

                    $(function() {

                        $('.tooltip').tooltipster({
                            contentCloning: true,
                            contentAsHTML: true,
                            interactive: true,
                            trigger: 'custom',
                            triggerOpen: {
                                mouseenter: true
                            },
                            triggerClose: {
                                click: true,
                                mouseleave: true
                            },
                            functionReady: function(origin, tooltip) {
                                var c = origin.__Content;
                                var jid = $(c).find('.btn-save-job').data('jid');

                                var element = $('.tooltipster-content [data-jid="' + jid + '"]');

                                if (element.length > 0) {
                                    setTimeout(function() {
                                        if (element.is(':visible')) {
                                            $.ajax({
                                                url: '/ajax/update-job-hit?requester=web_preview&id=' +
                                                    jid
                                            });
                                        }
                                    }, 5000);
                                }

                            }
                        });
                    })
                })
            </script>
        </main>
        <section class="section-download cta-section bg-white pt-4 text-center position-relative">


        </section>
        @livewire('employer.inc.footer')


        <style>
            .zalo-chat-widget {
                left: initial !important;
                bottom: 20px !important;
                right: 10px !important;
                position: fixed !important;
                width: 60px !important;
                height: 60px !important;
            }
        </style>



        <script>
            if (!localStorage.getItem("tokenCvBuilder")) {
                localStorage.setItem("tokenCvBuilder",
                    'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hZG1pbi5qb2JzZ28udm4iLCJzdWIiOiJjYW5kaWRhdGVfYXBpIiwiaWF0IjoxNzI3MzE5OTQxLCJleHAiOjI0ODQxODM5NDEsInVpZCI6MjU5OTgzNX0.j7-YLCgk4Wxa0kkzvNmH5YpcNvXUIp3M1hk76AU6aZ0'
                );
            }
            if (!localStorage.getItem("userCvBuilder")) {
                localStorage.setItem("userCvBuilder", (
                    '{"candidate_id":"2599835","user_name":"2509roblox@gmail.com","name":"web developer","avatar":"https:\/\/Rzcareer.vn\/uploads\/avatar\/202409\/2599835_20240925210030.jpg","date_of_birth":"1975","current_city":"123","email":"2509roblox@gmail.com","tel":"","short_bio":null,"current_salary":null,"language":"","degree":"Trung c\u1ea5p - Ngh\u1ec1","degree_id":"1","min_expect_salary":null,"max_expect_salary":null,"job_type":"","job_type_id":"","status":"0","created":"2024-09-25 20:38:37","updated":"2024-09-25 20:45:40","access_token":"Rzcareer","gender":"","fb_user_id":"","current_address":"123","current_geo_lat":"","current_geo_long":"","complete_pre_profile":"2","skype":"","linkedin":"","twitter":"","google_plus":"","referal_id":"","hash_tag":"","job_position":"","job_position_id":null,"main_cv_template_id":null,"set_cv_template":"0","has_modify":"0","eng_translated":"0","welcome_notification":"0","demo_job":"0","review_date":null,"review_complete":"0","translate_date":null,"translate_complete":"0","accept_email":"1","is_test":"0","chat_username":"c_2599835","subemployer_id":null,"employer_id":null,"video_upload":"","video_upload_preview":"","hide_tel":"0","ward":"","district":"123","province":"H\u1ed3 Ch\u00ed Minh","percent_complete":"45","update_percent_time":"2024-09-25 20:45:40","request_update_field":"","request_update_status":"0","no_job_history":"0","upload_cv":"0","is_fake":"0","check_fake_time":null,"fake_in_date":null,"rating_app":"0","os":"","contest_register":"0","hrtalent_id":null,"create_type":"web","login_type":"google","fb_messenger_id":"","email_fb":"","is_updated_email":"0","need_reset_matching":"0","auth_key":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOjI1OTk4MzUsInN1YiI6MjU5OTgzNSwiaWF0IjoxNzI3MzA1ODYzLCJleHAiOjE3Mjc1NjUwNjN9.HQx8DpR-0z1LRLkPuOm3o2DZXfXG66xRmMfU_oWKd8zBhB5l5m-X8_AfOap-70yZHrhTFRXg7HTnyAbAeYa48fSOocAtlbH8x30HlXUJQl7TyWxL0zd2ZoI5xGWQ0cJ--o4feGOtkLsCEluuMEHIMc48gTSsKbC-YxqTg8mZudh92OFK_xq8RfSk4KqvfmNeQnv7q2vBI7PLuV99X3nhQ1f2CvVU_eJ5spbPB8G1TRGmVwWQk_g_57TkpbOKW77KipYLq58byMn31wkU-qmMXsNBpohOF52ojrnrK0pscqPrVcm3oRVYQiGvKMO2-VsmPcVbIoA9ZozQdgHcQ86NVQ","password_reset_token":"","facebook":"","facebook_link":null,"google_user_id":"113013226598621089024","account_kit_user_name":"","account_kit_access_token":"","account_kit_user_id":"","gender_auto":"0","tel_verified":"0","email_verified":"1","fill_cv_level":"0","is_checked_avatar":"0","backup_avatar":null,"confirm_find_job":"0","last_confirm_find_job":null,"approve_status":"1","admin_id":null,"qr_code":"","level":null,"allow_call":"1","allow_app_call":"1","allow_phone_call":"1","career_name":"Th\u1ef1c T\u1eadp Sinh Tuy\u1ec3n D\u1ee5ng","short_bio_html":null,"cv_capacity":"53","username_nologin":"","signed_in":"1","created_by":null,"approve_cv":"2","total_year_of_exp":null,"ip":null,"index_search":"0","others_info":"","career_name_auto":"","create_source":"pre-profile"}'
                ));
            }
        </script>

        <!--<div class="maintenance-banner">
  Để tăng chất lượng dịch vụ, Rzcareer.vn tiến hành bảo trì hệ thống từ <b>21h45 đến 23h45</b> ngày 13/04/2024. Trân trọng!
</div>
<style>
  .maintenance-banner {
    background-color: #1772bd;
    color: #fff;
    padding: 10px;
    line-height: 1.4;
    text-align: center;
    position: fixed;
    bottom:0;
    left: 0;
    right: 0;
    z-index: 99999999;
  }
  html body {
    padding-bottom: 60px !important;
  }
</style>-->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Thông báo</strong>
                    <small class="">ngay bây giờ</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">

                </div>
            </div>
        </div>


        <script>
            window.addEventListener('load', function() {
                $(function() {
                    if (!getCookie('Rzcareer-logged')) {
                        $.ajax({
                            url: "/api/logged?utm_source=&utm_medium=",
                            success: function(result) {
                                setCookie('Rzcareer-logged', 1, 1);
                                gtag('event', 'conversion', {
                                    'send_to': 'AW-10876503189/UpnvCOeNqcQDEJWJqcIo'
                                });
                            }
                        });
                    }

                    var url_string = window.location.href;
                    var url = new URL(url_string);
                    var utmSource = url.searchParams.get("utm_source") ? url.searchParams.get("utm_source") :
                        '';
                    var utmMed = url.searchParams.get("utm_medium") ? url.searchParams.get("utm_medium") : '';
                    var utmCampaign = url.searchParams.get("utm_campaign") ? url.searchParams.get(
                        "utm_campaign") : '';
                    var utmTerm = url.searchParams.get("utm_term") ? url.searchParams.get("utm_term") : '';
                    if (utmSource || utmMed || utmCampaign || utmTerm) {
                        $('a').attr("href", function() {
                            var currUrl = $(this).attr('href');
                            if (currUrl && !currUrl.includes("#") && !currUrl.includes("void(0)") && !
                                currUrl.includes("tel:") && !currUrl.includes("mailto:")) {
                                if (currUrl && currUrl.indexOf("?") == -1) {
                                    urlWithParam = currUrl + "?utm_source=" + utmSource +
                                        "&utm_medium=" + utmMed + "&utm_term=" + utmTerm +
                                        "&utm_campaign=" + utmCampaign;
                                } else {
                                    urlWithParam = currUrl + "&utm_source=" + utmSource +
                                        "&utm_medium=" + utmMed + "&utm_term=" + utmTerm +
                                        "&utm_campaign=" + utmCampaign;
                                }
                                return urlWithParam;
                            }
                        });
                    }
                });
            });
        </script>

        <div class="modal fade" id="cv-modal" tabindex="-1" aria-labelledby="cv-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cv-modal-label">Tính năng viết CV tự động bằng AI trong vòng 2
                            phút!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <video controls width="100%">
                            <source src="/assets_livewire/media/video/demo_write_cv_ai.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary m-auto d-block" href="/">Tạo CV ngay</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('load', function() {
                $(function() {
                    if (!getCookie('Rzcareer-cv-ai')) {
                        //$('#cv-modal').modal('show');
                    }
                    $('#cv-modal').on('shown.bs.modal', function() {
                        setCookie('Rzcareer-cv-ai', 1, 365);
                        $('#cv-modal video').trigger('play');
                    });

                });
            });
        </script>
    </body>


</div>
