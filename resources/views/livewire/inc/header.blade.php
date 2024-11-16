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
<header class="teks-header p-sm-3 p-2 teks-shadow sticky-top bg-white">
  <div class="container d-none d-lg-block">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" title="Jobs on the GO"
        class="d-flex me-4 align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img width="134" height="40" src="/assets_livewire/logo-light.svg" alt="RZCareer">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

        <li class="nav-item dropdown">
          <a data-bs-toggle="dropdown" data-toggle="dropdown" class="nav-link dropdown-toggle" href="/viec-lam.html">
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
          <a data-bs-toggle="dropdown" data-toggle="dropdown" class="nav-link dropdown-toggle" href="/cong-ty">
            <img src="{{ asset('assets_livewire/img/employer.svg') }}" alt="job" loading="lazy"> Công ty
          </a>
    
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

      <style>
        .status_on {
          color: #4CAF50 !important;
        }

        .status_off {
          color: #FF5722 !important;
        }
      </style>
      @if(Auth::check())
      <!-- If user is authenticated -->
      <div class="dropdown me-sm-3 me-0 text-end mr--20">
        <a href="#" style="padding-top: 12px; display: flex !important; align-items:center;"
          class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
          aria-expanded="false">
          <img class="lazy rounded-1"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          data-src="{{ auth()->user()->avatar_url ? Storage::url(auth()->user()->avatar_url) : 'https://lh3.googleusercontent.com/a/ACg8ocK8gM4BqM7T5N6j_ITi302_WurD0O8FM4ui8JJGNxNbwKM3cyjt=s500-c' }}"
          alt="avatar" width="32" height="32">
        

          <span style="margin-left: 5px">
            @if (Auth::check())
            <span>
              <div class="d-flex fw-bold text-capitalize">{{ Auth::user()->full_name }}</div>

            </span>
            @endif

            <div id="status_job_search" class="status_on">Đang tìm việc</div>
          </span>
        </a>
        <ul class="dropdown-menu text-small">
          <!-- Dropdown menu items -->
          <li><a class="dropdown-item" href="/candidate/dashboard" title="Hồ sơ xin việc"><i class='bx bx-list-ul'></i>
              Quản lý hồ sơ</a></li>
          <li><a class="dropdown-item" href="/candidate/change-password" title="Đổi mật khẩu"><i
                class='bx bx-lock-open-alt'></i> Đổi mật khẩu</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="javascript: void(0)">
              <div class="switcher"><input type="checkbox" id="switch__input" class="switch__input" checked> <label
                  for="switch__input" id="switch__label" class="switch__label status_on">Đang tìm việc</label></div>
            </a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item" wire:click='logout' class="btn-colorgb-jgd" data-reload="true" data-pjax="false"
              title="Bạn có chắc muốn đăng xuất khỏi hệ thống?">
              <i class='bx bx-log-out-circle'></i> Đăng xuất
            </a>
          </li>


        </ul>
      </div>
      @else
      <!-- If user is not authenticated -->
      <div class="teks-btn-group d-none d-sm-inline-block">
        <a rel="nofollow" href="/site/register" class="btn rounded-2 btn-outline-primary me-2">Đăng ký</a>
        <a href="/site/login" class="btn rounded-2 me-3 btn-primary">Đăng nhập</a>
      </div>
      @endif

      <div class="vr d-none d-xl-block"></div>
      <div class="d-none d-xl-block ms-sm-3 btn-group">
        <button type="button" class="btn rounded-2 text-capitalize dropdown-toggle text-primary border bg-f4f4f4"
          data-bs-toggle="dropdown">Nhà tuyển dụng</button>
        <ul class="dropdown-menu">
          <li><a target="_blank" class="dropdown-item" href="/employer/login">Đăng nhập</a></li>

        </ul>
      </div>
    </div>
  </div>
  <div class="d-block d-lg-none">
    <nav class="navbar bg-white p-0">
      <div class="container-fluid p-0">
        <a class="navbar-brand" href="/">
          <img width="134" height="40" src="/assets_livewire/logo-light.svg" alt="RZCareer">
        </a>
        <style>
          .status_on {
            color: #4CAF50 !important;
          }

          .status_off {
            color: #FF5722 !important;
          }
        </style>
        @if (Auth::check())
        <div class="dropdown me-sm-3 me-0 text-end mr--20">
          <a href="#" style=" padding-top: 12px; display: flex !important; align-items:center;"
            class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img class="lazy rounded-1"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
              data-src="https://lh3.googleusercontent.com/a/ACg8ocK8gM4BqM7T5N6j_ITi302_WurD0O8FM4ui8JJGNxNbwKM3cyjt=s500-c"
              alt="avatar" width="32" height="32">
            @auth
            <span style="margin-left: 5px" class="">
              <div class="d-flex fw-bold text-capitalize">
                {{ Auth::user()->full_name }}
              </div>
              <div id="status_job_search" class="status_on">
                Đang tìm việc
              </div>
            </span>
            @endauth

          </a>
          <ul class="dropdown-menu text-small">
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
            <li><a class="dropdown-item" href="/candidate/manage-resume" title="Hồ sơ xin việc"><i
                  class='bx bx-list-ul'></i> Quản lý hồ sơ</a></li>
            <li><a class="dropdown-item" href="/candidate/profile" title="Hồ sơ xin việc"><i class='bx bx-edit'></i> Cập
                nhật hồ sơ</a></li>
            <li><a class="dropdown-item" data-caption="Hồ sơ xin việc của bạn trong mắt nhà tuyển dụng" target="_blank"
                href="/candidate/detail?v=1727272320" title="Hồ sơ xin việc của bạn trong mắt nhà tuyển dụng"><i
                  class='bx bx-user-pin'></i> Xem / tải về hồ sơ</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/candidate/jobs-applied" title="Danh sách việc làm đã ứng tuyển"><i
                  class='bx bx-check-square'></i> Việc làm ứng tuyển</a></li>
            <li><a class="dropdown-item" href="/candidate/jobs-saved" title="Danh sách việc làm đã lưu"><i
                  class='bx bx-heart-circle'></i> Việc làm đã lưu</a></li>
            <li><a class="dropdown-item" data-caption="Danh sách nhà tuyển dụng đã xem hồ sơ của bạn" target="_blank"
                href="/candidate/recruiter-view" title="Danh sách nhà tuyển dụng đã xem hồ sơ của bạn"><i
                  class='bx bx-buildings'></i> NTD đã xem hồ sơ</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/candidate/video-clip" title="Video/Clip giới thiệu bản thân"><i
                  class='bx bx-video'></i> Video CV</a></li>
            <li><a class="dropdown-item" href="/candidate/change-password" title="Đổi mật khẩu"><i
                  class='bx bx-lock-open-alt'></i> Đổi mật khẩu</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="javascript: void(0)">
                <div class="switcher"><input type="checkbox" id="switch__input" class="switch__input" checked> <label
                    for="switch__input" id="switch__label" class="switch__label status_on">Đang tìm việc</label></div>
              </a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/site/logout" class="btn-colorgb-jgd" data-reload="true"
                data-pjax="false" title="Bạn có chắc muốn đăng xuất khỏi hệ thống?"><i class='bx bx-log-out-circle'></i>
                Đăng xuất</a></li>
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
        </div>
        @else
        <div class="teks-btn-group d-none d-sm-inline-block">
          <a rel="nofollow" href="/site/register" class="btn rounded-2 btn-outline-primary me-2">Đăng ký</a>
          <a href="/site/login" class="btn rounded-2 me-3 btn-primary">Đăng nhập</a>
        </div>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span> <span class="d-none">Menu</span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
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
                            @if ($jobPostForLocation)
                            @foreach($jobPostForLocation as $city)
                            <li>
                              <a class="dropdown-item"
                                href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => $city->name, 'career_id' => '']) }}">
                                Việc làm tại {{ $city->name }}
                              </a>
                            </li>
                            @endforeach
                            @endif

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
                  href="/cong-ty">
                  <img src="/assets_livewire/img/employer.svg" alt="job" loading="lazy"> Công ty
                </a>
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
            <div class="vr d-none d-xl-block"></div>
            <div class="d-none d-xl-block ms-sm-3 btn-group">
              <button type="button" class="btn rounded-2 text-capitalize dropdown-toggle text-primary border bg-f4f4f4"
                data-bs-toggle="dropdown">Nhà tuyển dụng</button>
              <ul class="dropdown-menu">
                <li><a target="_blank" class="dropdown-item" href="https://employer.jobsgo.vn/">Đăng Tin Online</a></li>
                <li><a target="_blank" class="dropdown-item" href="https://employer.jobsgo.vn/site/candidates">Tìm Hồ
                    Sơ</a></li>
                <!--<li><a target="_blank" class="dropdown-item" href="https://employer.jobsgo.vn/">Dịch Vụ Headhunt</a></li>
        <li><a target="_blank" class="dropdown-item" href="https://employer.jobsgo.vn/">Dịch Vụ Tuyển Mass</a></li>-->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
