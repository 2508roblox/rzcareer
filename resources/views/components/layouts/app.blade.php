<!DOCTYPE html>
<html lang="vi-VN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="description"
        content="JobsGO - Nền tảng tuyển dụng trực tuyến, App tuyển dụng, tìm việc làm nhanh trên Android và iOS. Kênh thông tin tuyển dụng và việc làm kết nối nhà tuyển dụng với ứng viên dễ dàng.">
    <meta name="title" content="JobsGO – Nền tảng tuyển dụng, tìm việc làm nhanh theo cách hoàn toàn mới">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://jobsgo.vn">
    <meta property="og:image" itemprop="thumbnailUrl" content="https://jobsgo.vn/media/img/cover-share.jpg">
    <meta property="og:description"
        content="JobsGO - Nền tảng tuyển dụng trực tuyến, App tuyển dụng, tìm việc làm nhanh trên Android và iOS. Kênh thông tin tuyển dụng và việc làm kết nối nhà tuyển dụng với ứng viên dễ dàng.">
    <meta property="og:title" content="JobsGO – Nền tảng tuyển dụng, tìm việc làm nhanh theo cách hoàn toàn mới">
    <meta property="fb:app_id" content="1590841851212703">
    <meta property="al:android:package" content="vn.ca.hope.candidate">
    <meta property="al:android:app_name" content="JobsGO">
    <meta property="al:ios:app_store_id" content="1234120247">
    <meta property="al:ios:app_name" content="JobsGO">
    <title>{{ $title ?? 'Page Title' }}</title>

    <link rel="preload" href="{{ asset('assets/teks/css/fonts/xn7gYHE41ni1AdIRggexSg.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/teks/css/fonts/xn7gYHE41ni1AdIRggixSuXd.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/teks/css/fonts/xn7gYHE41ni1AdIRggmxSuXd.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/teks/css/fonts/xn7gYHE41ni1AdIRggOxSuXd.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/teks/css/fonts/xn7gYHE41ni1AdIRggqxSuXd.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/teks/css/fonts/xn7gYHE41ni1AdIRggSxSuXd.woff2') }}" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="{{ asset('assets/teks/css/fonts/boxicons.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link href="{{ asset('assets/teks/css/icons.min.css?v=234208153091') }}" rel="stylesheet">
    <link href="{{ asset('assets/teks/css/base.min.css?v=234208153091') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css?v=1726838779') }}" rel="stylesheet">
    <script defer src="{{ asset('assets/teks/js/base.min.js?v=234208153091') }}"></script>

    <script data-type="lazy" data-src="https://www.googletagmanager.com/gtag/js?id=G-EHD5KK9TRQ"></script>

    <link href="{{ asset('assets/minify/minify.css') }}" rel="stylesheet">
    @livewireStyles



</head>

<body>

    <!-- Header Include -->
    @include('partials._header')

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer Include -->
    @include('partials._footer')
    @include('partials._toast')
    @include('modals._cv')

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Custom Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- Custom JS -->

    <!-- Additional Inline Scripts if needed -->
    @stack('scripts')

</body>


</html>
