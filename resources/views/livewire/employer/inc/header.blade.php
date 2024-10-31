<div class="mainmenu-area" data-spy="affix" data-offset-top="100">
    <div class="container">
        <!--Logo-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu"><span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span></button>
            <a href="/employer" class="navbar-brand logo employer-logo">
                <img class="tf-logo" src="/assets_livewire/logo-dark.svg" alt="">  </a>
        </div>
        <!--Logo/-->
        <nav class="collapse navbar-collapse" id="primary-menu">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/employer">Giới thiệu</a></li>

                <li><a href="/employer/candidates"><span
                            style="background: #ff4530; color: #fff; padding: 1px 5px; font-weight: bold; font-size: 9px;position: relative;top:-1px">N</span>
                        Tìm ứng viên</a></li>


                        @if(Auth::check())
                        <li class="dashboard"><a target="_blank"href="/recruiter">Bảng điều khiển</a></li>
                        <li class="dashboard" ><a wire:click='logout' >Đăng xuất </a></li>
                    @else
                        <li><a href="/employer/login">Đăng nhập</a></li>
                        <li class="sign-in"><a href="/recruiter/register">Đăng ký</a></li>
                    @endif

            </ul>
        </nav>
    </div>
</div>
