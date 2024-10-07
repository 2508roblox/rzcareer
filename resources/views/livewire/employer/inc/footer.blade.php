<div>

    <!DOCTYPE html>
    <html lang="vi-VN">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="robots" content="index, follow">
      <meta name="description"
        content="Rzcareer - Nền tảng tuyển dụng trực tuyến, App tuyển dụng, tìm việc làm nhanh trên Android và iOS. Kênh thông tin tuyển dụng và việc làm kết nối nhà tuyển dụng với ứng viên dễ dàng.">
      <meta name="title" content="Rzcareer – Nền tảng tuyển dụng, tìm việc làm nhanh theo cách hoàn toàn mới">
      <meta property="og:type" content="website">
      <meta property="og:url" content="https://Rzcareer.vn">
      <meta property="og:image" itemprop="thumbnailUrl" content="https://Rzcareer.vn/media/img/cover-share.jpg">
      <meta property="og:description"
        content="Rzcareer - Nền tảng tuyển dụng trực tuyến, App tuyển dụng, tìm việc làm nhanh trên Android và iOS. Kênh thông tin tuyển dụng và việc làm kết nối nhà tuyển dụng với ứng viên dễ dàng.">
      <meta property="og:title" content="Rzcareer – Nền tảng tuyển dụng, tìm việc làm nhanh theo cách hoàn toàn mới">
      <meta property="fb:app_id" content="1590841851212703">
      <meta property="al:android:package" content="vn.ca.hope.candidate">
      <meta property="al:android:app_name" content="Rzcareer">
      <meta property="al:ios:app_store_id" content="1234120247">
      <meta property="al:ios:app_name" content="Rzcareer">
      <title>Rzcareer - Tìm việc làm mơ ước</title>
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
      <link href="/assets_livewire/css/custom.css?v=1727272320" rel="stylesheet">
      <script defer src="/assets_livewire/teks/js/base.min.js?v=234208153092"></script>
      <script data-type="lazy" data-src="https://www.googletagmanager.com/gtag/js?id=G-EHD5KK9TRQ"></script>







    </head>

    <body class="">

      @livewire('inc.header')
      <main>
        <section class="teks-search-box text-dark py-5">
          <div class="container">
            <div class="row">
              <div class="col-sm-7 col-md-8">
                <h1 class="mb-4">Tìm việc làm mơ ước! </h1>
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <form wire:submit.prevent="redirectToJobList"> <!-- Wire form to redirect method -->
                      <div class="input-group mb-3">
                        <input type="search" id="123" wire:model.defer="keyword" onfocus="this.select()"
                          autocomplete="off" class="auto-complete form-control" placeholder="Từ khóa...">
                        <div class="teks-location">
                          <i class="bx bx-map"></i>
                          <input type="search" id="location" wire:model.defer="location" onfocus="this.select()"
                            autocomplete="off" class="auto-complete form-control" placeholder="Tỉnh/thành...">
                        </div>
                        <button class="btn btn-primary teks-btn-g" type="submit" id="123">
                          <!-- Set type to submit -->
                          <span class="d-inline-block fw-bold">Tìm việc</span>
                        </button>
                      </div>
                    </form>
                  </div>


                  <div class="col-sm-12">
                    <ul class="list-group pb-2 pb-sm-3 list-group-horizontal">
                      <li class="list-group-item location">
                        <a title="Việc làm tại Hà Nội" href="/viec-lam-tai-ha-noi.html" class="list-group-item-action"><i
                            class="bx bx-map text-danger"></i> Việc tại Hà Nội</a>
                      </li>
                      <li class="list-group-item">
                        <a title="Việc làm Kinh Doanh" href="/viec-lam-kinh-doanh.html"
                          class="list-group-item-action"><img height="15" width="15" loading="lazy"
                            src="/assets_livewire/teks/img/ic-kinh-doanh.svg?v=234208153092" alt="Việc làm Kinh Doanh">
                          Kinh Doanh</a>
                      </li>
                      <li class="list-group-item">
                        <a title="Việc làm Kế Toán" href="/viec-lam-ke-toan.html" class="list-group-item-action"><img
                            height="15" width="15" loading="lazy"
                            src="/assets_livewire/teks/img/ic-ke-toan.svg?v=234208153092" alt="Việc làm Kế Toán"> Kế
                          Toán</a>
                      </li>
                      <li class="list-group-item">
                        <a title="Việc làm Công Nghệ Thông Tin" href="/viec-lam-cong-nghe-thong-tin.html"
                          class="list-group-item-action"><img height="15" width="15" loading="lazy"
                            src="/assets_livewire/teks/img/ic-cong-nghe-thong-tin.svg?v=234208153092"
                            alt="Việc làm Công Nghệ Thông Tin"> Công Nghệ Thông Tin</a>
                      </li>
                      <li class="list-group-item">
                        <a title="Việc làm Kỹ Thuật" href="/viec-lam-ky-thuat.html" class="list-group-item-action"><img
                            height="15" width="15" loading="lazy"
                            src="/assets_livewire/teks/img/ic-ky-thuat.svg?v=234208153092" alt="Việc làm Kỹ Thuật"> Kỹ
                          Thuật</a>
                      </li>
                      <li class="list-group-item">
                        <a title="Việc làm Nhân Sự" href="/viec-lam-nhan-su.html" class="list-group-item-action"><img
                            height="15" width="15" loading="lazy"
                            src="/assets_livewire/teks/img/ic-nhan-su.svg?v=234208153092" alt="Việc làm Nhân Sự"> Nhân
                          Sự</a>
                      </li>
                    </ul>

                  </div>
                  <div class="col-xl-12 d-none d-lg-block">
                    <div
                      class="row row-cols-2 text-left row-cols-md-2 row-cols-auto mt-2 gx-4 d-flex justify-content-center">

                      <div class="col d-flex">
                        <div class="card border-primary w-100">
                          <div class="row g-0 align-items-center">
                            <div class="col-4 p-1 text-center">
                              <img height="90" width="90" loading="lazy"
                                src="/assets_livewire/img/2024/ic1.svg?v=234208153092" alt="Đánh giá CV - Rzcareer AI">
                            </div>
                            <div class="col-8">
                              <div class="card-body">
                                <h3 class="fs-6 card-title fw-bold">Đánh giá CV - Rzcareer AI</h3>
                                <p class="card-text small">Bạn đã có sẵn CV? Tải lên để nhận phân tích và gợi ý của
                                  Rzcareer AI</p>
                                <a href="/review-cv.html" class="btn btn-primary btn-sm"> Tải lên CV</a>

                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="col d-flex">
                        <div class="card border-primary w-100">
                          <div class="row g-0 align-items-center">

                            <div class="col-4 p-1 text-center">
                              <img height="90" width="90" loading="lazy"
                                src="/assets_livewire/img/2024/ic2.svg?v=234208153092"
                                alt="Tạo CV Online - Rzcareer AI">
                            </div>
                            <div class="col-8">
                              <div class="card-body">
                                <h3 class="fs-6 card-title fw-bold">Tạo CV tự động trong 2 phút</h3>
                                <p class="card-text small">Tạo CV xin việc Online chuẩn, đẹp miễn phí với Rzcareer</p>
                                <a href="/tao-cv-bang-ai.html" class="btn btn-primary btn-sm">Tạo CV 2 phút</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-md-4">
                <div class="teks-box-today text-light">
                  <h6>
                    <img src="/assets_livewire/img/2024/ic3.svg?v=234208153092" width="16" loading="lazy"
                      alt="Rzcareer">
                    Thị trường làm việc hôm nay
                    <small class="float-end fw-normal">25/09/2024</small>
                    <div class="row my-3 mt-4 text-center">
                      <div class="col-6">
                        <p>Việc làm đang tuyển</p>
                        <strong><span class="loader"> <span class="dot"></span> <span class="circle"></span> </span>
                          16,143</strong>
                      </div>
                      <div class="col-6">
                        <p>Việc làm mới hôm nay</p>
                        <strong>2,032</strong>
                      </div>
                    </div>
                    <div class="hr"></div>
                    <div class="row my-3 mt-4 text-center">
                      <h5 class="mb-3">Con số ấn tượng khác</h5>
                      <div class="col-6">
                        <img src="/assets_livewire/img/2024/ic4.svg?v=234208153092" width="28" loading="lazy"
                          alt="Rzcareer">
                        <p>Nhà tuyển dụng uy tín</p>
                        <strong>120.000+</strong>
                      </div>
                      <div class="col-6">
                        <img src="/assets_livewire/img/2024/ic5.svg?v=234208153092" width="20" loading="lazy"
                          alt="Rzcareer">
                        <p>Lượt tải ứng dụng</p>
                        <strong>1.200.000+</strong>
                      </div>
                    </div>
                  </h6>
                </div>
              </div>
            </div>
          </div>

        </section>
        <section class="d-block d-lg-none text-center">
          <a href="https://Rzcareer.vn/site/download?utm_source=home_mobile">
            <img height="117" width="400" class="w-100 h-auto" loading="lazy"
              src="/assets_livewire/teks/img/download-app.webp" alt="Download Rzcareer">
          </a>
        </section>
        <section class="bg-linear-gradient pt-2 py-sm-3 p-sm-4">
          <div class="container">
            <div class="teks-section">
              <div class="teks-section-title">
                <h2 class="h3">Việc tuyển gấp</h2>
                <a href="/viec-lam-tuyen-gap.html">Xem thêm <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                      d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                      clip-rule="evenodd" />
                  </svg></a>
              </div>
              <div class="teks-section-content teks-swiper">
                <div
                  class="alert d-none d-sm-block alert-light alert-dismissible rounded-1 text-dark py-1 px-2 small shadow-sm">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <img src="/assets_livewire/img/2024/ic6.svg?v=234208153092" width="16" loading="lazy"
                    alt="Rzcareer"> <strong>Gợi ý:</strong> Di chuột vào tiêu đề việc làm để xem thông tin chi tiết.
                </div>
                <div class="d-sm-block">

                  <div id="carousel1" class="carousel slide" data-bs-interval="5000" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      @php
                        $totalPages = ceil(count($urgentJobPosts) / 15); // Tính tổng số trang
                        $maxPages = min($totalPages, 10); // Giới hạn tối đa là 10 trang
                      @endphp

                      @for ($i = 0; $i < $maxPages; $i++)
                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="{{ $i }}"
                          class="{{ $i == 0 ? 'active' : '' }}" aria-label="Slide {{ $i + 1 }}"></button>
                      @endfor

                    </div>

                    <div class="carousel-inner">
                      @php
                        // Lấy tối đa 150 công việc
                        $limitedJobPosts = $urgentJobPosts->take(150);
                      @endphp

                      @foreach (array_chunk($limitedJobPosts->toArray(), 15) as $index => $jobChunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                          <div class="row row-cols-1 row-cols-lg-3 g-2">
                            @foreach ($jobChunk as $jobPost)
                              <div class="col">
                                <a href="{{ url('viec-lam/' . $jobPost['slug']) }}" class="d-flex teks-item text-dark">
                                  <div class="flex-shrink-0 position-relative">
                                    <img class="lazy" width="80" height="80"
                                      onerror="this.src='{{ asset('assets_livewire/img/default-company.svg') }}'"
                                      data-src="{{ Storage::url($jobPost['company']['company_image_url']) }}" lazy>
                                  </div>

                                  <div class="flex-grow-1 ms-2">
                                    <h3 class="tooltip_job_{{ $jobPost['id'] }} h5 tooltip" title="">
                                      {{ $jobPost['job_name'] }}</h3>
                                    <div class="h6 text-muted">{{ $jobPost['company']['company_name'] }}</div>
                                    <ul class="p-0">
                                      <li class="list-group-item list-group-item-action">
                                        <i class="bx bx-money"></i>
                                        {{ number_format($jobPost['salary_min'] / 1_000_000, 0, '.', ',') }} -
                                        {{ number_format($jobPost['salary_max'] / 1_000_000, 0, '.', ',') }} triệu VNĐ
                                      </li>

                                      <li class="list-group-item list-group-item-action">
                                        <i class="bx bx-map"></i> {{ $jobPost['city']['name'] }}
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

                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-md-5 mt-3 teks-section">
              <div class="teks-section-title">
                <h2 class="h3">Nhà tuyển dụng tiêu biểu</h2>
                <a href="/cong-ty">Xem thêm <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                      d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                      clip-rule="evenodd" />
                  </svg></a>
              </div>
              <div class="teks-section-content teks-swiper">
                <div class="d-none d-sm-block">
                  <div id="carousel2" class="carousel slide" data-bs-interval="999999" data-bs-ride="carousel">

                    <div class="carousel-inner pt-2 px-3">
                      @foreach ($urgentJobPosts as $index => $jobPost)
                        @if ($index % 8 === 0)
                          <!-- Mỗi nhóm 8 công ty -->
                          <div class="carousel-item @if ($index === 0) active @endif">
                            <div class="row row-cols-8 g-3">
                              @for ($i = 0; $i < 8; $i++)
                                @if (isset($companies[$index + $i]))
                                  <div class="col">
                                    <a href="{{ 'tuyen-dung/' . $companies[$index + $i]->slug }}"
                                      class="d-block border-0 p-0 text-center teks-item text-dark">

                                      <img onerror="this.src='{{ asset('assets_livewire/img/default-company.svg') }}'"
                                        class="w-75 teks-img-thumbnail mb-2" width="90" height="90"
                                        loading="lazy"
                                        src="{{ Storage::url($companies[$index + $i]->company_image_url) ?? '/img/employer-logo.jpg' }}"
                                        alt="{{ $companies[$index + $i]->company_name }}">
                                      <div class="h5 fw-bold text-dark">{{ $companies[$index + $i]->company_name }}
                                      </div>
                                      <p class="small text-nowrap d-none">
                                        <i class="bx bx-map"></i>
                                        <span>{{ $companies[$index + $i]->location->name ?? 'Chưa có địa chỉ' }}</span>
                                      </p>
                                    </a>
                                  </div>
                                @else
                                  <!-- Tạo khối rỗng nếu không có công ty -->
                                  <div class="col">

                                  </div>
                                @endif
                              @endfor
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>



                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>


        <section class="bg-light pt-2 py-sm-3 p-sm-4">
          <div class="container">
            <div class="teks-section">
              <div class="teks-section-title">
                <h2 class="h3">Việc nổi bật</h2>
                <a href="/viec-lam-noi-bat.html">Xem thêm <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                      d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                      clip-rule="evenodd" />
                  </svg></a>
              </div>
              <div class="teks-section-content teks-swiper">
                <div class="d-sm-block">

                  <div id="carouselHotJobs" class="carousel slide" data-bs-interval="5000" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      @for ($i = 0; $i < ceil($hotJobPosts->count() / 8); $i++)
                        <button type="button" data-bs-target="#carouselHotJobs"
                          data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"
                          aria-label="Slide {{ $i + 1 }}"></button>
                      @endfor
                    </div>

                    <div class="carousel-inner pt-2 px-3">
                      @foreach ($hotJobPosts as $index => $jobPost)
                        @if ($index % 8 === 0)
                          <!-- Mỗi nhóm 8 công việc -->
                          <div class="carousel-item @if ($index === 0) active @endif">
                            <div class="row row-cols-1 row-cols-lg-3 g-2">
                              @for ($i = 0; $i < 8; $i++)
                                @if (isset($hotJobPosts[$index + $i]))
                                  <div class="col">
                                    <a href="{{ url('viec-lam/' . $hotJobPosts[$index + $i]['slug']) }}"
                                      class="d-flex teks-item text-dark">
                                      <div class="flex-shrink-0 position-relative">
                                        <img class="lazy" width="80" height="80"
                                          onerror="this.src='{{ asset('assets_livewire/img/default-company.svg') }}'"
                                          data-src="{{ Storage::url($hotJobPosts[$index + $i]->company->company_image_url) }}"
                                          alt="">
                                      </div>
                                      <div class="flex-grow-1 ms-2">
                                        <h3
                                          class="tooltip_job_{{ $hotJobPosts[$index + $i]->id }} h5 text-danger tooltip"
                                          title="">{{ $hotJobPosts[$index + $i]->job_name }}</h3>
                                        <div class="h6 text-muted">
                                          {{ $hotJobPosts[$index + $i]->company->company_name }}</div>
                                        <ul class="p-0">
                                          <li class="list-group-item list-group-item-action">
                                            <i class='bx bx-money'></i>
                                            {{ number_format($hotJobPosts[$index + $i]->salary_min / 1_000_000, 0, '.', ',') }}
                                            -
                                            {{ number_format($hotJobPosts[$index + $i]->salary_max / 1_000_000, 0, '.', ',') }}
                                            triệu VNĐ
                                          </li>
                                          <li class="list-group-item list-group-item-action">
                                            <i class='bx bx-map'></i>
                                            {{ $hotJobPosts[$index + $i]->city->name }}
                                          </li>
                                        </ul>

                                      </div>
                                    </a>
                                  </div>
                                @else
                                  <!-- Tạo khối rỗng nếu không có công việc -->
                                  <div class="col"></div>
                                @endif
                              @endfor
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel3"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel3"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row my-3">
              <div class="col-4">
                <a target="_blank" href="https://Rzcareer.vn/review-cv.html"><img width="100%" loading="lazy"
                    src="/assets_livewire/img/2024/bn1.webp" alt="img"></a>
              </div>
              <div class="col-4">
                <a target="_blank" href="https://Rzcareer.vn/phan-tich-cv.html"><img width="100%" loading="lazy"
                    src="/assets_livewire/img/2024/bn2.webp" alt="Rzcareer"></a>
              </div>
              <div class="col-4">
                <a target="_blank" href="https://Rzcareer.vn/tao-cv-bang-ai.html"><img width="100%" loading="lazy"
                    src="/assets_livewire/img/2024/bn3.webp" alt="img"></a>
              </div>
            </div>
          </div>
        </section>

        <section class="teks-search-box teks-cv-box text-dark py-5">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <h2 class="mb-4 text-white text-center">Cùng Rzcareer xây dựng hồ sơ ấn tượng </h2>
                <div class="row justify-content-center">
                  <div class="col-sm-7 col-md-8">
                    <div
                      class="row row-cols-1 text-left row-cols-md-2 row-cols-auto mt-2 gx-4 d-flex justify-content-center">

                      <div class="col d-flex">
                        <div class="card border-primary w-100">
                          <div class="row g-0 align-items-center">
                            <div class="col-4 p-1 text-center">
                              <img height="90" width="90" loading="lazy"
                                src="/assets_livewire/img/2024/ic1.svg?v=234208153092" alt="Đánh giá CV - Rzcareer AI">
                            </div>
                            <div class="col-8">
                              <div class="card-body">
                                <h3 class="fs-6 card-title fw-bold">Đánh giá CV - Rzcareer AI</h3>
                                <p class="card-text small">Bạn đã có sẵn CV? Tải lên để nhận phân tích và gợi ý của
                                  Rzcareer AI</p>
                                <a href="/review-cv.html" class="btn btn-primary btn-sm"> <i class='bx bx-upload'></i>
                                  Tải lên CV</a>

                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="col d-flex">
                        <div class="card border-primary w-100">
                          <div class="row g-0 align-items-center">

                            <div class="col-4 p-1 text-center">
                              <img height="90" width="90" loading="lazy"
                                src="/assets_livewire/img/2024/ic2.svg?v=234208153092" alt="Phân tích CV - Rzcareer AI">
                            </div>
                            <div class="col-8">
                              <div class="card-body">
                                <h3 class="fs-6 card-title fw-bold">Tạo CV tự động trong 2 phút</h3>
                                <p class="card-text small">Tạo CV xin việc Online chuẩn, đẹp miễn phí với Rzcareer</p>
                                <a href="/tao-cv-bang-ai.html" class="btn btn-primary btn-sm"><i
                                    class='bx bx-plus'></i> Tạo CV ngay!</a>
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
          </div>

        </section>

        <section class="bg-white teks-cate pb-5 pt-3 py-sm-5 px-sm-4">
          <div class="container">

            <div class="teks-section">
              <div class="teks-section-title">
                <h2 class="h3">Ngành nghề nổi bật</h2>
                <a href="/nganh-nghe.html">Xem thêm <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                      d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                      clip-rule="evenodd" />
                  </svg></a>
              </div>
              <div class="teks-section-content teks-swiper">
                <div id="carousel5" class="carousel slide" data-bs-interval="999999" data-bs-ride="carousel">
                  <div class="carousel-inner pb-1">
                    <div class="carousel-item active">
                      <div class="row row-cols-2 row-cols-sm-4 g-2">
                        @foreach ($careers as $career)
                          <div class="col">
                            <a href="{{ route('danh-sach-viec-lam', ['career_id' => $career->id, 'keyword' => request('keyword'), 'location' => request('location')]) }}"
                              class="d-flex align-items-center teks-item text-dark">
                              <div class="flex-shrink-0">
                                <img class="w-100" width="50" height="50" loading="lazy"
                                  src="{{ Storage::url($career->icon_url) }}" alt="{{ $career->name }}">
                              </div>
                              <div class="flex-grow-1 ms-2">
                                <h3 class="h5">{{ $career->name }}</h3>
                                <div class="h6 text-muted">{{ $career->job_posts_count ?? 0 }} Việc »</div>
                              </div>
                            </a>
                          </div>
                        @endforeach

                      </div>


                    </div>

                  </div>
                </div>
              </div>
            </div>



          </div>
        </section>



        <section class="text-white teks-box-research-salary">
          <div class="container">
            <div class="teks-section py-4 py-sm-5">
              <div class="row align-items-center row-cols-lg-3">
                <div class="col-lg-3 teks-section-title ps-3 text-center text-lg-start">
                  <h2 class="text-white fs-5">Tra cứu lương <small class="badge bg-danger p-1 font-size-sm">Mới</small>
                  </h2>
                  <p class="w-100 mb-3">Tiện ích tra cứu & tìm hiểu mức lương <br> theo ngành nghề và vị trí công việc
                    2024</p>
                  <img class="w-100 w-xs-25 mb-3 m-auto p-lg-4 d-block" loading="lazy"
                    src="{{ asset('assets_livewire/teks/img/tra-cuu-luong.svg?v=234208153092') }}" alt="Rzcareer">

                </div>
                <div class="col-lg-9">
                  <div class="row">
                    <div class="col-lg-6 gx-sm-5 mb-4 mb-sm-0 teks-section-content">
                      <div class="shadow bg-white p-3 p-sm-4 rounded-2 h-100 d-block">
                        <p class="small text-dark">
                          <strong>VD:</strong> Bạn muốn tra cứu lương của vị trí việc làm kế toán thuế thuộc ngành kế toán
                          bạn nhập công việc mong muốn là "<strong>kế toán thuế</strong>", chọn địa điểm <strong>Hà
                            Nội</strong> và bắt đầu tra cứu mức lương
                        </p>
                        <div class="mb-3 job-role">
                          <select class="form-select select2" id="role">

                          </select>
                        </div>
                        <div class="mb-3">
                          <select class="form-select select2" id="place">
                            <option value="">Chọn địa điểm</option>
                            <option value="ha-noi">Hà Nội</option>
                            <option value="ho-chi-minh">Hồ Chí Minh</option>
                            <option value="da-nang">Đà Nẵng</option>
                            <option value="bac-ninh">Bắc Ninh</option>
                            <option value="hai-phong">Hải Phòng</option>
                            <option value="binh-duong">Bình Dương</option>
                            <option value="dong-nai">Đồng Nai</option>
                          </select>
                        </div>

                        <button class="btn btn-primary teks-btn-g d-block m-auto" type="button" id="research"><i
                            class='bx bx-search'></i> <span class="fw-bold">Tra cứu lương ngay!</span></button>
                      </div>
                    </div>
                    <div class="col-lg-6 d-lg-block teks-section-content">
                      <div class="shadow bg-white p-3 p-sm-4 rounded-4 h-100 d-block">
                        <div class="mb-3 fs-6 fw-bold  text-dark">Mức lương vị trí phổ biến</div>
                        <ul class="list-group list-group-flush">

                          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a title="Mức lương Nhân Viên Tư Vấn" href="/muc-luong-nhan-vien-tu-van.html">
                              <div class="txt text-body">Nhân Viên Tư Vấn</div>
                            </a>
                            <span class="text-primary">7 - 13 triệu VNĐ</span>
                          </li>

                          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a title="Mức lương Trưởng Phòng Kinh Doanh" href="/muc-luong-truong-phong-kinh-doanh.html">
                              <div class="txt text-body">Trưởng Phòng Kinh Doanh</div>
                            </a>
                            <span class="text-primary">12 - 28 triệu VNĐ</span>
                          </li>

                          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a title="Mức lương Nhân Viên Bán Hàng" href="/muc-luong-nhan-vien-ban-hang.html">
                              <div class="txt text-body">Nhân Viên Bán Hàng</div>
                            </a>
                            <span class="text-primary">5 - 8 triệu VNĐ</span>
                          </li>

                          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a title="Mức lương Giám Sát Bán Hàng" href="/muc-luong-giam-sat-ban-hang.html">
                              <div class="txt text-body">Giám Sát Bán Hàng</div>
                            </a>
                            <span class="text-primary">9 - 17 triệu VNĐ</span>
                          </li>

                          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a title="Mức lương Digital Marketing" href="/muc-luong-digital-marketing.html">
                              <div class="txt text-body">Digital Marketing</div>
                            </a>
                            <span class="text-primary">8 - 17 triệu VNĐ</span>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </section>

        <section class="bg-white teks-newspaper py-4 py-sm-5">
          <div class="container">



          </div>
          <div class="container mt-3 mt-sm-5">
            <h2 class="mb-4 text-dark text-center">Người dùng đánh giá</h2>
            <div class="teks-section p-0 rounded-4">
              <div class="row align-items-center">
                <div class="col-sm-12 teks-section-content teks-swiper">
                  <div class="d-none d-lg-block">
                    <div id="carousel9" class="carousel slide" data-bs-interval="999999" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel9" data-bs-slide-to="0" class="active"
                          aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel9" data-bs-slide-to="1"
                          aria-label="Slide 2"></button>
                      </div>
                      <div class="carousel-inner p-1 pb-5">
                        <div class="carousel-item active">
                          <div class="row">

                            <div class="col">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/reviewers/tue_dan.png" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Tuệ Đan</div>
                                <p class="text-muted text-body small mxh-100">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Rzcareer có App trên điện thoại dễ dùng, có thể nhận thông báo và chat với NTD. Phần nào
                                  không biết có thể chat với Support trên App, họ hướng dẫn chi tiết lắm. Tìm việc ở trên
                                  này cũng đơn giản. Có cái tính năng tìm việc xung quanh vị trí bạn đang đứng với bán
                                  kính bao nhiêu km cũng hay.
                                </p>
                              </div>
                            </div>

                            <div class="col">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/reviewers/thuy_nga.png" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Thúy Nga</div>
                                <p class="text-muted text-body small mxh-100">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Mình biết đến Rzcareer qua sự giới thiệu của một người bạn nên cũng thử tìm việc trên đó
                                  xem thế nào. Với việc làm Content mà mình tìm kiếm thì có khá đa dạng các ngành nghề,
                                  lĩnh vực tuyển dụng nên mình cũng may mắn tìm được việc làm phù hợp. Tìm việc trên
                                  Rzcareer thì mình có thể tạo CV online rồi apply trực tiếp nên cũng tiện lợi. Nhất là có
                                  cái tính năng phân tích CV, sửa lỗi CV, nó giúp mình biết CV cần chỉnh sửa những gì, cái
                                  đó mình thấy khá hay.
                                </p>
                              </div>
                            </div>

                            <div class="col">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/reviewers/quynh_anh.png" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Quỳnh Anh</div>
                                <p class="text-muted text-body small mxh-100">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Mình đã có 1 trải nghiệm tốt khi tải ứng dụng, đăng ký tài khoản Rzcareer. Sau khi hoàn
                                  thành hồ sơ cá nhân hệ thống đã chủ động tìm và gợi ý việc làm đến mình dựa theo những
                                  thông tin mà mình đã cung cấp. Ứng dụng có rất nhiều ưu điểm ví dụ như nộp hồ sơ nhanh,
                                  chat trực tiếp với nhà tuyển dụng & thông tin doanh nghiệp rõ ràng chi tiết. Mình rất an
                                  tâm và hài lòng khi sử dụng.
                                </p>
                              </div>
                            </div>

                            <div class="col">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/reviewers/thuy_anh.png" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Thuỳ Anh</div>
                                <p class="text-muted text-body small mxh-100">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Tôi đã sử dụng nhiều ứng dụng khác nhau trước khi biết tới Rzcareer, nhưng đây thực sự
                                  là một ứng dụng tuyệt vời. Tôi rất thích tính năng tạo CV online nhanh chóng, được phân
                                  tích và sửa lỗi CV hoàn toàn miễn phí từ Rzcareer. Giao diện của ứng dụng cũng rất dễ sử
                                  dụng, tất cả đều được sắp xếp một cách rõ ràng và logic, giúp tôi dễ dàng tìm thấy những
                                  gì tôi cần mà không cần mất quá nhiều thời gian. Rzcareer có đầy đủ ngành nghề tôi quan
                                  tâm với những mức offer tốt, hơn nữa tôi còn dễ dàng tìm kiếm việc gần khu vực tôi ở.
                                  Đánh giá 5 sao nhé!
                                </p>
                              </div>
                            </div>


                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="row">

                            <div class="col">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/2.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Thùy Dung</div>
                                <p class="text-muted text-body small mxh-100">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Mình sử dụng app Rzcareer để tìm việc làm từ 3 năm trước và rất thích các tính năng của
                                  app như việc làm nhanh, tạo CV dạng PDF và ứng tuyển bằng điện thoại. NTD cũng liên hệ
                                  sớm, không bị tình trạng tin đăng ảo rồi không ai gọi như một số bên khác.
                                </p>
                              </div>
                            </div>

                            <div class="col">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/1.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Tài Linh</div>
                                <p class="text-muted text-body small mxh-100">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Em mới ra trường, chưa biết cách làm CV như thế nào. May có một chị người quen bảo lên
                                  website Rzcareer.vn tạo CV, được hướng dẫn chi tiết. Trên Rzcareer còn có phần phân tích
                                  CV rất hữu ích, em có thể biết được mình đang thiếu thông tin gì và bổ sung.
                                </p>
                              </div>
                            </div>


                            <div class="col">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/4.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Quỳnh Trang</div>
                                <p class="text-muted text-body small mxh-100">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Rzcareer giúp em tìm thấy công việc phù hợp với mình thông qua các đề xuất được cập nhật
                                  qua email mỗi ngày. Em đã tìm thấy nhiều cơ hội thực tập uy tín để xây dựng kinh nghiệm
                                  thực tế trong lĩnh vực Marketing mà mình yêu thích.
                                </p>
                              </div>
                            </div>

                            <div class="col">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/5.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Phúc Bùi</div>
                                <p class="text-muted text-body small mxh-100">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Mình đã trải qua 2 tháng liên tục bị các NTD từ chối. Sau đó mình đã nhìn thấy quảng cáo
                                  của Rzcareer và cập nhật CV lên website. Nhờ tính năng phân tích CV mà mình biết CV cần
                                  khắc phục những lỗi gì và hiện đã có NTD liên hệ mời phỏng vấn.
                                </p>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carousel9"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carousel9"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                  <div class="d-block d-lg-none">
                    <div id="carousel10" class="carousel slide" data-bs-ride="carousel">

                      <div class="carousel-inner p-1">

                        <div class="carousel-item active">
                          <div class="row g-3">
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/6.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Phương Thảo</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Tôi rất hài lòng với web Rzcareer! Tôi nhận được phản hồi từ các NTD rất nhanh. Giao
                                  diện mới giúp tôi thực hiện các thao tác dễ dàng hơn và tôi đã nhận được nhiều lời mời
                                  phỏng vấn từ các công ty lớn.
                                </p>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/7.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Nguyễn Hạnh</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Tôi từng làm kế toán và sau đó chuyển sang Marketing. Sử dụng CV tự làm của mình, tôi đã
                                  nhận được phản hồi rất kém từ các NTD. Sau khi update CV của mình lên Rzcareer AI, tôi
                                  đã được feedback rất chi tiết và đã nhận được nhiều cuộc phỏng vấn.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="row g-3">
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/8.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Trung Kiên</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Mình đã luôn nghĩ rằng CV dài 3 trang A4 của bản thân thật hoàn hảo. Ôi, nhưng mình đã
                                  sai lầm! Từ khi biết đến tình năng Rzcareer AI, mình đã có một CV ngắn gọn, chính xác,
                                  chuyên nghiệp và tự tin gửi cho các nhà tuyển dụng tiềm năng.
                                </p>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/9.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Anh Quân</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Trước kia, khi tôi đăng CV lên các trang tuyển dụng, tôi nhận được rất ít phản hồi, thậm
                                  chí là không có. Kể từ khi tôi bắt đầu đăng CV lên Rzcareer.vn, tôi đã nhận được ba phản
                                  hồi liên quan đến nghề nghiệp của mình chỉ trong 1 tuần.
                                </p>
                              </div>
                            </div>
                          </div>

                        </div>

                        <div class="carousel-item">
                          <div class="row g-3">
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/10.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Thu Trang</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Rzcareer đã làm rất tốt và tôi chắc chắn giới thiệu app tìm việc này tới bạn bè của tôi.
                                  Nhân viên làm việc rất chuyên nghiệp. Tôi được hướng dẫn chi tiết từ A-Z, giao diện mới
                                  cũng giúp tôi thao tác nhanh chóng. Đồng thời, tỷ lệ phản hồi từ nhà tuyển dụng rất cao.
                                </p>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/1.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Thùy Dung</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Mình sử dụng app Rzcareer để tìm việc làm từ 3 năm trước và rất thích các tính năng của
                                  app như việc làm nhanh, tạo CV dạng PDF và ứng tuyển bằng điện thoại. NTD cũng liên hệ
                                  sớm, không bị tình trạng tin đăng ảo rồi không ai gọi như một số bên khác.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="row g-3">
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/2.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Tài Linh</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Em mới ra trường, chưa biết cách làm CV như thế nào. May có một chị người quen bảo lên
                                  website Rzcareer.vn tạo CV, được hướng dẫn chi tiết. Trên Rzcareer còn có phần phân tích
                                  CV rất hữu ích, em có thể biết được mình đang thiếu thông tin gì và bổ sung.
                                </p>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/3.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Hồng Kim</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Tôi nghỉ việc để chăm sóc con cái cũng đã gần 2 năm. Nay ứng tuyển lại thực sự khó khăn,
                                  may nhờ app Rzcareer gợi ý các danh sách việc làm phù hợp mà tôi đã giành được 2 cuộc
                                  phỏng vấn.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="row g-3">
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/4.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Quỳnh Trang</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Rzcareer giúp em tìm thấy công việc phù hợp với mình thông qua các đề xuất được cập nhật
                                  qua email mỗi ngày. Em đã tìm thấy nhiều cơ hội thực tập uy tín để xây dựng kinh nghiệm
                                  thực tế trong lĩnh vực Marketing mà mình yêu thích.
                                </p>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="bg-white shadow-sm p-2 p-sm-3 rounded-4 text-center">
                                <img class="rounded-circle w-50 my-2" loading="lazy"
                                  src="/assets_livewire/teks/img/avatar/5.jpg" alt="avatar" />
                                <div class="mb-1 text-dark fs-6 fw-bold">Phúc Bùi</div>
                                <p class="text-muted text-body small mxh-100 p-1">
                                  <img class="d-block m-auto" loading="lazy"
                                    src="/assets_livewire/img/2024/ic16.svg?v=234208153092" alt="Rzcareer">
                                  Mình đã trải qua 2 tháng liên tục bị các NTD từ chối. Sau đó mình đã nhìn thấy quảng cáo
                                  của Rzcareer và cập nhật CV lên website. Nhờ tính năng phân tích CV mà mình biết CV cần
                                  khắc phục những lỗi gì và hiện đã có NTD liên hệ mời phỏng vấn.
                                </p>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carousel10"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carousel10"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>

        <!-- <section class="bg-FAFAFA py-2 py-sm-3">
          <div class="container">
            <div class="teks-section">
              <div class="teks-section-title">
                <h2 class="h3">Tin tức</h2>
                <a href="/blog/">Xem thêm <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                  </svg></a>
              </div>
              <div class="teks-section-content teks-swiper">

                <div id="carousel8" class="carousel slide" data-bs-interval="999999" data-bs-ride="carousel">

                  <div class="carousel-inner pb-1">
                    <div class="carousel-item active teks-list">
                      <div class="row row-cols-sm-3 row-cols-lg-5 g-3 g-sm-4 teks-news">

                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </section> -->

      </main>

      <footer class="footer bg-white pt-4 pt-sm-5 pb-3">
        <div class="no-padding">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="footer-widget">
                  <div class="widgettitle widget-title text-dark fw-bold">CÔNG TY CỔ PHẦN Rzcareer</div>
                  <div class="textwidget">
                    <p><strong class="text-body">Văn phòng Miền Bắc:</strong> Tầng 3 tòa G1 <br> Five Star Garden, Thanh
                      Xuân, Hà Nội <br>Điện thoại: <a class="text-primary" title="Rzcareer Miền Bắc"
                        href="tel:0898579188">0898.579.188</a></p>
                    <p><strong class="text-body">Văn phòng Miền Nam:</strong> Lầu 5, 607-609 Nguyễn Kiệm,<br> Phường 9,
                      Quận Phú Nhuận, TP. Hồ Chí Minh <br>Điện thoại: <a class="text-primary" title="Rzcareer Miền Nam"
                        href="tel:0896557388">0896.557.388</a></p>
                    <p><strong>Email:</strong> <a href="mailto:contact@Rzcareer.vn">contact@Rzcareer.vn</a><br /><strong
                        title="Chăm sóc ứng viên">Hỗ trợ ứng viên:</strong> <a title="Chăm sóc ứng viên"
                        class="text-primary" href="tel:0705052927">070.505.2927</a><br> <strong>Hotline:</strong> <a
                        title="Hotline" class="text-primary" href="tel:0899.565.868">0899.565.868</a></p>
                  </div>

                </div>
              </div>
              <div class="col-sm-4 col-6 col-xs-6 col-md-2">
                <div class="footer-widget">
                  <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo địa điểm">Việc theo địa
                    điểm</div>
                  <div class="textwidget">
                    <div class="textwidget">
                      <ul class="footer-navigation list-unstyled">
                          @foreach(
                                  App\Models\CommonCity::withCount('jobPosts')  // Count related job posts
                                      ->orderBy('job_posts_count', 'desc')     // Sort by job posts count
                                      ->limit(10)                               // Limit to top 10 cities
                                      ->get() as $city)
                                  <li>
                                      <a
                                         href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => $city->name, 'career_id' => '']) }}">
                                          Việc làm tại {{ $city->name }}
                                      </a>
                                  </li>
                              @endforeach

                        {{-- <li><a href="/viec-lam-tai-ho-chi-minh.html" title="Việc làm tại Hồ Chí Minh">TPHCM</a></li>
                        <li><a href="/viec-lam-tai-ha-noi.html" title="Việc làm tại Hà Nội">Hà Nội</a></li>
                        <li><a href="/viec-lam-tai-da-nang.html" title="Việc làm tại Đà Nẵng">Đà Nẵng</a></li>
                        <li><a href="/viec-lam-tai-can-tho.html" title="Việc làm tại Cần Thơ">Cần Thơ</a></li>
                        <li><a href="/viec-lam-tai-binh-duong.html" title="Việc làm tại Bình Dương">Bình Dương</a></li>
                        <li><a href="/viec-lam-tai-hai-phong.html" title="Việc làm tại Hải Phòng">Hải Phòng</a></li>
                        <li><a href="/viec-lam-tai-dong-nai.html" title="Việc làm tại Đồng Nai">Đồng Nai</a></li>
                        <li><a href="/viec-lam-tai-quang-ninh.html" title="Việc làm tại Quảng Ninh">Quảng Ninh</a></li> --}}
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 col-xs-6 col-md-2">
                <div class="footer-widget">
                  <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo ngành nghề">Việc theo
                    ngành nghề</div>
                  <div class="textwidget">
                    <ul class="footer-navigation list-unstyled">
                      @foreach(
                                  App\Models\CommonCareer::withCount('jobPosts') // Count related job posts
                                      ->orderBy('job_posts_count', 'desc')      // Sort by the number of job posts
                                      ->limit(10)                               // Limit to top 10 careers
                                      ->get() as $career)
                                  <li>
                                      <a
                                         href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => $career->id]) }}">
                                          Việc làm {{ $career->name }}
                                      </a>
                                  </li>
                              @endforeach

                      {{-- <li><a href="/viec-lam-tai-chinh-ngan-hang.html" title="Việc làm Tài Chính/Ngân Hàng">Tài
                          Chính/Ngân Hàng</a></li>
                      <li><a href="/viec-lam-ke-toan.html" title="Việc làm Kế Toán">Kế Toán</a></li>
                      <li><a href="/viec-lam-nhan-vien-hanh-chinh-nhan-su.html" title="Việc làm Hành Chính Nhân Sự">Hành
                          Chính Nhân Sự</a></li>
                      <li><a href="/viec-lam-nhan-vien-kinh-doanh.html" title="Việc làm Kinh doanh">Kinh Doanh</a></li>
                      <li><a href="/viec-lam-marketing.html" title="Việc làm Marketing">Marketing</a></li>
                      <li><a href="/viec-lam-xay-dung.html" title="Việc làm Xây Dựng">Xây Dựng</a></li>
                      <li><a href="/viec-lam-tai-xe.html" title="Việc làm Tài Xế">Tài Xế</a></li>
                      <li><a href="/nganh-nghe.html" title="Xem tất cả ngành nghề">Xem tất cả <b>»</b></a></li> --}}
                    </ul>
                  </div>
                </div>
              </div>
              {{-- <div class="col-sm-3 col-6 col-xs-6 col-md-2">
                <div class="footer-widget">
                  <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo Vị trí/Chức vụ">Việc theo
                    chức danh</div>
                  <div class="textwidget">
                    <ul class="footer-navigation list-unstyled">
                      <li><a href="/viec-lam-thuc-tap-sinh.html" title="Việc làm Thực Tập Sinh">Thực Tập Sinh</a></li>
                      <li><a href="/viec-lam-tro-ly-giam-doc.html" title="Việc làm Trợ Lý">Trợ Lý</a></li>
                      <li><a href="/viec-lam-nhan-vien-van-phong.html" title="Việc làm Tài Xế">Nhân Viên Văn Phòng</a>
                      </li>
                      <li><a href="/viec-lam-truong-phong.html" title="Việc làm Trưởng Phòng">Trưởng Phòng</a></li>
                      <li><a href="/viec-lam-giam-doc.html" title="Việc làm Giám đốc">Giám đốc</a></li>
                      <li><a href="/nganh-nghe.html" title="Xem tất cả vị trí/chức vụ">Xem tất cả <b>»</b></a></li>
                    </ul>
                  </div>
                </div>
              </div> --}}
              <div class="col-sm-4 col-6 col-xs-6 col-md-2">
                <div class="footer-widget">
                  <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo loại hình">Việc theo loại
                    hình</div>
                  <div class="textwidget">
                    <ul class="footer-navigation list-unstyled">
                      @foreach(
                                  App\Models\CommonCity::withCount('jobPosts')  // Count related job posts
                                      ->orderBy('job_posts_count', 'desc')     // Sort by job posts count
                                      ->limit(10)                               // Limit to top 10 cities
                                      ->get() as $city)
                                  <li>
                                      <a
                                         href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => $city->name, 'career_id' => '']) }}">
                                          Việc làm tại {{ $city->name }}
                                      </a>
                                  </li>
                              @endforeach

                      {{-- <li><a href="/viec-lam-part-time.html" title="Việc làm Part-time">Part-time</a></li>
                      <li><a href="/viec-lam-online.html" title="Việc làm Online">Online</a></li>
                      <li><a href="/viec-lam-thoi-vu.html" title="Việc làm Thời vụ">Thời vụ</a></li>
                      <li><a href="/viec-lam-remote.html" title="Việc làm Remote">Remote</a></li>
                    </ul>
                    <ul class="footer-social visible-xs d-block d-sm-none list-inline mb-1">
                      <li class="list-inline-item"><a href="https://www.facebook.com/RzcareerVN/" target="_blank"><i
                            class='bx bx-xs bxl-facebook'></i></a></li>
                      <li class="list-inline-item"><a href="https://www.linkedin.com/company/josbgo.vn/"
                          target="_blank"><i class='bx bx-xs bxl-linkedin'></i></a></li>
                      <li class="list-inline-item"><a href="https://www.instagram.com/Rzcareer_vn/" target="_blank"><i
                            class='bx bx-xs bxl-instagram'></i></a></li> --}}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright">
          <div class="container">
            <div class="row">
              {{-- <div class="col-12 col-sm-10">
                <ul class="list-inline list-unstyled mb-1 text-primary">
                  <li class="list-inline-item"><a rel="nofollow" href="https://Rzcareer.vn/site/about-us"
                      title="Về chúng tôi"><u>Giới thiệu</u></a></li>
                  <li class="list-inline-item"><a rel="nofollow" target="_blank"
                      href="https://Rzcareer.vn/pdf/viewer/?file=/media/pdf/chinh-sach.pdf" title="Chính sách"><u>Chính
                        sách</u></a></li>
                  <li class="list-inline-item"><a rel="nofollow" target="_blank"
                      href="https://Rzcareer.vn/pdf/viewer/?file=/media/pdf/quy-che-hoat-dong.pdf"
                      title="Quy chế hoạt động"><u>Quy chế</u></a></li>
                  <li class="list-inline-item"><a rel="nofollow" href="https://Rzcareer.vn/site/giai-quyet-tranh-chap"
                      title="Giải quyết tranh chấp"><u>Giải quyết tranh chấp</u></a></li>
                  <!--<li><a href="https://Rzcareer.vn/site/term-of-service" title="Điều khoản sử dụng">Điều khoản</a></li>-->
                  <li class="list-inline-item"><a rel="nofollow" target="_blank"
                      href="https://view.officeapps.live.com/op/view.aspx?src=https%3A%2F%2FRzcareer.vn%2FRzcareer_thoa_thuan_mang_xa_hoi.doc&amp;wdOrigin=BROWSELINK"><u>Thoả
                        thuận sử dụng</u></a></li>
                  <li class="list-inline-item"><a rel="nofollow" href="https://Rzcareer.vn/site/privacy-policy"
                      title="Chính sách bảo mật"><u>Bảo mật</u></a></li>
                  <li class="list-inline-item"><a rel="nofollow" target="_blank"
                      href="https://employer.Rzcareer.vn"
                      title="Rzcareer dành cho Nhà tuyển dụng tìm kiếm nhân sự"><u>Dành cho Nhà Tuyển Dụng</u></a></li>
                  <li class="list-inline-item"><a rel="nofollow" href="https://Rzcareer.vn/site/faq"
                      title="Câu hỏi thường gặp"><u>FAQ</u></a></li>
                  <li class="list-inline-item"><a href="https://Rzcareer.vn/blog" target="_blank"
                      title="Tin tức"><u>Blog</u></a></li>
                  <li class="list-inline-item"><a href="https://Rzcareer.vn/hoi-dap/cau-hoi" target="_blank"
                      title="Hỏi & Đáp"><u>Hỏi & Đáp</u></a></li>
                  <li class="list-inline-item"><a href="https://Rzcareer.vn/sitemap.html"
                      title="Sơ đồ trang web"><u>Sitemap</u></a></li>
                </ul>
              </div> --}}
              <div class="col d-flex">
                <ul class="footer-social text-right text-sm-center hidden-xs d-none d-sm-block list-inline mb-1">
                  <li class="list-inline-item"><a rel="nofollow" href="https://www.facebook.com/RzcareerVN/"
                      target="_blank"><i class='bx bx-xs bxl-facebook'></i></a></li>
                  <li class="list-inline-item"><a rel="nofollow" href="https://www.linkedin.com/company/josbgo.vn/"
                      target="_blank"><i class='bx bx-xs bxl-linkedin'></i></a></li>
                  <li class="list-inline-item"><a rel="nofollow" href="https://www.instagram.com/Rzcareer_vn/"
                      target="_blank"><i class='bx bx-xs bxl-instagram'></i></a></li>
                </ul>
              </div>
            </div>
            {{-- BO CONG THUONG  --}}
            {{-- <div class="row">
              <div class="col-sm-10">
                <p class="pull-left small text-body">Số ĐKKD:‎‎ 0108266100, cấp ngày 09/05/2018 do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp. <br />Giấy phép thiết lập Mạng xã hội trên mạng số 568/GP-BTTTT do Bộ Thông tin & Truyền thông cấp ngày 30/08/2021.<br /> © 2024 Công ty Cổ phần Rzcareer. All Rights Reserved.</p>
              </div>
              <div class="col-sm-2">
                <div class="text-center">
                  <a target="_blank" rel="nofollow" href="http://online.gov.vn/Home/WebDetails/73770">

                    <img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/assets_livewire/teks/img/online-gov.svg" alt="Rzcareer" width="100" height="38">

                  </a>
                  <a target="_blank" rel="nofollow" href="https://www.dmca.com/Protection/Status.aspx?ID=80a751d3-fcbd-43c7-99fa-854fd7052f3e&refurl=https%3A%2F%2FRzcareer.vn%2F" title="DMCA.com Protection Status" class="dmca-badge">

                    <img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/assets_livewire/teks/img/dmca.svg" alt="Rzcareer" width="100" height="21">

                  </a>
                  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </footer>
      {{-- <style>
        .zalo-chat-widget {
          left: initial !important;
          bottom: 20px !important;
          right: 10px !important;
          position: fixed !important;
          width: 60px !important;
          height: 60px !important;
        }
      </style>
      <a href="https://zalo.me/409462990633304042" target="_blank" rel="nofollow" class="zalo-chat-widget">
        <img loading="lazy" src="/assets_livewire/img/2024/zalo.svg" alt="Rzcareer">
      </a> --}}



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




      <div class="modal fade" id="cv-modal" tabindex="-1" aria-labelledby="cv-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cv-modal-label">Tính năng viết CV tự động bằng AI trong vòng 2 phút!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <a class="btn btn-primary m-auto d-block" href="/tao-cv-bang-ai.html">Tạo CV ngay</a>
            </div>
          </div>
        </div>
      </div>
      <a title="Giới thiệu tính năng viết CV tự động bằng AI trong vòng 2 phút!"
        style="z-index: 9999 !important;left: initial !important;bottom: 95px !important;right: 20px !important;position: fixed !important;width: 50px !important;height: 50px !important;background: #fff;border-radius: 100%;box-shadow: 0 0 10px #ccc;display: flex;align-content: center;justify-content: center;align-items: center;"
        href="" data-bs-toggle="modal" data-bs-target="#cv-modal"> <img loading="lazy" height="40"
          width="40" src="/assets_livewire/teks/img/Rzcareer-ai-robot.svg?v=1.2" alt="Rzcareer AI"> </a>
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

    </html>

  </div>
