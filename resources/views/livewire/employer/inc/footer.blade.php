<footer class="footer bg-white pt-4 pt-sm-5 pb-3">
    <div class="no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="footer-widget">
                        <div class="widgettitle widget-title text-dark fw-bold">CÔNG TY CỔ PHẦN Rzcareer</div>
                        <div class="textwidget">
                            <p><strong>Email:</strong> contact@Rzcareer.vn<br /><strong
                                    title="Chăm sóc ứng viên">Hỗ trợ ứng viên:</strong> 0999.999.999<br>
                                <strong>Hotline:</strong> 0999.999.999
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-sm-3 col-6 col-xs-6 col-md-2">
                    <div class="footer-widget">
                        <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo địa điểm">Việc theo
                            địa điểm
                        </div>
                        <div class="textwidget">
                            <div class="textwidget">
                                <ul class="footer-navigation list-unstyled">
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
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-6 col-xs-6 col-md-2">
                    <div class="footer-widget">
                        <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo ngành nghề">Việc
                            theo ngành
                            nghề</div>
                        <div class="textwidget">
                            <ul class="footer-navigation list-unstyled">
                                @foreach(
                                    App\Models\CommonCareer::withCount('jobPosts') // Count related job posts
                                    ->orderBy('job_posts_count', 'desc') // Sort by the number of job posts
                                    ->limit(5) // Limit to top 5 careers
                                    ->get() as $career)
                                    <li>
                                        <a href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => $career->id]) }}"
                                            title="{{$career->name}}">
                                            <div class="txt text-capitalize">{{$career->name}}</div>
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => '']) }}"
                                        title="Xem tất cả ngành nghề">
                                        <div class="txt text-capitalize">Xem tất cả</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-6 col-xs-6 col-md-2">
                    <div class="footer-widget">
                        <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo Vị trí/Chức vụ">
                            Việc theo chức
                            danh</div>
                        <div class="textwidget">
                            <ul class="footer-navigation list-unstyled">
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
                    </div>
                </div>
                <div class="col-sm-3 col-6 col-xs-6 col-md-2">
                    <div class="footer-widget">
                        <div class="widgettitle widget-title text-dark fw-bold" title="Việc làm theo loại hình">Việc
                            theo loại hình
                        </div>
                        <div class="textwidget">
                            <ul class="footer-navigation list-unstyled">

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
                            <ul class="footer-social visible-xs d-block d-sm-none list-inline mb-1">
                                <li class="list-inline-item"><i class='bx bx-xs bxl-facebook'></i></li>
                                <li class="list-inline-item"><i class='bx bx-xs bxl-linkedin'></i></li>
                                <li class="list-inline-item"><i class='bx bx-xs bxl-instagram'></i></li>
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

                </div>
                <div class="col-12 col-sm-2">
                    <ul class="footer-social text-center hidden-xs d-none d-sm-block list-inline mb-1">
                        <li class="list-inline-item"><i class='bx bx-xs bxl-facebook'></i></li>
                        <li class="list-inline-item"><i class='bx bx-xs bxl-linkedin'></i></li>
                        <li class="list-inline-item"><i class='bx bx-xs bxl-instagram'></i></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <p class="pull-left small text-body">  © 2024 Công ty Cổ phần Rzcareer. All Rights Reserved.</p>
                </div>

            </div>
        </div>
    </div>
</footer>
