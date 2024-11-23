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
                                                <div class="col-sm-9">

                                                    <div class="teks-search-form">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div
                                                                    class="inner-header-page inner-header-page video-sec dark mrg-bot-10">
                                                                    <div class="container-bk">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-sm-offset-1-bk">
                                                                                <div>
                                                                                    <form wire:submit.prevent="search"
                                                                                        class="bt-form clearfix">
                                                                                        <!-- Prevent default submit -->
                                                                                        <div
                                                                                            class="row no-mrg teks-search">
                                                                                            <div
                                                                                                class="col-xs-5 padd0 colorgb-search">
                                                                                                <input type="search"
                                                                                                    wire:model.live="keyword"
                                                                                                    onfocus="this.select()"
                                                                                                    class="form-control br-1"
                                                                                                    id="jobRole"
                                                                                                    placeholder="Việc, công ty, ngành nghề...">
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-xs-4 padd0 colorgb-place">
                                                                                                <input type="search"
                                                                                                    wire:model.live="location"
                                                                                                    wire:focus="toggleListVisibility"
                                                                                                    wire:blur="hideList"
                                                                                                    onfocus="this.select()"
                                                                                                    class="form-control br-1"
                                                                                                    id="jobPlace"
                                                                                                    placeholder="Tỉnh/thành, quận...">
                                                                                                @if ($isListVisible)
                                                                                                <div class="easy-autocomplete-container"
                                                                                                    id="eac-container-jobPlace">
                                                                                                    <ul
                                                                                                        style="display : block">
                                                                                                        @foreach($listLocation
                                                                                                        as $loc)
                                                                                                        <li wire:click="selectLocation('{{ $loc->district->name }} - {{ $loc->city->name }}')"
                                                                                                            class="cursor-pointer">
                                                                                                            <div
                                                                                                                class="eac-item">
                                                                                                                {{$loc->district->name}}
                                                                                                                -
                                                                                                                {{$loc->city->name}}
                                                                                                            </div>
                                                                                                        </li>
                                                                                                        @endforeach

                                                                                                    </ul>

                                                                                                </div>
                                                                                                @endif
                                                                                            </div>

                                                                                            <div
                                                                                                class="col-xs-3 colorgb-submit padd0">
                                                                                                <button
                                                                                                    class="btn btn-success btn-block text-uppercase"
                                                                                                    type="submit">
                                                                                                    <i
                                                                                                        class="bx hide bx-search-alt bx-sm text-white"></i>
                                                                                                    <span
                                                                                                        class="hidden-x">Tìm
                                                                                                        việc</span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>


                                                                                    <div>
                                                                                        <!-- Display job posts -->
                                                                                        {{-- @foreach($jobPosts as $job)
                                                                                        <div class="job-post">
                                                                                            <h4>{{ $job->job_name }}
                                                                                            </h4>
                                                                                            <p>{{ $job->company->name }}
                                                                                            </p>
                                                                                            <p>{{
                                                                                                $job->location->city->name
                                                                                                }}</p>
                                                                                        </div>
                                                                                        @endforeach --}}

                                                                                        <!-- Pagination Links -->
                                                                                        {{-- {{ $jobPosts->links() }}
                                                                                        --}}
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <script>
                                                                    function onlyUnique(n, e, i) {
                                                            return i.indexOf(n) === e
                                                        }

                                                        function cleanArray(actual) {
                                                            var newArray = new Array();
                                                            for (var i = 0; i < actual.length; i++) {
                                                                if (actual[i]) {
                                                                    newArray.push(actual[i]);
                                                                }
                                                            }
                                                            return newArray;
                                                        }

                                                        function jobRoleSearch(t) {
                                                            if (t.getAttribute('data-val').includes('tại')) {
                                                                var a = t.getAttribute('data-val').split(" tại ");
                                                                document.getElementById("jobRole").value = a[0];
                                                                document.getElementById("jobPlace").value = a[1];
                                                            } else {
                                                                document.getElementById("jobRole").value = t.getAttribute('data-val');
                                                            }
                                                        }

                                                        function jobPlaceSearch(t) {
                                                            document.getElementById("jobPlace").value = t.getAttribute('data-val');
                                                        }

                                                        window.addEventListener('load', function() {
                                                            $(function() {
                                                                /**/
                                                                $("#jobRole,#jobPlace").on("focus", function() {
                                                                    $('.colorgb-search').addClass('show');
                                                                    $('.colorgb-place').addClass('show');
                                                                    $('.colorgb-salary').addClass('show');
                                                                    $('.colorgb-submit').addClass('show');
                                                                });
                                                                var kws = JSON.parse(localStorage.getItem('Rzcareer-candidate-skl'));
                                                                if (kws) {
                                                                    kws = kws.reverse();
                                                                }
                                                                kws = kws ? kws : [];

                                                                kws.push('Tài Chính/Ngân Hàng');
                                                                kws = kws.filter(onlyUnique);
                                                                kws = cleanArray(kws);
                                                                kws = kws.reverse();
                                                                kws = kws.slice(0, 6);
                                                                localStorage.setItem('Rzcareer-candidate-skl', JSON.stringify(kws));

                                                                if (kws.length > 0) {
                                                                    var html =
                                                                        '<div class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20"><div class="mrg-bot-5 h4"> Tìm kiếm gần đây<a href="javascript:void(0)" class="pull-right"> <i class="fa fa-angle-double-down"></i></a></div><ul class="sidebar-list expandible-bk">';
                                                                    var count = kws.length > 6 ? 6 : kws.length; /**/
                                                                    for (var i = 0; i < count; i++) {
                                                                        html += '<li><a rel="nofollow" title="Việc làm ' + kws[i] +
                                                                            '" href="https://Rzcareer.vn/viec-lam-' + colorgbSlug(kws[i]) +
                                                                            '.html"> <h2 class="txt">' + kws[i] + '</h2> </a></li>';
                                                                    }
                                                                    html += '</ul></div>';
                                                                    $('.blog-sidebar').prepend(html); /**/
                                                                    $('#jobRole').focus(function() {
                                                                        var kw = '';
                                                                        var kws = JSON.parse(localStorage.getItem('Rzcareer-candidate-skl'));
                                                                        var count = kws.length > 10 ? 10 : kws.length;
                                                                        for (var i = 0; i < count; i++) {
                                                                            kw += '<li onclick="jobRoleSearch(this)" data-val="' + kws[i] +
                                                                                '"><div class="eac-item">' + kws[i] + '</div></li>';
                                                                        }
                                                                        $('#eac-container-jobRole ul').html(kw).show();
                                                                    });
                                                                }

                                                                var pl = JSON.parse(localStorage.getItem('Rzcareer-candidate-search-place-log'));
                                                                pl = pl ? pl : [];
                                                                pl.push('');
                                                                pl = pl.filter(onlyUnique);
                                                                pl = cleanArray(pl);
                                                                pl = pl.reverse();
                                                                localStorage.setItem('Rzcareer-candidate-search-place-log', JSON.stringify(pl));

                                                                if (pl) {
                                                                    var count = kws.length > 10 ? 10 : kws.length; /**/
                                                                    $('#jobPlace').focus(function() {
                                                                        var p = '';
                                                                        var pl = JSON.parse(localStorage.getItem(
                                                                            'Rzcareer-candidate-search-place-log'));
                                                                        var count = pl.length > 10 ? 10 : pl.length;
                                                                        for (var i = 0; i < count; i++) {
                                                                            p += '<li onclick="jobPlaceSearch(this)" data-val="' + pl[i] +
                                                                                '"><div class="eac-item">' + pl[i] + '</div></li>';
                                                                        }
                                                                        $('#eac-container-jobPlace ul').html(p).show();
                                                                    });
                                                                }
                                                            })
                                                        });
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row-ajax">

                                                        <div class="row">
                                                            <div class="col-sm-12">

                                                                <div class="row inner-header-page"
                                                                    style=" padding: 0 !important; min-height: initial !important; ">
                                                                    <div class="mt-10 col-sm-12">
                                                                        @php
                                                                        $careerName = null;
                                                                        if ($career_id) {
                                                                        $career =
                                                                        App\Models\CommonCareer::find($career_id);
                                                                        $careerName = $career ? $career->name : null;
                                                                        }
                                                                        @endphp
                                                                        <div class="fillters clearfix">
                                                                            <div class="teks-category dropdown "
                                                                                title="Ngành nghề">
                                                                                <button
                                                                                    class="btn btn-xs dropdown-toggle"
                                                                                    type="button"
                                                                                    data-toggle="dropdown"><i
                                                                                        class="bx bxs-category"></i>
                                                                                    {{ $careerName?? "Ngành
                                                                                    nghề" }}
                                                                                    <span class="caret"></span>
                                                                                </button>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-left">
                                                                                    @foreach(App\Models\CommonCareer::withCount('jobPosts')->orderBy('id',
                                                                                    'desc')->get() as $career_item)


                                                                                    <li>
                                                                                        <a wire:click.prevent="updateFilter('career_id', '{{ $career_item->id }}')"
                                                                                            class="dropdown-item">
                                                                                            {{ $career_item->name
                                                                                            }}
                                                                                        </a>
                                                                                    </li>


                                                                                    @endforeach

                                                                                    @if ($career_id)

                                                                                    <li>
                                                                                        <a href="#"
                                                                                            wire:click.prevent="updateFilter('career_id', '')"
                                                                                            class="dropdown-item text-warning">Bỏ
                                                                                            chọn
                                                                                            <i
                                                                                                class="bx bx-x-circle"></i>
                                                                                        </a>

                                                                                    </li>
                                                                                    @endif
                                                                                </ul>

                                                                            </div>
                                                                            <style>
                                                                                .inner-header-page h2 {
                                                                                    color: inherit;
                                                                                    font-size: inherit !important;
                                                                                    line-height: inherit;
                                                                                    text-transform: inherit;
                                                                                    margin: inherit;
                                                                                    font-weight: inherit
                                                                                }
                                                                            </style>
                                                                            <div class="dropdown " title="Ngành Nghề">

                                                                                <button id="jobTypeButton"
                                                                                    class="btn btn-xs dropdown-toggle"
                                                                                    type="button"
                                                                                    data-toggle="dropdown">
                                                                                    <i class="bx bx-briefcase"></i>
                                                                                    {{ $job_type ?: 'Loại hình' }}
                                                                                    <span class="caret"></span>
                                                                                </button>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-left">
                                                                                    @foreach(App\Models\JobPost::select('job_type')->distinct()->get()
                                                                                    as $jobType_item)
                                                                                    <li>
                                                                                        <a wire:click.prevent="updateFilter('job_type', '{{ $jobType_item->job_type }}')"
                                                                                            class="dropdown-item">
                                                                                            {{ $jobType_item->job_type
                                                                                            }}
                                                                                        </a>
                                                                                    </li>
                                                                                    @endforeach
                                                                                    @if ($job_type)
                                                                                    <li class="divider"></li>

                                                                                    <li>
                                                                                        <a href="#"
                                                                                            wire:click.prevent="updateFilter('job_type', '')"
                                                                                            class="dropdown-item text-warning">Bỏ
                                                                                            chọn
                                                                                            <i
                                                                                                class="bx bx-x-circle"></i>
                                                                                        </a>

                                                                                    </li>
                                                                                    @endif
                                                                                </ul>

                                                                                {{-- <script>
                                                                                    function selectJobType(jobType) {
                                                                                        var button = document.getElementById("jobTypeButton");
                                                                                        button.innerHTML = '<i class="bx bx-briefcase"></i> ' + (jobType || 'Tất cả loại hình') + ' <span class="caret"></span>';
                                                                                        Livewire.emit('setJobType', jobType);
                                                                                    }
                                                                                </script> --}}


                                                                            </div>
                                                                            <div class="dropdown " title="Mức lương">
                                                                                <button
                                                                                    class="btn btn-xs dropdown-toggle"
                                                                                    type="button"
                                                                                    data-toggle="dropdown"><i
                                                                                        class="bx bx-money"></i>
                                                                                    @if($salary &&
                                                                                    isset($salaryRanges[$salary]))
                                                                                    {{ $salaryRanges[$salary] }}
                                                                                    @else
                                                                                    Mức lương
                                                                                    @endif
                                                                                    <span class="caret"></span>
                                                                                </button>

                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-left">
                                                                                    @foreach($salaryRanges as $range =>
                                                                                    $range_label)
                                                                                    <li>
                                                                                        <a wire:click.prevent="updateFilter('salary', '{{ $range }}')"
                                                                                            class="dropdown-item">
                                                                                            {{ $range_label }}
                                                                                        </a>
                                                                                    </li>
                                                                                    @endforeach
                                                                                    @if ($salary)


                                                                                    <li class="divider"></li>

                                                                                    <li>
                                                                                        <a href="#"
                                                                                            wire:click.prevent="updateFilter('salary', '')"
                                                                                            class="dropdown-item text-warning">Bỏ
                                                                                            chọn
                                                                                            <i
                                                                                                class="bx bx-x-circle"></i>
                                                                                        </a>

                                                                                    </li>
                                                                                    @endif
                                                                                </ul>
                                                                            </div>

                                                                            <div class="dropdown " title="Chức vụ">
                                                                                <button
                                                                                    class="btn btn-xs dropdown-toggle"
                                                                                    type="button"
                                                                                    data-toggle="dropdown"><i
                                                                                        class="bx bx-user"></i>{{
                                                                                    $position ?: 'Chức vụ' }}
                                                                                    <span class="caret"></span>
                                                                                </button>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-left">
                                                                                    @foreach(App\Models\JobPost::select('position')->distinct()->get()
                                                                                    as $position_item)

                                                                                    <li>
                                                                                        <a wire:click.prevent="updateFilter('position', '{{$position_item->position }}')"
                                                                                            class="dropdown-item">
                                                                                            {{ $position_item->position
                                                                                            }}
                                                                                        </a>
                                                                                    </li>
                                                                                    @endforeach
                                                                                    @if ($position)

                                                                                    <li class="divider"></li>

                                                                                    <li>
                                                                                        <a href="#"
                                                                                            wire:click.prevent="updateFilter('position', '')"
                                                                                            class="dropdown-item text-warning">Bỏ
                                                                                            chọn
                                                                                            <i
                                                                                                class="bx bx-x-circle"></i>
                                                                                        </a>

                                                                                    </li>
                                                                                    @endif

                                                                                </ul>
                                                                            </div>

                                                                            <div class="dropdown " title="Kinh nghiệm">
                                                                                <button
                                                                                    class="btn btn-xs dropdown-toggle"
                                                                                    type="button"
                                                                                    data-toggle="dropdown"><i
                                                                                        class="bx bx-star"></i> Kinh
                                                                                    nghiệm <span class="caret"></span>
                                                                                </button>
                                                                                <?php
                                                                                $experiences = [
                                                                                '0-1 years' => 'Dưới 1 năm',
                                                                                '2-3 years' => '2 - 3 năm',
                                                                                '3-5 years' => '3 - 5 năm',
                                                                                '5-10 years' => '5 - 10 năm'
                                                                            ];?>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-left">
                                                                                    @foreach($experiences as $exp =>
                                                                                    $exp_label)
                                                                                    <li>
                                                                                        <a wire:click.prevent="updateFilter('experience','{{ $exp }}')"
                                                                                            class="dropdown-item">
                                                                                            {{ $exp_label }}
                                                                                        </a>
                                                                                    </li>
                                                                                    @endforeach

                                                                                    @if ($experience)
                                                                                    <li class="divider"></li>
                                                                                    <li>
                                                                                        <a href="#"
                                                                                            wire:click.prevent="updateFilter('experience', '')"
                                                                                            class="dropdown-item text-warning">Bỏ
                                                                                            chọn
                                                                                            <i
                                                                                                class="bx bx-x-circle"></i>
                                                                                        </a>

                                                                                    </li>
                                                                                    @endif
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <!-- Dropdown cho Mức lương -->

                                                                <div class="clearfix bg-bc">

                                                                    <ol class="breadcrumb hidden-xs" itemscope=""
                                                                        itemtype="http://schema.org/BreadcrumbList">
                                                                        <meta itemprop="itemListOrder"
                                                                            content="ItemListOrderAscending">
                                                                        <li itemprop="itemListElement" itemscope=""
                                                                            itemtype="https://schema.org/ListItem"><a
                                                                                href="https://Rzcareer.vn"
                                                                                itemtype="https://schema.org/Thing"
                                                                                itemprop="item"> <span itemprop="name">
                                                                                    Rzcareer</span> </a>
                                                                            <meta itemprop="position" content="1">
                                                                        </li>
                                                                        <li itemprop="itemListElement" itemscope=""
                                                                            itemtype="https://schema.org/ListItem"><a
                                                                                href="/danh-sach-viec-lam"
                                                                                itemtype="https://schema.org/Thing"
                                                                                itemprop="item"> <span
                                                                                    itemprop="name">Việc
                                                                                    làm</span> </a>
                                                                            <meta itemprop="position" content="2">
                                                                        </li>
                                                                   
                                                                    </ol>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix colorgb-carousel-bk v2">
                                                            <div class="sidebar-widget-title mrg-bot-10">
                                                                <h1>Tuyển dụng {{ $totalJobs }} việc làm</h1>
                                                                <span class="pull-right">
                                                                    <span class="hidden-xs">Việc</span> 1 - {{
                                                                    $jobPosts->count() }} / {{ $totalJobs }}
                                                                </span>
                                                            </div>

                                                            @if($keyword || $location)
                                                            <div class="search-keyword">
                                                                <p>Kết quả tìm kiếm cho từ khóa: <strong>{{ $keyword
                                                                        }}</strong></p>
                                                                @if($location)
                                                                <p>Trong khu vực: <strong>{{ $location }}</strong></p>
                                                                @endif

                                                            </div>
                                                            @endif


                                                            <div class="row">
                                                                <div class="col-sm-12">


                                                                    <div class="sort">
                                                                        <div class="teks-dropdown dropdown">
                                                                            <ul class="list list-inline list-unstyled">
                                                                                <li><strong class="text-muted">Hiển thị
                                                                                        theo:</strong></li>

                                                                                <li class="">
                                                                                    <span
                                                                                        class="a {{ $activeSort === 'relevance' ? 'active' : '' }}"
                                                                                        wire:click="sortBy('relevance')"
                                                                                        data-sort="true">
                                                                                        <img src="{{ $activeSort === 'relevance' ? asset('assets_livewire/img/2024/ic18.svg') : asset('assets_livewire/img/2024/ic17.svg') }}"
                                                                                            alt="Rzcareer"
                                                                                            loading="lazy">
                                                                                        Phù hợp nhất
                                                                                    </span>
                                                                                </li>

                                                                                <li class="">
                                                                                    <span
                                                                                        class="a {{ $activeSort === 'created_at' ? 'active' : '' }}"
                                                                                        wire:click="sortBy('created_at')"
                                                                                        data-sort="true">
                                                                                        <img src="{{ $activeSort === 'created_at' ? asset('assets_livewire/img/2024/ic18.svg') : asset('assets_livewire/img/2024/ic17.svg') }}"
                                                                                            alt="Rzcareer"
                                                                                            loading="lazy">
                                                                                        Việc mới đăng
                                                                                    </span>
                                                                                </li>

                                                                                <li class="">
                                                                                    <span
                                                                                        class="a {{ $activeSort === 'updated_at' ? 'active' : '' }}"
                                                                                        wire:click="sortBy('updated_at')"
                                                                                        data-sort="true">
                                                                                        <img src="{{ $activeSort === 'updated_at' ? asset('assets_livewire/img/2024/ic18.svg') : asset('assets_livewire/img/2024/ic17.svg') }}"
                                                                                            alt="Rzcareer"
                                                                                            loading="lazy">
                                                                                        Mới cập nhật
                                                                                    </span>
                                                                                </li>

                                                                                <li class="">
                                                                                    <span
                                                                                        class="a {{ $activeSort === 'salary_min' ? 'active' : '' }}"
                                                                                        wire:click="sortBy('salary_min')"
                                                                                        data-sort="true">
                                                                                        <img src="{{ $activeSort === 'salary_min' ? asset('assets_livewire/img/2024/ic18.svg') : asset('assets_livewire/img/2024/ic17.svg') }}"
                                                                                            alt="Rzcareer"
                                                                                            loading="lazy">
                                                                                        Lương thấp tới cao
                                                                                    </span>
                                                                                </li>
                                                                            </ul>

                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>

                                                            <div class="item-bk mrg-top-10">
                                                                <div class="mrg-bot-20 clearfix">
                                                                    <div class="item">
                                                                        @foreach($jobPosts as $jobPost)
                                                                        <div class="item-click red ruby">
                                                                            <article class="article">
                                                                                <div class="brows-job-list">
                                                                                    <div class="col-sm-12">
                                                                                        <div
                                                                                            class="item-fl-box clearfix">
                                                                                            <div
                                                                                                class="brows-job-company-img">
                                                                                                <a title="{{ $jobPost->job_name }}"
                                                                                                    href="{{ url('viec-lam/' . $jobPost->slug) }}">
                                                                                                    <img width="65"
                                                                                                        height="65"
                                                                                                        onerror="this.src='{{ asset('assets_livewire/img/default-company.svg') }}'"
                                                                                                        title="{{ $jobPost->job_name }} - {{ $jobPost->company->company_name }}"
                                                                                                        loading="lazy"
                                                                                                        src="{{ Storage::url($jobPost->company->company_image_url) }}"
                                                                                                        alt="{{ $jobPost->company->company_name }}"
                                                                                                        class="img-responsive">
                                                                                                </a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="brows-job-position">
                                                                                                <h3 class="h3 tooltip"
                                                                                                    title="{{ $jobPost->job_name }}">
                                                                                                    <a target="_blank"
                                                                                                        href="{{ url('viec-lam/' . $jobPost->slug) }}"
                                                                                                        title="{{ $jobPost->job_name }}">
                                                                                                        {{
                                                                                                        $jobPost->job_name
                                                                                                        }}
                                                                                                    </a>
                                                                                                </h3>
                                                                                                <p class="font-13">
                                                                                                    <a title="{{ $jobPost->company->company_name }}"
                                                                                                        class="font-italic"
                                                                                                        href="{{ url('tuyen-dung/' . $jobPost->company->slug) }}">
                                                                                                        {{
                                                                                                        $jobPost->company->company_name
                                                                                                        }}
                                                                                                    </a>
                                                                                                </p>

                                                                                                <p class="font-12">
                                                                                                    <span
                                                                                                        data-toggle="tooltip"
                                                                                                        title="Địa điểm: {{ $jobPost->location->name }}">
                                                                                                        <i
                                                                                                            class="bx bx-map"></i>{{
                                                                                                        $jobPost->company->city_name
                                                                                                        }}
                                                                                                    </span>
                                                                                                    <span
                                                                                                        data-toggle="tooltip"
                                                                                                        title="Mức lương: {{ $jobPost->salary_min / 1000000 }} - {{ $jobPost->salary_max / 1000000 }} {{ $jobPost->salary_type }}">
                                                                                                        <i
                                                                                                            class="bx bx-money"></i>{{
                                                                                                        number_format($jobPost->salary_min
                                                                                                        / 1000000, 0)
                                                                                                        }}tr - {{
                                                                                                        number_format($jobPost->salary_max
                                                                                                        / 1000000, 0)
                                                                                                        }}tr {{
                                                                                                        $jobPost->salary_type
                                                                                                        }}
                                                                                                    </span>

                                                                                                    <span
                                                                                                        data-toggle="tooltip"
                                                                                                        title="Loại hình: {{ $jobPost->type_of_workplace }}">
                                                                                                        <i
                                                                                                            class="bx bx-briefcase"></i>{{
                                                                                                        $jobPost->type_of_workplace
                                                                                                        }}
                                                                                                    </span>
                                                                                                </p>

                                                                                                <p class="font-12">
                                                                                                    <span
                                                                                                        data-toggle="tooltip"
                                                                                                        title="Yêu cầu kinh nghiệm: {{ $jobPost->experience }}">
                                                                                                        <i
                                                                                                            class="bx bx-star"></i>{{
                                                                                                        $jobPost->experience
                                                                                                        }}
                                                                                                    </span>
                                                                                                    <span
                                                                                                        data-toggle="tooltip"
                                                                                                        title="Thời gian cập nhật: {{ $jobPost->updated_at->diffForHumans() }}">
                                                                                                        <i
                                                                                                            class="bx bx-refresh"></i>{{
                                                                                                        $jobPost->updated_at->diffForHumans()
                                                                                                        }}
                                                                                                    </span>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div title="Tin RUBY"
                                                                                    class="tg-themetag tg-featuretag ruby">
                                                                                    ruby</div>
                                                                            </article>
                                                                        </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="clearfix mrg-top-5" id="pagination">
                                                            <div class="text-center">
                                                                <ul class="pagination">
                                                                    <li
                                                                        class="prev {{ $jobPosts->onFirstPage() ? 'disabled' : '' }}">
                                                                        <a href="{{ $jobPosts->previousPageUrl() }}"
                                                                            data-page="{{ $jobPosts->currentPage() - 1 }}">&laquo;</a>
                                                                    </li>
                                                                    @for ($i = 1; $i <= $jobPosts->lastPage(); $i++)
                                                                        <li
                                                                            class="{{ $jobPosts->currentPage() == $i ? 'active' : '' }}">
                                                                            <a href="{{ $jobPosts->url($i) }}"
                                                                                data-page="{{ $i }}">{{ $i }}</a>
                                                                        </li>
                                                                        @endfor
                                                                        <li
                                                                            class="next {{ !$jobPosts->hasMorePages() ? 'disabled' : '' }}">
                                                                            <a href="{{ $jobPosts->nextPageUrl() }}"
                                                                                data-page="{{ $jobPosts->currentPage() + 1 }}">&raquo;</a>
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                        </div>


                                                    </div>


                                                </div>
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