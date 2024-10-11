<nav class="navbar navbar-default navbar-transparent">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                class="fa fa-bars"></i></button>
        <div class="navbar-header"><a class="navbar-brand" href="/">
                <img width="134" height="40" loading="lazy" src="/assets_livewire/logo-light.svg" src="/logo.png"
                    alt="JobsGO">
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
                                            @foreach(
                                            App\Models\CommonCareer::withCount('jobPosts') // Count related job posts
                                            ->orderBy('job_posts_count', 'desc') // Sort by the number of job posts
                                            ->limit(10) // Limit to top 10 careers
                                            ->get() as $career)
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
                                            @foreach(
                                            App\Models\CommonCity::whereHas('locations.jobPosts')
                                            ->withCount(['locations as job_posts_count' => function ($query) {
                                            $query->whereHas('jobPosts');
                                            }])
                                            ->orderBy('job_posts_count', 'desc')
                                            ->limit(10)
                                            ->get() as $city)
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
                                            @foreach(
                                            App\Models\JobPost::select('job_type')
                                            ->distinct()
                                            ->get() as $jobType)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => '', 'job_type' => $jobType->job_type ]) }}">
                                                    Việc làm {{ $jobType->job_type }}
                                                </a>
                                            </li>
                                            @endforeach
                                            @foreach(
                                            App\Models\JobPost::select('type_of_workplace')
                                            ->distinct()
                                            ->get() as $typeOfWorkplace)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => '', 'type_of_workplace' => $typeOfWorkplace->type_of_workplace ]) }}">
                                                    Việc làm {{ $typeOfWorkplace->type_of_workplace }}
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
                        @php
                        // Get the top 10 careers with the most companies
                        $careers = App\Models\CommonCareer::withCount('companies')
                        ->orderBy('companies_count', 'desc')
                        ->take(10)
                        ->get();
                        @endphp
                        @foreach($careers as $career)
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('/cong-ty?field_operation=' . strtolower(str_replace(' ', '-', $career->name))) }}">
                                {{ $career->name }} ({{ $career->companies_count }} công ty)
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

                <li class="dropdown dropdown-user">
                    <a href="/candidate/index" style=" padding-top: 12px; display: flex !important; align-items:center;"
                        class="dropdown-toggle" data-toggle="dropdown">

                        <img loading="lazy" width="32" onerror="this.src='/bolt/assets/images/image.png'"
                            src="https://jobsgo.vn/uploads/avatar/202409/2599835_20240925210030.jpg?colorgb=1727271940"
                            alt="web developer" class="img-rounded">
                        <span style="margin-left: 5px">
                            <div class="d-flex text-bold" style="font-weight: bold;">
                                @if (Auth::check())
                                <span>
                                    {{ Auth::user()->full_name }}

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
            </ul>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">

      <ul class="nav navbar-nav navbar-right navbar-left-1 pull-left" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="hidden-xs"><a
            style="color: #fff !important;background-color: #ff5c35; padding: 5px 10px; margin-right: 10px; border-radius: 3px; position: relative; height: 30px; top: 16px;"
            href="/site/download?utm_source=web_ntv&utm_medium=top_menu_tai_app" title="Tải App" target="_blank"><i
              class="glyphicon glyphicon-download-alt"></i> Tải App</a></li>
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
                      <li><a class="dropdown-item" href="/viec-lam-tai-chinh-ngan-hang.html"> Việc làm Tài Chính/Ngân
                          Hàng</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-ke-toan-kiem-toan.html"> Việc làm Kế Toán/Kiểm
                          Toán</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-hanh-chinh-van-phong.html"> Việc làm Hành Chính/Văn
                          Phòng</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-kinh-doanh-ban-hang.html"> Việc làm Kinh Doanh/Bán
                          Hàng</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-marketing.html"> Việc làm Marketing</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-xay-dung.html"> Việc làm Xây dựng</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-it-phan-mem.html"> Việc làm IT Phần Mềm</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-hanh-chinh-van-phong.html"> Việc làm Hành Chính/Văn
                          Phòng</a></li>
                    </ul>
                  </div>
                  <div class="col-sm-3 ps-sm-0">
                    <div class="fw-bolder pt-2 pb-1 ps-3">Việc theo địa điểm</div>
                    <ul class="list-unstyled">
                      <li><a class="dropdown-item" href="/viec-lam-tai-ho-chi-minh.html"> Việc làm tại Hồ Chí Minh</a>
                      </li>
                      <li><a class="dropdown-item" href="/viec-lam-tai-ha-noi.html"> Việc làm tại Hà Nội</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-tai-da-nang.html"> Việc làm tại Đà Nẵng</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-tai-can-tho.html"> Việc làm tại Cần Thơ</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-tai-binh-duong.html"> Việc làm tại Bình Dương</a>
                      </li>
                      <li><a class="dropdown-item" href="/viec-lam-tai-hai-phong.html"> Việc làm tại Hải Phòng</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-tai-dong-nai.html"> Việc làm tại Đồng Nai</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-tai-quang-ninh.html"> Việc làm tại Quảng Ninh</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-sm-4">
                    <div class="fw-bolder pt-2 pb-1 ps-3">Việc theo nhu cầu</div>
                    <ul class="list-unstyled">
                      <li><a class="dropdown-item" href="/viec-lam-tuyen-gap.html"> Việc làm Tuyển Gấp</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-noi-bat.html"> Việc làm Nổi Bật</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-lao-dong-pho-thong.html"> Việc làm Lao động phổ
                          thông</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-khong-can-bang-cap.html"> Việc làm Không cần bằng
                          cấp</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-online-tai-nha.html"> Việc làm Online tại nhà</a>
                      </li>
                      <li><a class="dropdown-item" href="/viec-lam-part-time.html"> Việc làm Part-time</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-thoi-vu.html"> Việc làm Thời vụ</a></li>
                      <li><a class="dropdown-item" href="/viec-lam-remote.html"> Việc làm Remote</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a data-bs-toggle="dropdown" data-toggle="dropdown" class="nav-link dropdown-toggle" href="/cong-ty.html">
            <img src="/assets_livewire/img/employer.svg" alt="job" loading="lazy"> Công ty
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/cong-ty-tieu-bieu.html">Tiêu Biểu</a></li>
            <li><a class="dropdown-item" href="/cong-ty-ban-le.html">Bán Lẻ</a></li>
            <li><a class="dropdown-item" href="/cong-ty-tai-chinh-ngan-hang.html">Ngân Hàng</a></li>
            <li><a class="dropdown-item" href="/cong-ty-bao-hiem.html">Bảo Hiểm</a></li>
            <li><a class="dropdown-item" href="/cong-ty-cong-nghe.html">Công Nghệ</a></li>
            <li><a class="dropdown-item" href="/cong-ty-xay-dung.html">Xây Dựng</a></li>
            <li><a class="dropdown-item" href="/cong-ty-san-xuat.html">Sản Xuất</a></li>
            <li><a class="dropdown-item" href="/nha-hang.html">Nhà Hàng</a></li>
            <li><a class="dropdown-item" href="/khach-san.html">Khách Sạn</a></li>
            <li><a class="dropdown-item" href="/cong-ty-y-te.html">Y Tế</a></li>
            <li><a class="dropdown-item" href="/cong-ty-bat-dong-san.html">Bất Động Sản</a></li>
            <li><a class="dropdown-item" href="/cong-ty-giao-duc.html">Giáo Dục</a></li>
          </ul>
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

        <li class="dropdown dropdown-user">
          <a href="/candidate/index" style=" padding-top: 12px; display: flex !important; align-items:center;"
            class="dropdown-toggle" data-toggle="dropdown">

            <img loading="lazy" width="32" onerror="this.src='/bolt/assets/images/image.png'"
              src="https://jobsgo.vn/uploads/avatar/202409/2599835_20240925210030.jpg?colorgb=1727271940"
              alt="web developer" class="img-rounded">
            <span style="margin-left: 5px">
              <div class="d-flex text-bold" style="font-weight: bold;">
                @if (Auth::check())
                  {{ Auth::user()->full_name }}
                @else
                  {{-- Guest --}}
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
            <li><a href="/candidate/dashboard" wire:navigate title="Hồ sơ xin việc"><i class='bx bx-list-ul'></i>
                Quản lý hồ sơ</a></li>

            <li><a href="/candidate/change-password" title="Đổi mật khẩu"><i class='bx bx-lock-open-alt'></i> Đổi mật
                khẩu</a></li>
            <li class="divider"></li>
            <li>
              <a href="javascript: void(0)">
                <div class="switcher"><input type="checkbox" id="switch__input" class="switch__input" checked>
                  <label for="switch__input" id="switch__label" class="switch__label status_on">Đang tìm
                    việc</label>
                </div>
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="#" class="btn-colorgb-jgd" title="Bạn có chắc muốn đăng xuất khỏi hệ thống?"
                wire:click.prevent="logout"> <!-- Gọi phương thức logout -->
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
                        $('#status_job_search').text(statusText).removeClass('status_on status_off').addClass(
                          statusClass);
                        $('#switch__label').text(statusText).removeClass('status_on status_off').addClass(
                          statusClass);
                        $('.status').removeClass('status_on status_off').addClass(statusClass);
                        $('.status').text(statusText);
                      },
                      error: function() {
                        let statusClass = 'status_off';
                        let statusText = 'Đã tắt tìm việc';
                        $('#switch__input').prop('checked', false);
                        $('#status_job_search').text(statusText).removeClass('status_on status_off').addClass(
                          statusClass);
                        $('#switch__label').text(statusText).removeClass('status_on status_off').addClass(
                          statusClass);
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
      </ul>
    </div>
  </div>
</nav>
