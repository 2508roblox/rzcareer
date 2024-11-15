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


        <style>

.carousel-inner {
    padding-top: 1rem;
}
        </style>




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
                                <a href="/candidate/import-cv-data" class="btn btn-primary btn-sm">Tạo CV 2 phút</a>
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
                        @php
                            $jobPostCount = App\Models\JobPost::where('status', 1)->count();
                        @endphp
                      <div class="col-6">
                        <p>Việc làm đang tuyển</p>
                        <strong>
                            <span class="loader">
                                <span class="dot"></span>
                                <span class="circle"></span>
                            </span>
                            {{ number_format($jobPostCount) }} <!-- Display the count -->
                        </strong>
                      </div>
                      <div class="col-6">
                        @php
                        use Carbon\Carbon;
                        $todayPosts = App\Models\JobPost::whereDate('created_at', Carbon::today())->count();
                        @endphp
                        <p>Việc làm mới hôm nay</p>
                        <strong>{{ number_format($todayPosts) }}</strong>
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
                <a href="/danh-sach-viec-lam">Xem thêm <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
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

                  <div id="carousel1" class="carousel slide" data-bs-interval="222000" data-bs-ride="carousel">
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
                            <a href="{{ url('viec-lam/' . $jobPost['slug']) }}" style="position: relative;" class="d-flex teks-item text-dark  {{ (isset($jobPost['activeServices'][0]) && $jobPost['activeServices'][0]['border_effect'] === 1) ? 'border border-danger' : '' }}">
                                <div class="flex-shrink-0 position-relative">
                                <img  class="lazy {{ (isset($jobPost['activeServices'][0]) && $jobPost['activeServices'][0]['highlight_logo'] === 1) ? 'image-container-holo' : '' }}" width="80" height="80"
                                data-src="{{ Storage::exists($jobPost['company']['company_image_url']) ? Storage::url($jobPost['company']['company_image_url']) : asset('assets_livewire/img/default-company.svg') }}" lazy>
                                    <style>


    .image-container-holo   {
    width: 250px;
    aspect-ratio: 1;
    transition: .5s;
    cursor: pointer;
    -webkit-mask:
        linear-gradient(135deg, rgba(156, 8, 255, 0.8) 40%, #ff1313, rgba(0, 255, 179, 0.8) 60%)
        100% 100% / 250% 250%;
    animation: shimmer 1.3s infinite linear; /* Thêm animation */
}




@keyframes shimmer {
    0% {
        -webkit-mask-position: 0 0; /* Bắt đầu ở vị trí 0 */
    }
    100% {
        -webkit-mask-position: 100% 100%; /* Kết thúc ở vị trí 100% */
    }
}

                                    </style>
                              </div>
                              @if (isset($jobPost['activeServices'][0]) && $jobPost['activeServices'][0]['hot_effect'] === 1)
                              <div class="hot_badge ribbon">
                                  <img src="{{ asset('assets_livewire/img/job_badge/hot.svg') }}" alt="">
                                  {{-- <span>HOT</span> --}}
                              </div>
                          @endif


                              <style>
                     .ribbon {
  --c: #d81a14;
  --r: 20%; /* control the cutout part */

  padding: .6em 1.3em; /* you may need to adjust this based on your content */
  aspect-ratio: 1;
  display: grid;
  place-content: center;
  text-align: center;
  position: relative;
  z-index: 0;
  width: fit-content;
  box-sizing: border-box;
}
.ribbon:before {
  content: "";
  position: absolute;
  z-index: -1;
  inset: 60% 20% -40%;
  background: color-mix(in srgb, var(--c), #000 35%);
  clip-path: polygon(5% 0,95% 0,100% 100%,50% calc(100% - var(--r)),0 100%);
}
.ribbon:after {
  content: "";
  position: absolute;
  z-index: -1;
  inset: 0;
  background: radial-gradient(35% 35%,#0000 96%,#0003 97% 99%,#0000) var(--c);
  clip-path: polygon(100.00% 50.00%,89.66% 55.22%,98.30% 62.94%,86.96% 65.31%,93.30% 75.00%,81.73% 74.35%,85.36% 85.36%,74.35% 81.73%,75.00% 93.30%,65.31% 86.96%,62.94% 98.30%,55.22% 89.66%,50.00% 100.00%,44.78% 89.66%,37.06% 98.30%,34.69% 86.96%,25.00% 93.30%,25.65% 81.73%,14.64% 85.36%,18.27% 74.35%,6.70% 75.00%,13.04% 65.31%,1.70% 62.94%,10.34% 55.22%,0.00% 50.00%,10.34% 44.78%,1.70% 37.06%,13.04% 34.69%,6.70% 25.00%,18.27% 25.65%,14.64% 14.64%,25.65% 18.27%,25.00% 6.70%,34.69% 13.04%,37.06% 1.70%,44.78% 10.34%,50.00% 0.00%,55.22% 10.34%,62.94% 1.70%,65.31% 13.04%,75.00% 6.70%,74.35% 18.27%,85.36% 14.64%,81.73% 25.65%,93.30% 25.00%,86.96% 34.69%,98.30% 37.06%,89.66% 44.78%); /* from https://css-generators.com/starburst-shape/ */
}

.hot_badge {
  position: absolute; /* Thay đổi thành relative để có thể định vị ribbon chính xác */
  display: flex;
  flex-direction: row;
  align-items: center;
  vertical-align: middle;
  border-radius: .3rem;
  padding: 0.3rem;
}

.hot_badge img {
  width: 20px;
}

.hot_badge span {
  --tw-text-opacity: 1;
  color: rgba(239, 68, 68, .9);
  font-weight: bold;
}

                              </style>
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
          <a href="/danh-sach-viec-lam">Xem thêm <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
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
                    @for ($i = 0; $i < 8; $i++) @if (isset($hotJobPosts[$index + $i])) <div class="col ">
                      <a href="{{ url('viec-lam/' . $hotJobPosts[$index + $i]['slug']) }}"
                        class="d-flex teks-item text-dark {{ (isset($hotJobPosts[$index + $i]->activeServices[0]) && $hotJobPosts[$index + $i]->activeServices[0]['border_effect'] === 1) ? 'border border-danger' : '' }}">
                        <div class="flex-shrink-0 position-relative">
                          <img class="lazy" width="80" height="80"
                            onerror="this.src='{{ asset('assets_livewire/img/default-company.svg') }}'"
                            data-src="{{ Storage::url($hotJobPosts[$index + $i]->company->company_image_url)  }}" alt="">
                        </div>
                        <div class="flex-grow-1 ms-2 ">

                          <h3 class="tooltip_job_{{ $hotJobPosts[$index + $i]->id }} h5   tooltip" title="">{{
                            $hotJobPosts[$index + $i]->job_name }} - {{ $hotJobPosts[$index + $i]['id']}}</h3>
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
                        @if (isset($jobPost[$index + $i]->activeServices[0]) && $hotJobPosts[$index + $i]->activeServices[0]['hot_effect'] === 1)
                        <div class="hot_badge">
                            <img src="{{ asset('assets_livewire/img/job_badge/hot.svg') }}" alt="">
                            <span>HOT</span>
                        </div>
                    @endif

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
            <style>
                .border-danger {
    border: 2px solid red !important; /* Hoặc màu khác tùy ý */
}

            </style>
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
        <a target="_blank" href="#"><img width="100%" loading="lazy"
            src="/assets_livewire/img/2024/bn1.webp" alt="img"></a>
      </div>
      <div class="col-4">
        <a target="_blank" href="#"><img width="100%" loading="lazy"
            src="/assets_livewire/img/2024/bn2.webp" alt="Rzcareer"></a>
      </div>
      <div class="col-4">
        <a target="_blank" href="#"><img width="100%" loading="lazy"
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
                          <a href="/candidate/import-cv-data" class="btn btn-primary btn-sm"> <i class='bx bx-upload'></i> Tải lên
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
                          <a href="/candidate/import-cv-data" class="btn btn-primary btn-sm"><i class='bx bx-plus'></i> Tạo CV
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

                </div>


              </div>

            </div>
          </div>
        </div>
      </div>



    </div>
  </section>



  {{-- <section class="text-white teks-box-research-salary">
    <div class="container">
      <div class="teks-section py-4 py-sm-5">
        <div class="row align-items-center row-cols-lg-3">
          <div class="col-lg-3 teks-section-title ps-3 text-center text-lg-start">
            <h2 class="text-black fs-5">Tra cứu lương <small class="badge bg-danger p-1 font-size-sm">Mới</small></h2>
            <p class="w-100 mb-3 text-black">Tiện ích tra cứu & tìm hiểu mức lương <br> theo ngành nghề và vị trí công việc 2024</p>
            <img class="w-100 w-xs-25 mb-3 m-auto p-lg-4 d-block" loading="lazy"
              src="{{ asset('assets_livewire/teks/img/tra-cuu-luong.svg?v=234208153092') }}" alt="Rzcareer">

          </div>
          <div class="col-lg-9">
            <div class="row">
              <div class="col-lg-6 gx-sm-5 mb-4 mb-sm-0 teks-section-content">
                <div class="shadow bg-white p-3 p-sm-4 rounded-2 h-100 d-block">
                  <p class="small text-dark">
                    <strong>VD:</strong> Bạn muốn tra cứu lương của vị trí việc làm kế toán thuế thuộc ngành kế toán bạn
                    nhập công việc mong muốn là "<strong>kế toán thuế</strong>", chọn địa điểm <strong>Hà Nội</strong> và
                    bắt đầu tra cứu mức lương
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
  </section> --}}

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
                  <button type="button" data-bs-target="#carousel9" data-bs-slide-to="1" aria-label="Slide 2"></button>
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
                            Rzcareer có App trên điện thoại dễ dùng, có thể nhận thông báo và chat với NTD. Phần nào không
                            biết có thể chat với Support trên App, họ hướng dẫn chi tiết lắm. Tìm việc ở trên này cũng đơn
                            giản. Có cái tính năng tìm việc xung quanh vị trí bạn đang đứng với bán kính bao nhiêu km cũng
                            hay.
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
                            Mình biết đến Rzcareer qua sự giới thiệu của một người bạn nên cũng thử tìm việc trên đó xem
                            thế nào. Với việc làm Content mà mình tìm kiếm thì có khá đa dạng các ngành nghề, lĩnh vực
                            tuyển dụng nên mình cũng may mắn tìm được việc làm phù hợp. Tìm việc trên Rzcareer thì mình có
                            thể tạo CV online rồi apply trực tiếp nên cũng tiện lợi. Nhất là có cái tính năng phân tích
                            CV, sửa lỗi CV, nó giúp mình biết CV cần chỉnh sửa những gì, cái đó mình thấy khá hay.
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
                            Mình đã có 1 trải nghiệm tốt khi tải ứng dụng, đăng ký tài khoản Rzcareer. Sau khi hoàn thành
                            hồ sơ cá nhân hệ thống đã chủ động tìm và gợi ý việc làm đến mình dựa theo những thông tin mà
                            mình đã cung cấp. Ứng dụng có rất nhiều ưu điểm ví dụ như nộp hồ sơ nhanh, chat trực tiếp với
                            nhà tuyển dụng & thông tin doanh nghiệp rõ ràng chi tiết. Mình rất an tâm và hài lòng khi sử
                            dụng.
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
                            Tôi đã sử dụng nhiều ứng dụng khác nhau trước khi biết tới Rzcareer, nhưng đây thực sự là một
                            ứng dụng tuyệt vời. Tôi rất thích tính năng tạo CV online nhanh chóng, được phân tích và sửa
                            lỗi CV hoàn toàn miễn phí từ Rzcareer. Giao diện của ứng dụng cũng rất dễ sử dụng, tất cả đều
                            được sắp xếp một cách rõ ràng và logic, giúp tôi dễ dàng tìm thấy những gì tôi cần mà không
                            cần mất quá nhiều thời gian. Rzcareer có đầy đủ ngành nghề tôi quan tâm với những mức offer
                            tốt, hơn nữa tôi còn dễ dàng tìm kiếm việc gần khu vực tôi ở. Đánh giá 5 sao nhé!
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
                            Mình sử dụng app Rzcareer để tìm việc làm từ 3 năm trước và rất thích các tính năng của app
                            như việc làm nhanh, tạo CV dạng PDF và ứng tuyển bằng điện thoại. NTD cũng liên hệ sớm, không
                            bị tình trạng tin đăng ảo rồi không ai gọi như một số bên khác.
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
                            Em mới ra trường, chưa biết cách làm CV như thế nào. May có một chị người quen bảo lên website
                            Rzcareer.vn tạo CV, được hướng dẫn chi tiết. Trên Rzcareer còn có phần phân tích CV rất hữu
                            ích, em có thể biết được mình đang thiếu thông tin gì và bổ sung.
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
                            Rzcareer giúp em tìm thấy công việc phù hợp với mình thông qua các đề xuất được cập nhật qua
                            email mỗi ngày. Em đã tìm thấy nhiều cơ hội thực tập uy tín để xây dựng kinh nghiệm thực tế
                            trong lĩnh vực Marketing mà mình yêu thích.
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
                            Mình đã trải qua 2 tháng liên tục bị các NTD từ chối. Sau đó mình đã nhìn thấy quảng cáo của
                            Rzcareer và cập nhật CV lên website. Nhờ tính năng phân tích CV mà mình biết CV cần khắc phục
                            những lỗi gì và hiện đã có NTD liên hệ mời phỏng vấn.
                          </p>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel9" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel9" data-bs-slide="next">
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
                            Tôi rất hài lòng với web Rzcareer! Tôi nhận được phản hồi từ các NTD rất nhanh. Giao diện mới
                            giúp tôi thực hiện các thao tác dễ dàng hơn và tôi đã nhận được nhiều lời mời phỏng vấn từ các
                            công ty lớn.
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
                            Tôi từng làm kế toán và sau đó chuyển sang Marketing. Sử dụng CV tự làm của mình, tôi đã nhận
                            được phản hồi rất kém từ các NTD. Sau khi update CV của mình lên Rzcareer AI, tôi đã được
                            feedback rất chi tiết và đã nhận được nhiều cuộc phỏng vấn.
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
                            Mình đã luôn nghĩ rằng CV dài 3 trang A4 của bản thân thật hoàn hảo. Ôi, nhưng mình đã sai
                            lầm! Từ khi biết đến tình năng Rzcareer AI, mình đã có một CV ngắn gọn, chính xác, chuyên
                            nghiệp và tự tin gửi cho các nhà tuyển dụng tiềm năng.
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
                            Trước kia, khi tôi đăng CV lên các trang tuyển dụng, tôi nhận được rất ít phản hồi, thậm chí
                            là không có. Kể từ khi tôi bắt đầu đăng CV lên Rzcareer.vn, tôi đã nhận được ba phản hồi liên
                            quan đến nghề nghiệp của mình chỉ trong 1 tuần.
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
                            Rzcareer đã làm rất tốt và tôi chắc chắn giới thiệu app tìm việc này tới bạn bè của tôi. Nhân
                            viên làm việc rất chuyên nghiệp. Tôi được hướng dẫn chi tiết từ A-Z, giao diện mới cũng giúp
                            tôi thao tác nhanh chóng. Đồng thời, tỷ lệ phản hồi từ nhà tuyển dụng rất cao.
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
                            Mình sử dụng app Rzcareer để tìm việc làm từ 3 năm trước và rất thích các tính năng của app
                            như việc làm nhanh, tạo CV dạng PDF và ứng tuyển bằng điện thoại. NTD cũng liên hệ sớm, không
                            bị tình trạng tin đăng ảo rồi không ai gọi như một số bên khác.
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
                            Em mới ra trường, chưa biết cách làm CV như thế nào. May có một chị người quen bảo lên website
                            Rzcareer.vn tạo CV, được hướng dẫn chi tiết. Trên Rzcareer còn có phần phân tích CV rất hữu
                            ích, em có thể biết được mình đang thiếu thông tin gì và bổ sung.
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
                            Tôi nghỉ việc để chăm sóc con cái cũng đã gần 2 năm. Nay ứng tuyển lại thực sự khó khăn, may
                            nhờ app Rzcareer gợi ý các danh sách việc làm phù hợp mà tôi đã giành được 2 cuộc phỏng vấn.
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
                            Rzcareer giúp em tìm thấy công việc phù hợp với mình thông qua các đề xuất được cập nhật qua
                            email mỗi ngày. Em đã tìm thấy nhiều cơ hội thực tập uy tín để xây dựng kinh nghiệm thực tế
                            trong lĩnh vực Marketing mà mình yêu thích.
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
                            Mình đã trải qua 2 tháng liên tục bị các NTD từ chối. Sau đó mình đã nhìn thấy quảng cáo của
                            Rzcareer và cập nhật CV lên website. Nhờ tính năng phân tích CV mà mình biết CV cần khắc phục
                            những lỗi gì và hiện đã có NTD liên hệ mời phỏng vấn.
                          </p>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel10" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel10" data-bs-slide="next">
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
          <a class="btn btn-primary m-auto d-block" href="/candidate/import-cv-data">Tạo CV ngay</a>
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

  </html>

  </div>
