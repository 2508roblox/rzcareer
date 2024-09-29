<div>
    <ol class="cd-breadcrumb triangle custom-icons no-margin-top">
        <li class="{{ request()->is('candidate/dashboard') ? 'current btn-primary' : 'btn-default' }}">
            <a wire:navigate href="/candidate/dashboard">
                <div class="nav-item"><i class="fa fa-dashboard"></i> Bảng tin</div>
            </a>
        </li>

        <li class="{{ request()->is('candidate/import-cv-data') ? 'current btn-primary' : 'btn-default' }}">
            <a wire:navigate href="/candidate/import-cv-data">
                <div class="nav-item"><i class="fa fa-upload"></i> Tải lên CV có sẵn</div>
            </a>
        </li>

        <li class="{{ request()->is('candidate/review') ? 'current btn-primary' : 'btn-default' }}">
            <a wire:navigate href="/candidate/review">
                <div class="nav-item">
                    <i class="fa fa-exclamation-triangle"></i> Cập nhật hồ sơ
                     
                </div>
            </a>
        </li>

        <li class="{{ request()->is('cv-go') ? 'current btn-primary' : 'btn-default' }}">
            <a wire:navigate href="cv-go">
                <div class="nav-item"><i class="fa fa-user"></i> Tạo CV mới</div>
            </a>
        </li>
    </ol>
</div>
