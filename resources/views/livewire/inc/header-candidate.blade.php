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

<div class="navbar navbar-default">
    <div class="wrap">
        <div class="navbar-header">
            <a class="navbar-brand" href="/" title="Về trang chủ RZCareer">
                <img width="134" height="40" src="/assets_livewire/logo-light.svg" alt="RZCareer">
            </a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-menu7"></i></a>
                </li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">

            <ul class="nav navbar-nav navbar-left">

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
                        <img src="/assets_livewire/img/employer.svg" alt="job" loading="lazy"> Công ty
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
                <!-- <li class="nav-item dropdown">
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
                </li> -->

            </ul>

            <ul class="nav navbar-nav navbar-right" style="float:right !important;">

                <li class="dropdown dropdown-user">



                    <a href="/candidate/index" style=" padding-top: 12px;display: flex; align-items:center "
                        class="dropdown-toggle" data-toggle="dropdown">
                        <img class="lazy rounded-1"
                        src="{{ auth()->user()->avatar_url ? Storage::url(auth()->user()->avatar_url) : 'https://lh3.googleusercontent.com/a/ACg8ocK8gM4BqM7T5N6j_ITi302_WurD0O8FM4ui8JJGNxNbwKM3cyjt=s500-c' }}"
                        data-src="{{ auth()->user()->avatar_url ? Storage::url(auth()->user()->avatar_url) : 'https://lh3.googleusercontent.com/a/ACg8ocK8gM4BqM7T5N6j_ITi302_WurD0O8FM4ui8JJGNxNbwKM3cyjt=s500-c' }}"
                        alt="avatar" width="32" height="32">

                        @if (Auth::check())
                        <span>
                            {{ Auth::user()->full_name }}
                            <div id="status_job_search" class="status_on">Đang tìm việc</div>
                        </span>
                        @endif

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
                        <li><a href="/candidate/dashboard"   title="Hồ sơ xin việc"><i
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


                    </ul>
                    <style>
                        .dropdown-user .dropdown-menu>li>a {
                            padding: 4px 15px !important;
                        }
                    </style>

                </li>
            </ul>
        </div>
    </div>
</div>
