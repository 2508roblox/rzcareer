<div>
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
                                                                <form class="bt-form clearfix">
                                                                    <div class="row no-mrg teks-search">
                                                                        <div class="col-xs-5 padd0 colorgb-search">
                                                                            <input type="search" value="Web"
                                                                                onfocus="this.select()"
                                                                                class="form-control br-1" id="jobRole"
                                                                                placeholder="Việc, công ty, ngành nghề..." />
                                                                        </div>
                                                                        <div class="col-xs-4 padd0 colorgb-place">
                                                                            <input type="search" value=""
                                                                                onfocus="this.select()"
                                                                                class="form-control br-1" id="jobPlace"
                                                                                placeholder="Tỉnh/thành, quận..." />
                                                                        </div>
                                                                        <div class="col-xs-3 colorgb-submit padd0">
                                                                            <button id="jobSearch" type="submit"
                                                                                class="btn btn-success btn-block text-uppercase"
                                                                                onclick="ga('send', 'event', 'Search', 'click', 'TÌM KIẾM VIỆC LÀM')">
                                                                                <i
                                                                                    class="bx hide bx-search-alt bx-sm text-white"></i>
                                                                                <span class="hidden-x">TÌM
                                                                                    VIỆC</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <script>
                                                    function onlyUnique(
                                                            n,
                                                            e,
                                                            i
                                                        ) {
                                                            return (
                                                                i.indexOf(n) ===
                                                                e
                                                            );
                                                        }

                                                        function cleanArray(
                                                            actual
                                                        ) {
                                                            var newArray =
                                                                new Array();
                                                            for (
                                                                var i = 0;
                                                                i <
                                                                actual.length;
                                                                i++
                                                            ) {
                                                                if (actual[i]) {
                                                                    newArray.push(
                                                                        actual[
                                                                            i
                                                                        ]
                                                                    );
                                                                }
                                                            }
                                                            return newArray;
                                                        }

                                                        function jobRoleSearch(
                                                            t
                                                        ) {
                                                            if (
                                                                t
                                                                    .getAttribute(
                                                                        "data-val"
                                                                    )
                                                                    .includes(
                                                                        "tại"
                                                                    )
                                                            ) {
                                                                var a = t
                                                                    .getAttribute(
                                                                        "data-val"
                                                                    )
                                                                    .split(
                                                                        " tại "
                                                                    );
                                                                document.getElementById(
                                                                    "jobRole"
                                                                ).value = a[0];
                                                                document.getElementById(
                                                                    "jobPlace"
                                                                ).value = a[1];
                                                            } else {
                                                                document.getElementById(
                                                                    "jobRole"
                                                                ).value =
                                                                    t.getAttribute(
                                                                        "data-val"
                                                                    );
                                                            }
                                                        }

                                                        function jobPlaceSearch(
                                                            t
                                                        ) {
                                                            document.getElementById(
                                                                "jobPlace"
                                                            ).value =
                                                                t.getAttribute(
                                                                    "data-val"
                                                                );
                                                        }

                                                        window.addEventListener(
                                                            "load",
                                                            function () {
                                                                $(function () {
                                                                    /**/ $(
                                                                        "#jobRole,#jobPlace"
                                                                    ).on(
                                                                        "focus",
                                                                        function () {
                                                                            $(
                                                                                ".colorgb-search"
                                                                            ).addClass(
                                                                                "show"
                                                                            );
                                                                            $(
                                                                                ".colorgb-place"
                                                                            ).addClass(
                                                                                "show"
                                                                            );
                                                                            $(
                                                                                ".colorgb-salary"
                                                                            ).addClass(
                                                                                "show"
                                                                            );
                                                                            $(
                                                                                ".colorgb-submit"
                                                                            ).addClass(
                                                                                "show"
                                                                            );
                                                                        }
                                                                    );
                                                                    var kws =
                                                                        JSON.parse(
                                                                            localStorage.getItem(
                                                                                "jobsgo-candidate-skl"
                                                                            )
                                                                        );
                                                                    if (kws) {
                                                                        kws =
                                                                            kws.reverse();
                                                                    }
                                                                    kws = kws
                                                                        ? kws
                                                                        : [];

                                                                    kws.push(
                                                                        "Web"
                                                                    );
                                                                    kws =
                                                                        kws.filter(
                                                                            onlyUnique
                                                                        );
                                                                    kws =
                                                                        cleanArray(
                                                                            kws
                                                                        );
                                                                    kws =
                                                                        kws.reverse();
                                                                    kws =
                                                                        kws.slice(
                                                                            0,
                                                                            6
                                                                        );
                                                                    localStorage.setItem(
                                                                        "jobsgo-candidate-skl",
                                                                        JSON.stringify(
                                                                            kws
                                                                        )
                                                                    );

                                                                    if (
                                                                        kws.length >
                                                                        0
                                                                    ) {
                                                                        var html =
                                                                            '<div class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20"><div class="mrg-bot-5 h4"> Tìm kiếm gần đây<a href="javascript:void(0)" class="pull-right"> <i class="fa fa-angle-double-down"></i></a></div><ul class="sidebar-list expandible-bk">';
                                                                        var count =
                                                                            kws.length >
                                                                            6
                                                                                ? 6
                                                                                : kws.length; /**/
                                                                        for (
                                                                            var i = 0;
                                                                            i <
                                                                            count;
                                                                            i++
                                                                        ) {
                                                                            html +=
                                                                                '<li><a rel="nofollow" title="Việc làm ' +
                                                                                kws[
                                                                                    i
                                                                                ] +
                                                                                '" href="https://jobsgo.vn/viec-lam-' +
                                                                                colorgbSlug(
                                                                                    kws[
                                                                                        i
                                                                                    ]
                                                                                ) +
                                                                                '.html"> <h2 class="txt">' +
                                                                                kws[
                                                                                    i
                                                                                ] +
                                                                                "</h2> </a></li>";
                                                                        }
                                                                        html +=
                                                                            "</ul></div>";
                                                                        $(
                                                                            ".blog-sidebar"
                                                                        ).prepend(
                                                                            html
                                                                        ); /**/
                                                                        $(
                                                                            "#jobRole"
                                                                        ).focus(
                                                                            function () {
                                                                                var kw =
                                                                                    "";
                                                                                var kws =
                                                                                    JSON.parse(
                                                                                        localStorage.getItem(
                                                                                            "jobsgo-candidate-skl"
                                                                                        )
                                                                                    );
                                                                                var count =
                                                                                    kws.length >
                                                                                    10
                                                                                        ? 10
                                                                                        : kws.length;
                                                                                for (
                                                                                    var i = 0;
                                                                                    i <
                                                                                    count;
                                                                                    i++
                                                                                ) {
                                                                                    kw +=
                                                                                        '<li onclick="jobRoleSearch(this)" data-val="' +
                                                                                        kws[
                                                                                            i
                                                                                        ] +
                                                                                        '"><div class="eac-item">' +
                                                                                        kws[
                                                                                            i
                                                                                        ] +
                                                                                        "</div></li>";
                                                                                }
                                                                                $(
                                                                                    "#eac-container-jobRole ul"
                                                                                )
                                                                                    .html(
                                                                                        kw
                                                                                    )
                                                                                    .show();
                                                                            }
                                                                        );
                                                                    }

                                                                    var pl =
                                                                        JSON.parse(
                                                                            localStorage.getItem(
                                                                                "jobsgo-candidate-search-place-log"
                                                                            )
                                                                        );
                                                                    pl = pl
                                                                        ? pl
                                                                        : [];
                                                                    pl.push("");
                                                                    pl =
                                                                        pl.filter(
                                                                            onlyUnique
                                                                        );
                                                                    pl =
                                                                        cleanArray(
                                                                            pl
                                                                        );
                                                                    pl =
                                                                        pl.reverse();
                                                                    localStorage.setItem(
                                                                        "jobsgo-candidate-search-place-log",
                                                                        JSON.stringify(
                                                                            pl
                                                                        )
                                                                    );

                                                                    if (pl) {
                                                                        var count =
                                                                            kws.length >
                                                                            10
                                                                                ? 10
                                                                                : kws.length; /**/
                                                                        $(
                                                                            "#jobPlace"
                                                                        ).focus(
                                                                            function () {
                                                                                var p =
                                                                                    "";
                                                                                var pl =
                                                                                    JSON.parse(
                                                                                        localStorage.getItem(
                                                                                            "jobsgo-candidate-search-place-log"
                                                                                        )
                                                                                    );
                                                                                var count =
                                                                                    pl.length >
                                                                                    10
                                                                                        ? 10
                                                                                        : pl.length;
                                                                                for (
                                                                                    var i = 0;
                                                                                    i <
                                                                                    count;
                                                                                    i++
                                                                                ) {
                                                                                    p +=
                                                                                        '<li onclick="jobPlaceSearch(this)" data-val="' +
                                                                                        pl[
                                                                                            i
                                                                                        ] +
                                                                                        '"><div class="eac-item">' +
                                                                                        pl[
                                                                                            i
                                                                                        ] +
                                                                                        "</div></li>";
                                                                                }
                                                                                $(
                                                                                    "#eac-container-jobPlace ul"
                                                                                )
                                                                                    .html(
                                                                                        p
                                                                                    )
                                                                                    .show();
                                                                            }
                                                                        );
                                                                    }
                                                                });
                                                            }
                                                        );
                                                </script> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-ajax">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row inner-header-page" style="
                                                            padding: 0 !important;
                                                            min-height: initial !important;
                                                        ">
                                                    <div class="mt-10 col-sm-12">
                                                        <div class="fillters clearfix">
                                                            <div class="teks-category dropdown" title="Ngành nghề">
                                                                <button class="btn btn-xs dropdown-toggle" type="button"
                                                                    data-toggle="dropdown">
                                                                    <i class="bx bxs-category"></i>
                                                                    Ngành
                                                                    nghề
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-left">
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=dien-dien-tu-dien-lanh">Điện/Điện
                                                                            Tử/Điện
                                                                            Lạnh</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=it-phan-mem">IT
                                                                            Phần
                                                                            Mềm</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=it-phan-cung">IT
                                                                            Phần
                                                                            Cứng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=thiet-ke">Thiết
                                                                            Kế</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=marketing">Marketing</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=truyen-thong-pr-quang-cao">Truyền
                                                                            Thông/PR/Quảng
                                                                            Cáo</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=kinh-doanh-ban-hang">Kinh
                                                                            Doanh/Bán
                                                                            Hàng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=nhan-su">Nhân
                                                                            Sự</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=hanh-chinh-van-phong">Hành
                                                                            Chính/Văn
                                                                            Phòng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=lao-dong-pho-thong">Lao
                                                                            Động
                                                                            Phổ
                                                                            Thông</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=ban-si-ban-le-cua-hang">Bán
                                                                            Sỉ/Bán
                                                                            Lẻ/Cửa
                                                                            Hàng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=dau-thau-du-an">Đấu
                                                                            Thầu/Dự
                                                                            Án</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=xuat-nhap-khau">Xuất
                                                                            Nhập
                                                                            Khẩu</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=bao-hiem">Bảo
                                                                            Hiểm</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=bat-dong-san">Bất
                                                                            Động
                                                                            Sản</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=nha-hang-khach-san">Nhà
                                                                            Hàng/Khách
                                                                            Sạn</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=co-khi-o-to-tu-dong-hoa">Cơ
                                                                            Khí/Ô
                                                                            Tô/Tự
                                                                            Động
                                                                            Hóa</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=spa-lam-dep">Spa/Làm
                                                                            Đẹp</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=y-te">Y
                                                                            Tế</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=mo-dia-chat">Mỏ/Địa
                                                                            Chất</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=an-toan-lao-dong">An
                                                                            Toàn
                                                                            Lao
                                                                            Động</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=bien-phien-dich">Biên
                                                                            Phiên
                                                                            Dịch</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=vien-thong">Viễn
                                                                            Thông</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=tai-chinh-ngan-hang">Tài
                                                                            Chính/Ngân
                                                                            Hàng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=du-lich">Du
                                                                            Lịch</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=giao-duc-dao-tao">Giáo
                                                                            Dục/Đào
                                                                            Tạo</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=in-an-che-ban">In
                                                                            Ấn/Chế
                                                                            Bản</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=ke-toan-kiem-toan">Kế
                                                                            Toán/Kiểm
                                                                            Toán</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=kien-truc-noi-that">Kiến
                                                                            Trúc/Nội
                                                                            Thất</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=moi-truong">Môi
                                                                            Trường</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=san-xuat-lap-rap-che-bien">Sản
                                                                            Xuất/Lắp
                                                                            Ráp/Chế
                                                                            Biến</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=nong-lam-ngu-nghiep">Nông/Lâm/Ngư
                                                                            Nghiệp</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=luat-phap-che">Luật/Pháp
                                                                            Chế</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=kho-van">Kho
                                                                            Vận</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=xay-dung">Xây
                                                                            Dựng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=det-may-da-giay">Dệt
                                                                            May/Da
                                                                            Giày</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=cham-soc-khach-hang">Chăm
                                                                            Sóc
                                                                            Khách
                                                                            Hàng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=truyen-hinh-bao-chi">Truyền
                                                                            Hình/Báo
                                                                            Chí</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=thu-mua">Thu
                                                                            Mua</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=quan-ly">Quản
                                                                            Lý</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=hoa-sinh">Hoá
                                                                            Sinh</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=van-hanh-bao-tri-bao-duong">Vận
                                                                            Hành/Bảo
                                                                            Trì/Bảo
                                                                            Dưỡng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=khoa-hoc-ky-thuat">Khoa
                                                                            Học/Kỹ
                                                                            Thuật</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=duoc-pham-my-pham">Dược
                                                                            Phẩm/Mỹ
                                                                            Phẩm</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?category=sang-tao-nghe-thuat">Sáng
                                                                            Tạo/Nghệ
                                                                            Thuật</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <style>
                                                                .inner-header-page h2 {
                                                                    color: inherit;
                                                                    font-size: inherit !important;
                                                                    line-height: inherit;
                                                                    text-transform: inherit;
                                                                    margin: inherit;
                                                                    font-weight: inherit;
                                                                }
                                                            </style>
                                                            <div class="dropdown" title="Loại hình">
                                                                <button class="btn btn-xs dropdown-toggle" type="button"
                                                                    data-toggle="dropdown">
                                                                    <i class="bx bx-briefcase"></i>
                                                                    Loại
                                                                    hình
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-left">
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?type=full-time">Full-time</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?type=part-time">Part-time</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?type=thoi-vu">Thời
                                                                            vụ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?type=remote">Remote</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="dropdown" title="Mức lương">
                                                                <button class="btn btn-xs dropdown-toggle" type="button"
                                                                    data-toggle="dropdown">
                                                                    <i class="bx bx-money"></i>
                                                                    Mức
                                                                    lương
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-left">
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=0-5">Dưới
                                                                            5
                                                                            triệu
                                                                            VNĐ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=5-7">5
                                                                            -
                                                                            7
                                                                            triệu
                                                                            VNĐ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=7-10">7
                                                                            -
                                                                            10
                                                                            triệu
                                                                            VNĐ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=10-15">10
                                                                            -
                                                                            15
                                                                            triệu
                                                                            VNĐ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=15-20">15
                                                                            -
                                                                            20
                                                                            triệu
                                                                            VNĐ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=20-30">20
                                                                            -
                                                                            30
                                                                            triệu
                                                                            VNĐ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=30-50">30
                                                                            -
                                                                            50
                                                                            triệu
                                                                            VNĐ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=50-9999">Trên
                                                                            50
                                                                            triệu
                                                                            VNĐ</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?salary=0-0">Thoả
                                                                            thuận</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="dropdown" title="Chức vụ">
                                                                <button class="btn btn-xs dropdown-toggle" type="button"
                                                                    data-toggle="dropdown">
                                                                    <i class="bx bx-user"></i>
                                                                    Chức vụ
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-left">
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?position=1">Thực
                                                                            tập
                                                                            sinh</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?position=2">Nhân
                                                                            viên/Chuyên
                                                                            viên</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?position=3">Trưởng
                                                                            nhóm/Trưởng
                                                                            phòng</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?position=4">Giám
                                                                            đốc/Cấp
                                                                            cao
                                                                            hơn</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="dropdown" title="Kinh nghiệm">
                                                                <button class="btn btn-xs dropdown-toggle" type="button"
                                                                    data-toggle="dropdown">
                                                                    <i class="bx bx-star"></i>
                                                                    Kinh
                                                                    nghiệm
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-left">
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?exp=0-0">Không
                                                                            yêu
                                                                            cầu</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?exp=1-2">1
                                                                            -
                                                                            2
                                                                            năm</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?exp=3-5">3
                                                                            -
                                                                            5
                                                                            năm</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="a accordion-toggle"
                                                                            data-href="/viec-lam-web.html?exp=5-9999">Trên
                                                                            5
                                                                            năm</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix bg-bc">
                                                    <ol class="breadcrumb hidden-xs" itemscope=""
                                                        itemtype="http://schema.org/BreadcrumbList">
                                                        <meta itemprop="itemListOrder"
                                                            content="ItemListOrderAscending" />
                                                        <li itemprop="itemListElement" itemscope=""
                                                            itemtype="https://schema.org/ListItem">
                                                            <a href="https://jobsgo.vn"
                                                                itemtype="https://schema.org/Thing" itemprop="item">
                                                                <span itemprop="name">
                                                                    JobsGO</span>
                                                            </a>
                                                            <meta itemprop="position" content="1" />
                                                        </li>
                                                        <li itemprop="itemListElement" itemscope=""
                                                            itemtype="https://schema.org/ListItem">
                                                            <a href="https://jobsgo.vn/viec-lam.html"
                                                                itemtype="https://schema.org/Thing" itemprop="item">
                                                                <span itemprop="name">Việc
                                                                    làm</span>
                                                            </a>
                                                            <meta itemprop="position" content="2" />
                                                        </li>
                                                        <li class="active" itemprop="itemListElement" itemscope=""
                                                            itemtype="https://schema.org/ListItem">
                                                            <span class="text-muted">
                                                                <meta itemtype="https://schema.org/Thing"
                                                                    itemprop="item"
                                                                    content="https://jobsgo.vn/viec-lam-web.html" />
                                                                <span itemprop="name">Việc
                                                                    làm Web </span>
                                                                <meta itemprop="position" content="3" />
                                                            </span>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix colorgb-carousel-bk v2">
                                            <div class="sidebar-widget-title mrg-bot-10">
                                                <h1>
                                                    Tuyển dụng 63 việc làm
                                                    Web - 20/09/2024
                                                </h1>
                                                <span class="pull-right"><span class="hidden-xs">Việc</span>
                                                    1 - 50 / 63</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="sort">
                                                        <div class="teks-dropdown dropdown">
                                                            <ul class="list list-inline list-unstyled">
                                                                <li>
                                                                    <strong class="text-muted">Hiển
                                                                        thị
                                                                        theo:</strong>
                                                                </li>
                                                                <li class="active">
                                                                    <span class="a" data-sort="true"
                                                                        data-href="/viec-lam-web.html">
                                                                        <img src={{ asset('assets/img/2024/ic18.svg')}}
                                                                            alt="jobsgo" loading="lazy" />
                                                                        Phù
                                                                        hợp
                                                                        nhất</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="a" data-sort="true"
                                                                        data-href="/viec-lam-web.html?sort=created">
                                                                        <img src={{ asset('assets/img/2024/ic17.svg')}}
                                                                            alt="jobsgo" loading="lazy" />
                                                                        Việc
                                                                        mới
                                                                        đăng</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="a" data-sort="true"
                                                                        data-href="/viec-lam-web.html?sort=updated">
                                                                        <img src={{ asset('assets/img/2024/ic17.svg')}}
                                                                            alt="jobsgo" loading="lazy" />
                                                                        Mới
                                                                        cập
                                                                        nhật</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="a" data-sort="true"
                                                                        data-href="/viec-lam-web.html?sort=salary">
                                                                        <img src={{ asset('assets/img/2024/ic17.svg')}}
                                                                            alt="jobsgo" loading="lazy" />
                                                                        Lương
                                                                        cao
                                                                        nhất</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item-bk mrg-top-10">
                                                <div class="mrg-bot-20 clearfix">
                                                    <div class="item">
                                                        <div class="item-click red">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn Web Marketing Thu Nhập 10 - 20 Triệu/Tháng"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-web-marketing-thu-nhap-10-20-trieu-thang-18774841402.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn Web Marketing Thu Nhập 10 - 20 Triệu/Tháng - Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/244279-200x200.jpg?v=1725616652"
                                                                                        alt="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-web-marketing-thu-nhap-10-20-trieu-thang-18774841402.html"
                                                                                        title="Nhân Viên Tư Vấn Web Marketing Thu Nhập 10 - 20 Triệu/Tháng">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn
                                                                                        Web
                                                                                        Marketing
                                                                                        Thu
                                                                                        Nhập
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        Triệu/Tháng</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-va-dich-vu-nina-3350577513.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Và
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Nina</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Từ 10 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Từ
                                                                                        10
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click silver">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên SEO Website ( Thu Nhập Đến 15 Triệu )"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-thu-nhap-den-15-trieu-18868441449.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên SEO Website ( Thu Nhập Đến 15 Triệu ) - Công Ty Cổ Phần Tập Đoàn Joniva"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/198745-200x200.jpg?v=1721379446"
                                                                                        alt="Công Ty Cổ Phần Tập Đoàn Joniva"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-thu-nhap-den-15-trieu-18868441449.html"
                                                                                        title="Nhân Viên SEO Website ( Thu Nhập Đến 15 Triệu )">Nhân
                                                                                        Viên
                                                                                        SEO
                                                                                        Website
                                                                                        (
                                                                                        Thu
                                                                                        Nhập
                                                                                        Đến
                                                                                        15
                                                                                        Triệu
                                                                                        )</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Tập Đoàn Joniva"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-tap-doan-joniva-2732271327.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Tập
                                                                                        Đoàn
                                                                                        Joniva</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Đến 15 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Đến
                                                                                        15
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 1 - 3 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        1
                                                                                        -
                                                                                        3
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin SILVER"
                                                                    class="tg-themetag tg-featuretag silver">
                                                                    silver
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click standard">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên SEO Website ( Thu Nhập Đến 15 Triệu )"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-thu-nhap-den-15-trieu-18680290825.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên SEO Website ( Thu Nhập Đến 15 Triệu ) - Công Ty TNHH Thương Mại Akira"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/59190-200x200.jpg?v=1622013988"
                                                                                        alt="Công Ty TNHH Thương Mại Akira"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-thu-nhap-den-15-trieu-18680290825.html"
                                                                                        title="Nhân Viên SEO Website ( Thu Nhập Đến 15 Triệu )">Nhân
                                                                                        Viên
                                                                                        SEO
                                                                                        Website
                                                                                        (
                                                                                        Thu
                                                                                        Nhập
                                                                                        Đến
                                                                                        15
                                                                                        Triệu
                                                                                        )</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Akira"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-akira-837253982.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Akira</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 8 - 15 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        8
                                                                                        -
                                                                                        15
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 1 - 3 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        1
                                                                                        -
                                                                                        3
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin STANDARD"
                                                                    class="tg-themetag tg-featuretag standard">
                                                                    standard
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click standard">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Chuyên Viên Sale Online/ Kinh Doanh Website Marketing"
                                                                                    href="https://jobsgo.vn/viec-lam/chuyen-vien-sale-online-kinh-doanh-website-marketing-18650946606.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Chuyên Viên Sale Online/ Kinh Doanh Website Marketing - Công Ty Cổ Phần Thương Mại Công Nghệ Số Topsmart"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/151998-200x200.jpg?v=1701679403"
                                                                                        alt="Công Ty Cổ Phần Thương Mại Công Nghệ Số Topsmart"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/chuyen-vien-sale-online-kinh-doanh-website-marketing-18650946606.html"
                                                                                        title="Chuyên Viên Sale Online/ Kinh Doanh Website Marketing">Chuyên
                                                                                        Viên
                                                                                        Sale
                                                                                        Online/
                                                                                        Kinh
                                                                                        Doanh
                                                                                        Website
                                                                                        Marketing</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Thương Mại Công Nghệ Số Topsmart"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-thuong-mai-cong-nghe-so-topsmart-2097493814.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Thương
                                                                                        Mại
                                                                                        Công
                                                                                        Nghệ
                                                                                        Số
                                                                                        Topsmart</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 8 - 15 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        8
                                                                                        -
                                                                                        15
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 10 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        10
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin STANDARD"
                                                                    class="tg-themetag tg-featuretag standard">
                                                                    standard
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Thiết Kế Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-thiet-ke-website-18853518128.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Thiết Kế Website - Công Ty TNHH Truyền Thông Worry Free Việt Nam"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/245956-200x200.jpg?v=1726567556"
                                                                                        alt="Công Ty TNHH Truyền Thông Worry Free Việt Nam"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-thiet-ke-website-18853518128.html"
                                                                                        title="Nhân Viên Thiết Kế Website">Nhân
                                                                                        Viên
                                                                                        Thiết
                                                                                        Kế
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Truyền Thông Worry Free Việt Nam"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-truyen-thong-worry-free-viet-nam-3373349496.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Truyền
                                                                                        Thông
                                                                                        Worry
                                                                                        Free
                                                                                        Việt
                                                                                        Nam</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 20 - 35 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        20
                                                                                        -
                                                                                        35
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 2 - 5 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        2
                                                                                        -
                                                                                        5
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 50 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        50
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="[Hà Nội/Japan] Web Developer (Tiếng Nhật N1~N4) ~$2500"
                                                                                    href="https://jobsgo.vn/viec-lam/ha-noi-japan-web-developer-tieng-nhat-n1n4-2500-18848643267.html"><img
                                                                                        width="65" height="65"
                                                                                        title="[Hà Nội/Japan] Web Developer (Tiếng Nhật N1~N4) ~$2500 - Công Ty TNHH Một Thành Viên Wacontre"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/598-200x200.jpg?v=1655957617"
                                                                                        alt="Công Ty TNHH Một Thành Viên Wacontre"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/ha-noi-japan-web-developer-tieng-nhat-n1n4-2500-18848643267.html"
                                                                                        title="[Hà Nội/Japan] Web Developer (Tiếng Nhật N1~N4) ~$2500">[Hà
                                                                                        Nội/Japan]
                                                                                        Web
                                                                                        Developer
                                                                                        (Tiếng
                                                                                        Nhật
                                                                                        N1~N4)
                                                                                        ~$2500</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Một Thành Viên Wacontre"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-mot-thanh-vien-wacontre-41633214.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Một
                                                                                        Thành
                                                                                        Viên
                                                                                        Wacontre</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 25 - 70 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        25
                                                                                        -
                                                                                        70
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 2 - 5 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        2
                                                                                        -
                                                                                        5
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên SEO Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-18793811265.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên SEO Website - Công ty TNHH Provina"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/45523-200x200.jpg?v=1715757226"
                                                                                        alt="Công ty TNHH Provina"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-18793811265.html"
                                                                                        title="Nhân Viên SEO Website">Nhân
                                                                                        Viên
                                                                                        SEO
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công ty TNHH Provina"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-provina-651669789.html">Công
                                                                                        ty
                                                                                        TNHH
                                                                                        Provina</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Bình Dương"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Bình
                                                                                        Dương</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 6 - 8 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        6
                                                                                        -
                                                                                        8
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 2 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        2
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Thiết Kế UI/UX Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-thiet-ke-ui-ux-website-18808951850.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Thiết Kế UI/UX Website - Công Ty TNHH Diwe"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/69705-200x200.jpg?v=1726114682"
                                                                                        alt="Công Ty TNHH Diwe"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-thiet-ke-ui-ux-website-18808951850.html"
                                                                                        title="Nhân Viên Thiết Kế UI/UX Website">Nhân
                                                                                        Viên
                                                                                        Thiết
                                                                                        Kế
                                                                                        UI/UX
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Diwe"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-diwe-980037167.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Diwe</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 12 - 14 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        12
                                                                                        -
                                                                                        14
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 2 - 5 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        2
                                                                                        -
                                                                                        5
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click standard">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn Web Marketing Thu Nhập 10 - 20 Triệu/Tháng"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-web-marketing-thu-nhap-10-20-trieu-thang-18800125500.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn Web Marketing Thu Nhập 10 - 20 Triệu/Tháng - Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/244279-200x200.jpg?v=1725616652"
                                                                                        alt="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-web-marketing-thu-nhap-10-20-trieu-thang-18800125500.html"
                                                                                        title="Nhân Viên Tư Vấn Web Marketing Thu Nhập 10 - 20 Triệu/Tháng">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn
                                                                                        Web
                                                                                        Marketing
                                                                                        Thu
                                                                                        Nhập
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        Triệu/Tháng</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-va-dich-vu-nina-3350577513.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Và
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Nina</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 1 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        1
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin STANDARD"
                                                                    class="tg-themetag tg-featuretag standard">
                                                                    standard
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click standard">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Thực Tập Sinh Web Marketing"
                                                                                    href="https://jobsgo.vn/viec-lam/thuc-tap-sinh-web-marketing-18793566843.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Thực Tập Sinh Web Marketing - Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/244279-200x200.jpg?v=1725616652"
                                                                                        alt="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/thuc-tap-sinh-web-marketing-18793566843.html"
                                                                                        title="Thực Tập Sinh Web Marketing">Thực
                                                                                        Tập
                                                                                        Sinh
                                                                                        Web
                                                                                        Marketing</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-va-dich-vu-nina-3350577513.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Và
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Nina</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 7 - 15 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        7
                                                                                        -
                                                                                        15
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin STANDARD"
                                                                    class="tg-themetag tg-featuretag standard">
                                                                    standard
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn Website Marketing - Công Nghệ Thông Tin"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-website-marketing-cong-nghe-thong-tin-18793675475.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn Website Marketing - Công Nghệ Thông Tin - Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/244279-200x200.jpg?v=1725616652"
                                                                                        alt="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-website-marketing-cong-nghe-thong-tin-18793675475.html"
                                                                                        title="Nhân Viên Tư Vấn Website Marketing - Công Nghệ Thông Tin">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn
                                                                                        Website
                                                                                        Marketing
                                                                                        -
                                                                                        Công
                                                                                        Nghệ
                                                                                        Thông
                                                                                        Tin</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-va-dich-vu-nina-3350577513.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Và
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Nina</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 2 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        2
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn Web Marketing (Thu Nhập 10 - 20 Triệu/ Tháng)"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-web-marketing-thu-nhap-10-20-trieu-thang-18738476840.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn Web Marketing (Thu Nhập 10 - 20 Triệu/ Tháng) - Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/235541-200x200.jpg?v=1723102086"
                                                                                        alt="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-web-marketing-thu-nhap-10-20-trieu-thang-18738476840.html"
                                                                                        title="Nhân Viên Tư Vấn Web Marketing (Thu Nhập 10 - 20 Triệu/ Tháng)">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn
                                                                                        Web
                                                                                        Marketing
                                                                                        (Thu
                                                                                        Nhập
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        Triệu/
                                                                                        Tháng)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-va-dich-vu-nina-3231924211.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Và
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Nina</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 60 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        60
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Digital Marketing Specialist (Apple Web Shop)"
                                                                                    href="https://jobsgo.vn/viec-lam/digital-marketing-specialist-apple-web-shop-18736793044.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Digital Marketing Specialist (Apple Web Shop) - Công Ty TNHH Thakral One"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/119609-200x200.jpg?v=1698130605"
                                                                                        alt="Công Ty TNHH Thakral One"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/digital-marketing-specialist-apple-web-shop-18736793044.html"
                                                                                        title="Digital Marketing Specialist (Apple Web Shop)">Digital
                                                                                        Marketing
                                                                                        Specialist
                                                                                        (Apple
                                                                                        Web
                                                                                        Shop)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thakral One"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thakral-one-1657683583.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thakral
                                                                                        One</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 13 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        13
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 2 - 5 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        2
                                                                                        -
                                                                                        5
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 50 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        50
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Web Master - Quản Trị Web"
                                                                                    href="https://jobsgo.vn/viec-lam/web-master-quan-tri-web-18718203393.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Web Master - Quản Trị Web - Công Ty TNHH Craftsman Kitchen Components Việt Nam"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/235267-200x200.jpg?v=1722998181"
                                                                                        alt="Công Ty TNHH Craftsman Kitchen Components Việt Nam"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/web-master-quan-tri-web-18718203393.html"
                                                                                        title="Web Master - Quản Trị Web">Web
                                                                                        Master
                                                                                        -
                                                                                        Quản
                                                                                        Trị
                                                                                        Web</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Craftsman Kitchen Components Việt Nam"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-craftsman-kitchen-components-viet-nam-3228203565.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Craftsman
                                                                                        Kitchen
                                                                                        Components
                                                                                        Việt
                                                                                        Nam</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Đồng Nai"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Đồng
                                                                                        Nai</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 2 - 5 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        2
                                                                                        -
                                                                                        5
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn, Chăm Sóc Khách Hàng Thiết Kế Website - Không Yêu Cầu Kinh Nghiệm"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-cham-soc-khach-hang-thiet-ke-website-khong-yeu-cau-kinh-nghiem-18643315208.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn, Chăm Sóc Khách Hàng Thiết Kế Website - Không Yêu Cầu Kinh Nghiệm - Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/235541-200x200.jpg?v=1723102086"
                                                                                        alt="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-cham-soc-khach-hang-thiet-ke-website-khong-yeu-cau-kinh-nghiem-18643315208.html"
                                                                                        title="Nhân Viên Tư Vấn, Chăm Sóc Khách Hàng Thiết Kế Website - Không Yêu Cầu Kinh Nghiệm">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn,
                                                                                        Chăm
                                                                                        Sóc
                                                                                        Khách
                                                                                        Hàng
                                                                                        Thiết
                                                                                        Kế
                                                                                        Website
                                                                                        -
                                                                                        Không
                                                                                        Yêu
                                                                                        Cầu
                                                                                        Kinh
                                                                                        Nghiệm</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Và Dịch Vụ Nina"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-va-dich-vu-nina-3231924211.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Và
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Nina</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 15 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        15
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 50 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        50
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Chuyên Viên SEO Web - Mảng Du Lịch"
                                                                                    href="https://jobsgo.vn/viec-lam/chuyen-vien-seo-web-mang-du-lich-18607072857.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Chuyên Viên SEO Web - Mảng Du Lịch - Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/59276-200x200.jpg?v=1617161820"
                                                                                        alt="Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/chuyen-vien-seo-web-mang-du-lich-18607072857.html"
                                                                                        title="Chuyên Viên SEO Web - Mảng Du Lịch">Chuyên
                                                                                        Viên
                                                                                        SEO
                                                                                        Web
                                                                                        -
                                                                                        Mảng
                                                                                        Du
                                                                                        Lịch</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-viet-nam-tickets-838421776.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Việt
                                                                                        Nam
                                                                                        Tickets
                                                                                    </a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 25 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        25
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 1 - 5 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        1
                                                                                        -
                                                                                        5
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 50 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        50
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="[HN] Công Ty SOTECH Tuyển Dụng Thực Tập Lập Trình Web PHP Wordpress Full-time 2024"
                                                                                    href="https://jobsgo.vn/viec-lam/hn-cong-ty-sotech-tuyen-dung-thuc-tap-lap-trinh-web-php-wordpress-full-time-2024-18828166135.html"><img
                                                                                        width="65" height="65"
                                                                                        title="[HN] Công Ty SOTECH Tuyển Dụng Thực Tập Lập Trình Web PHP Wordpress Full-time 2024 - Công Ty TNHH Công Nghệ Sotech VN"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/89235-200x200.jpg?v=1672830752"
                                                                                        alt="Công Ty TNHH Công Nghệ Sotech VN"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/hn-cong-ty-sotech-tuyen-dung-thuc-tap-lap-trinh-web-php-wordpress-full-time-2024-18828166135.html"
                                                                                        title="[HN] Công Ty SOTECH Tuyển Dụng Thực Tập Lập Trình Web PHP Wordpress Full-time 2024">[HN]
                                                                                        Công
                                                                                        Ty
                                                                                        SOTECH
                                                                                        Tuyển
                                                                                        Dụng
                                                                                        Thực
                                                                                        Tập
                                                                                        Lập
                                                                                        Trình
                                                                                        Web
                                                                                        PHP
                                                                                        Wordpress
                                                                                        Full-time
                                                                                        2024</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Công Nghệ Sotech VN"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-cong-nghe-sotech-vn-1245235037.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Công
                                                                                        Nghệ
                                                                                        Sotech
                                                                                        VN</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 10 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        10
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Content SEO Website (Part-Time)"
                                                                                    href="https://jobsgo.vn/viec-lam/content-seo-website-part-time-18887126153.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Content SEO Website (Part-Time) - Công Ty TNHH Csgroup"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/175704-200x200.jpg?v=1713322700"
                                                                                        alt="Công Ty TNHH Csgroup"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/content-seo-website-part-time-18887126153.html"
                                                                                        title="Content SEO Website (Part-Time)">Content
                                                                                        SEO
                                                                                        Website
                                                                                        (Part-Time)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Csgroup"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-csgroup-2419397588.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Csgroup</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 4 - 6 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        4
                                                                                        -
                                                                                        6
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Part-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Part-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Dưới 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Dưới
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Chuyên Viên Lập Trình Website"
                                                                                    href="https://jobsgo.vn/viec-lam/chuyen-vien-lap-trinh-website-18847774211.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Chuyên Viên Lập Trình Website - Công Ty Cổ Phần Công Nghệ Tài Chính Vnfite"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/173602-200x200.jpg?v=1713322867"
                                                                                        alt="Công Ty Cổ Phần Công Nghệ Tài Chính Vnfite"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/chuyen-vien-lap-trinh-website-18847774211.html"
                                                                                        title="Chuyên Viên Lập Trình Website">Chuyên
                                                                                        Viên
                                                                                        Lập
                                                                                        Trình
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Công Nghệ Tài Chính Vnfite"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-cong-nghe-tai-chinh-vnfite-2390854530.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Công
                                                                                        Nghệ
                                                                                        Tài
                                                                                        Chính
                                                                                        Vnfite</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 25 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        25
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Chuyên Viên SEO Marketing - SEO Website (Thu Nhập Upto 16 Triệu, Kinh Nghiệm Từ 2 Năm ) - Hà Nội"
                                                                                    href="https://jobsgo.vn/viec-lam/chuyen-vien-seo-marketing-seo-website-thu-nhap-upto-16-trieu-kinh-nghiem-tu-2-nam-ha-noi-18820507579.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Chuyên Viên SEO Marketing - SEO Website (Thu Nhập Upto 16 Triệu, Kinh Nghiệm Từ 2 Năm ) - Hà Nội - Công Ty Cổ Phần Công Nghệ Giáo Dục Tata"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/12696-200x200.jpg?v=1716536031"
                                                                                        alt="Công Ty Cổ Phần Công Nghệ Giáo Dục Tata"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/chuyen-vien-seo-marketing-seo-website-thu-nhap-upto-16-trieu-kinh-nghiem-tu-2-nam-ha-noi-18820507579.html"
                                                                                        title="Chuyên Viên SEO Marketing - SEO Website (Thu Nhập Upto 16 Triệu, Kinh Nghiệm Từ 2 Năm ) - Hà Nội">Chuyên
                                                                                        Viên
                                                                                        SEO
                                                                                        Marketing
                                                                                        -
                                                                                        SEO
                                                                                        Website
                                                                                        (Thu
                                                                                        Nhập
                                                                                        Upto
                                                                                        16
                                                                                        Triệu,
                                                                                        Kinh
                                                                                        Nghiệm
                                                                                        Từ
                                                                                        2
                                                                                        Năm
                                                                                        )
                                                                                        -
                                                                                        Hà
                                                                                        Nội</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Công Nghệ Giáo Dục Tata"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-cong-nghe-giao-duc-tata-205911956.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Công
                                                                                        Nghệ
                                                                                        Giáo
                                                                                        Dục
                                                                                        Tata</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 13 - 16 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        13
                                                                                        -
                                                                                        16
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 2 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        2
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Chuyên Viên SEO Marketing - SEO Website (Thu Nhập Upto 16 Triệu, Kinh Nghiệm Từ 2 Năm ) - Hà Nội"
                                                                                    href="https://jobsgo.vn/viec-lam/chuyen-vien-seo-marketing-seo-website-thu-nhap-upto-16-trieu-kinh-nghiem-tu-2-nam-ha-noi-18820534737.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Chuyên Viên SEO Marketing - SEO Website (Thu Nhập Upto 16 Triệu, Kinh Nghiệm Từ 2 Năm ) - Hà Nội - Công Ty Cổ Phần Công Nghệ Giáo Dục Tata"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/12696-200x200.jpg?v=1716536031"
                                                                                        alt="Công Ty Cổ Phần Công Nghệ Giáo Dục Tata"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/chuyen-vien-seo-marketing-seo-website-thu-nhap-upto-16-trieu-kinh-nghiem-tu-2-nam-ha-noi-18820534737.html"
                                                                                        title="Chuyên Viên SEO Marketing - SEO Website (Thu Nhập Upto 16 Triệu, Kinh Nghiệm Từ 2 Năm ) - Hà Nội">Chuyên
                                                                                        Viên
                                                                                        SEO
                                                                                        Marketing
                                                                                        -
                                                                                        SEO
                                                                                        Website
                                                                                        (Thu
                                                                                        Nhập
                                                                                        Upto
                                                                                        16
                                                                                        Triệu,
                                                                                        Kinh
                                                                                        Nghiệm
                                                                                        Từ
                                                                                        2
                                                                                        Năm
                                                                                        )
                                                                                        -
                                                                                        Hà
                                                                                        Nội</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Công Nghệ Giáo Dục Tata"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-cong-nghe-giao-duc-tata-205911956.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Công
                                                                                        Nghệ
                                                                                        Giáo
                                                                                        Dục
                                                                                        Tata</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 13 - 16 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        13
                                                                                        -
                                                                                        16
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 2 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        2
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Kinh Doanh/Tư Vấn Web Không YC Kinh Nghiệm - Quận 12"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-web-khong-yc-kinh-nghiem-quan-12-18817927569.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Kinh Doanh/Tư Vấn Web Không YC Kinh Nghiệm - Quận 12 - Công Ty TNHH TMDV Công Nghệ Vps"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/244843-200x200.jpg?v=1726046196"
                                                                                        alt="Công Ty TNHH TMDV Công Nghệ Vps"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-kinh-doanh-tu-van-web-khong-yc-kinh-nghiem-quan-12-18817927569.html"
                                                                                        title="Nhân Viên Kinh Doanh/Tư Vấn Web Không YC Kinh Nghiệm - Quận 12">Nhân
                                                                                        Viên
                                                                                        Kinh
                                                                                        Doanh/Tư
                                                                                        Vấn
                                                                                        Web
                                                                                        Không
                                                                                        YC
                                                                                        Kinh
                                                                                        Nghiệm
                                                                                        -
                                                                                        Quận
                                                                                        12</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH TMDV Công Nghệ Vps"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-tmdv-cong-nghe-vps-3358236069.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        TMDV
                                                                                        Công
                                                                                        Nghệ
                                                                                        Vps</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 60 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        60
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Quản Trị Website, SEO Web"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-quan-tri-website-seo-web-18815252506.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Quản Trị Website, SEO Web - Công Ty TNHH PTM Connections Việt Nam"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/66486-200x200.jpg?v=1625821188"
                                                                                        alt="Công Ty TNHH PTM Connections Việt Nam"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-quan-tri-website-seo-web-18815252506.html"
                                                                                        title="Nhân Viên Quản Trị Website, SEO Web">Nhân
                                                                                        Viên
                                                                                        Quản
                                                                                        Trị
                                                                                        Website,
                                                                                        SEO
                                                                                        Web</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH PTM Connections Việt Nam"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-ptm-connections-viet-nam-936326366.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        PTM
                                                                                        Connections
                                                                                        Việt
                                                                                        Nam</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 12 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        12
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 1 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        1
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Web Developer (HTML, CSS, Javascript)"
                                                                                    href="https://jobsgo.vn/viec-lam/web-developer-html-css-javascript-18801551295.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Web Developer (HTML, CSS, Javascript) - Công Ty TNHH Công Nghệ Koh Young"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/68303-200x200.jpg?v=1627368866"
                                                                                        alt="Công Ty TNHH Công Nghệ Koh Young"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/web-developer-html-css-javascript-18801551295.html"
                                                                                        title="Web Developer (HTML, CSS, Javascript)">Web
                                                                                        Developer
                                                                                        (HTML,
                                                                                        CSS,
                                                                                        Javascript)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Công Nghệ Koh Young"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-cong-nghe-koh-young-960999409.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Công
                                                                                        Nghệ
                                                                                        Koh
                                                                                        Young</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 3 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        3
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 50 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        50
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click standard">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Kinh Doanh Website (Sales - Gò Vấp - Thu Nhập Lên Đến 20TR)"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-kinh-doanh-website-sales-go-vap-thu-nhap-len-den-20tr-18782975223.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Kinh Doanh Website (Sales - Gò Vấp - Thu Nhập Lên Đến 20TR) - Công Ty CP Devitech"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/121067-200x200.jpg?v=1696299880"
                                                                                        alt="Công Ty CP Devitech"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-kinh-doanh-website-sales-go-vap-thu-nhap-len-den-20tr-18782975223.html"
                                                                                        title="Nhân Viên Kinh Doanh Website (Sales - Gò Vấp - Thu Nhập Lên Đến 20TR)">Nhân
                                                                                        Viên
                                                                                        Kinh
                                                                                        Doanh
                                                                                        Website
                                                                                        (Sales
                                                                                        -
                                                                                        Gò
                                                                                        Vấp
                                                                                        -
                                                                                        Thu
                                                                                        Nhập
                                                                                        Lên
                                                                                        Đến
                                                                                        20TR)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty CP Devitech"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-cp-devitech-1677481765.html">Công
                                                                                        Ty
                                                                                        CP
                                                                                        Devitech</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Đến 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Đến
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 1 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        1
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin STANDARD"
                                                                    class="tg-themetag tg-featuretag standard">
                                                                    standard
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click standard">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Biên Tập Viên Website – PR Quảng Cáo"
                                                                                    href="https://jobsgo.vn/viec-lam/bien-tap-vien-website-pr-quang-cao-18740432216.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Biên Tập Viên Website – PR Quảng Cáo - Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/59276-200x200.jpg?v=1617161820"
                                                                                        alt="Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/bien-tap-vien-website-pr-quang-cao-18740432216.html"
                                                                                        title="Biên Tập Viên Website – PR Quảng Cáo">Biên
                                                                                        Tập
                                                                                        Viên
                                                                                        Website
                                                                                        –
                                                                                        PR
                                                                                        Quảng
                                                                                        Cáo</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-viet-nam-tickets-838421776.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Việt
                                                                                        Nam
                                                                                        Tickets
                                                                                    </a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 1 - 5 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        1
                                                                                        -
                                                                                        5
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 50 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        50
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin STANDARD"
                                                                    class="tg-themetag tg-featuretag standard">
                                                                    standard
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click standard">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Chuyên Viên SEO Web - Mảng Du Lịch"
                                                                                    href="https://jobsgo.vn/viec-lam/chuyen-vien-seo-web-mang-du-lich-18740296426.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Chuyên Viên SEO Web - Mảng Du Lịch - Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/59276-200x200.jpg?v=1617161820"
                                                                                        alt="Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/chuyen-vien-seo-web-mang-du-lich-18740296426.html"
                                                                                        title="Chuyên Viên SEO Web - Mảng Du Lịch">Chuyên
                                                                                        Viên
                                                                                        SEO
                                                                                        Web
                                                                                        -
                                                                                        Mảng
                                                                                        Du
                                                                                        Lịch</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Việt Nam Tickets "
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-viet-nam-tickets-838421776.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Việt
                                                                                        Nam
                                                                                        Tickets
                                                                                    </a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 8 - 40 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        8
                                                                                        -
                                                                                        40
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 7 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        7
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin STANDARD"
                                                                    class="tg-themetag tg-featuretag standard">
                                                                    standard
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Tuyển Nhận Viên SEO Website Tại Hải Phòng"
                                                                                    href="https://jobsgo.vn/viec-lam/tuyen-nhan-vien-seo-website-tai-hai-phong-18712364423.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Tuyển Nhận Viên SEO Website Tại Hải Phòng - Công Ty Cổ Phần Tư Vấn Xây Dựng Sơn Hà"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/56129-200x200.jpg?v=1613708222"
                                                                                        alt="Công Ty Cổ Phần Tư Vấn Xây Dựng Sơn Hà"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/tuyen-nhan-vien-seo-website-tai-hai-phong-18712364423.html"
                                                                                        title="Tuyển Nhận Viên SEO Website Tại Hải Phòng">Tuyển
                                                                                        Nhận
                                                                                        Viên
                                                                                        SEO
                                                                                        Website
                                                                                        Tại
                                                                                        Hải
                                                                                        Phòng</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Tư Vấn Xây Dựng Sơn Hà"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-tu-van-xay-dung-son-ha-795688663.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Tư
                                                                                        Vấn
                                                                                        Xây
                                                                                        Dựng
                                                                                        Sơn
                                                                                        Hà</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hải Phòng"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hải
                                                                                        Phòng</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Đến 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Đến
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Dưới 5 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Dưới
                                                                                        5
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 40 phút trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        40
                                                                                        phút
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-website-18687555590.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn Website - Công Ty TNHH Xây Dựng Bá Việt"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/242729-200x200.jpg?v=1724662697"
                                                                                        alt="Công Ty TNHH Xây Dựng Bá Việt"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-website-18687555590.html"
                                                                                        title="Nhân Viên Tư Vấn Website">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Xây Dựng Bá Việt"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-xay-dung-ba-viet-3329530063.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Xây
                                                                                        Dựng
                                                                                        Bá
                                                                                        Việt</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 7 - 30 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        7
                                                                                        -
                                                                                        30
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 2 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        2
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Biên Tập Nội Dung Website, Fanpage"
                                                                                    href="https://jobsgo.vn/viec-lam/bien-tap-noi-dung-website-fanpage-18659229796.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Biên Tập Nội Dung Website, Fanpage - Công ty TNHH Maxxus Việt Nam"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/98-200x200.jpg?v=1605845123"
                                                                                        alt="Công ty TNHH Maxxus Việt Nam"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/bien-tap-noi-dung-website-fanpage-18659229796.html"
                                                                                        title="Biên Tập Nội Dung Website, Fanpage">Biên
                                                                                        Tập
                                                                                        Nội
                                                                                        Dung
                                                                                        Website,
                                                                                        Fanpage</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công ty TNHH Maxxus Việt Nam"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-maxxus-viet-nam-34843714.html">Công
                                                                                        ty
                                                                                        TNHH
                                                                                        Maxxus
                                                                                        Việt
                                                                                        Nam</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 8 - 12 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        8
                                                                                        -
                                                                                        12
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: 1 - 2 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        1
                                                                                        -
                                                                                        2
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 1 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        1
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click standard">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn Web Marketing (Thu Nhập 10 - 20 Triệu/ Tháng)"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-web-marketing-thu-nhap-10-20-trieu-thang-18645175531.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn Web Marketing (Thu Nhập 10 - 20 Triệu/ Tháng) - JobsGO Recruit"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/89492-200x200.jpg?v=1655435656"
                                                                                        alt="JobsGO Recruit"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-web-marketing-thu-nhap-10-20-trieu-thang-18645175531.html"
                                                                                        title="Nhân Viên Tư Vấn Web Marketing (Thu Nhập 10 - 20 Triệu/ Tháng)">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn
                                                                                        Web
                                                                                        Marketing
                                                                                        (Thu
                                                                                        Nhập
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        Triệu/
                                                                                        Tháng)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="JobsGO Recruit"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/jobsgo-recruit-1248724840.html">JobsGO
                                                                                        Recruit</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 2 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        2
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div title="Tin STANDARD"
                                                                    class="tg-themetag tg-featuretag standard">
                                                                    standard
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn Marketing Web"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-marketing-web-18643844789.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn Marketing Web - Công Ty TNHH Thương Mại Dịch Vụ Web Ideas"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/173820-200x200.jpg?v=1714115322"
                                                                                        alt="Công Ty TNHH Thương Mại Dịch Vụ Web Ideas"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-marketing-web-18643844789.html"
                                                                                        title="Nhân Viên Tư Vấn Marketing Web">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn
                                                                                        Marketing
                                                                                        Web</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Dịch Vụ Web Ideas"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-dich-vu-web-ideas-2393814752.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Web
                                                                                        Ideas</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 9 - 25 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        9
                                                                                        -
                                                                                        25
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 1 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        1
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Seo Marketing/Seo Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-marketing-seo-website-18633334643.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Seo Marketing/Seo Website - Công Ty TNHH Thương Mại Dịch Vụ Xuất Nhập Khẩu Hải Minh"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/1189-200x200.jpg?v=1584953783"
                                                                                        alt="Công Ty TNHH Thương Mại Dịch Vụ Xuất Nhập Khẩu Hải Minh"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-marketing-seo-website-18633334643.html"
                                                                                        title="Nhân Viên Seo Marketing/Seo Website">Nhân
                                                                                        Viên
                                                                                        Seo
                                                                                        Marketing/Seo
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Thương Mại Dịch Vụ Xuất Nhập Khẩu Hải Minh"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-dich-vu-xuat-nhap-khau-hai-minh-49658403.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Xuất
                                                                                        Nhập
                                                                                        Khẩu
                                                                                        Hải
                                                                                        Minh</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 31 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        31
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Chuyên Viên IT - Web Developer"
                                                                                    href="https://jobsgo.vn/viec-lam/chuyen-vien-it-web-developer-18791720099.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Chuyên Viên IT - Web Developer - Trường Đại học Hoa Sen"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/4506-200x200.jpg?v=1618933887"
                                                                                        alt="Trường Đại học Hoa Sen"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/chuyen-vien-it-web-developer-18791720099.html"
                                                                                        title="Chuyên Viên IT - Web Developer">Chuyên
                                                                                        Viên
                                                                                        IT
                                                                                        -
                                                                                        Web
                                                                                        Developer</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Trường Đại học Hoa Sen"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/truong-dai-hoc-hoa-sen-94699946.html">Trường
                                                                                        Đại
                                                                                        học
                                                                                        Hoa
                                                                                        Sen</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 15 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        15
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 2 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        2
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 10 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        10
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên SEO Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-18841324186.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên SEO Website - Công ty TNHH Thương Mại Dịch Vụ Sài Gòn Xuân Phát"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/90872-200x200.jpg?v=1659079644"
                                                                                        alt="Công ty TNHH Thương Mại Dịch Vụ Sài Gòn Xuân Phát"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-18841324186.html"
                                                                                        title="Nhân Viên SEO Website">Nhân
                                                                                        Viên
                                                                                        SEO
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công ty TNHH Thương Mại Dịch Vụ Sài Gòn Xuân Phát"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-thuong-mai-dich-vu-sai-gon-xuan-phat-1267463860.html">Công
                                                                                        ty
                                                                                        TNHH
                                                                                        Thương
                                                                                        Mại
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Sài
                                                                                        Gòn
                                                                                        Xuân
                                                                                        Phát</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 9 - 12 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        9
                                                                                        -
                                                                                        12
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 4 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        4
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Content Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-content-website-18878680015.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Content Website - Công Ty Cổ Phần Minh Housewares"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/196078-200x200.jpg?v=1720166606"
                                                                                        alt="Công Ty Cổ Phần Minh Housewares"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-content-website-18878680015.html"
                                                                                        title="Nhân Viên Content Website">Nhân
                                                                                        Viên
                                                                                        Content
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Minh Housewares"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-minh-housewares-2696056134.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Minh
                                                                                        Housewares</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 8 - 12 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        8
                                                                                        -
                                                                                        12
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 1 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        1
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Tư Vấn Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-website-18638155188.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Tư Vấn Website - Công Ty TNHH Truyền Thông Và Quảng Cáo Siêu Kinh Doanh"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/65078-200x200.jpg?v=1713863627"
                                                                                        alt="Công Ty TNHH Truyền Thông Và Quảng Cáo Siêu Kinh Doanh"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-tu-van-website-18638155188.html"
                                                                                        title="Nhân Viên Tư Vấn Website">Nhân
                                                                                        Viên
                                                                                        Tư
                                                                                        Vấn
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Truyền Thông Và Quảng Cáo Siêu Kinh Doanh"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-truyen-thong-va-quang-cao-sieu-kinh-doanh-917207134.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Truyền
                                                                                        Thông
                                                                                        Và
                                                                                        Quảng
                                                                                        Cáo
                                                                                        Siêu
                                                                                        Kinh
                                                                                        Doanh</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 7 - 15 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        7
                                                                                        -
                                                                                        15
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Dưới 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Dưới
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 30 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        30
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Web Developer (Middle)"
                                                                                    href="https://jobsgo.vn/viec-lam/web-developer-middle-18661429594.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Web Developer (Middle) - Công Ty TNHH Live Group Việt Nam"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/99408-200x200.jpg?v=1671095548"
                                                                                        alt="Công Ty TNHH Live Group Việt Nam"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/web-developer-middle-18661429594.html"
                                                                                        title="Web Developer (Middle)">Web
                                                                                        Developer
                                                                                        (Middle)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Live Group Việt Nam"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-live-group-viet-nam-1383374204.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Live
                                                                                        Group
                                                                                        Việt
                                                                                        Nam</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 25 - 34 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        25
                                                                                        -
                                                                                        34
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 4 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        4
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 29 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        29
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Seo Website Mảng Máy Móc Thiết Bị (Hà Nội, Hồ Chí Minh)"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-mang-may-moc-thiet-bi-ha-noi-ho-chi-minh-18759551448.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Seo Website Mảng Máy Móc Thiết Bị (Hà Nội, Hồ Chí Minh) - công ty TNHH TMDV XNK Hải Minh"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/178817-200x200.jpg?v=1718261766"
                                                                                        alt="công ty TNHH TMDV XNK Hải Minh"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-mang-may-moc-thiet-bi-ha-noi-ho-chi-minh-18759551448.html"
                                                                                        title="Nhân Viên Seo Website Mảng Máy Móc Thiết Bị (Hà Nội, Hồ Chí Minh)">Nhân
                                                                                        Viên
                                                                                        Seo
                                                                                        Website
                                                                                        Mảng
                                                                                        Máy
                                                                                        Móc
                                                                                        Thiết
                                                                                        Bị
                                                                                        (Hà
                                                                                        Nội,
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="công ty TNHH TMDV XNK Hải Minh"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-tmdv-xnk-hai-minh-2461669015.html">công
                                                                                        ty
                                                                                        TNHH
                                                                                        TMDV
                                                                                        XNK
                                                                                        Hải
                                                                                        Minh</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 10 - 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        10
                                                                                        -
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 2 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        2
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 14 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        14
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Lập Trình Web - Front-End Developers Reactjs"
                                                                                    href="https://jobsgo.vn/viec-lam/lap-trinh-web-front-end-developers-reactjs-18667743829.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Lập Trình Web - Front-End Developers Reactjs - Công Ty Cổ Phần Công Nghệ MIDEAS"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/82504-200x200.jpg?v=1642214167"
                                                                                        alt="Công Ty Cổ Phần Công Nghệ MIDEAS"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/lap-trinh-web-front-end-developers-reactjs-18667743829.html"
                                                                                        title="Lập Trình Web - Front-End Developers Reactjs">Lập
                                                                                        Trình
                                                                                        Web
                                                                                        -
                                                                                        Front-End
                                                                                        Developers
                                                                                        Reactjs</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Công Nghệ MIDEAS"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-cong-nghe-mideas-1153834788.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Công
                                                                                        Nghệ
                                                                                        MIDEAS</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 7 - 15 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        7
                                                                                        -
                                                                                        15
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 28 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        28
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Webmaster (Quản Trị Trang Web)"
                                                                                    href="https://jobsgo.vn/viec-lam/webmaster-quan-tri-trang-web-18722467199.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Webmaster (Quản Trị Trang Web) - CÔNG TY TNHH CRAFTSMAN KITCHEN COMPONENTS VIỆT NAM"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/196867-200x200.jpg?v=1720514659"
                                                                                        alt="CÔNG TY TNHH CRAFTSMAN KITCHEN COMPONENTS VIỆT NAM"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/webmaster-quan-tri-trang-web-18722467199.html"
                                                                                        title="Webmaster (Quản Trị Trang Web)">Webmaster
                                                                                        (Quản
                                                                                        Trị
                                                                                        Trang
                                                                                        Web)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="CÔNG TY TNHH CRAFTSMAN KITCHEN COMPONENTS VIỆT NAM"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-craftsman-kitchen-components-viet-nam-2706769965.html">CÔNG
                                                                                        TY
                                                                                        TNHH
                                                                                        CRAFTSMAN
                                                                                        KITCHEN
                                                                                        COMPONENTS
                                                                                        VIỆT
                                                                                        NAM</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Đồng Nai"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Đồng
                                                                                        Nai</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 2 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        2
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 22 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        22
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Web Designer"
                                                                                    href="https://jobsgo.vn/viec-lam/web-designer-18760936506.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Web Designer - ARIZE CO., LTD"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/199084-200x200.jpg?v=1721287865"
                                                                                        alt="ARIZE CO., LTD"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/web-designer-18760936506.html"
                                                                                        title="Web Designer">Web
                                                                                        Designer</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="ARIZE CO., LTD"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/arize-co-ltd-2736874608.html">ARIZE
                                                                                        CO.,
                                                                                        LTD</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 14 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        14
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên SEO Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-18889665426.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên SEO Website - Công Ty Cổ Phần Dịch Vụ Thương Mại Du Lịch Viettourist"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/87720-200x200.jpg?v=1651078016"
                                                                                        alt="Công Ty Cổ Phần Dịch Vụ Thương Mại Du Lịch Viettourist"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-18889665426.html"
                                                                                        title="Nhân Viên SEO Website">Nhân
                                                                                        Viên
                                                                                        SEO
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Dịch Vụ Thương Mại Du Lịch Viettourist"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-dich-vu-thuong-mai-du-lich-viettourist-1224662852.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Dịch
                                                                                        Vụ
                                                                                        Thương
                                                                                        Mại
                                                                                        Du
                                                                                        Lịch
                                                                                        Viettourist</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 2 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        2
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Web Developer And Designer (Html)"
                                                                                    href="https://jobsgo.vn/viec-lam/web-developer-and-designer-html-18725753317.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Web Developer And Designer (Html) - ARIZE CO., LTD"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/199084-200x200.jpg?v=1721287865"
                                                                                        alt="ARIZE CO., LTD"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/web-developer-and-designer-html-18725753317.html"
                                                                                        title="Web Developer And Designer (Html)">Web
                                                                                        Developer
                                                                                        And
                                                                                        Designer
                                                                                        (Html)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="ARIZE CO., LTD"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/arize-co-ltd-2736874608.html">ARIZE
                                                                                        CO.,
                                                                                        LTD</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Thỏa thuận">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Thỏa
                                                                                        thuận</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 3 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        3
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 21 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        21
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Web Developer (Middle Level)"
                                                                                    href="https://jobsgo.vn/viec-lam/web-developer-middle-level-18763910307.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Web Developer (Middle Level) - Công Ty Cổ Phần Công Nghệ Giáo Dục AES"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/58154-200x200.jpg?v=1615885335"
                                                                                        alt="Công Ty Cổ Phần Công Nghệ Giáo Dục AES"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/web-developer-middle-level-18763910307.html"
                                                                                        title="Web Developer (Middle Level)">Web
                                                                                        Developer
                                                                                        (Middle
                                                                                        Level)</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Công Nghệ Giáo Dục AES"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-cong-nghe-giao-duc-aes-823186138.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Công
                                                                                        Nghệ
                                                                                        Giáo
                                                                                        Dục
                                                                                        AES</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 19 - 21 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        19
                                                                                        -
                                                                                        21
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 2 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        2
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 14 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        14
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Seo Web Du Lịch"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-web-du-lich-18850232010.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Seo Web Du Lịch - Công Ty TNHH Du Lịch Quốc Tế Đại Việt"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/31218-200x200.jpg?v=1567568932"
                                                                                        alt="Công Ty TNHH Du Lịch Quốc Tế Đại Việt"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-web-du-lich-18850232010.html"
                                                                                        title="Nhân Viên Seo Web Du Lịch">Nhân
                                                                                        Viên
                                                                                        Seo
                                                                                        Web
                                                                                        Du
                                                                                        Lịch</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Du Lịch Quốc Tế Đại Việt"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-du-lich-quoc-te-dai-viet-457422194.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Du
                                                                                        Lịch
                                                                                        Quốc
                                                                                        Tế
                                                                                        Đại
                                                                                        Việt</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 8 - 20 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        8
                                                                                        -
                                                                                        20
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Không yêu cầu">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Không
                                                                                        yêu
                                                                                        cầu</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 3 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        3
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Quản Trị Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-quan-tri-website-18889923427.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Quản Trị Website - Công Ty TNHH Ameri Group"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/110633-200x200.jpg?v=1681447164"
                                                                                        alt="Công Ty TNHH Ameri Group"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-quan-tri-website-18889923427.html"
                                                                                        title="Nhân Viên Quản Trị Website">Nhân
                                                                                        Viên
                                                                                        Quản
                                                                                        Trị
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty TNHH Ameri Group"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-ameri-group-1535798479.html">Công
                                                                                        Ty
                                                                                        TNHH
                                                                                        Ameri
                                                                                        Group</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hồ Chí Minh"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hồ
                                                                                        Chí
                                                                                        Minh</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 11 - 14 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        11
                                                                                        -
                                                                                        14
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 2 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        2
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 2 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        2
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên SEO Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-18684350946.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên SEO Website - Công Ty Cổ Phần Mobitrip"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/65577-200x200.jpg?v=1624585263"
                                                                                        alt="Công Ty Cổ Phần Mobitrip"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-seo-website-18684350946.html"
                                                                                        title="Nhân Viên SEO Website">Nhân
                                                                                        Viên
                                                                                        SEO
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Mobitrip"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-mobitrip-923983055.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Mobitrip</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 6 - 12 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        6
                                                                                        -
                                                                                        12
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 25 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        25
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Technical Leader Web"
                                                                                    href="https://jobsgo.vn/viec-lam/technical-leader-web-18765050943.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Technical Leader Web - Công Ty Cổ Phần Bee Tech Asia "
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/179323-200x200.jpg?v=1719543735"
                                                                                        alt="Công Ty Cổ Phần Bee Tech Asia "
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/technical-leader-web-18765050943.html"
                                                                                        title="Technical Leader Web">Technical
                                                                                        Leader
                                                                                        Web</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="Công Ty Cổ Phần Bee Tech Asia "
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-co-phan-bee-tech-asia-2468539989.html">Công
                                                                                        Ty
                                                                                        Cổ
                                                                                        Phần
                                                                                        Bee
                                                                                        Tech
                                                                                        Asia
                                                                                    </a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: 30 - 45 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        30
                                                                                        -
                                                                                        45
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 3 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        3
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 14 ngày trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        14
                                                                                        ngày
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="item-click">
                                                            <article class="article">
                                                                <div class="brows-job-list">
                                                                    <div class="col-sm-12">
                                                                        <div class="item-fl-box clearfix">
                                                                            <div class="brows-job-company-img">
                                                                                <a title="Nhân Viên Content Website"
                                                                                    href="https://jobsgo.vn/viec-lam/nhan-vien-content-website-18890032059.html"><img
                                                                                        width="65" height="65"
                                                                                        title="Nhân Viên Content Website - CÔNG TY TNHH ĐẦU TƯ THƯƠNG MẠI VÀ CHĂM SÓC SỨC KHỎE INCOM VIỆT NAM"
                                                                                        onerror="this.src='/img/cj.jpg'"
                                                                                        loading="lazy"
                                                                                        src="https://jobsgo.vn/media/img/employer/182558-200x200.jpg?v=1715857274"
                                                                                        alt="CÔNG TY TNHH ĐẦU TƯ THƯƠNG MẠI VÀ CHĂM SÓC SỨC KHỎE INCOM VIỆT NAM"
                                                                                        class="img-responsive" /></a>
                                                                            </div>
                                                                            <div class="brows-job-position">
                                                                                <h3 class="h3 tooltip"> <a
                                                                                        target="_blank"
                                                                                        href="https://jobsgo.vn/viec-lam/nhan-vien-content-website-18890032059.html"
                                                                                        title="Nhân Viên Content Website">Nhân
                                                                                        Viên
                                                                                        Content
                                                                                        Website</a>
                                                                                </h3>
                                                                                <p class="font-13">
                                                                                    <a title="CÔNG TY TNHH ĐẦU TƯ THƯƠNG MẠI VÀ CHĂM SÓC SỨC KHỎE INCOM VIỆT NAM"
                                                                                        class="font-italic"
                                                                                        href="https://jobsgo.vn/tuyen-dung/cong-ty-tnhh-dau-tu-thuong-mai-va-cham-soc-suc-khoe-incom-viet-nam-2512468054.html">CÔNG
                                                                                        TY
                                                                                        TNHH
                                                                                        ĐẦU
                                                                                        TƯ
                                                                                        THƯƠNG
                                                                                        MẠI
                                                                                        VÀ
                                                                                        CHĂM
                                                                                        SÓC
                                                                                        SỨC
                                                                                        KHỎE
                                                                                        INCOM
                                                                                        VIỆT
                                                                                        NAM</a>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Địa điểm: Hà Nội"><i
                                                                                            class="bx bx-map"></i>
                                                                                        Hà
                                                                                        Nội</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Mức lương: Đến 14 triệu VNĐ">
                                                                                        <i class="bx bx-money"></i>
                                                                                        Đến
                                                                                        14
                                                                                        triệu
                                                                                        VNĐ</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Loại hình: Full-time">
                                                                                        <i class="bx bx-briefcase"></i>
                                                                                        Full-time</span>
                                                                                </p>

                                                                                <p class="font-12">
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Yêu cầu kinh nghiệm: Trên 1 năm">
                                                                                        <i class="bx bx-star"></i>
                                                                                        Trên
                                                                                        1
                                                                                        năm</span>
                                                                                    <span data-toggle="tooltip"
                                                                                        title="Thời gian cập nhật: 2 giờ trước">
                                                                                        <i class="bx bx-refresh"></i>
                                                                                        2
                                                                                        giờ
                                                                                        trước</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix mrg-top-5" id="pagination">
                                            <div class="text-center">
                                                <ul class="pagination">
                                                    <li class="prev disabled">
                                                        <span>&laquo;</span>
                                                    </li>
                                                    <li class="active">
                                                        <a href="/viec-lam-web.html" data-page="0">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="/viec-lam-web.html?page=2" data-page="1">2</a>
                                                    </li>
                                                    <li class="next">
                                                        <a href="/viec-lam-web.html?page=2" data-page="1">&raquo;</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="list-employer-search mrg-top-25">
                                            <div class="panel panel-flat">
                                                <div class="panel-heading mrg-bot-15">
                                                    <h6 class="panel-title text-uppercase">
                                                        <a target="_blank" href="/cong-ty.html">Công ty
                                                            <span class="text-blue-700-bk">liên
                                                                quan</span>
                                                        </a>
                                                    </h6>
                                                    <div class="heading-elements">
                                                        <a target="_blank" href="/cong-ty.html"
                                                            class="heading-text text-blue-700">Xem thêm
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="size-6">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="list-employer-carousel colorgb-carousel-df clearfix">
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-co-phan-dau-tu-ung-dung-cong-nghe-viet-51573042.html"><img
                                                                            title="Công Ty Cổ Phần Đầu Tư Ứng Dụng Công Nghệ Việt"
                                                                            width="90" height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/1330-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công Ty Cổ Phần Đầu Tư Ứng Dụng Công Nghệ Việt" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công Ty Cổ Phần Đầu Tư Ứng Dụng Công Nghệ Việt"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-co-phan-dau-tu-ung-dung-cong-nghe-viet-51573042.html">Công
                                                                            Ty
                                                                            Cổ
                                                                            Phần
                                                                            Đầu
                                                                            Tư
                                                                            Ứng
                                                                            Dụng
                                                                            Công
                                                                            Nghệ
                                                                            Việt</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-co-phan-3b-viet-nam-156633765.html"><img
                                                                            title="Công Ty Cổ Phần 3B Việt Nam"
                                                                            width="90" height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/9067-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công Ty Cổ Phần 3B Việt Nam" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công Ty Cổ Phần 3B Việt Nam"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-co-phan-3b-viet-nam-156633765.html">Công
                                                                            Ty
                                                                            Cổ
                                                                            Phần
                                                                            3B
                                                                            Việt
                                                                            Nam</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-tnhh-hoang-web-249948653.html"><img
                                                                            title="Công TY TNHH Hoàng Web" width="90"
                                                                            height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/15939-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công TY TNHH Hoàng Web" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công TY TNHH Hoàng Web"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-tnhh-hoang-web-249948653.html">Công
                                                                            TY
                                                                            TNHH
                                                                            Hoàng
                                                                            Web</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-tnhh-cong-nghe-web-so-823199717.html"><img
                                                                            title="Công Ty TNHH Công Nghệ Web Số"
                                                                            width="90" height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/58155-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công Ty TNHH Công Nghệ Web Số" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công Ty TNHH Công Nghệ Web Số"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-tnhh-cong-nghe-web-so-823199717.html">Công
                                                                            Ty
                                                                            TNHH
                                                                            Công
                                                                            Nghệ
                                                                            Web
                                                                            Số</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-tnhh-web-media-45611861.html"><img
                                                                            title="Công ty TNHH Web Media" width="90"
                                                                            height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/891-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công ty TNHH Web Media" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công ty TNHH Web Media"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-tnhh-web-media-45611861.html">Công
                                                                            ty
                                                                            TNHH
                                                                            Web
                                                                            Media</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-tnhh-bm-web-1216433978.html"><img
                                                                            title="Công Ty TNHH BM Web" width="90"
                                                                            height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/87114-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công Ty TNHH BM Web" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold" title="Công Ty TNHH BM Web"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-tnhh-bm-web-1216433978.html">Công
                                                                            Ty
                                                                            TNHH
                                                                            BM
                                                                            Web</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-tnhh-thiet-ke-web-281316143.html"><img
                                                                            title="Công Ty TNHH Thiết Kế Web" width="90"
                                                                            height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/18249-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công Ty TNHH Thiết Kế Web" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công Ty TNHH Thiết Kế Web"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-tnhh-thiet-ke-web-281316143.html">Công
                                                                            Ty
                                                                            TNHH
                                                                            Thiết
                                                                            Kế
                                                                            Web</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-tnhh-web-phu-kien-603450760.html"><img
                                                                            title="Công Ty TNHH Web Phụ Kiện" width="90"
                                                                            height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/41972-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công Ty TNHH Web Phụ Kiện" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công Ty TNHH Web Phụ Kiện"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-tnhh-web-phu-kien-603450760.html">Công
                                                                            Ty
                                                                            TNHH
                                                                            Web
                                                                            Phụ
                                                                            Kiện</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-tnhh-web-pro-vietnam-700350504.html"><img
                                                                            title="Công Ty TNHH Web-Pro (Vietnam)"
                                                                            width="90" height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/49108-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công Ty TNHH Web-Pro (Vietnam)" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công Ty TNHH Web-Pro (Vietnam)"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-tnhh-web-pro-vietnam-700350504.html">Công
                                                                            Ty
                                                                            TNHH
                                                                            Web-Pro
                                                                            (Vietnam)</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item padd-l-10 padd-r-10">
                                                        <div class="clearfix">
                                                            <div class="text-center">
                                                                <div>
                                                                    <a target="_blank"
                                                                        href="/tuyen-dung/cong-ty-tnhh-web-nha-thuoc-930202237.html"><img
                                                                            title="Công Ty TNHH Web Nhà Thuốc"
                                                                            width="90" height="90"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                                                            data-src="https://jobsgo.vn/media/img/employer/66035-200x200.jpg"
                                                                            class="img-fluid lazy"
                                                                            alt="Công Ty TNHH Web Nhà Thuốc" /></a>
                                                                </div>
                                                                <div>
                                                                    <h5>
                                                                        <a class="text-bold"
                                                                            title="Công Ty TNHH Web Nhà Thuốc"
                                                                            target="_blank"
                                                                            href="/tuyen-dung/cong-ty-tnhh-web-nha-thuoc-930202237.html">Công
                                                                            Ty
                                                                            TNHH
                                                                            Web
                                                                            Nhà
                                                                            Thuốc</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="report">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="padd-top-15">
                                        <div></div>

                                        <div class="hidden-xs">
                                            <div></div>
                                        </div>

                                        <div class="mrg-bot-20">
                                            <a href="https://jobsgo.vn/viec-lam/tu-van-vien-qua-dien-thoai-tai-tphcm-18797640543.html"
                                                target="_blank">
                                                <picture><img width="100" height="100" loading="lazy"
                                                        src="https://jobsgo.vn/blog/wp-content/uploads/2024/09/Navigate-Your-14.png"
                                                        width="100%" class="img-responsive" alt="JobsGO Banner" />
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="blog-sidebar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gray-bg padd-top-15 hide padd-bot-15 brows-job-category job-list full">
        <div class="container">
            <div class="row">
                <img width="100" height="100" src="https://jobsgo.vn/loading.gif"
                    style="display: block; margin: auto" />
            </div>
        </div>
    </section>

    <section class="padd-top-5 teks-seo">
        <div class="container">
            <div class="txt-seo-mrg-top-5">
                <style>
                    .txt-seo {
                        background: #fff;
                    }

                    .txt-seo>div {
                        margin-bottom: 10px;
                    }

                    .txt-seo h2 {
                        font-size: 18px !important;
                        font-weight: bold;
                        line-height: 1.3;
                        margin-top: 10px;
                    }

                    body .txt-seo p,
                    body .txt-seo span {
                        font-size: 13px !important;
                    }

                    .txt-seo h3 {
                        font-size: 15px !important;
                        font-weight: bold;
                        line-height: 1.3;
                        overflow: hidden;
                    }

                    .list-employer li {
                        list-style: none;
                        width: 33%;
                        float: left;
                        border: 1px solid #eee;
                        margin: 20px 0 15px;
                    }
                </style>

                <div class="mt-10"></div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20">
                        <div class="mrg-bot-5 h4">
                            Việc làm tại Địa điểm
                            <a href="javascript:void(0)" class="pull-right">
                                <i class="fa fa-angle-double-down"></i></a>
                        </div>
                        <ul class="sidebar-list expandible-bk">
                            <li>
                                <a href="/ho-chi-minh.html" title="Hồ Chí Minh">
                                    <div class="txt text-capitalize">
                                        Hồ Chí Minh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/ha-noi.html" title="Hà Nội">
                                    <div class="txt text-capitalize">
                                        Hà Nội
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/binh-duong.html" title="Bình Dương">
                                    <div class="txt text-capitalize">
                                        Bình Dương
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/dong-nai.html" title="Đồng Nai">
                                    <div class="txt text-capitalize">
                                        Đồng Nai
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/da-nang.html" title="Đà Nẵng">
                                    <div class="txt text-capitalize">
                                        Đà Nẵng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/bac-ninh.html" title="Bắc Ninh">
                                    <div class="txt text-capitalize">
                                        Bắc Ninh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/bac-giang.html" title="Bắc Giang">
                                    <div class="txt text-capitalize">
                                        Bắc Giang
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/hai-phong.html" title="Hải Phòng">
                                    <div class="txt text-capitalize">
                                        Hải Phòng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/ba-ria-vung-tau.html" title="Bà Rịa - Vũng Tàu">
                                    <div class="txt text-capitalize">
                                        Bà Rịa - Vũng Tàu
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/long-an.html" title="Long An">
                                    <div class="txt text-capitalize">
                                        Long An
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/hai-duong.html" title="Hải Dương">
                                    <div class="txt text-capitalize">
                                        Hải Dương
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/quang-ninh.html" title="Quảng Ninh">
                                    <div class="txt text-capitalize">
                                        Quảng Ninh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/kien-giang.html" title="Kiên Giang">
                                    <div class="txt text-capitalize">
                                        Kiên Giang
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/can-tho.html" title="Cần Thơ">
                                    <div class="txt text-capitalize">
                                        Cần Thơ
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20">
                        <div class="mrg-bot-5 h4">
                            Việc làm theo Ngành nghề
                            <a href="javascript:void(0)" class="pull-right">
                                <i class="fa fa-angle-double-down"></i></a>
                        </div>
                        <ul class="sidebar-list expandible-bk">
                            <li>
                                <a href="/viec-lam-dien-dien-tu-dien-lanh.html" title="Điện/Điện Tử/Điện Lạnh">
                                    <div class="txt text-capitalize">
                                        Điện/Điện Tử/Điện Lạnh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-it-phan-mem.html" title="IT Phần Mềm">
                                    <div class="txt text-capitalize">
                                        IT Phần Mềm
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-it-phan-cung.html" title="IT Phần Cứng">
                                    <div class="txt text-capitalize">
                                        IT Phần Cứng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-thiet-ke.html" title="Thiết Kế">
                                    <div class="txt text-capitalize">
                                        Thiết Kế
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-marketing.html" title="Marketing">
                                    <div class="txt text-capitalize">
                                        Marketing
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-truyen-thong-pr-quang-cao.html" title="Truyền Thông/PR/Quảng Cáo">
                                    <div class="txt text-capitalize">
                                        Truyền Thông/PR/Quảng Cáo
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-kinh-doanh-ban-hang.html" title="Kinh Doanh/Bán Hàng">
                                    <div class="txt text-capitalize">
                                        Kinh Doanh/Bán Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-su.html" title="Nhân Sự">
                                    <div class="txt text-capitalize">
                                        Nhân Sự
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-hanh-chinh-van-phong.html" title="Hành Chính/Văn Phòng">
                                    <div class="txt text-capitalize">
                                        Hành Chính/Văn Phòng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-lao-dong-pho-thong.html" title="Lao Động Phổ Thông">
                                    <div class="txt text-capitalize">
                                        Lao Động Phổ Thông
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ban-si-ban-le-cua-hang.html" title="Bán Sỉ/Bán Lẻ/Cửa Hàng">
                                    <div class="txt text-capitalize">
                                        Bán Sỉ/Bán Lẻ/Cửa Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-dau-thau-du-an.html" title="Đấu Thầu/Dự Án">
                                    <div class="txt text-capitalize">
                                        Đấu Thầu/Dự Án
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-xuat-nhap-khau.html" title="Xuất Nhập Khẩu">
                                    <div class="txt text-capitalize">
                                        Xuất Nhập Khẩu
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-bao-hiem.html" title="Bảo Hiểm">
                                    <div class="txt text-capitalize">
                                        Bảo Hiểm
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-bat-dong-san.html" title="Bất Động Sản">
                                    <div class="txt text-capitalize">
                                        Bất Động Sản
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nha-hang-khach-san.html" title="Nhà Hàng/Khách Sạn">
                                    <div class="txt text-capitalize">
                                        Nhà Hàng/Khách Sạn
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-co-khi-o-to-tu-dong-hoa.html" title="Cơ Khí/Ô Tô/Tự Động Hóa">
                                    <div class="txt text-capitalize">
                                        Cơ Khí/Ô Tô/Tự Động Hóa
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-spa-lam-dep.html" title="Spa/Làm Đẹp">
                                    <div class="txt text-capitalize">
                                        Spa/Làm Đẹp
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-y-te.html" title="Y Tế">
                                    <div class="txt text-capitalize">
                                        Y Tế
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-mo-dia-chat.html" title="Mỏ/Địa Chất">
                                    <div class="txt text-capitalize">
                                        Mỏ/Địa Chất
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-an-toan-lao-dong.html" title="An Toàn Lao Động">
                                    <div class="txt text-capitalize">
                                        An Toàn Lao Động
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-bien-phien-dich.html" title="Biên Phiên Dịch">
                                    <div class="txt text-capitalize">
                                        Biên Phiên Dịch
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-vien-thong.html" title="Viễn Thông">
                                    <div class="txt text-capitalize">
                                        Viễn Thông
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-tai-chinh-ngan-hang.html" title="Tài Chính/Ngân Hàng">
                                    <div class="txt text-capitalize">
                                        Tài Chính/Ngân Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-du-lich.html" title="Du Lịch">
                                    <div class="txt text-capitalize">
                                        Du Lịch
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-giao-duc-dao-tao.html" title="Giáo Dục/Đào Tạo">
                                    <div class="txt text-capitalize">
                                        Giáo Dục/Đào Tạo
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-in-an-che-ban.html" title="In Ấn/Chế Bản">
                                    <div class="txt text-capitalize">
                                        In Ấn/Chế Bản
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ke-toan-kiem-toan.html" title="Kế Toán/Kiểm Toán">
                                    <div class="txt text-capitalize">
                                        Kế Toán/Kiểm Toán
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-kien-truc-noi-that.html" title="Kiến Trúc/Nội Thất">
                                    <div class="txt text-capitalize">
                                        Kiến Trúc/Nội Thất
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-moi-truong.html" title="Môi Trường">
                                    <div class="txt text-capitalize">
                                        Môi Trường
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-san-xuat-lap-rap-che-bien.html" title="Sản Xuất/Lắp Ráp/Chế Biến">
                                    <div class="txt text-capitalize">
                                        Sản Xuất/Lắp Ráp/Chế Biến
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nong-lam-ngu-nghiep.html" title="Nông/Lâm/Ngư Nghiệp">
                                    <div class="txt text-capitalize">
                                        Nông/Lâm/Ngư Nghiệp
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-luat-phap-che.html" title="Luật/Pháp Chế">
                                    <div class="txt text-capitalize">
                                        Luật/Pháp Chế
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-kho-van.html" title="Kho Vận">
                                    <div class="txt text-capitalize">
                                        Kho Vận
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-xay-dung.html" title="Xây Dựng">
                                    <div class="txt text-capitalize">
                                        Xây Dựng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-det-may-da-giay.html" title="Dệt May/Da Giày">
                                    <div class="txt text-capitalize">
                                        Dệt May/Da Giày
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-cham-soc-khach-hang.html" title="Chăm Sóc Khách Hàng">
                                    <div class="txt text-capitalize">
                                        Chăm Sóc Khách Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-truyen-hinh-bao-chi.html" title="Truyền Hình/Báo Chí">
                                    <div class="txt text-capitalize">
                                        Truyền Hình/Báo Chí
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-thu-mua.html" title="Thu Mua">
                                    <div class="txt text-capitalize">
                                        Thu Mua
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-quan-ly.html" title="Quản Lý">
                                    <div class="txt text-capitalize">
                                        Quản Lý
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-hoa-sinh.html" title="Hoá Sinh">
                                    <div class="txt text-capitalize">
                                        Hoá Sinh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-van-hanh-bao-tri-bao-duong.html" title="Vận Hành/Bảo Trì/Bảo Dưỡng">
                                    <div class="txt text-capitalize">
                                        Vận Hành/Bảo Trì/Bảo Dưỡng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-khoa-hoc-ky-thuat.html" title="Khoa Học/Kỹ Thuật">
                                    <div class="txt text-capitalize">
                                        Khoa Học/Kỹ Thuật
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-duoc-pham-my-pham.html" title="Dược Phẩm/Mỹ Phẩm">
                                    <div class="txt text-capitalize">
                                        Dược Phẩm/Mỹ Phẩm
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-sang-tao-nghe-thuat.html" title="Sáng Tạo/Nghệ Thuật">
                                    <div class="txt text-capitalize">
                                        Sáng Tạo/Nghệ Thuật
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20">
                        <div class="mrg-bot-5 h4">
                            Việc làm theo Chức danh
                            <a href="javascript:void(0)" class="pull-right">
                                <i class="fa fa-angle-double-down"></i></a>
                        </div>
                        <ul class="sidebar-list expandible-bk">
                            <li>
                                <a href="/viec-lam-nhan-vien-kinh-doanh.html" title="Nhân Viên Kinh Doanh">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Kinh Doanh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-cham-soc-khach-hang.html"
                                    title="Nhân Viên Chăm Sóc Khách Hàng">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Chăm Sóc Khách Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-tu-van.html" title="Nhân Viên Tư Vấn">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Tư Vấn
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-ke-toan.html" title="Nhân Viên Kế Toán">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Kế Toán
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-marketing.html" title="Chuyên Viên Marketing">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Marketing
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-ky-thuat.html" title="Nhân Viên Kỹ Thuật">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Kỹ Thuật
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-telesale.html" title="Nhân Viên Telesale">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Telesale
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-thiet-ke.html" title="Chuyên Viên Thiết Kế">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Thiết Kế
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-tro-ly.html" title="Trợ Lý">
                                    <div class="txt text-capitalize">
                                        Trợ Lý
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-thuc-tap-sinh.html" title="Thực Tập Sinh">
                                    <div class="txt text-capitalize">
                                        Thực Tập Sinh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-hanh-chinh-nhan-su.html"
                                    title="Nhân Viên Hành Chính Nhân Sự">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Hành Chính Nhân Sự
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-qa-qc.html" title="Chuyên Viên QA/QC">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên QA/QC
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-dao-tao.html" title="Chuyên Viên Đào Tạo">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Đào Tạo
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-digital-marketing.html"
                                    title="Chuyên Viên Digital Marketing">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Digital Marketing
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-sales-admin.html" title="Sales Admin">
                                    <div class="txt text-capitalize">
                                        Sales Admin
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-tuyen-dung.html" title="Nhân Viên Tuyển Dụng">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Tuyển Dụng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-thu-mua.html" title="Nhân Viên Thu Mua">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Thu Mua
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-le-tan.html" title="Nhân Viên Lễ Tân">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Lễ Tân
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-tu-van-bao-hiem.html" title="Nhân Viên Tư Vấn Bảo Hiểm">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Tư Vấn Bảo Hiểm
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-content-marketing.html"
                                    title="Chuyên Viên Content Marketing">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Content Marketing
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-hanh-chinh.html" title="Nhân Viên Hành Chính">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Hành Chính
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-truong-phong-kinh-doanh.html" title="Trưởng Phòng Kinh Doanh">
                                    <div class="txt text-capitalize">
                                        Trưởng Phòng Kinh Doanh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-trinh-duoc-vien.html" title="Trình Dược Viên">
                                    <div class="txt text-capitalize">
                                        Trình Dược Viên
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-kho.html" title="Nhân Viên Kho">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Kho
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-xuat-nhap-khau.html" title="Nhân Viên Xuất Nhập Khẩu">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Xuất Nhập Khẩu
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-van-phong.html" title="Nhân Viên Văn Phòng">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Văn Phòng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ke-toan-noi-bo.html" title="Kế Toán Nội Bộ">
                                    <div class="txt text-capitalize">
                                        Kế Toán Nội Bộ
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-quan-ly-san-xuat.html" title="Quản Lý Sản Xuất">
                                    <div class="txt text-capitalize">
                                        Quản Lý Sản Xuất
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-ke-hoach.html" title="Chuyên Viên Kế Hoạch">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Kế Hoạch
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-giao-vien.html" title="Giáo Viên">
                                    <div class="txt text-capitalize">
                                        Giáo Viên
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-bao-tri.html" title="Nhân Viên Bảo Trì">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Bảo Trì
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-qc.html" title="Nhân Viên QC">
                                    <div class="txt text-capitalize">
                                        Nhân Viên QC
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-lap-trinh-vien.html" title="Lập Trình Viên">
                                    <div class="txt text-capitalize">
                                        Lập Trình Viên
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-van-hanh.html" title="Nhân Viên Vận Hành">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Vận Hành
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ke-toan-truong.html" title="Kế Toán Trưởng">
                                    <div class="txt text-capitalize">
                                        Kế Toán Trưởng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-quan-ly-kinh-doanh.html" title="Quản Lý Kinh Doanh">
                                    <div class="txt text-capitalize">
                                        Quản Lý Kinh Doanh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-phat-trien-thi-truong.html"
                                    title="Nhân Viên Phát Triển Thị Trường">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Phát Triển Thị Trường
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-lao-dong-pho-thong.html" title="Lao Động Phổ Thông">
                                    <div class="txt text-capitalize">
                                        Lao Động Phổ Thông
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-ky-thuat-dien-lanh.html"
                                    title="Nhân Viên Kỹ Thuật Điện Lạnh">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Kỹ Thuật Điện Lạnh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ky-su-thiet-ke.html" title="Kỹ Sư Thiết Kế">
                                    <div class="txt text-capitalize">
                                        Kỹ Sư Thiết Kế
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-cong-nghe-thong-tin.html"
                                    title="Chuyên Viên Công Nghệ Thông Tin">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Công Nghệ Thông Tin
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-thu-kho.html" title="Thủ Kho">
                                    <div class="txt text-capitalize">
                                        Thủ Kho
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-truong-phong-marketing.html" title="Trưởng Phòng Marketing">
                                    <div class="txt text-capitalize">
                                        Trưởng Phòng Marketing
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-content-marketing.html" title="Content Marketing">
                                    <div class="txt text-capitalize">
                                        Content Marketing
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-video-editor.html" title="Video Editor">
                                    <div class="txt text-capitalize">
                                        Video Editor
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-kien-truc-su.html" title="Kiến Trúc Sư">
                                    <div class="txt text-capitalize">
                                        Kiến Trúc Sư
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-thiet-ke-do-hoa.html" title="Nhân Viên Thiết Kế Đồ Họa">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Thiết Kế Đồ Họa
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-ky-thuat.html" title="Chuyên Viên Kỹ Thuật">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Kỹ Thuật
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-mua-hang.html" title="Nhân Viên Mua Hàng">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Mua Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-phuc-vu.html" title="Nhân Viên Phục Vụ">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Phục Vụ
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-dieu-duong.html" title="Điều Dưỡng">
                                    <div class="txt text-capitalize">
                                        Điều Dưỡng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-dich-vu-khach-hang.html"
                                    title="Nhân Viên Dịch Vụ Khách Hàng">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Dịch Vụ Khách Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ky-su-xay-dung.html" title="Kỹ Sư Xây Dựng">
                                    <div class="txt text-capitalize">
                                        Kỹ Sư Xây Dựng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-van-hanh-may.html" title="Nhân Viên Vận Hành Máy">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Vận Hành Máy
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ky-thuat-vien-dien-tu.html" title="Kỹ Thuật Viên Điện Tử">
                                    <div class="txt text-capitalize">
                                        Kỹ Thuật Viên Điện Tử
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-content-creator.html" title="Content Creator">
                                    <div class="txt text-capitalize">
                                        Content Creator
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-giao-vien-tieng-anh.html" title="Giáo Viên Tiếng Anh">
                                    <div class="txt text-capitalize">
                                        Giáo Viên Tiếng Anh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ky-su-ban-hang.html" title="Kỹ Sư Bán Hàng">
                                    <div class="txt text-capitalize">
                                        Kỹ Sư Bán Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-seo.html" title="Nhân Viên SEO">
                                    <div class="txt text-capitalize">
                                        Nhân Viên SEO
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-livestream.html" title="Nhân Viên Livestream">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Livestream
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-sales-manager.html" title="Sales Manager">
                                    <div class="txt text-capitalize">
                                        Sales Manager
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-trinh-duoc-vien-otc.html" title="Trình Dược Viên OTC">
                                    <div class="txt text-capitalize">
                                        Trình Dược Viên OTC
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ke-toan-thue.html" title="Kế Toán Thuế">
                                    <div class="txt text-capitalize">
                                        Kế Toán Thuế
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ky-su-co-khi.html" title="Kỹ Sư Cơ Khí">
                                    <div class="txt text-capitalize">
                                        Kỹ Sư Cơ Khí
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-thu-ngan.html" title="Thu Ngân">
                                    <div class="txt text-capitalize">
                                        Thu Ngân
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-chung-tu.html" title="Nhân Viên Chứng Từ">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Chứng Từ
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-tro-ly-kinh-doanh.html" title="Trợ Lý Kinh Doanh">
                                    <div class="txt text-capitalize">
                                        Trợ Lý Kinh Doanh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ke-toan-kho.html" title="Kế Toán Kho">
                                    <div class="txt text-capitalize">
                                        Kế Toán Kho
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-tro-ly-giam-doc.html" title="Trợ Lý Giám Đốc">
                                    <div class="txt text-capitalize">
                                        Trợ Lý Giám Đốc
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-lai-xe.html" title="Lái Xe">
                                    <div class="txt text-capitalize">
                                        Lái Xe
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-ky-su-dien.html" title="Kỹ Sư Điện">
                                    <div class="txt text-capitalize">
                                        Kỹ Sư Điện
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-nhan-su.html" title="Chuyên Viên Nhân Sự">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Nhân Sự
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-phap-che.html" title="Chuyên Viên Pháp Chế">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Pháp Chế
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-truong-nhom-kinh-doanh.html" title="Trưởng Nhóm Kinh Doanh">
                                    <div class="txt text-capitalize">
                                        Trưởng Nhóm Kinh Doanh
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-bao-ve.html" title="Nhân Viên Bảo Vệ">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Bảo Vệ
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-it.html" title="Nhân Viên IT">
                                    <div class="txt text-capitalize">
                                        Nhân Viên IT
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-phien-dich-tieng-trung.html" title="Phiên Dịch Tiếng Trung">
                                    <div class="txt text-capitalize">
                                        Phiên Dịch Tiếng Trung
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-tester.html" title="Tester">
                                    <div class="txt text-capitalize">
                                        Tester
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-le-tan.html" title="Lễ Tân">
                                    <div class="txt text-capitalize">
                                        Lễ Tân
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-kinh-doanh-online.html"
                                    title="Nhân Viên Kinh Doanh Online">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Kinh Doanh Online
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-quan-he-khach-hang.html"
                                    title="Chuyên Viên Quan Hệ Khách Hàng">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Quan Hệ Khách Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-quan-ly-cua-hang.html" title="Quản Lý Cửa Hàng">
                                    <div class="txt text-capitalize">
                                        Quản Lý Cửa Hàng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-thuc-tap-sinh-nhan-su.html" title="Thực Tập Sinh Nhân Sự">
                                    <div class="txt text-capitalize">
                                        Thực Tập Sinh Nhân Sự
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-thuc-tap-sinh-marketing.html" title="Thực Tập Sinh Marketing">
                                    <div class="txt text-capitalize">
                                        Thực Tập Sinh Marketing
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-buong-phong.html" title="Nhân Viên Buồng Phòng">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Buồng Phòng
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-nhan-vien-bep.html" title="Nhân Viên Bếp">
                                    <div class="txt text-capitalize">
                                        Nhân Viên Bếp
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-chuyen-vien-nghien-cuu.html" title="Chuyên Viên Nghiên Cứu">
                                    <div class="txt text-capitalize">
                                        Chuyên Viên Nghiên Cứu
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-cong-tac-vien.html" title="Cộng Tác Viên">
                                    <div class="txt text-capitalize">
                                        Cộng Tác Viên
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="sidebar-widget padd-top-0 padd-bot-0 mrg-top-20 mrg-bot-20">
                        <div class="mrg-bot-5 h4">
                            Việc làm theo Loại hình
                            <a href="javascript:void(0)" class="pull-right">
                                <i class="fa fa-angle-double-down"></i></a>
                        </div>
                        <ul class="sidebar-list expandible-bk">
                            <li>
                                <a href="/viec-lam-part-time.html" title="Việc làm Part-time">
                                    <div class="txt text-capitalize">
                                        Việc làm Part-time
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-thoi-vu.html" title="Việc làm Thời vụ">
                                    <div class="txt text-capitalize">
                                        Việc làm Thời vụ
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/viec-lam-remote.html" title="Việc làm Remote">
                                    <div class="txt text-capitalize">
                                        Việc làm Remote
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "/ajax/log?k=Web&p=&t=&c=&tt=63", true);
            xhttp.send();
    </script>
    <script>
        function saveJob(t) {
                var savedJob = $(t).data("saved-job");
                var jobId = $(t).data("jid");
                if (savedJob == "1") {
                    $(t).html("<i class='bx bx-heart' ></i> Lưu lại");
                    $(t).attr("data-saved-job", "0");
                    strSavedJob = getCookie("jg_saved_job");
                    strSavedJob = strSavedJob.replace(jobId, "");
                    strSavedJob = strSavedJob.replace(",,", ",");
                    strSavedJob = strSavedJob.replace(
                        /(^[,\s]+)|([,\s]+$)/g,
                        ""
                    );
                    setCookie("jg_saved_job", strSavedJob, 365);
                } else {
                    $(t).html("<i class='bx bxs-heart' ></i> Đã lưu");
                    $(t).attr("data-saved-job", "1");
                    strSavedJob = getCookie("jg_saved_job");
                    strSavedJob = strSavedJob + "," + jobId;
                    strSavedJob = strSavedJob.replace(
                        /(^[,\s]+)|([,\s]+$)/g,
                        ""
                    );
                    setCookie("jg_saved_job", strSavedJob, 365);
                }
                $.ajax({ url: "/api/set-jl?id=" + jobId });
            }
            function addScrollEvent(selector, offset) {
                $("html, body").animate(
                    {
                        scrollTop: $(selector).offset().top - offset,
                    },
                    "fast"
                );
            }

            function pagination() {
                if ($(window).width() > 1100) {
                    $(window).scroll(function () {
                        var bs = $(".blog-sidebar");
                        var bsh = bs.offset().top + bs.height();
                        var st = $(this).scrollTop();
                        if (st >= bsh) {
                            $(".colorgb-container>.row>.col-sm-3").addClass(
                                "fixed"
                            );
                        }
                        if (st < bs.height()) {
                            $(".colorgb-container>.row>.col-sm-3").removeClass(
                                "fixed"
                            );
                        }
                    });
                }

                $(".tooltip").tooltipster({
                    contentCloning: true,
                    contentAsHTML: true,
                    interactive: true,
                    trigger: "custom",
                    triggerOpen: {
                        mouseenter: true,
                    },
                    triggerClose: {
                        click: true,
                        mouseleave: true,
                    },
                    functionReady: function (origin, tooltip) {
                        var c = origin.__Content;
                        var jid = $(c).find(".btn-save-job").data("jid");

                        var element = $(
                            '.tooltipster-content [data-jid="' + jid + '"]'
                        );

                        if (element.length > 0) {
                            setTimeout(function () {
                                if (element.is(":visible")) {
                                    $.ajax({
                                        url:
                                            "/ajax/update-job-hit?requester=web_preview&id=" +
                                            jid,
                                    });
                                }
                            }, 5000);
                        }
                    },
                });

                if ($(window).width() < 567) {
                    $(
                        ".job-list .brows-job-list .brows-job-position .h3 a"
                    ).removeAttr("target");
                }
                // Sự kiện popstate sẽ được kích hoạt khi người dùng nhấp nút "Back"
                window.addEventListener("popstate", function (event) {
                    // Gọi hàm tải lại trang khi có sự kiện popstate
                    location.reload();
                });
                $(".pagination li a, .row-ajax .dropdown li>.a").click(
                    function (e) {
                        e.preventDefault();
                        $("html, body").animate({ scrollTop: 0 });
                        if (!$(this).data("sort"))
                            $(".job-list > .col-sm-9 .row-ajax").html(
                                '<img width="100" height="100" src="https://jobsgo.vn/loading.gif" style="width: 100px !important; height: 100px !important;display: block;margin: auto;">'
                            );
                        var href = $(this).attr("href");
                        var dhref = $(this).data("href");
                        href = href ?? dhref;
                        url = href;
                        var page = $(this).data("page") + 1;

                        // Thêm một mục vào lịch sử
                        var stateObj = { page: "Trang " + page };
                        var title = $("title").text().split("|");
                        if (page) title = title[0] + " | TRANG " + page;
                        var sUrl = url
                            .replace("&view=ajax", "")
                            .replace("?view=ajax", "?")
                            .replace(/\?page=1$/, "");
                        history.pushState(stateObj, title, sUrl);

                        $.ajax({
                            url:
                                url +
                                (href.includes("?") ? "&" : "?") +
                                "view=ajax",
                            success: function (result) {
                                setTimeout(function () {
                                    $(".job-list > .col-sm-9 .row-ajax").html(
                                        result
                                    ); /*history.replaceState(null, null, window.location.href.replace('?view=ajax','').replace('-trang-'+page,''));*/
                                    // Change the URL without triggering a page reload
                                    var newUrl = url
                                        .replace("&view=ajax", "")
                                        .replace("?view=ajax", "?")
                                        .replace(/\?page=1$/, "");
                                    history.replaceState(null, null, newUrl);

                                    $("title").text(title + " | JobsGO");

                                    // Sự kiện popstate sẽ được kích hoạt khi người dùng nhấp nút "Back"
                                    window.addEventListener(
                                        "popstate",
                                        function (event) {
                                            // Gọi hàm tải lại trang khi có sự kiện popstate
                                            location.reload();
                                        }
                                    );

                                    return false;
                                }, 100);
                            },
                        });
                    }
                );
            }

            window.addEventListener("load", function () {
                $(function () {
                    $(".popover").on("mouseleave", function () {
                        $(".popover .close").trigger("click");
                    });

                    localStorage.setItem("jobsgo-candidate-place-log", "");

                    pagination();
                    var e = $(".teks-search").offset();
                    var s = $(".teks-seo").offset();
                    $(window).scroll(function () {
                        if (
                            ($(window).width() > 1200 ||
                                $(window).width() < 768) &&
                            $(window).scrollTop() > e.top &&
                            $(window).scrollTop() < s.top - 200
                        ) {
                            $(".teks-search").addClass("fixed");
                        } else {
                            $(".teks-search").removeClass("fixed");
                        }
                    });
                });
            });
    </script>
</div>