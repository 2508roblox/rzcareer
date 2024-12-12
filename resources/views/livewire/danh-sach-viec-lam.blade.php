<div>
    <div>
        <div>
            <div>



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
                    <link rel="preload" href="/assets_livewire/teks/css/fonts/boxicons.woff2" as="font"
                        type="font/woff2" crossorigin>
                    <link href="/assets_livewire/teks/css/icons.min.css?v=2342081531001" rel="stylesheet">
                    <meta name='dmca-site-verification' content='SW92M2l3NDFsN0RiZ2FZSTRqMjM1dz090' />
                    <meta name="csrf-token" content="{{ csrf_token() }}">


                    <meta name="google-site-verification" content="9ifARzV85NXV1CAcz8bKd6Dc5t6jcDbT7Pn0J1gU8j8" />
                    <title>Danh sách việc làm | Rzcareer</title>
                    <link rel="preload" as="font" type="font/woff" crossorigin="anonymous"
                        href="/assets_livewire/static/assets/css/fonts/et-line.woff">
                    <link rel="preload" as="font" type="font/woff2" crossorigin="anonymous"
                        href="/assets_livewire/static/assets/css/fonts/fontawesome-webfont.woff2?v=4.6.2">
                    <link rel="preload" as="font" type="font/woff2" crossorigin="anonymous"
                        href="/assets_livewire/static/assets/css/fonts/glyphicons-halflings-regular.woff2">
                    <link rel="stylesheet preload prefetch" as="style" type="text/css" crossorigin="anonymous"
                        href="/assets_livewire/static/assets/css/style.min.css?v=2342081531001">
                    <script defer
                        src="/assets_livewire/static/assets/assets_livewire/js/javascript.min.js?v=2342081531001">
                    </script>




                    <link href="/assets_livewire/css/custom.css?v=1727433676" rel="stylesheet">
                </head>

                <body class="page-job-tagvn ">


                    @livewire('inc.header-nav')

                    <style>
                        .a:active,
                        .a:focus,
                        .a:hover {
                            color: #1772bd !important;
                            background-color: transparent !important;
                        }

                        .prev.disabled,
                        .next.disabled {
                            display: none !important;
                        }

                        @media (min-width: 1080px) {
                            .teks-category .dropdown-menu {
                                width: 886px;
                            }

                            .teks-category .dropdown-menu li {
                                width: 20%;
                                float: left;
                            }
                        }

                        @media (max-width: 767px) {
                            .teks-category .dropdown-menu {
                                width: 100%;
                            }

                            .teks-category .dropdown-menu li {
                                width: 50%;
                                float: left;
                            }

                            body .item-click {
                                padding-bottom: 12px;
                            }

                            body .brows-job-list {
                                padding: 0 !important;
                                min-height: initial;
                            }

                            .sort .btn {
                                background: #fff;
                                position: absolute;
                                right: 0;
                                top: -35px;
                            }
                        }

                        .sort .dropdown-menu {
                            margin-top: -3px;
                        }

                        .pagination>li>a,
                        .pagination>li>span {
                            cursor: pointer
                        }
                    </style>
                    <link rel="stylesheet" type="text/css"
                        href="/assets_livewire/static/assets/css/list.min.css?v=2342081531001">

                    {{-- <section>
                        <div>
                            <input type="text" wire:model="searchTerm" placeholder="Tìm kiếm location..."
                                class="border p-2">

                            @if (!empty($locations))
                            <ul class="absolute bg-white border border-gray-300 mt-1">
                                @foreach ($locations as $location)
                                <li wire:click="selectLocation('{{ $location }}')"
                                    class="cursor-pointer hover:bg-gray-200 p-2">
                                    {{ $location }}
                                </li>
                                @endforeach
                            </ul>
                            @endif

                            @if ($selectedLocation)
                            <div class="mt-2">
                                <strong>Location đã chọn:</strong> {{ $selectedLocation }}
                            </div>
                            @endif
                            @if ($searchTerm)
                            <div class="mt-2">
                                <strong>Từ khoá đã chọn:</strong> {{ $searchTerm }}
                            </div>
                            @endif
                        </div>

                    </section> --}}

                    <section class="section wrap-1">
                        <div class="container">
                            <div class="row no-mrg">
                                <div class="col-sm-12">
                                    <div class="sidebar-widget padd-top-0 padd-bot-0 mrg-bot-0">
                                        <div class="colorgb-container">
                                            <div class="row extra-mrg job-list brows-employer-list mrg-bot-10">
                                                @livewire('job-search-modal')
                                                <div class="col-sm-3">
                                                    <div class="padd-top-15">
                                                        <div></div>

                                                  


                                                        <div class="blog-sidebar">

                                                            <div
                                                                class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20">
                                                                <div class="mrg-bot-5 h4"> Tìm theo chức danh <a
                                                                        href="javascript:void(0)" class="pull-right"> <i
                                                                            class="fa fa-angle-double-down"></i></a>
                                                                </div>
                                                                <ul class="sidebar-list expandible-bk">

                                                                    @foreach(
                                                                    App\Models\jobPost::select('position') // Count related job posts
                                                                    ->distinct()
                                                                    ->get() as $position)
                                                                    <li>
                                                                        <a href="{{ route('danh-sach-viec-lam', ['keyword' => $position->position, 'location' => '', 'career_id' => '']) }}"
                                                                            title="{{$position->position}}">
                                                                            <div class="txt text-capitalize">{{$position->position}}</div>
                                                                        </a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div
                                                                class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20">
                                                                <div class="mrg-bot-5 h4"> Tìm theo địa điểm <a
                                                                        href="javascript:void(0)" class="pull-right"> <i
                                                                            class="fa fa-angle-double-down"></i></a>
                                                                </div>
                                                                <ul class="sidebar-list expandible-bk">
                                                                    @foreach(
                                                                    App\Models\CommonCity::whereHas('locations.jobPosts')
                                                                    ->withCount(['locations as job_posts_count' => function ($query) {
                                                                    $query->whereHas('jobPosts'); // Đếm số lượng job_posts qua locations
                                                                    }])
                                                                    ->orderBy('job_posts_count', 'desc')
                                                                    ->get() as $city)
                                                                    <li>
                                                                        <a href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => $city->name, 'career_id' => '']) }}"
                                                                            title="{{$city->name}}">
                                                                            <div class="txt text-capitalize">{{ $city->name }}</div>
                                                                        </a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div
                                                                class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20">
                                                                <div class="mrg-bot-5 h4"> Việc làm theo Loại hình <a href="javascript:void(0)"
                                                                    class="pull-right"> <i class="fa fa-angle-double-down"></i></a></div>
                                                            <ul class="sidebar-list expandible-bk">
                    
                                                                @foreach(App\Models\JobPost::select('job_type')->distinct()->get()
                                                                as $jobType_item)
                    
                                                                <li>
                                                                    <a href="{{ route('danh-sach-viec-lam', ['keyword' => $jobType_item->job_type, 'location' => '', 'career_id' => '']) }}"
                                                                        title="{{$jobType_item->job_type}}">
                                                                        <div class="txt text-capitalize">{{$jobType_item->job_type}}</div>
                                                                    </a>
                                                                </li>
                                                                @endforeach
                    
                                                            </ul>
                                                            </div>
                                                            <div
                                                                class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20">
                                                                <div class="mrg-bot-5 h4"> Việc làm theo Ngành nghề <a href="javascript:void(0)"
                                                                    class="pull-right"> <i class="fa fa-angle-double-down"></i></a></div>
                                                            <ul class="sidebar-list expandible-bk">
                    
                    
                                                                @foreach(
                                                                App\Models\CommonCareer::withCount('jobPosts') // Count related job posts
                                                                ->orderBy('job_posts_count', 'desc') // Sort by the number of job posts
                                                                ->get() as $career)
                                                                <li>
                                                                    <a href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => $career->id]) }}"
                                                                        title="{{$career->name}}">
                                                                        <div class="txt text-capitalize">{{$career->name}}</div>
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- <section class="gray-bg padd-top-15 hide padd-bot-15 brows-job-category job-list full">
                        <div class="container">
                            <div class="row"><img width="100" height="100" src="https://Rzcareer.vn/loading.gif"
                                    style="display: block;margin: auto;"></div>
                        </div>
                    </section> --}}
              


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
                    {{-- <a href="https://zalo.me/409462990633304042" target="_blank" rel="nofollow"
                        class="zalo-chat-widget">
                        <img loading="lazy" src="/img/2024/zalo.svg" alt="Rzcareer">
                    </a> --}}


                    {{-- <script>
                        if (!localStorage.getItem("tokenCvBuilder")) {
                localStorage.setItem("tokenCvBuilder",
                    'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hZG1pbi5qb2JzZ28udm4iLCJzdWIiOiJjYW5kaWRhdGVfYXBpIiwiaWF0IjoxNzI3NDMzNjc2LCJleHAiOjI0ODQyOTc2NzYsInVpZCI6MjU5MzMxN30.DmJMD7EmJF8RUS8lwY-I--b1xA_ksn-OXd903HNAxQA'
                    );
            }
            if (!localStorage.getItem("userCvBuilder")) {
                localStorage.setItem("userCvBuilder", (
                    '{"candidate_id":"2593317","user_name":"trangiangzxc@gmail.com","name":"Tr\u1ea7n L\u00ea Ho\u00e0ng Giang","avatar":"https:\/\/Rzcareer.vn\/uploads\/avatar\/202409\/2593317_20240920203818.png","date_of_birth":"2004-05-13","current_city":"H\u1ed3 Ch\u00ed Minh","email":"Trangiangzxc@gmail.com","tel":"0337799453","short_bio":"","current_salary":null,"language":"","degree":"Trung h\u1ecdc ph\u1ed5 th\u00f4ng","degree_id":"7","min_expect_salary":null,"max_expect_salary":null,"job_type":"B\u00e1n th\u1eddi gian","job_type_id":"2","status":"0","created":"2024-09-20 14:47:25","updated":"2024-09-20 20:39:17","access_token":"Rzcareer","gender":"male","fb_user_id":"","current_address":"Qu\u1eadn 12, H\u1ed3 Ch\u00ed Minh","current_geo_lat":"","current_geo_long":"","complete_pre_profile":"2","skype":"","linkedin":"","twitter":"","google_plus":"","referal_id":"","hash_tag":"","job_position":"Th\u1ef1c T\u1eadp Sinh","job_position_id":"1","main_cv_template_id":"1","set_cv_template":"0","has_modify":"0","eng_translated":"0","welcome_notification":"0","demo_job":"0","review_date":null,"review_complete":"2","translate_date":null,"translate_complete":"0","accept_email":"1","is_test":"0","chat_username":"c_2593317","subemployer_id":null,"employer_id":null,"video_upload":"","video_upload_preview":"","hide_tel":"0","ward":"","district":"q12","province":"H\u1ed3 Ch\u00ed Minh","percent_complete":"90","update_percent_time":"2024-09-23 11:26:51","request_update_field":"","request_update_status":"0","no_job_history":"0","upload_cv":"1","is_fake":"0","check_fake_time":null,"fake_in_date":null,"rating_app":"0","os":"","contest_register":"0","hrtalent_id":null,"create_type":"web","login_type":"google","fb_messenger_id":"","email_fb":"","is_updated_email":"0","need_reset_matching":"0","auth_key":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOjI1OTMzMTcsInN1YiI6MjU5MzMxNywiaWF0IjoxNzI2OTYwMzM2LCJleHAiOjE3MjcyMTk1MzZ9.m1Yq22xtZdaRuO5MztmKIGwfGr9XjBWDSir9caw6ZHS5xSZDZkyk-eMrLtLKLJ83Xcbk4pXBsDQCrNehJ1jysPXDFV884YhpJRbnOizzRv-l-Xhv0w4KPJwmub2KssTmWbn1KXHRJOvgV62s_zc5zxNjPQz3UZP_j7IpuTxetl4hFV63PUcMusIpcjRr3T1HI-pzm9W7gSgisTinD3cuiS-l93rcA-O1GZDAEp6KFCqLBBcO7NlNbgAEpsHT166GzpBkZq4xmJ7nZeyEtJC_ObbUUp0TXlR2-yZV1eroHDwrkNqT8ogmu3c8Cx6xxlU20JOYQ8sjYlKPOLatf8fZ7A","password_reset_token":"","facebook":"","facebook_link":null,"google_user_id":"110231117123356408959","account_kit_user_name":"","account_kit_access_token":"","account_kit_user_id":"","gender_auto":"0","tel_verified":"0","email_verified":"1","fill_cv_level":"2","is_checked_avatar":"0","backup_avatar":null,"confirm_find_job":"0","last_confirm_find_job":null,"approve_status":"2","admin_id":"1572","qr_code":"","level":"5","allow_call":"1","allow_app_call":"1","allow_phone_call":"1","career_name":"Nh\u00e2n Vi\u00ean Tuy\u1ec3n D\u1ee5ng","short_bio_html":"","cv_capacity":"8881","username_nologin":"","signed_in":"1","created_by":null,"approve_cv":"1","total_year_of_exp":null,"ip":null,"index_search":"0","others_info":"[{\"others_promise\":\"III.\\nC\u00f4ng ty TNHH DCSOFT \u0111\u00e3 t\u1ea1o ra m\u1ed9t m\u00f4i tr\u01b0\u1eddng th\u1ef1c t\u1eadp l\u00fd t\u01b0\u1edfng v\u1edbi \u0111\u1ed9i ng\u0169  nh\u00e2n s\u1ef1 t\u1eadn t\u00e2m, ch\u01b0\u01a1ng tr\u00ecnh \u0111\u00e0o t\u1ea1o b\u00e0i b\u1ea3n, v\u00e0 c\u01a1 h\u1ed9i tham gia c\u00e1c d\u1ef1 \u00e1n th\u1ef1c  t\u1ebf. T\u1ea5t c\u1ea3 nh\u1eefng y\u1ebfu t\u1ed1 n\u00e0y \u0111\u00e3 mang l\u1ea1i tr\u1ea3i nghi\u1ec7m th\u1ef1c t\u1eadp tuy\u1ec7t v\u1eddi v\u00e0 kh\u00f4ng  c\u00f3 g\u00ec c\u1ea7n ki\u1ebfn ngh\u1ecb th\u00eam.\"}]","career_name_auto":"","create_source":""}'
                    ));
            }
                    </script> --}}

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
                    <a href="/mau-cv-xin-viec.html" title="Tạo CV / Resume Online nhanh chóng, miễn phí với Rzcareer "
                        class="btn-colorgb-float"> <i class="fa fa-user-plus icon-float"></i> <span>Tạo CV /
                            Resume</span>
                    </a>



                </body>


            </div>
        </div>
    </div>
</div>