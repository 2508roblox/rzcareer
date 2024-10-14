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
            <div>
              <a href="/" title="Jobs on the GO" class="d-flex text-decoration-none">
                  <img width="134" height="40" src="/assets_livewire/logo-light.svg" alt="RZCareer">
                </a>
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
                  @foreach(App\Models\JobPost::select('job_type')
                  ->distinct()
                  ->orderBy('job_type', 'asc')
                  ->limit(10)
                  ->get() as $career)
                  <li>
                      <a
                         href="{{ route('danh-sach-viec-lam', ['keyword' => '', 'location' => '', 'career_id' => '', 'job_type' => $career->job_type]) }}">
                          Việc làm {{ $career->job_type }}
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
