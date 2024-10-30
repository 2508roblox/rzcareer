<?php
   $jobPostForLocation = App\Models\CommonCity::whereHas('locations.jobPosts') // Lọc những thành phố có job_posts
                      ->withCount(['locations as job_posts_count' => function ($query) {
                      $query->whereHas('jobPosts'); // Đếm số lượng job_posts qua locations
                      }])
                      ->orderBy('job_posts_count', 'desc')
                      ->limit(10)
                      ->get();

  $jobPostForCareer = App\Models\CommonCareer::withCount('jobPosts') // Count related job posts
                      ->orderBy('job_posts_count', 'desc') // Sort by the number of job posts
                      ->limit(10) // Limit to top 10 careers
                      ->get();

 $jobTypes = App\Models\JobPost::select('job_type')->distinct()->get();
 $typeOfWorkPlaces = App\Models\JobPost::select('type_of_workplace')
                      ->distinct()
                      ->get();

 $companies = App\Models\CommonCareer::withCount('companies')
            ->orderBy('companies_count', 'desc')
            ->take(10)
            ->get();

?>
<nav class="navbar navbar-default navbar-transparent">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                class="fa fa-bars"></i></button>
        <div class="navbar-header"><a class="navbar-brand" href="/">
                <img width="134" height="40" src="/assets_livewire/logo-light.svg" alt="RZCareer">
            </a>

        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">

            <ul class="nav navbar-nav navbar-right navbar-left-1 pull-left" data-in="fadeInDown" data-out="fadeOutUp">

                <li class="nav-item dropdown">
                    <a data-bs-toggle="dropdown" data-toggle="dropdown" class="nav-link dropdown-toggle"
                        href="/viec-lam.html">
                        <img src="/assets_livewire/img/job.svg" alt="job" loading="lazy"> Việc làm
                    </a>
                    <ul class="dropdown-menu pb-3">
                        <li>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="fw-bolder pt-2 pb-1 ps-3">Việc theo ngành nghề</div>
                                        <ul class="list-unstyled">
                                            @foreach($jobPostForCareer as $career)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => $career->id]) }}">
                                                    Việc làm {{ $career->name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>


                                    </div>
                                    <div class="col-sm-3 ps-sm-0">
                                        <div class="fw-bolder pt-2 pb-1 ps-3">Việc theo địa điểm</div>
                                        <ul class="list-unstyled">
                                            @foreach($jobPostForLocation as $city)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => $city->name, 'career_id' => '']) }}">
                                                    Việc làm tại {{ $city->name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="fw-bolder pt-2 pb-1 ps-3">Việc theo nhu cầu</div>
                                        <ul class="list-unstyled">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => '', 'is_urgent' => true]) }}">
                                                    Việc làm Tuyển
                                                    Gấp</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => '', 'is_hot' => true]) }}">
                                                    Việc làm Nổi bật</a></li>
                                            @foreach($jobTypes as $jobType)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => '', 'job_type' => $jobType->job_type ]) }}">
                                                    Việc làm {{ $jobType->job_type }}
                                                </a>
                                            </li>
                                            @endforeach
                                            @foreach($typeOfWorkPlaces as $typeOfWorkPlace)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => '', 'type_of_workplace' => $typeOfWorkPlace->type_of_workplace ]) }}">
                                                    Việc làm {{ $typeOfWorkPlace->type_of_workplace }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a data-bs-toggle="dropdown" data-toggle="dropdown" class="nav-link dropdown-toggle"
                        href="/cong-ty.html">
                        <img src="{{ asset('assets_livewire/img/employer.svg') }}" alt="job" loading="lazy"> Công ty
                    </a>
                    @if (Auth::check())
                    <ul class="dropdown-menu">
                        @foreach($companies as $company)
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('/cong-ty?field_operation=' . strtolower(str_replace(' ', '-', $company->name))) }}">
                                {{ $company->name }} ({{ $company->companies_count }} công ty)
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                <li class="nav-item dropdown">
                    <a data-bs-toggle="dropdown" data-toggle="dropdown" class="nav-link dropdown-toggle"
                        href="/mau-cv-xin-viec.html">
                        <img src="/assets_livewire/img/cv.svg" alt="job" loading="lazy"> CV / Hồ sơ
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/review-cv.html">Đánh giá CV <small
                                    class="badge bg-warning">N</small></a></li>
                        <li><a class="dropdown-item" href="/tao-cv-bang-ai.html">Tạo CV bằng AI </a></li>
                        <li><a class="dropdown-item" href="/phan-tich-cv.html">Tải lên CV</a></li>
                        <li><a class="dropdown-item" href="/mau-cv-xin-viec.html">Mẫu CV</a></li>
                    </ul>
                </li>

            </ul>
            <ul class="nav teks-nav navbar-nav navbar-right navbar-left-2" data-in="fadeInDown" data-out="fadeOutUp">
                @if (Auth::check())
                <li class="dropdown dropdown-user">
                    <a href="/candidate/index" style=" padding-top: 12px; display: flex !important; align-items:center;"
                        class="dropdown-toggle" data-toggle="dropdown">

                        <img loading="lazy" width="32" 
                            src="https://jobsgo.vn/uploads/avatar/202409/2599835_20240925210030.jpg?colorgb=1727271940"
                            alt="web developer" class="img-rounded">
                        <span style="margin-left: 5px">
                            <div class="d-flex text-bold" style="font-weight: bold;">
                                @if (Auth::check())
                                <span>
                                    <div class="d-flex fw-bold text-capitalize">{{ Auth::user()->full_name }}</div>
                                </span>
                                @endif

                            </div>
                            <div id="status_job_search" class="status_on">Đang tìm việc</div>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <style>
                            .switcher {
                                display: inline-block;
                                position: relative;
                                font-size: 16px;
                            }

                            .status_off {
                                color: #FF5722 !important;
                            }

                            .switch__input {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 36px;
                                height: 20px;
                                opacity: 0;
                                z-index: 0;
                            }

                            .switch__label {
                                display: block;
                                padding: 0 0 0 44px;
                                cursor: pointer;
                                color: #4CAF50;
                                font-weight: 600;
                                font-size: 14px
                            }

                            .switch__label:before {
                                content: "";
                                position: absolute;
                                top: 5px;
                                left: 0;
                                width: 36px;
                                height: 14px;
                                background-color: rgba(0, 0, 0, 0.26);
                                border-radius: 14px;
                                z-index: 1;
                                transition: background-color 0.28s cubic-bezier(0.4, 0, 0.2, 1);
                            }

                            .switch__label:after {
                                content: "";
                                position: absolute;
                                top: 2px;
                                left: 0;
                                width: 20px;
                                height: 20px;
                                background-color: #fff;
                                border-radius: 14px;
                                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
                                z-index: 2;
                                transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
                                transition-property: left, background-color;
                            }

                            .switch__input:checked+.switch__label:before {
                                background-color: #9fcaa0;
                            }

                            .switch__input:checked+.switch__label:after {
                                left: 16px;
                                background-color: #4CAF50;
                            }
                        </style>
                        <li><a href="/candidate/dashboard" wire:navigate title="Hồ sơ xin việc"><i
                                    class='bx bx-list-ul'></i> Quản lý hồ sơ</a></li>

                        <li><a href="/candidate/change-password" title="Đổi mật khẩu"><i
                                    class='bx bx-lock-open-alt'></i> Đổi mật khẩu</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript: void(0)">
                                <div class="switcher"><input type="checkbox" id="switch__input" class="switch__input"
                                        checked> <label for="switch__input" id="switch__label"
                                        class="switch__label status_on">Đang tìm
                                        việc</label></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" class="btn-colorgb-jgd" title="Bạn có chắc muốn đăng xuất khỏi hệ thống?"
                                wire:click.prevent="logout">
                                <!-- Gọi phương thức logout -->
                                <i class='bx bx-log-out-circle'></i> Đăng xuất
                            </a>
                        </li>

                        <script>
                            window.addEventListener('load', function() {
                                $(function() {

                                    $('#switch__input').on('change', function() {
                                        $.ajax({
                                            url: '/api/profile',
                                            data: {
                                                pk: 1,
                                                name: 'status',
                                                value: $(this).is(':checked') ? 0 : 2
                                            },
                                            success: function(response) {
                                                response = $.parseJSON(response);
                                                let statusClass = response.mess === 'on' ? 'status_on' : 'status_off';
                                                let statusText = response.mess === 'on' ? 'Đang tìm việc' : 'Đã tắt tìm việc';
                                                $('#switch__input').prop('checked', response.mess === 'on');
                                                $('#status_job_search').text(statusText).removeClass('status_on status_off').addClass(statusClass);
                                                $('#switch__label').text(statusText).removeClass('status_on status_off').addClass(statusClass);
                                                $('.status').removeClass('status_on status_off').addClass(statusClass);
                                                $('.status').text(statusText);
                                            },
                                            error: function() {
                                                let statusClass = 'status_off';
                                                let statusText = 'Đã tắt tìm việc';
                                                $('#switch__input').prop('checked', false);
                                                $('#status_job_search').text(statusText).removeClass('status_on status_off').addClass(statusClass);
                                                $('#switch__label').text(statusText).removeClass('status_on status_off').addClass(statusClass);
                                                $('.status').removeClass('status_on status_off').addClass(statusClass);
                                            }
                                        });
                                    });
                                });
                            });
                        </script>
                    </ul>
                    <style>
                        .dropdown-user .dropdown-menu>li>a {
                            padding: 4px 15px !important;
                        }
                    </style>
                </li>
                @else
                <!-- If user is not authenticated -->
                <div class="teks-btn-group d-none d-sm-inline-block">
                    <a rel="nofollow" href="/site/register" class="btn rounded-2 btn-outline-primary me-2">Đăng ký</a>
                    <a href="/site/login" class="btn rounded-2 me-3 btn-primary">Đăng nhập</a>
                </div>
                @endif
            </ul>
        </div>
    </div>

    </div>
    
</nav>