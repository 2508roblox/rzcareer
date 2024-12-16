<div>
    <div>
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
                                                                <li wire:key="{{ str()->random(17) }}" wire:click="selectLocation('{{ $loc->district->name }} - {{ $loc->city->name }}')"
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
                                                <div class="fillters clearfix" style="
                                                margin-top: 1rem;
                                            ">
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
    
    
                                                            <li wire:key="{{ str()->random(17) }}">
                                                                <a   wire:click.prevent="updateCareerFilter( {{ $career_item->id }})"
                                                                    class="dropdown-item">
                                                                    {{ $career_item->name
                                                                    }}
                                                                </a>
                                                            </li>
    
    
                                                            @endforeach
    
                                                            @if ($career_id)
    
                                                            <li>
                                                                <a href="#"
                                                                    wire:click.prevent="updateCareerFilter('')"
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
                                                                <a wire:key="{{ str()->random(17) }}" wire:click.prevent="updateFilter('job_type', '{{ $jobType_item->job_type }}')"
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
                                                            <li wire:key="{{ str()->random(17) }}">
                                                                <a   wire:click.prevent="updateFilter('salary', '{{ $range }}')"
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
    
                                                            <li wire:key="{{ str()->random(17) }}">
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
                                                            <li wire:key="{{ str()->random(17) }}">
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
                                                class="a {{ $activeSort === 'job_name' ? 'active' : '' }}"
                                                wire:click="sortBy('job_name')"
                                                data-sort="true">
                                                <img src="{{ $activeSort === 'job_name' ? asset('assets_livewire/img/2024/ic18.svg') : asset('assets_livewire/img/2024/ic17.svg') }}"
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
                                                        <a style="color: #1772bd" title="{{ $jobPost->job_name }}"
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
                                                            <a style="color: #1772bd !important" target="_blank"
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
    </div>
    
</div>