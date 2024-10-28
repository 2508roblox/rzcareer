<div class="col-sm-4">
    <div class="clearfix">
        <div class="comments-form bg-white p-4 rounded-4 shadow my-3">
            <div class="simple-tab">
                <div class="panel-group comment" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="work-process">
                            <h6 class="fs-5 fw-bold text-dark">Viết đánh giá về công ty
                            </h6>
                        </div>
                        <div id="button1" class="panel-collapse collapse show" role="tabpanel"
                            aria-labelledby="work-process">
                            <div class="panel-body">
                                <script>
                                    window.addEventListener("load", function() {
                                        $(function() {
                                            $('.review-block-rate .btn').click(function() {
                                                var tv = $(this).data('val');
                                                var btn = $(this).parent().find('.btn');
                                                btn.each(function() {
                                                    if ($(this).data('val') <= tv) {
                                                        $(this).addClass('btn-warning').removeClass('btn-grey');
                                                    } else {
                                                        $(this).addClass('btn-grey').removeClass('btn-warning');
                                                    }
                                                })
                                            });
                                            $('.btn-comment').click(function() {
                                                var rating_1 = $('.rating-1 .btn-warning').length;
                                                var rating_2 = $('.rating-2 .btn-warning').length;
                                                var rating_3 = $('.rating-3 .btn-warning').length;
                                                var rating_4 = $('.rating-4 .btn-warning').length;
                                                var rating_5 = $('.rating-5 .btn-warning').length;
                                                var title = $('.rating-title').val();
                                                var content = $('.rating-content').val();
                                                var employer_id = '39234';
                                                if (!rating_1 || !rating_2 || !rating_3 || !rating_4 || !rating_5) {
                                                    alert('Vui lòng chọn đầy đủ các tiêu chí đánh giá');
                                                } else if (!title || !content) {
                                                    alert('Vui lòng nhập đầy đủ thông tin trước khi gửi đánh giá');
                                                } else {
                                                    $.ajax({
                                                        url: "/api/employer-rating",
                                                        method: "POST",
                                                        data: {
                                                            rating_1: rating_1,
                                                            rating_2: rating_2,
                                                            rating_3: rating_3,
                                                            rating_4: rating_4,
                                                            rating_5: rating_5,
                                                            employer_id: employer_id,
                                                            title: title,
                                                            content: content,
                                                        },
                                                    }).done(function(response) {
                                                        alert(
                                                            'Thông tin đánh giá đã được gửi đi thành công và đang trong trạng thái chờ xét duyệt. Xin cảm ơn!'
                                                        );
                                                        $('.comments-form').hide();
                                                    }).fail(function(jqXHR, textStatus) {});
                                                }
                                            });
                                        });
                                    });
                                </script>

                                <script>
                                    window.addEventListener('redirect-after-pause', event => {
                                        // Get the redirect URL from the event data
                                        const url = event.detail.url;

                                        // Set a timeout to redirect after 2 seconds (2000 milliseconds)
                                        setTimeout(() => {
                                            window.location.href = url;
                                        }, 2000); // Adjust the time in milliseconds as needed
                                    });
                                </script>
                                <form class="form" enctype="multipart/form-data">
                                    <div class="col-sm-12 mb-2" wire:ignore>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div>Lương thưởng &amp; phúc lợi <span class="text-danger">*</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="review-block-rate rating-1">
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="1" wire:click="$set('rating_1', 1)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="2" wire:click="$set('rating_1', 2)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="3" wire:click="$set('rating_1', 3)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="4" wire:click="$set('rating_1', 4)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="5" wire:click="$set('rating_1', 5)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div>Đào tạo &amp; học hỏi <span class="text-danger">*</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="review-block-rate rating-2">
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="1" wire:click="$set('rating_2', 1)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="2" wire:click="$set('rating_2', 2)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="3" wire:click="$set('rating_2', 3)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="4" wire:click="$set('rating_2', 4)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="5" wire:click="$set('rating_2', 5)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div>Sự quan tâm đến nhân viên <span class="text-danger">*</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="review-block-rate rating-3">
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="1" wire:click="$set('rating_3', 1)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="2" wire:click="$set('rating_3', 2)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="3" wire:click="$set('rating_3', 3)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="4" wire:click="$set('rating_3', 4)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="5" wire:click="$set('rating_3', 5)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div>Văn hoá công ty <span class="text-danger">*</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="review-block-rate rating-4">
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="1" wire:click="$set('rating_4', 1)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="2" wire:click="$set('rating_4', 2)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="3" wire:click="$set('rating_4', 3)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="4" wire:click="$set('rating_4', 4)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="5" wire:click="$set('rating_4', 5)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div> Văn phòng làm việc <span class="text-danger">*</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="review-block-rate rating-5">
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="1" wire:click="$set('rating_5', 1)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="2" wire:click="$set('rating_5', 2)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="3" wire:click="$set('rating_5', 3)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="4" wire:click="$set('rating_5', 4)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                    <button type="button" class="btn btn-default btn-grey btn-xs"
                                                        data-val="5" wire:click="$set('rating_5', 5)"
                                                        aria-label="Left Align"><span class="bx bxs-star"
                                                            aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12"><input type="text"
                                            class="form-control mb-2 rating-title" wire:model="title"
                                            placeholder="Tiêu đề *"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control mb-2 rating-content" wire:model="content" placeholder="Nội dung *"></textarea>
                                    </div>
                                    <button wire:click="submitReview" class="thm-btn btn btn-primary btn-comment"
                                        type="button"><i class="fa fa-paper-plane-o"></i> Gửi đánh
                                        giá</button>
                                </form>
                            </div>
                            <hr>
                            <ul class="small ps-3">
                                <li>Đánh giá của bạn sẽ được ẩn danh</li>
                                <li>Giúp cho các ứng viên tìm việc hiểu rõ hơn về công
                                    ty</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
