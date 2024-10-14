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
      <link rel="preload" href="/assets_livewire/teks/css/fonts/xn7gYHE41ni1AdIRggexSg.woff2" as="font" type="font/woff2"
        crossorigin>
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

      <link rel="preload" href="/assets_livewire/teks/css/fonts/boxicons.woff2" as="font" type="font/woff2" crossorigin>
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
                    <form wire:submit.prevent="redirectToJobList">
                      <!-- Wire form to redirect method -->
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
                      {{-- 1 Thành phố có nhiều jobpost nhất --}}
                      @php
                      $cityWithMostJobPosts = App\Models\CommonCity::whereHas('locations.jobPosts')
                      ->withCount(['locations as job_posts_count' => function ($query) {
                      $query->whereHas('jobPosts'); // Lọc job posts cho các locations
                      }])
                      ->orderBy('job_posts_count', 'desc') // Sắp xếp theo số lượng job posts
                      ->first(); // Lấy thành phố đầu tiên (nhiều job posts nhất)
                      @endphp

                      <li class="list-group-item location">
                        <a title="Việc làm tại{{ $cityWithMostJobPosts->name }}"
                          href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => $cityWithMostJobPosts->name, 'career_id' => '']) }}"
                          class="list-group-item-action"><i class="bx bx-map text-danger"></i> Việc tại {{
                          $cityWithMostJobPosts->name
                          }}</a>
                      </li>

                      {{-- top 5 career có nhiều jobpost và ứng tuyển --}}

                      @foreach(
                      App\Models\CommonCareer::withCount('jobPosts') // Count related job posts
                      ->orderBy('job_posts_count', 'desc') // Sort by the number of job posts
                      ->limit(5) // Limit to top 10 careers
                      ->get() as $career)

                      <li class="list-group-item">
                        <a title="Việc làm {{ $career->name }}"
                          href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => $career->id]) }}"
                          class="list-group-item-action"><img height="15" width="15" loading="lazy"
                            src="/assets_livewire/teks/img/ic-nhan-su.svg?v=234208153092"
                            alt="Việc làm {{ $career->name }}"> {{ $career->name }}</a>
                      </li>
                      @endforeach


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
                                src="/assets_livewire/img/2024/ic2.svg?v=234208153092" alt="Tạo CV Online - Rzcareer AI">
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
                    <img src="/assets_livewire/img/2024/ic3.svg?v=234208153092" width="16" loading="lazy" alt="Rzcareer">
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
                  <img src="/assets_livewire/img/2024/ic6.svg?v=234208153092" width="16" loading="lazy" alt="Rzcareer">
                  <strong>Gợi ý:</strong> Di chuột vào tiêu đề việc làm để xem thông tin chi tiết.
                </div>
                <div class="d-sm-block">

                  <div id="carousel1" class="carousel slide" data-bs-interval="5000" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      @php
                      $totalPages = ceil(count($urgentJobPosts) / 15); // Tính tổng số trang
                      $maxPages = min($totalPages, 10); // Giới hạn tối đa là 10 trang
                      @endphp

                      @for ($i = 0; $i < $maxPages; $i++) <button type="button" data-bs-target="#carousel1"
                        data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}" aria-label="Slide {{ $i + 1 }}">
                        </button>
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
                                <h3 class="tooltip_job_{{ $jobPost['id'] }} h5 tooltip" title="">{{ $jobPost['job_name']
                                  }}</h3>
                                <div class="h6 text-muted">{{ $jobPost['company']['company_name'] }}</div>
                                <ul class="p-0">
                                  <li class="list-group-item list-group-item-action">
                                    <i class="bx bx-money"></i>
                                    {{ number_format($jobPost['salary_min'] / 1_000_000, 0, '.', ',') }} - {{
                                    number_format($jobPost['salary_max'] / 1_000_000, 0, '.', ',') }} triệu VNĐ
                                  </li>

                                  <li class="list-group-item list-group-item-action">
                                    <i class="bx bx-map"></i> {{ $jobPost['city']['name'] ?? "Chưa có tên" }}
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

                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
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
                          @for ($i = 0; $i < 8; $i++) @if (isset($companies[$index + $i])) <div class="col">
                            <a href="{{  'tuyen-dung/' .   $companies[$index + $i]->slug }}"
                              class="d-block border-0 p-0 text-center teks-item text-dark">

                              <img onerror="this.src='{{ asset('assets_livewire/img/default-company.svg') }}'"
                                class="w-75 teks-img-thumbnail mb-2" width="90" height="90" loading="lazy"
                                src="{{ Storage::url($companies[$index + $i]->company_image_url) ?? '/img/employer-logo.jpg' }}"
                                alt="{{ $companies[$index + $i]->company_name }}">
                              <div class="h5 fw-bold text-dark">{{ $companies[$index + $i]->company_name }}</div>
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



                  <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
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
                  <button type="button" data-bs-target="#carouselHotJobs" data-bs-slide-to="{{ $i }}"
                    class="{{ $i === 0 ? 'active' : '' }}" aria-label="Slide {{ $i + 1 }}"></button>
                  @endfor
              </div>

              <div class="carousel-inner pt-2 px-3">
                @foreach ($hotJobPosts as $index => $jobPost)
                @if ($index % 8 === 0)
                <!-- Mỗi nhóm 8 công việc -->
                <div class="carousel-item @if ($index === 0) active @endif">
                  <div class="row row-cols-1 row-cols-lg-3 g-2">
                    @for ($i = 0; $i < 8; $i++) @if (isset($hotJobPosts[$index + $i])) <div class="col">
                      <a href="{{ url('viec-lam/' . $hotJobPosts[$index + $i]['slug']) }}"
                        class="d-flex teks-item text-dark">
                        <div class="flex-shrink-0 position-relative">
                          <img class="lazy" width="80" height="80"
                            onerror="this.src='{{ asset('assets_livewire/img/default-company.svg') }}'"
                            data-src="{{ Storage::url($hotJobPosts[$index + $i]->company->company_image_url)  }}" alt="">
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <h3 class="tooltip_job_{{ $hotJobPosts[$index + $i]->id }} h5 text-danger tooltip" title="">{{
                            $hotJobPosts[$index + $i]->job_name }}</h3>
                          <div class="h6 text-muted">{{ $hotJobPosts[$index + $i]->company->company_name }}</div>
                          <ul class="p-0">
                            <li class="list-group-item list-group-item-action">
                              <i class='bx bx-money'></i>
                              {{ number_format($hotJobPosts[$index + $i]->salary_min / 1_000_000, 0, '.', ',') }} -
                              {{ number_format($hotJobPosts[$index + $i]->salary_max / 1_000_000, 0, '.', ',') }} triệu
                              VNĐ
                            </li>
                            <li class="list-group-item list-group-item-action">
                              <i class='bx bx-map'></i>
                              {{ $hotJobPosts[$index + $i]->city->name ?? "Chưa có tên công ty" }}
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

            <button class="carousel-control-prev" type="button" data-bs-target="#carousel3" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel3" data-bs-slide="next">
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
              <div class="row row-cols-1 text-left row-cols-md-2 row-cols-auto mt-2 gx-4 d-flex justify-content-center">

                <div class="col d-flex">
                  <div class="card border-primary w-100">
                    <div class="row g-0 align-items-center">
                      <div class="col-4 p-1 text-center">
                        <img height="90" width="90" loading="lazy" src="/assets_livewire/img/2024/ic1.svg?v=234208153092"
                          alt="Đánh giá CV - Rzcareer AI">
                      </div>
                      <div class="col-8">
                        <div class="card-body">
                          <h3 class="fs-6 card-title fw-bold">Đánh giá CV - Rzcareer AI</h3>
                          <p class="card-text small">Bạn đã có sẵn CV? Tải lên để nhận phân tích và gợi ý của Rzcareer AI
                          </p>
                          <a href="/review-cv.html" class="btn btn-primary btn-sm"> <i class='bx bx-upload'></i> Tải lên
                            CV</a>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="col d-flex">
                  <div class="card border-primary w-100">
                    <div class="row g-0 align-items-center">

                      <div class="col-4 p-1 text-center">
                        <img height="90" width="90" loading="lazy" src="/assets_livewire/img/2024/ic2.svg?v=234208153092"
                          alt="Phân tích CV - Rzcareer AI">
                      </div>
                      <div class="col-8">
                        <div class="card-body">
                          <h3 class="fs-6 card-title fw-bold">Tạo CV tự động trong 2 phút</h3>
                          <p class="card-text small">Tạo CV xin việc Online chuẩn, đẹp miễn phí với Rzcareer</p>
                          <a href="/tao-cv-bang-ai.html" class="btn btn-primary btn-sm"><i class='bx bx-plus'></i> Tạo CV
                            ngay!</a>
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
          <a href="{{ route('danh-sach-nganh-nghe')}}">Xem thêm <svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="currentColor" class="size-6">
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


                  @livewire('employer.inc.footer')
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
          <div class="col-sm-12 col-md-4">
            <div class="footer-widget">
              <div class="widgettitle widget-title text-dark fw-bold">CÔNG TY CỔ PHẦN Rzcareer</div>
              <div class="textwidget">
                <p><strong class="text-body">Văn phòng Miền Bắc:</strong> Tầng 3 tòa G1 <br> Five Star Garden, Thanh Xuân,
                  Hà Nội <br>Điện thoại: <a class="text-primary" title="Rzcareer Miền Bắc"
                    href="tel:0898579188">0898.579.188</a></p>
                <p><strong class="text-body">Văn phòng Miền Nam:</strong> Lầu 5, 607-609 Nguyễn Kiệm,<br> Phường 9, Quận
                  Phú Nhuận, TP. Hồ Chí Minh <br>Điện thoại: <a class="text-primary" title="Rzcareer Miền Nam"
                    href="tel:0896557388">0896.557.388</a></p>
                <p><strong>Email:</strong> <a href="mailto:contact@Rzcareer.vn">contact@Rzcareer.vn</a><br /><strong
                    title="Chăm sóc ứng viên">Hỗ trợ ứng viên:</strong> <a title="Chăm sóc ứng viên" class="text-primary"
                    href="tel:0705052927">070.505.2927</a><br> <strong>Hotline:</strong> <a title="Hotline"
                    class="text-primary" href="tel:0899.565.868">0899.565.868</a></p>
              </div>

            </div>
          </div>
          <div class="col-sm-3 col-6 col-xs-6 col-md-2">
            <div class="footer-widget">
              <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo địa điểm">Việc theo địa điểm
              </div>
              <div class="textwidget">
                <div class="textwidget">
                  <ul class="footer-navigation list-unstyled">
                    <li><a href="/viec-lam-tai-ho-chi-minh.html" title="Việc làm tại Hồ Chí Minh">TPHCM</a></li>
                    <li><a href="/viec-lam-tai-ha-noi.html" title="Việc làm tại Hà Nội">Hà Nội</a></li>
                    <li><a href="/viec-lam-tai-da-nang.html" title="Việc làm tại Đà Nẵng">Đà Nẵng</a></li>
                    <li><a href="/viec-lam-tai-can-tho.html" title="Việc làm tại Cần Thơ">Cần Thơ</a></li>
                    <li><a href="/viec-lam-tai-binh-duong.html" title="Việc làm tại Bình Dương">Bình Dương</a></li>
                    <li><a href="/viec-lam-tai-hai-phong.html" title="Việc làm tại Hải Phòng">Hải Phòng</a></li>
                    <li><a href="/viec-lam-tai-dong-nai.html" title="Việc làm tại Đồng Nai">Đồng Nai</a></li>
                    <li><a href="/viec-lam-tai-quang-ninh.html" title="Việc làm tại Quảng Ninh">Quảng Ninh</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3 col-6 col-xs-6 col-md-2">
            <div class="footer-widget">
              <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo ngành nghề">Việc theo ngành
                nghề</div>
              <div class="textwidget">
                <ul class="footer-navigation list-unstyled">
                  <li><a href="/viec-lam-tai-chinh-ngan-hang.html" title="Việc làm Tài Chính/Ngân Hàng">Tài Chính/Ngân
                      Hàng</a></li>
                  <li><a href="/viec-lam-ke-toan.html" title="Việc làm Kế Toán">Kế Toán</a></li>
                  <li><a href="/viec-lam-nhan-vien-hanh-chinh-nhan-su.html" title="Việc làm Hành Chính Nhân Sự">Hành Chính
                      Nhân Sự</a></li>
                  <li><a href="/viec-lam-nhan-vien-kinh-doanh.html" title="Việc làm Kinh doanh">Kinh Doanh</a></li>
                  <li><a href="/viec-lam-marketing.html" title="Việc làm Marketing">Marketing</a></li>
                  <li><a href="/viec-lam-xay-dung.html" title="Việc làm Xây Dựng">Xây Dựng</a></li>
                  <li><a href="/viec-lam-tai-xe.html" title="Việc làm Tài Xế">Tài Xế</a></li>
                  <li><a href="/nganh-nghe.html" title="Xem tất cả ngành nghề">Xem tất cả <b>»</b></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-6 col-xs-6 col-md-2">
            <div class="footer-widget">
              <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo Vị trí/Chức vụ">Việc theo chức
                danh</div>
              <div class="textwidget">
                <ul class="footer-navigation list-unstyled">
                  <li><a href="/viec-lam-thuc-tap-sinh.html" title="Việc làm Thực Tập Sinh">Thực Tập Sinh</a></li>
                  <li><a href="/viec-lam-tro-ly-giam-doc.html" title="Việc làm Trợ Lý">Trợ Lý</a></li>
                  <li><a href="/viec-lam-nhan-vien-van-phong.html" title="Việc làm Tài Xế">Nhân Viên Văn Phòng</a></li>
                  <li><a href="/viec-lam-truong-phong.html" title="Việc làm Trưởng Phòng">Trưởng Phòng</a></li>
                  <li><a href="/viec-lam-giam-doc.html" title="Việc làm Giám đốc">Giám đốc</a></li>
                  <li><a href="/nganh-nghe.html" title="Xem tất cả vị trí/chức vụ">Xem tất cả <b>»</b></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-6 col-xs-6 col-md-2">
            <div class="footer-widget">
              <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo loại hình">Việc theo loại hình
              </div>
              <div class="textwidget">
                <ul class="footer-navigation list-unstyled">
                  <li><a href="/viec-lam-part-time.html" title="Việc làm Part-time">Part-time</a></li>
                  <li><a href="/viec-lam-online.html" title="Việc làm Online">Online</a></li>
                  <li><a href="/viec-lam-thoi-vu.html" title="Việc làm Thời vụ">Thời vụ</a></li>
                  <li><a href="/viec-lam-remote.html" title="Việc làm Remote">Remote</a></li>
                </ul>
                <ul class="footer-social visible-xs d-block d-sm-none list-inline mb-1">
                  <li class="list-inline-item"><a href="https://www.facebook.com/RzcareerVN/" target="_blank"><i
                        class='bx bx-xs bxl-facebook'></i></a></li>
                  <li class="list-inline-item"><a href="https://www.linkedin.com/company/josbgo.vn/" target="_blank"><i
                        class='bx bx-xs bxl-linkedin'></i></a></li>
                  <li class="list-inline-item"><a href="https://www.instagram.com/Rzcareer_vn/" target="_blank"><i
                        class='bx bx-xs bxl-instagram'></i></a></li>
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
          <div class="col-12 col-sm-10">
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
              <li class="list-inline-item"><a rel="nofollow" target="_blank" href="https://employer.Rzcareer.vn"
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
          </div>
          <div class="col-12 col-sm-2">
            <ul class="footer-social text-center hidden-xs d-none d-sm-block list-inline mb-1">
              <li class="list-inline-item"><a rel="nofollow" href="https://www.facebook.com/RzcareerVN/"
                  target="_blank"><i class='bx bx-xs bxl-facebook'></i></a></li>
              <li class="list-inline-item"><a rel="nofollow" href="https://www.linkedin.com/company/josbgo.vn/"
                  target="_blank"><i class='bx bx-xs bxl-linkedin'></i></a></li>
              <li class="list-inline-item"><a rel="nofollow" href="https://www.instagram.com/Rzcareer_vn/"
                  target="_blank"><i class='bx bx-xs bxl-instagram'></i></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-10">
            <p class="pull-left small text-body">Số ĐKKD:‎‎ 0108266100, cấp ngày 09/05/2018 do Sở Kế hoạch và Đầu tư Thành
              phố Hà Nội cấp. <br />Giấy phép thiết lập Mạng xã hội trên mạng số 568/GP-BTTTT do Bộ Thông tin & Truyền
              thông cấp ngày 30/08/2021.<br /> © 2024 Công ty Cổ phần Rzcareer. All Rights Reserved.</p>
          </div>
          <div class="col-sm-2">
            <div class="text-center">
              <a target="_blank" rel="nofollow" href="http://online.gov.vn/Home/WebDetails/73770">

                <img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-src="/assets_livewire/teks/img/online-gov.svg" alt="Rzcareer" width="100" height="38">

              </a>
              <a target="_blank" rel="nofollow"
                href="https://www.dmca.com/Protection/Status.aspx?ID=80a751d3-fcbd-43c7-99fa-854fd7052f3e&refurl=https%3A%2F%2FRzcareer.vn%2F"
                title="DMCA.com Protection Status" class="dmca-badge">

                <img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-src="/assets_livewire/teks/img/dmca.svg" alt="Rzcareer" width="100" height="21">

              </a>
              <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
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
  <a href="https://zalo.me/409462990633304042" target="_blank" rel="nofollow" class="zalo-chat-widget">
    <img loading="lazy" src="/assets_livewire/img/2024/zalo.svg" alt="Rzcareer">
  </a>



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
    href="" data-bs-toggle="modal" data-bs-target="#cv-modal"> <img loading="lazy" height="40" width="40"
      src="/assets_livewire/teks/img/Rzcareer-ai-robot.svg?v=1.2" alt="Rzcareer AI"> </a>
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
