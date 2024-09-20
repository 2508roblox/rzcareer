const blockControls = '<div class="block-controls">'
								+ '<div title="Ẩn mục này" class="remove-elem-btn"><i class="fa fa-minus"></i> Ẩn mục</div>'
							+ '</div>';
var check_save = false;
const blockControlsTmp = '<div class="block-controls">'
								+ '<div title="Chuyển mục này lên trên" class="up">▲</div>'
								+ '<div title="Chuyển mục này xuống dưới" class="down">▼</div>'
								+ '<div title="Ẩn mục này" class="remove-elem-btn"><i class="fa fa-minus"></i> Ẩn mục</div>'
							+ '</div>';

const childElemControls = '<div class="child-elem-controls">'
							+ '<div title="Chuyển mục này lên trên" class="up">▲</div>'
							+ '<div title="Chuyển mục này xuống dưới" class="down">▼</div>'
							+ '<div title="Nhân đôi mục này" class="clone"><i class="fa fa-plus"></i></div>'
							+ '<div title="Xóa mục này" class="remove">−</div>'
						+ '</div>';
						
const childElemControlsNoCopy = '<div class="child-elem-controls">'
							+ '<div title="Chuyển mục này lên trên" class="up">▲</div>'
							+ '<div title="Chuyển mục này xuống dưới" class="down">▼</div>'
							+ '<div title="Xóa mục này" class="remove">−</div>'
						+ '</div>';

const noHiddenElem = '<p class="no-hidden-item" style="text-align: center; margin-top: 15px;"><small><i>Chưa có mục nào được ẩn</i></small></p>';

const addMoreElem = '<div class="add-new-btn text-center" data-toggle="tooltip" data-placement="top" title="Thêm biểu mẫu">'
					+ '<i class="fas fa-plus"></i>'
					+ '</div>';
//loader function
function startLoader() {
	$('.loader-container').show();
	$('.resume-wrapper').css('filter', 'blur(8px)');

}
function stopLoader() {
	$('.loader-container').fadeOut('fast');
	$('.resume-wrapper').css('filter', 'blur(0px)');	
}

function loadDefaultAvatar() {
	$('#profile-picture').attr('src', '/cv_template/assets/images/upload_icon.png');
}

//for block
window.onbeforeunload = function() {
	if(check_save == true){
		return 'Dialog text here.';
	}
};
$(document).ready(function () {
	setTimeout(function() {
		$('.cv-editable-elem, p,a,span,h1,h2').bind('DOMSubtreeModified', function(){
			console.log(check_save);
			check_save = true;
			console.log(check_save);
		});
	}, 3000);
	$('#career-summary-block, #box02').click(function() {
		$('#muctieunghe').css('display', 'block');
		$('#huongdan').css('display', 'none');
		$('#sgg-info').css('display', 'none');
		$('#kinhnghiemlamviec').css('display', 'none');
		$('#nganhhoc').css('display', 'none');
		$('#kynang').css('display', 'none');
		$('#sothich').css('display', 'none');
		$('#hdxh').css('display', 'none');
		$('#giaithuong').css('display', 'none');
	});
	$('.primary-info, .secondary-info, .resume-header, .shadow-wrapper, .name-header-content-wrapper, #box01, .profile-container, .contact-container, #cvo-profile-wraper, #contact-tbl').click(function() {
		$('#sgg-info').css('display', 'block');
		$('#huongdan').css('display', 'none');
		$('#muctieunghe').css('display', 'none');
		$('#kinhnghiemlamviec').css('display', 'none');
		$('#nganhhoc').css('display', 'none');
		$('#kynang').css('display', 'none');
		$('#sothich').css('display', 'none');
		$('#hdxh').css('display', 'none');
		$('#giaithuong').css('display', 'none');
	});
	$('#experience-block, #job-history-container').click(function() {
		$('#kinhnghiemlamviec').css('display', 'block');
		$('#huongdan').css('display', 'none');
		$('#sgg-info').css('display', 'none');
		$('#muctieunghe').css('display', 'none');
		$('#nganhhoc').css('display', 'none');
		$('#kynang').css('display', 'none');
		$('#sothich').css('display', 'none');
		$('#hdxh').css('display', 'none');
		$('#giaithuong').css('display', 'none');
	});
	$('#education-block').click(function() {
		$('#nganhhoc').css('display', 'block');
		$('#huongdan').css('display', 'none');
		$('#kinhnghiemlamviec').css('display', 'none');
		$('#sgg-info').css('display', 'none');
		$('#muctieunghe').css('display', 'none');
		$('#kynang').css('display', 'none');
		$('#sothich').css('display', 'none');
		$('#hdxh').css('display', 'none');
		$('#giaithuong').css('display', 'none');
	});
	$('#skill-block, #cvo-skillgroup, #box03').click(function() {
		$('#kynang').css('display', 'block');
		$('#huongdan').css('display', 'none');
		$('#nganhhoc').css('display', 'none');
		$('#kinhnghiemlamviec').css('display', 'none');
		$('#sgg-info').css('display', 'none');
		$('#muctieunghe').css('display', 'none');
		$('#sothich').css('display', 'none');
		$('#hdxh').css('display', 'none');
		$('#giaithuong').css('display', 'none');
	});
	$('#interests-block, #cvo-interests, #box06').click(function() {
		$('#sothich').css('display', 'block');
		$('#huongdan').css('display', 'none');
		$('#kynang').css('display', 'none');
		$('#nganhhoc').css('display', 'none');
		$('#kinhnghiemlamviec').css('display', 'none');
		$('#sgg-info').css('display', 'none');
		$('#muctieunghe').css('display', 'none');
		$('#hdxh').css('display', 'none');
		$('#giaithuong').css('display', 'none');
	});
	$('#activity-block').click(function() {
		$('#hdxh').css('display', 'block');
		$('#huongdan').css('display', 'none');
		$('#sothich').css('display', 'none');
		$('#kynang').css('display', 'none');
		$('#nganhhoc').css('display', 'none');
		$('#kinhnghiemlamviec').css('display', 'none');
		$('#sgg-info').css('display', 'none');
		$('#muctieunghe').css('display', 'none');
		$('#giaithuong').css('display', 'none');
	});
	$('#award-block').click(function() {
		$('#giaithuong').css('display', 'block');
		$('#huongdan').css('display', 'none');
		$('#hdxh').css('display', 'none');
		$('#sothich').css('display', 'none');
		$('#kynang').css('display', 'none');
		$('#nganhhoc').css('display', 'none');
		$('#kinhnghiemlamviec').css('display', 'none');
		$('#sgg-info').css('display', 'none');
		$('#muctieunghe').css('display', 'none');
	});
	$(".cv-section-event").mouseover(function(){
		//show block controls
		if (!$(this).find('.block-controls').length) {
			$(this).append(blockControls);
		}

		$(this).find('.block-controls').show();
	});

	$(".cv-section-event").mouseleave(function(){
		//hide block controls
		$(this).find('.block-controls').remove();
	});

	$(document).on('click', '.remove-elem-btn', function() {
		//remove
		let my_id = $(this).parent().parent().attr("id");
		let my_title = $(this).parent().parent().attr("my-title");
		let hidden_elem = '<li class="hidden-item">' + my_title + ' <a hidden-id="' + my_id + '" title="Khôi phục mục này" href="javascript:void(0)" class="recover-hidden-item-btn"><i class="fas fa-redo"></i></a></li>'
		$('.no-hidden-item').remove();
		$('.hidden-item-list').append(hidden_elem).hide().fadeIn('fast');
		$(this).parent().parent().fadeOut('fast');
	});

	$(document).on('click', '.up', function() {
		// move up:
		var e = $(this).parent().parent();
		e.prev().insertAfter(e);
	});

	$(document).on('click', '.down', function() {
		// move down:
		var e = $(this).parent().parent();
		e.next().insertBefore(e);
	});
});

//for child elem
$(document).ready(function () {
	$(document).on('mouseleave', '.cv-child-elem', function(event) {
		event.preventDefault();
		$(this).find('.child-elem-controls').remove();
	});

	$(document).on('mouseover', '.cv-child-elem', function(event) {
		event.preventDefault();
		if (!$(this).find('.child-elem-controls').length) {
			if ($(this).hasClass('no-copy-controls')) {
				$(this).append(childElemControlsNoCopy);
			} else {
				$(this).append(childElemControls);	
			}
		}

		$(this).find('.child-elem-controls').show();
	});

	$(document).on('click', '.clone', function(event) {
		//clone
		let copy = $(this).parent().parent().clone();
		copy.find('.item-id').remove();
		$(this).parent().parent().parent().append(copy)
		$('.child-elem-controls').remove();
	});

	function getAddMoreBtn(block) {
		return '<div class="add-new-btn text-center" id="add-' + block + '-template" data-toggle="tooltip" data-placement="top" title="Thêm biểu mẫu">'
					+ '<i class="fas fa-plus"></i>'
					+ '</div>';
	}

	$(document).on('click', '.remove', function() {
		//remove
		let container = $(this).parent().parent().parent();
		let block = container.attr('block');
		let addMoreElem = getAddMoreBtn(block);
		$(this).parent().parent().remove();
		let count_child = container.children().length;
		if (count_child <= 0) {
			if (block != 'skill' && block != 'language' && block != 'hobby' && block != 'soft-skill') {
				container.html(addMoreElem);	
			}
		}
	});
});

//for recover item
$(document).ready(function() {
	$(document).on('click', '.recover-hidden-item-btn', function(event) {
		event.preventDefault();
		let hidden_id = $(this).attr('hidden-id');
		$('#' + hidden_id).fadeIn('fast');
		$(this).parent().remove();
		let count_hidden_item = $(".hidden-item").length;
		if(count_hidden_item <= 0) {
			$('.hidden-item-list').append(noHiddenElem).hide().fadeIn('fast');
		}
	});
});

//for select2 and date picker event
$(document).ready(function() {
	$(document).on('click', '#add-skill-template, #add-soft-skill-template, #add-language-template, #add-hobby-template', function(event) {
		event.preventDefault();
		$(this).parent().find('.select2-container').show();
		$(this).parent().find('.select2-container').siblings('select:enabled').select2('open');
	});

	$(document).on('select2:close', '#select-skill, #select-soft-skill, #select-language, #select-hobby, #select-skill-theme-42', function(event) {
		event.preventDefault();
		$('.select2-container').hide();
	});

	$(document).on('select2:select', '#select-skill', function(event) {
		event.preventDefault();
		let val = $(this).val();
		let text = $("#select-skill option:selected").text();
		let selected = $("#list-skill").find('[myId="' + val + '"]').length;
		let html = '';
		if (selected == 0) {
			$("#experience-modal").modal("show");
			$("#experience-confirm-btn").one('click', function (event) {
				event.preventDefault();
				let selected = $("#list-skill").find('[myId="' + val + '"]').length;
				if (selected == 0) {
					let expYear = $('#exp-year').val();
					let cv_language = localStorage.getItem('cv_language');
					let yearText = 'năm kinh nghiệm';
					let yearTitle = '';
					if (cv_language == 'en-US') {
						if (expYear == 0) {
							yearTitle = 'below 1 ';
							yearText = 'year of experience';
						} else {
							yearTitle = expYear + ' ';
							yearText = 'year(s) of experience';
						}
					} else {
						if (expYear == 0) {
							yearTitle = 'dưới 1 ';
						} else {
							yearTitle = expYear + ' ';
						}
					}

					html = '<li class="mb-2 cv-child-elem skill-item no-copy-controls" myId="' + val + '">'
								+ '<p class="d-none item-id" info-name="job_category_id" info-group="skill">' + val + '</p>'
								+ '<div class="resume-skill-name bigger-text"><strong info-name="skill_title" info-group="skill">' + text + '</strong></div>'
								+ '<p class="exp-container">'
									+ '<span class="d-none" info-name="experiment_duration" info-group="skill">' + expYear +'</span>'
									+ '<span>'
										+ '<i class="fas fa-award"></i> '
										+ '<span class="exp-year-title">' + yearTitle + '</span>'
										+ '<span class="exp-year-text">' + yearText + '</span>'
									'</span>'
								+ '</p>'
							+ '</li>';
					$('#list-skill').append(html);
					$('#exp-year').val(1);
					$('#exp-year-val').text(1);
					$("#experience-modal").modal("hide");
				}
			 });
		}
		$("#select-skill").val([]).trigger('change');
	});

	$(document).on('select2:select', '#select-soft-skill', function(event) {
		event.preventDefault();
		let val = $(this).val();
		let text = $("#select-soft-skill option:selected").text();
		let selected = $("#list-soft-skill").find('[myId=' + val + ']').length;
		if (selected == 0) {
			$("#soft-skill-modal").modal("show");
			$("#soft-skill-confirm-btn").one('click', function (event) {
				event.preventDefault();
				let selected = $("#list-soft-skill").find('[myId=' + val + ']').length;
				if (selected == 0) {
					let competently = $('#soft-skill-competently').val();
					let html = '<li class="mb-2 cv-child-elem soft-skill-item no-copy-controls" myId="' + val + '">'
									+ '<p class="d-none item-id" info-name="soft_skill_id" info-group="soft_skill">' + val + '</p>'
									+ '<div class="resume-skill-name bigger-text" info-group="soft_skill" info-name="soft_skill_name">' + text + '</div>'
									+ '<p class="d-none" info-group="soft_skill" info-name="level">' + competently + '</p>'
									+ '<div class="progress resume-progress">'
										+ '<div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: ' + competently + '%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>'
									+ '</div>'
								+ '</li>'
					$('#list-soft-skill').append(html);
					$('#soft-skill-competently').val(50);
					$('#soft-skill-competently-val').text(50);
					$("#soft-skill-modal").modal("hide");
				}
			});
		}
		$("#select-soft-skill").val('').trigger('change');
	});

	$(document).on('select2:select', '#select-language', function(event) {
		event.preventDefault();
		let val = $(this).val();
		let text = $("#select-language option:selected").text();
		let selected = $("#language-container").find('[myId=' + val + ']').length;
		if (selected == 0) {
			$("#language-modal").modal("show");
			$("#language-confirm-btn").one('click', function (event) {
				event.preventDefault();
				let selected = $("#language-container").find('[myId=' + val + ']').length;
				if (selected == 0) {
					let langCompetently = $('#lang-competently').val();
					let html = '<li class="mb-2 cv-child-elem language-item no-copy-controls" myId="' + val + '">'
								+ '<p class="d-none item-id" info-name="language_id" info-group="language">' + val + '</p>'
								+ '<div class="progress">'
									+ '<div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: ' + langCompetently + '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">'
									+ '<span><span info-group="language" info-name="level">' + langCompetently + '</span>%</span>'
									+ '</div>'
								+ '</div>'
								+ '<p class="resume-lang-name" info-group="language" info-name="language_name">' + text + '</p>'
							+ '</li>';
					$('#language-container').append(html);
					$('#lang-competently').val(50);
					$('#lang-competently-val').text(50);
					$("#language-modal").modal("hide");
				}
			});
		}
		$("#select-language").val('').trigger('change');
	});

	$(document).on('select2:select', '#select-hobby', function(event) {
		event.preventDefault();
		let val = $(this).val();
		let text = $("#select-hobby option:selected").text();
		let selected = $("#hobby-container").find('[myId=' + val + ']').length;
		if (selected == 0) {
			let html = '<li class="mb-2 cv-child-elem hobby-item no-copy-controls" myId="' + val + '">'
							+ '<p class="d-none item-id" info-name="hobby_id" info-group="hobby">' + val + '</p>'
							+ '<p class="resume-lang-name" info-group="hobby" info-name="hobby_name">' + text + '</p>'
						+ '</li>';
			$(this).parent().parent().find('#hobby-container').append(html);	
		}
	});

	$(document).on('click', '.date-of-birth', function(event) {
		event.preventDefault();
		$('#dp').show().focus().hide();
	});
});

//update skill, language and soft skill
$(document).ready(function() {
	//update skill
	$('#update-exp-modal').on('hidden.bs.modal', function () {
		$('#update-exp-confirm-btn').off('click');
	});
	$(document).on('click', '.skill-item', function(event) {
		event.preventDefault();
		let isBlockControl = $(event.target).parent('.child-elem-controls').length;
		if (isBlockControl <= 0) {
			let cv_language = localStorage.getItem('cv_language');
			let currentYearElem = $(this).find("[info-name=experiment_duration]");
			let currentYear = currentYearElem.text();
			let skillName = $(this).find('.resume-skill-name').text();
			let expTitleElem = $(this).find('.exp-year-title');
			let expTextElem = $(this).find('.exp-year-text');
			let expTitle = '';
			let expText = '';
			let yearText = 'năm kinh nghiệm';
			$('#update-exp-year').val(currentYear);
			$('#update-exp-year-val').text(currentYear);
			$("#update-exp-modal").modal("show");
			$('#update-exp-name').text(skillName);

			$("#update-exp-confirm-btn").one('click', function (event) {
				event.preventDefault();
				let expYear = $('#update-exp-year').val();
				currentYearElem.text(expYear);
				if (cv_language == 'en-US') {
					if (expYear == 0) {
						expTitle = 'below 1 ';
						yearText = 'year of experience';
					} else {
						expTitle = expYear;
						yearText = 'year(s) of experience';
					}
				} else {
					if (expYear == 0) {
						expTitle = 'dưới 1 ';
					} else {
						expTitle = expYear;
					}
				}
				expTitleElem.text(expTitle);
				expTextElem.text(yearText)
				$('#update-exp-year').val(1);
				$('#update-exp-year-val').text(1);
				$("#update-exp-modal").modal("hide");
			});
		}
	});

	//update language
	$('#update-language-modal').on('hidden.bs.modal', function () {
		$('#update-language-confirm-btn').off('click');
	});
	$(document).on('click', '.language-item', function(event) {
		/* Act on the event */
		event.preventDefault();
		let isBlockControl = $(event.target).parent('.child-elem-controls').length;
		if (isBlockControl <= 0) {
			let thisItem = $(this);
			let currentLevelElem = $(this).find("[info-name=level]");
			let currentLevel = currentLevelElem.text();
			let languageName = $(this).find("[info-name=language_name]").text();
			$('#update-lang-competently').val(currentLevel);
			$('#update-lang-competently-val').text(currentLevel);
			$("#update-language-modal").modal("show");
			$('#update-lang-name').text(languageName);

			$("#update-language-confirm-btn").one('click', function (event) {
				event.preventDefault();
				let level = $('#update-lang-competently').val();
				currentLevelElem.text(level);
				thisItem.find('.progress-bar').css('width', level + '%');;
				$('#update-lang-competently').val(50);
				$('#update-lang-competently-val').text(50);
				$("#update-language-modal").modal("hide");
			});
		}
	});

	//update soft-skill
	$('#update-soft-skill-modal').on('hidden.bs.modal', function () {
		$('#update-soft-skill-btn').off('click');
	});
	$(document).on('click', '.soft-skill-item', function(event) {
		/* Act on the event */
		event.preventDefault();
		let isBlockControl = $(event.target).parent('.child-elem-controls').length;
		if (isBlockControl <= 0) {
			let thisItem = $(this);
			let currentLevelElem = $(this).find("[info-name=level]");
			let currentLevel = currentLevelElem.text();
			let softSkillName = $(this).find("[info-name=soft_skill_name]").text();
			$('#update-soft-skill-competently').val(currentLevel);
			$('#update-soft-skill-competently-val').text(currentLevel);
			$("#update-soft-skill-modal").modal("show");
			$('#update-soft-skill-name').text(softSkillName);

			$("#update-soft-skill-btn").one('click', function (event) {
				event.preventDefault();
				let level = $('#update-soft-skill-competently').val();
				currentLevelElem.text(level);
				thisItem.find('.progress-bar').css('width', level + '%');;
				$('#update-soft-skill-competently').val(50);
				$('#update-soft-skill-competently-val').text(50);
				$("#update-soft-skill-modal").modal("hide");
			});
		}
	});
});

//for saving cv reusme
$(document).ready(function() {
	//get candidate info from cv template
	const toTitleCase = (phrase) => {
	  return phrase
	    .toLowerCase()
	    .split(' ')
	    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
	    .join(' ');
	};
	
	function getCandidateInfo()
	{
		let candidateInfo = [];
		$('[info-group=candidate]').each(function() {
			let info_name = $(this).attr('info-name');
			let info_value = '';
			if (info_name == 'short_bio_html') {
				info_value = $(this).html().trim();
			} else {
				info_value = $(this).text().trim();
			}
			if (info_name == 'name') {
				info_value = toTitleCase(info_value);
			}
			let json_candidate = {};
			json_candidate.name = info_name;
			json_candidate.value = info_value;
			candidateInfo.push(json_candidate);
		});

		return candidateInfo;
	}

	//get job history from cv template
	function getJobHistory()
	{
		let jobHistory = [];
		$('.history-item').each(function() {
			let tmpJobInfo = [];
			$(this).find('[info-group=job_history]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = '';
				if (info_name == 'job_description_html') {
					info_value = $(this).html().trim();
				} else {
					info_value = $(this).text().trim();
				}

				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmpJobInfo.push(json);
			});

			jobHistory.push(tmpJobInfo);
		});

		return jobHistory;
	}

	//get skill
	function getSkill()
	{
		let skillInfo = [];
		$('.skill-item').each(function() {
			let tmp = [];
			$(this).find('[info-group=skill]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = $(this).text().trim();
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			skillInfo.push(tmp);
		});

		// Skill dot custom theme 41
		$('.skill-item-theme-41').each(function() {
			let tmp = [];
			$(this).find('[info-group=skill]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = $(this).text().trim();
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			skillInfo.push(tmp);
		});

		// Skill progress- bar custom theme 42
		$('.skill-item-theme-42').each(function() {
			let tmp = [];
			$(this).find('[info-group=skill]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = $(this).text().trim();
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			skillInfo.push(tmp);
		});

		return skillInfo;
	}
	//get education info from cv template
	function getEducation()
	{
		let educationInfo = [];
		$('.education-item').each(function() {
			let tmpJobInfo = [];
			$(this).find('[info-group=education]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = '';
				if (info_name == 'hightlight') {
					info_value = $(this).html().trim();
				} else {
					info_value = $(this).text().trim();
				}
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmpJobInfo.push(json);
			});

			educationInfo.push(tmpJobInfo);
		});

		return educationInfo;
	}

	//get language info from cv template
	function getLanguage()
	{
		let languageInfo = [];
		$('.language-item').each(function() {
			let tmp = [];
			$(this).find('[info-group=language]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = $(this).text().trim();
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			languageInfo.push(tmp);
		});

		return languageInfo;
	}

	function getHobby()
	{
		let hobbyInfo = [];
		$('.hobby-item').each(function() {
			let tmp = [];
			$(this).find('[info-group=hobby]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = $(this).text().trim();
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			hobbyInfo.push(tmp);
		});

		return hobbyInfo;
	}

	function getHiddenElements()
	{
		let hiddenElements = [];
		$('.cv-block').each(function() {
			if (!$(this).is(":visible")) {
				let hiddenId = $(this).attr('id');
				hiddenElements.push(hiddenId);
			}
		});

		return hiddenElements;
	}

	//get language info from cv template
	function getSoftSkill()
	{
		let softSkillInfo = [];
		$('.soft-skill-item').each(function() {
			let tmp = [];
			$(this).find('[info-group=soft_skill]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = $(this).text().trim();
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			softSkillInfo.push(tmp);
		});

		return softSkillInfo;
	}

	//get award from cv template
	function getAward()
	{
		let awardInfo = [];
		$('.award-item').each(function() {
			let tmp = [];
			$(this).find('[info-group=award]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = $(this).text().trim();
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			awardInfo.push(tmp);
		});

		return awardInfo;
	}

	//get references from cv template
	function getReferences()
	{
		let referencesInfo = [];
		$('.references-item').each(function() {
			let tmp = [];
			$(this).find('[info-group=references]').each(function() {
				let info_name = $(this).attr('info-name');
				if (info_name == 'references_text') {
					info_value = $(this).html();
				} else {
					info_value = $(this).text().trim();
				}
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			referencesInfo.push(tmp);
		});

		return referencesInfo;
	}


	//get activity from cv template
	function getActivity()
	{
		let activityInfo = [];
		$('.activity-item').each(function() {
			let tmp = [];
			$(this).find('[info-group=activity]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value;
				if (info_name == 'description'){
					info_value = $(this).html().trim();
				}else{
					info_value = $(this).text().trim();
				}
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			activityInfo.push(tmp);
		});

		return activityInfo;
	}
	
	//get certificates from cv template
	function getCertificates()
	{
		let activityInfo = [];
		$('.certificates-item').each(function() {
			let tmp = [];
			$(this).find('[info-group=certificates]').each(function() {
				let info_name = $(this).attr('info-name');
				let info_value = $(this).text().trim();
				let json = {};
				json.name = info_name;
				json.value = info_value;
				tmp.push(json);
			});

			activityInfo.push(tmp);
		});

		return activityInfo;
	}	

	function getCvId() {
		let cvId = window.location.pathname.split("/").pop();
		return cvId;
	}

	function saveCv(){
		let cvId = getCvId();
		let candidateInfo = getCandidateInfo();
		let jobHistory = getJobHistory();
		let skill = getSkill();
		let education = getEducation();
		let language = getLanguage();
		let hobby = getHobby();
		let softSkill = getSoftSkill();
		let award = getAward();
		let activity = getActivity();
		let certificates = getCertificates();
		let hiddenElements = getHiddenElements();
		let references = getReferences();
		let cvName = $('#cv-name').text();

		let params = {candidateInfo: candidateInfo, jobHistory: jobHistory, education: education, language: language, hobby: hobby, skill: skill, hiddenElements: hiddenElements, softSkill: softSkill, award: award, activity: activity, certificates: certificates, references: references, cvId: cvId, cvName: cvName};
		
		startLoader();
		let data;
		$.ajax({
			url: '/create-resume/save-cv',
			type: 'POST',
			dataType: 'json',
			data: params,
			async: false,
		})
		.done(function(response) {
			data = response;
		})
		.fail(function() {
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Lỗi không mong muốn xuất hiện.', 4000);
		})
		.always(function() {
			
		});

		return data;
	}

	//save cv
	$(document).on('click', '#save-btn', function(event) {
		event.preventDefault();
		if (validCv()) {
			let result = saveCv();
			if (result.status == 1) {
				check_save = false;
				//unica promote
				if (localStorage.getItem('unica_success') != 'shown') {
					$('#unica-success').modal('show');
					localStorage.setItem('unica_success','shown');
				} else {
					if (localStorage.getItem('survey_modal') != 'shown') {
						$('#survey-modal').modal('show');
						localStorage.setItem('survey_modal','shown');
					}
				}
				// ga('send', 'event', 'Consideration', 'complete_CV_go','Hoàn thành CV GO');
			}
			stopLoader();
		}
	});

	//validate cv
	function validCv() {
		let isValidEmail = isValidTel = isValidName = isValidRequired = isValidDate = false;

		$('[info-group=candidate]').each(function() {
			let info_name = $(this).attr('info-name');
			let info_value = $(this).text().trim();
			if (info_name == 'email') {
				isValidEmail = validateEmail(info_value, $(this));
			} else if (info_name == 'tel') {
				isValidTel = validateTel(info_value, $(this));
			} else if (info_name == 'name') {
				isValidName = validateName(info_value, $(this));
			}
		});

		isValidRequired = validateRequired();
		isValidDate = validateDate();
		return (isValidEmail && isValidTel && isValidName && isValidRequired && isValidDate);
	}

	function validateDate() {
		let response = true;
		$('[info-group=job_history]').each(function() {
			let info_name = $(this).attr('info-name');
			let info_value = $(this).text().trim();
			if (info_name == 'date_start' || info_name == 'date_end') {
				if (info_value.length <= 0) {
					$(this).addClass('error');
					response = false;
				}

				// var date_regex = /^[.\/0-9_-]*$/;
				// if (!(date_regex.test(info_value))) {
				// 	$(this).addClass('error');
				// 	response = false;
				// }
			}
		});

		if (!response) {
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Ngày tháng trong Kinh nghiệm làm việc chỉ chấp nhận số và các ký tự: / -', 6000);
		}
		return response;
	}

	/**
	 * validate email
	 * @param  {string} mail
	 * @param  {string} elem
	 * @return {bool}
	 */
	function validateEmail(mail, elem) {
		if (mail.length <= 0) {
			elem.addClass('error');
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Email không không được để trống.', 4000);
			return false;
		}

		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
			elem.removeClass('error');
			return true;
		}

		elem.addClass('error');
		autohidenotify2('error', 'left bottom', 'Thông báo', 'Email không hợp lệ.', 4000);
		return false;
	}

	/**
	 * validate phone number
	 * @param  {string} tel
	 * @param  {string} elem
	 * @return {bool}
	 */
	function validateTel(tel, elem) {
		if (tel.length <= 0) {
			elem.addClass('error');
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Số điện thoại không được để trống', 4000);
			return false;
		}

		let threeFirstNumber = tel.substring(0, 3);
		if (threeFirstNumber == '+84') {
			//if phone number start by +84
			tel = '0' + tel.substring(3);
		}

		//remove space characters
		tel = tel.split('+').join('');
		tel = tel.split('.').join('');
		tel = tel.split(',').join('');
		tel = tel.split('(').join('');
		tel = tel.split(')').join('');
		tel = tel.split(' ').join('');
		tel = tel.split('-').join('');
		
		if (/((09|03|07|08|05)+([0-9]{8})\b)/.test(tel)) {
			elem.removeClass('error');
			return true;
		}

		elem.addClass('error');
		autohidenotify2('error', 'left bottom', 'Thông báo', 'Số điện thoại không hợp lệ.', 4000);
		return false;
	}

	/**
	 * validate name
	 * @param  {string} tel
	 * @param  {string} elem
	 * @return {bool}
	 */
	function validateName(name, elem) {
		if (name.length > 0) {
			elem.removeClass('error');
			return true;
		}

		elem.addClass('error');
		autohidenotify2('error', 'left bottom', 'Thông báo', 'Họ tên không được để trống', 4000);
		return false;
	}

	/**
	 * validate required fields
	 * @return {bool} 
	 */
	function validateRequired() {
		let response = true;
		$('.required').each(function() {
			let info_group = $(this).attr('info-group');
			let info_name = $(this).attr('info-name');
			if(info_group == 'activity' && (info_name == 'to' || info_name == 'from')){
			}else{
				let blockId = $(this).closest('.cv-block').attr('id');
				if ($(this).closest('.cv-block').is(':visible') || blockId == undefined) {
					let text = $(this).text();
					text = text.replace(/\s/g, '');
					if (text.length == 0) {
						$(this).addClass('error');
						response = false;
					} else {
						$(this).removeClass('error');
					}
				}
			}
		});

		if (!response) {
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Vui lòng nhập đầy đủ những mục còn trống.', 4000);
		}
		return response;
	}

	function initMediumEditor() {
		//medium editor
		var elements = document.querySelectorAll('.cv-editable-elem'),
		editor = new MediumEditor(elements, {
			placeholder: {
				text: 'Click để sửa mục này'
			},
			toolbar: false,
			keyboardCommands: false,
		});
	}

	//add job history template
	$(document).on('click', '#add-job-history-template', function(event) {
		event.preventDefault();
		let cvId = getCvId();
		$.ajax({
			url: '/create-resume/get-job-history-template',
			type: 'POST',
			dataType: 'html',
			data: {cvId: cvId}
		})
		.done(function(response) {
			$('#job-history-container').html(response);
			initMediumEditor();
			$('.tooltip').remove();
		})
		.fail(function() {

		})
		.always(function() {

		});
	});

	//add education template
	$(document).on('click', '#add-education-template', function(event) {
		event.preventDefault();
		let cvId = getCvId();
		$.ajax({
			url: '/create-resume/get-education-template',
			type: 'POST',
			dataType: 'html',
			data: {cvId: cvId}
		})
		.done(function(response) {
			$('#education-container').html(response);
			initMediumEditor();
			$('.tooltip').remove();
		})
		.fail(function() {

		})
		.always(function() {

		});
	});

	//add award template
	$(document).on('click', '#add-award-template', function(event) {
		event.preventDefault();
		let cvId = getCvId();
		$.ajax({
			url: '/create-resume/get-award-template',
			type: 'POST',
			dataType: 'html',
			data: {cvId: cvId}
		})
		.done(function(response) {
			$('#award-container').html(response);
			initMediumEditor();
			$('.tooltip').remove();
		})
		.fail(function() {

		})
		.always(function() {

		});
	});

	//add references template
	$(document).on('click', '#add-references-template', function(event) {
		event.preventDefault();
		let cvId = getCvId();
		$.ajax({
			url: '/create-resume/get-references-template',
			type: 'POST',
			dataType: 'html',
			data: {cvId: cvId}
		})
		.done(function(response) {
			$('#references-container').html(response);
			initMediumEditor();
			$('.tooltip').remove();
		})
		.fail(function() {

		})
		.always(function() {

		});
	});

	//add activity template
	$(document).on('click', '#add-activity-template', function(event) {
		event.preventDefault();
		let cvId = getCvId();
		$.ajax({
			url: '/create-resume/get-activity-template',
			type: 'POST',
			dataType: 'html',
			data: {cvId: cvId}
		})
		.done(function(response) {
			$('#activity-container').html(response);
			initMediumEditor();
			$('.tooltip').remove();
		})
		.fail(function() {

		})
		.always(function() {

		});
	});

	//add certificates template
	$(document).on('click', '#add-certificates-template', function(event) {
		event.preventDefault();
		let cvId = getCvId();
		$.ajax({
			url: '/create-resume/get-certificates-template',
			type: 'POST',
			dataType: 'html',
			data: {cvId: cvId}
		})
		.done(function(response) {
			$('#certificates-container').html(response);
			initMediumEditor();
			$('.tooltip').remove();
		})
		.fail(function() {

		})
		.always(function() {

		});
	});
	
	//select theme
	$(document).on('click', '.select-theme', function(event) {
		event.preventDefault();
		let theme_id = $(this).attr('theme-id') != '' ? $(this).attr('theme-id') : '';
		let cvId = getCvId();
		saveCv();
		if (theme_id != '') {
			$.ajax({
				url: '/create-resume/change-theme',
				type: 'POST',
				dataType: 'json',
				data: {theme_id: theme_id, cvId: cvId},
				beforeSend: function() {
					$('.loader-container').show();
					$('.resume-wrapper').css('filter', 'blur(8px)');
				}
			})
			.done(function(response) {
				if (response.status) {
					// window.location = "/create-resume";
					location.reload();
				} else {
					autohidenotify2('success', 'left bottom', 'Thông báo', response.msg, 4000);
					stopLoader();
				}
			})
			.fail(function() {
				autohidenotify2('error', 'left bottom', 'Thông báo', 'Xuất hiện lỗi không mong muốn. Vui lòng tải lại trang và thử lại.', 4000);
				stopLoader();
			})
			.always(function() {
				
			});
		}
	});

	//download resume
	$(document).on('click', '#download-resume-btn', function(event) {
		check_save = false;
		event.preventDefault();
		if (validCv()) {
			let result = saveCv();
			if (result.status == 1) {
				let cvId = getCvId();
				$.ajax({
					url: '/create-resume/download-resume',
					type: 'POST',
					dataType: 'json',
					data: {cvId: cvId},
					beforeSend: function() {
						$('.loader-container').show();
						$('.resume-wrapper').css('filter', 'blur(8px)');
					}
				})
				.done(function(response) {
					if (response.status) {
						let cv_url = '/create-resume/get-pdf?cv_id=' + response.msg;
						window.location = cv_url;
					} else {
						autohidenotify2('success', 'left bottom', 'Thông báo', response.msg, 4000);
					}
				})
				.fail(function() {
					autohidenotify2('error', 'left bottom', 'Thông báo', 'Xuất hiện lỗi không mong muốn. Vui lòng tải lại trang và thử lại.', 4000);
				})
				.always(function() {
					stopLoader();
				});
			}
		}
	});

	//send feedback
	$('#send-feedback').click(function(event) {
		let easy = $('#easy').val() != '' ? $('#easy').val() : '';
		let back = $('#back').val() != '' ? $('#back').val() : '';
		let satisfy = $('#satisfy').val() != '' ? $('#satisfy').val() : '';
		let additional = $('#additional').val() != '' ? $('#additional').val() : '';
		if (easy != null && back != null && satisfy != null) {
			$("#easy").removeClass('error');
			$("#back").removeClass('error');
			$("#satisfy").removeClass('error');
			$.ajax({
				url: '/create-resume/send-feedback',
				type: 'POST',
				dataType: 'json',
				data: {easy: easy, back: back, satisfy: satisfy, additional: additional},
			})
			.done(function(response) {
				$('#survey-modal').modal('hide');
				autohidenotify2('success', 'left bottom', 'Thông báo', 'JobsGO xin được ghi nhận và cảm ơn ý kiến của bạn. Chúng sẽ cải tiến CV Go trong tương lai.', 4000);
			})
			.fail(function() {
			})
			.always(function() {
			});
		} else {
			if (easy == null) {
				if (!$('#easy').hasClass('error')) {
					$("#easy").addClass('error')
				}
			} else {
				$("#easy").removeClass('error');
			}
			if (back == null) {
				if (!$('#back').hasClass('error')) {
					$("#back").addClass('error')
				}
			} else {
				$("#back").removeClass('error');
			}
			if (satisfy == null) {
				if (!$('#satisfy').hasClass('error')) {
					$("#satisfy").addClass('error')
				}
			} else {
				$("#satisfy").removeClass('error');
			}
			autohidenotify2('error', 'left bottom', 'Thông báo', 'Vui lòng chọn đầy đủ các mục trước khi gửi.', 4000);			
		}
	});

	//fix editable placeholder
	$(document).on('DOMSubtreeModified', '.cv-editable-elem', function () {
		if ( $(this).text().length === 0 ) {
			if (!$(this).hasClass('medium-editor-placeholder')) {
				$(this).addClass('medium-editor-placeholder');
			}
		} else {
			if ($(this).hasClass('medium-editor-placeholder')) {
				$(this).removeClass('medium-editor-placeholder');
			}
		}
	});

	//autosave draft
	$(document).ready(function(){
		var timer;
		var timeout = 5000; // Timout duration
		$(document).on('blur', '.cv-editable-elem', function(event) {
			if(timer) {
				clearTimeout(timer);
			}
			timer = setTimeout(saveDraft, timeout); 
		});

		function saveDraft()
		{
			let candidateInfo = getCandidateInfo();
			let jobHistory = getJobHistory();
			let skill = getSkill();
			let education = getEducation();
			let language = getLanguage();
			let hobby = getHobby();
			let softSkill = getSoftSkill();
			let award = getAward();
			let activity = getActivity();
			let certificates = getCertificates();
			let hiddenElements = getHiddenElements();
			let references = getReferences();
			let cvId = getCvId();
			let params = {candidateInfo: candidateInfo, jobHistory: jobHistory, education: education, language: language, hobby: hobby, skill: skill, hiddenElements: hiddenElements, softSkill: softSkill, award: award, activity: activity, certificates: certificates, references: references, cvId: cvId};
		
			$.ajax({
				url: '/create-resume/save-draft',
				type: 'POST',
				dataType: 'json',
				data: params
			})
			.done(function(response) {
			})
			.fail(function() {
			})
			.always(function() {
			});
		}
	});

	$('#manage-btn').click(function(event) {
		window.location.href = "/cv-go/quan-ly";
	});

	$("#cv-name").keypress(function(e){
		if (e.which == 13) {
			$(this).blur();
		}
	});

	$('#cv-name').bind('DOMSubtreeModified', function(){
		let id = getCvId();
		let name = $(this).text();
		$.ajax({
			url: '/create-resume/update-cv-name',
			type: 'POST',
			dataType: 'json',
			data: {id: id, name: name},
		})
		.done(function(response) {
			if (response.status) {
				// location.reload();
			} else {
				alert(response.msg);
			}
		})
		.fail(function() {
		})
		.always(function() {
		});
	});
});
