$(document).ready(function () {
	function getCvId() {
		let cvId = window.location.pathname.split("/").pop();
		return cvId;
	}

	/* ======= DEMO THEME CONFIG ====== */
	$('#config-trigger').click(function (e) {
		e.preventDefault();
		if ($(this).hasClass('config-panel-open')) {
			$("#config-panel").animate({
				right: "-=170" //same as the panel width
			}, 500);
			$(this).removeClass('config-panel-open').addClass('config-panel-hide');
		} else {
			$("#config-panel").animate({
				right: "+=170" //same as the panel width
			}, 500);
			$(this).removeClass('config-panel-hide').addClass('config-panel-open');
		}
	});

	$('#config-close').on('click', function (e) {
		e.preventDefault();
		$('#config-trigger').click();
	});

	$('#color-options a').on('click', function (e) {
		e.preventDefault();
		let $styleSheet = $(this).attr('data-style');
		let $listItem = $(this).closest('li');
		let cvId = getCvId();
		
		$.ajax({
			url: '/create-resume/update-color',
			type: 'POST',
			dataType: 'json',
			data: {styleSheet: $styleSheet, cvId: cvId},
			beforeSend: function() {

			}
		})
		.done(function(response) {
			if (response.status) {
				$('#theme-style').attr('href', $styleSheet);
				$listItem.addClass('active');
				$listItem.siblings().removeClass('active');
			} else {
				autohidenotify2('error', 'left bottom', 'Thông báo', response.msg, 4000);
			}
		})
		.fail(function() {
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Xuất hiện lỗi không mong muốn. Vui lòng tải lại trang và thử lại.', 4000);
		})
		.always(function() {

		});
	});

    // update cvgo theme font family
    $('#font-family-select-options').on('change', function () {
        // get selected font
        var selectedOption = $(this).val();
        let cvId = getCvId();
        // update font
        $.ajax({
            url: '/create-resume/update-font-family',
            type: 'POST',
            dataType: 'json',
            data: {font_family: selectedOption, cvId: cvId},
            beforeSend: function () {

            }
        })
        .done(function (response) {
            if (response.status) {
                $('.font-wrapper').css("font-family", selectedOption);
                // if font family is Arial Sans-serif, change font weight to 600
                if (selectedOption == 'Arial, sans-serif'){
					$('.arial-text-font-weight').attr("style", "font-weight: 600 !important");
				}else {
					$('.arial-text-font-weight').attr("style", "font-weight: 900 !important");
				}
            } else {
                autohidenotify2('error', 'left bottom', 'Thông báo', response.msg, 4000);
            }
        })
        .fail(function () {
            autohidenotify2('error', 'left bottom', 'Thông báo', 'Không thể đổi Font chữ. Vui lòng tải lại trang và thử lại.', 4000);
        })
        .always(function () {

        });
    });

	$('#language-options a').on('click', function (e) {
		e.preventDefault();
		let language = $(this).data('language');
		let listItem = $(this).closest('li');
		let cvId = getCvId();

		$.ajax({
			url: '/create-resume/update-language',
			type: 'POST',
			dataType: 'json',
			data: {language: language, cvId: cvId},
			beforeSend: function() {

			}
		})
		.done(function(response) {
			$('#save-btn').click();
			if (response.status) {
				location.reload();
			} else {
				autohidenotify2('error', 'left bottom', 'Thông báo', response.msg, 4000);	
			}
		})
		.fail(function() {
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Xuất hiện lỗi không mong muốn. Vui lòng tải lại trang và thử lại.', 4000);
		})
		.always(function() {

		});
	});

	$('#font-size-options a').on('click', function (e) {
		e.preventDefault();
		let font_size = $(this).data('size');
		let listItem = $(this).closest('li');
		let cvId = getCvId();

		$.ajax({
			url: '/create-resume/update-font-size',
			type: 'POST',
			dataType: 'json',
			data: {font_size: font_size, cvId: cvId},
			beforeSend: function() {

			}
		})
		.done(function(response) {
			if (response.status) {
				listItem.addClass('active');
				listItem.siblings().removeClass('active');
				if (font_size == 1) {
					$('.font-wrapper').css('font-size', '0.9em');
				} else if (font_size == 2) {
					$('.font-wrapper').css('font-size', '1.0em');
				} else if (font_size == 3) {
					$('.font-wrapper').css('font-size', '1.1em');
				}
			} else {
				autohidenotify2('error', 'left bottom', 'Thông báo', response.msg, 4000);	
			}
		})
		.fail(function() {
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Xuất hiện lỗi không mong muốn. Vui lòng tải lại trang và thử lại.', 4000);
		})
		.always(function() {

		});
	});

	$('#line-height-options a').on('click', function (e) {
		e.preventDefault();
		let line_height = $(this).data('size');
		let listItem = $(this).closest('li');
		let cvId = getCvId();

		$.ajax({
			url: '/create-resume/update-line-height',
			type: 'POST',
			dataType: 'json',
			data: {line_height: line_height, cvId: cvId},
			beforeSend: function() {

			}
		})
		.done(function(response) {
			if (response.status) {
				listItem.addClass('active');
				listItem.siblings().removeClass('active');
				if (line_height == 1) {
					$('.cv-editable-elem').css('line-height', '1.2em');
				} else if (line_height == 2) {
					$('.cv-editable-elem').css('line-height', '1.4em');
				} else if (line_height == 3) {
					$('.cv-editable-elem').css('line-height', '1.6em');
				}
			} else {
				autohidenotify2('error', 'left bottom', 'Thông báo', response.msg, 4000);
			}
		})
		.fail(function() {
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Xuất hiện lỗi không mong muốn. Vui lòng tải lại trang và thử lại.', 4000);
		})
		.always(function() {

		});
	});

	$('#translate_now').on('click', function(e) {
		event.preventDefault();
		let loadingHtml = '<p><i class="fas fa-circle-notch fa-spin"></i> Đang dịch...</p>';
		let cvId = getCvId();
		$('#translate-modal-body').html(loadingHtml);
		$('#translate-modal').modal('show');
		$('#save-btn').click();
		$.ajax({
			url: '/create-resume/translate-cv',
			type: 'POST',
			dataType: 'json',
			data: {cvId: cvId},
			beforeSend: function() {
				$('#translate_now').button('loading');
			},
			complete: function () {
				$('#translate_now').button('reset');
			},
			success: function(response) {
				let html = '';
				if (response.status) {
  					html += '<div class="alert alert-primary" role="alert"><i class="far fa-lightbulb"></i> Tính năng dịch CV sử dụng công cụ Dịch Máy. Vui lòng kiểm tra lại nội dung CV trước khi sử dụng.</div>';
  					html += "<a class='btn btn-block btn-primary text-white' href='" + response.msg + "' target='_blank'>Tiếp tục <i class='fas fa-angle-right'></i></a>";
				} else {
					html += '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> ' + response.msg + '</div>';
				}
				$('#translate-modal-body').hide().html(html).fadeIn('fast');
			},
			error: function (xhr, msg) {
				
			}
		});
	});
});
