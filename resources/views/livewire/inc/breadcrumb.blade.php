<div>
    <ol class="cd-breadcrumb triangle custom-icons no-margin-top">
        <li class="{{ request()->is('candidate/dashboard') ? 'current btn-primary' : 'btn-default' }}">
            <a  href="/candidate/dashboard">
                <div class="nav-item"><i class="fa fa-dashboard"></i> Bảng tin</div>
            </a>
        </li>

        <li class="{{ request()->is('candidate/import-cv-data') ? 'current btn-primary' : 'btn-default' }}">
            <a  href="/candidate/import-cv-data">
                <div class="nav-item"><i class="fa fa-upload"></i> Tải lên CV có sẵn</div>
            </a>
        </li>

        <li class="{{ request()->is('candidate/review') ? 'current btn-primary' : 'btn-default' }}">
            <a  href="/candidate/review">
                <div class="nav-item">
                    <i class="fa fa-exclamation-triangle"></i> Cập nhật hồ sơ

                </div>
            </a>
        </li>
        <li class="{{ request()->is('candidate/change-password') ? 'current btn-primary' : 'btn-default' }}">
            <a  href="/candidate/change-password">
                <div class="nav-item"><i class="fa fa-lock"></i> Đổi mật khẩu</div>
            </a>
        </li>
        <li class="{{ request()->is('candidate/jobs-applied') ? 'current btn-primary' : 'btn-default' }}">
            <a  href="/candidate/jobs-applied">
                <div class="nav-item"><i class="fa fa-briefcase"></i> Việc làm đã ứng tuyển</div>
            </a>
        </li>
        <li class="{{ request()->is('candidate/jobs-saved') ? 'current btn-primary' : 'btn-default' }}">
            <a  href="/candidate/jobs-saved">
                <div class="nav-item"><i class="fa fa-briefcase"></i> Việc làm đã lưu</div>
            </a>
        </li>
    </ol>
</div>
