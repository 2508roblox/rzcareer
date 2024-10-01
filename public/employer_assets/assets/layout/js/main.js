/*
 *=============================================================================
 *== COPYRIGHT HYPERTECH ENTERPRISE SOLUTIONS. ALL RIGHT RESERVED.           ==
 *== HYPERTECH PROPRIETARY/CONFIDENTIAL. USE THIS SUBJECT TO LICENSE TERMS.  ==
 *==                                                                         ==
 *== VISIT HTTP://HYPERTECH.COM.VN FOR MORE INFORMATION                      ==
 *=============================================================================
 *
 *== File Name: main.js
 *== Created: 11/07/2016 09:11 PM
 *== Created by: Giap Hoang (giaphv@tiaset.net)
 *== Project: hope
 *
 */

$(function () {

    if ($('#content').length > 0) {
        $('html, body').stop().animate({scrollTop: $('#content').offset().top}, 2500, 'easeInOutExpo');

    }


    if ($('.page-ntv').length > 0) {

        $('.page-ntv .header').vide({
            mp4: 'media/video/ocean.mp4',
            webm: 'media/video/ocean.webm',
            ogv: 'media/video/ocean.ogv',
            poster: 'media/img/img-3.jpg'
        }, {
            volume: 1,
            playbackRate: 1,
            muted: true,
            loop: true,
            autoplay: true,
            resizing: true,
            bgColor: 'rgba(159, 162, 78, 0.45)',
            className: 'video-intro'
        });


        $('.page-ntv .box').owlCarousel({
            autoPlay: 6000,
            itemsCustom: [
                [0, 1],
                [768, 3],
                [1024, 4]
            ],
            stopOnHover: true,
            paginationSpeed: 1000,
            goToFirstSpeed: 2000,
            autoHeight: true,
            navigation: true,
            navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

        });
    }


    if ($('.page-ntd').length > 0) {

        if ($('.page-ntd .header-bottom').length > 0) {
            $('.page-ntd .header-bottom').vide({
                mp4: 'media/video/ocean.mp4',
                webm: 'media/video/ocean.webm',
                ogv: 'media/video/ocean.ogv',
                poster: 'media/img/img-5.jpg'
            }, {
                volume: 1,
                autoplay: false,
                playbackRate: 1,
                muted: true,
                loop: true,
                resizing: true,
                /*bgColor: 'rgba(44, 151, 222, 0.64)',*/
                className: 'video-intro'
            });

        }

        /* $('.page-ntd .section-2').vide({
         mp4: 'media/video/ocean.mp4',
         webm: 'media/video/ocean.webm',
         ogv: 'media/video/ocean.ogv',
         poster: 'media/img/img-7.jpg'
         }, {
         volume: 1,
         playbackRate: 1,
         muted: true,
         loop: true,
         autoplay: false,
         resizing: true,
         bgColor: 'rgba(51, 51, 51, 0.67)',
         className: 'video-intro'
         });*/

        if ($('.hope-bot .message').length > 0) {
            $('.hope-bot .message').typed({
                strings: ["Xin chào!", "Bạn đang muốn tìm ứng viên phù hợp?", "Hãy để JobsGO giúp bạn!"],
                typeSpeed: 50,
                backDelay: 2000,
                loop: true

            });
        }


        if ($('.page-ntd .box').length > 0) {
            $('.page-ntd .box').owlCarousel({
                autoPlay: 6000,
                itemsCustom: [
                    [0, 2],
                    [480, 3],
                    [768, 4],
                    [1024, 6]
                ],
                stopOnHover: true,
                paginationSpeed: 1000,
                goToFirstSpeed: 2000,
                autoHeight: true,
                navigation: true,
                navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

            });
        }


        $(window).scroll(function () {
            if ($(this).scrollTop() > $('.header').height() + 150) {
                $('.page-ntd .header').addClass('fixed');
                //$('.page-ntd .header-top .btn-download').removeClass('hide');
                //$('.page-ntd .header-top .link-ntv').hide();
            } else {
                $('.page-ntd .header').removeClass('fixed');
                //$('.page-ntd .header-top .btn-download').addClass('hide');
                //$('.page-ntd .header-top .link-ntv').show();

            }


        });

        if ($('.page-ntd .section-1 .container > .carousel').length > 0) {

            $('.page-ntd .section-1 .container > .carousel').owlCarousel({
                autoPlay: 6000,
                singleItem: true,
                stopOnHover: true,
                paginationSpeed: 1000,
                goToFirstSpeed: 2000,
                autoHeight: false,
                navigation: true,
                navigationText: ["<span class='web' data-value='0'>Web</span>", "<span data-value='1' class='app'>App</span>"],
                afterMove: function (elem) {

                    var current = this.currentItem;
                    if (current == 0) {
                        $('.page-ntd .section-1 .owl-buttons > div').eq(1).removeClass('active');
                        $('.page-ntd .section-1 .owl-buttons > div').eq(0).addClass('active');
                    } else {
                        $('.page-ntd .section-1 .owl-buttons > div').eq(0).removeClass('active');
                        $('.page-ntd .section-1 .owl-buttons > div').eq(1).addClass('active');
                    }
                }

            });
            $('.page-ntd .section-1 .owl-buttons > div').eq(0).addClass('active');
        }


    }


    if ($('.page-ntd-dk').length > 0 && $('.page-ntd-dk.success').length == 0) {


        $('.registration-form fieldset').eq(0).fadeIn('slow');


        $('.registration-form .btn-next[type="button"]').on('click', function () {

            var parent_fieldset = $(this).parents('fieldset');
            var next_step = true;

            parent_fieldset.find('input[required], textarea[required], select[required]').each(function () {
                if ($(this).val() == '' || $(this).val() == null) {
                    $(this).parent().addClass('has-error');

                    if ($(this).parent()[0].className === 'input-group has-error') {
                        $(this).parent().parent().find('.help-block').text($(this).data('error')).show();

                    } else {
                        $(this).parent().find('.help-block').text($(this).data('error')).show();

                    }

                    next_step = false;

                }
                else {
                    $(this).parent().removeClass('has-error');

                    if ($(this).parent()[0].className === 'input-group has-error') {
                        $(this).parent().parent().find('.help-block').empty().hide();
                    }
                    else {
                        $(this).parent().find('.help-block').empty().hide();

                    }

                }
            });

            if (next_step) {
                parent_fieldset.fadeOut(400, function () {

                    $('#form-entity-4').each(function () {
                        if ($(this).parent().hasClass('validate-success')) {
                            entityChange = $('#form-entity-10');
                            entityChange.val($(this).val());
                            entityChange.parent().parent().addClass('validate-success');
                            GMaps.geocode({
                                address: entityChange.val().trim(),
                                callback: function (results, status) {
                                    if (status == 'OK') {
                                        console.log(results);
                                        var latlng = results[0].geometry.location;
                                        map.setCenter(latlng.lat(), latlng.lng());
                                        map.addMarker({
                                            lat: latlng.lat(),
                                            lng: latlng.lng()
                                        });

                                        $('#geo_latitude').val(latlng.lat());
                                        $('#geo_longitude').val(latlng.lng());
                                    }
                                }
                            });
                        }

                    });

                    $('#form-entity-7').each(function () {
                        if ($(this).parent().hasClass('validate-success')) {
                            entityChange = $('#form-entity-18');
                            entityChange.val($(this).val());
                            entityChange.parent().addClass('validate-success');
                            entityChange.select2({
                                data: $(this).select2('data')
                            });
                        }

                    });

                    $(this).next().fadeIn();
                    $('html, body').stop().animate({scrollTop: 0}, 500, 'easeInOutExpo');

                    allFunction();

                    var countSuccess = Math.round(($('.validate-success input[required]').length + $('.validate-success select[required]').length) / ($('input[required]').length + $('select[required]').length) * 100);

                    $('.progress-bar').css('width', countSuccess + '%').attr('aria-valuenow', countSuccess);
                    $('.progress-success').text(countSuccess + ' %');

                    map = new GMaps({
                        div: '#map',
                        lat: 20.9980524,
                        lng: 105.8197491
                    });

                    function ggMaps(e) {
                        e.preventDefault();
                        GMaps.geocode({
                            address: $('#form-entity-10').val().trim(),
                            callback: function (results, status) {
                                if (status == 'OK') {
                                    console.log(results);
                                    var latlng = results[0].geometry.location;
                                    map.setCenter(latlng.lat(), latlng.lng());
                                    map.addMarker({
                                        lat: latlng.lat(),
                                        lng: latlng.lng()
                                    });

                                    $('#geo_latitude').val(latlng.lat());
                                    $('#geo_longitude').val(latlng.lng());
                                }
                            }
                        });
                    }

                    $('#form-entity-10').change(ggMaps);
                    $('#form-entity-10-search').submit(ggMaps);


                });
            }

        });

        $('#form-entity-3').change(function () {
            if ($(this).parent().parent().hasClass('validate-success')) {
                entityChange = $('#form-entity-8');
                entityChange.val($(this).val());
                entityChange.parent().addClass('validate-success');
            }

        });

        $('#form-entity-8').change(function () {
            if ($(this).parent().hasClass('validate-success')) {
                entityChange = $('#form-entity-3');
                entityChange.val($(this).val());
                entityChange.parent().parent().addClass('validate-success');
            }

        });

        $('#form-entity-5').change(function () {
            if ($(this).parent().hasClass('validate-success')) {
                entityChange = $('#form-entity-12');
                entityChange.val($(this).val());
                entityChange.parent().addClass('validate-success');
            }

        });

        $('#form-entity-12').change(function () {
            if ($(this).parent().hasClass('validate-success')) {
                entityChange = $('#form-entity-5');
                entityChange.val($(this).val());
                entityChange.parent().addClass('validate-success');
            }

        });

        $('#form-entity-6').change(function () {
            if ($(this).parent().hasClass('validate-success')) {
                entityChange = $('#form-entity-13');
                entityChange.val($(this).val());
                entityChange.parent().addClass('validate-success');
            }

        });


        $('#form-entity-13').change(function () {
            if ($(this).parent().hasClass('validate-success')) {
                entityChange = $('#form-entity-6');
                entityChange.val($(this).val());
                entityChange.parent().addClass('validate-success');
            }

        });

        $('#form-entity-7').change(function () {
            if ($(this).parent().hasClass('validate-success')) {
                entityChange = $('#form-entity-18');
                entityChange.val($(this).val());
                entityChange.parent().addClass('validate-success');
                entityChange.select2({
                    data: $(this).select2('data')
                });
            }

        });

        $('#form-entity-18').change(function () {
            if ($(this).parent().hasClass('validate-success')) {
                entityChange = $('#form-entity-7');
                entityChange.val($(this).val());
                entityChange.parent().addClass('validate-success');
                entityChange.select2({
                    data: $(this).select2('data')
                });
            }

        });

        function allFunction() {


            $('.page-ntd-dk .form-bottom .pull-right .btn.disabled').click(function () {
                $('html, body').stop().animate({scrollTop: $('.field-employerregisterform-recaptcha').offset().top}, 1000, 'easeInOutExpo');
                return false;

            });

            $('.registration-form .btn-previous').on('click', function () {
                $(this).parents('fieldset').fadeOut(400, function () {
                    $(this).prev().fadeIn(400);
                    allFunction();
                    imgFunction();
                });
            });

            $('.registration-form').validator().on('change submit', function (e) {

                var countSuccess = Math.round(($('.validate-success input[required]').length + $('.validate-success select[required]').length) / ($('input[required]').length + $('select[required]').length) * 100);

                $('.progress-bar').css('width', countSuccess + '%').attr('aria-valuenow', countSuccess);
                $('.progress-success').text(countSuccess + ' %');

            });

            $('form select').select2({});
            $('form #form-entity-18, form #form-entity-7').select2({
                placeholder: 'Chọn một hoặc nhiều lĩnh vực hoạt động'
            });

        }

        allFunction();

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "allowHtml": true
        };



        $('.form-control').change(function () {

            var fe1 = $('#form-entity-1');
            var fe5 = $('#form-entity-5');

            if (fe5.val() != '') {
                var val5 = fe5.val();
                var url5 = 'site/check-data-exist?type=email&param=' + val5;
                var parent5 = fe5.parent();

                $.ajax({

                    url: url5, success: function (result) {
                        obj = JSON.parse(result);
                        if (obj['status'] == 1) {

                            // Error
                            var message5 = 'Email "' + val5 + '" đã tồn tại trong cơ sở dữ liệu của chúng tôi, vui lòng chọn một email khác.';
                            //toastr.clear();
                            //toastr.error(message, 'Thông báo!');
                            parent5.addClass('has-error has-danger').removeClass('validate-success');
                            parent5.find('.help-block').text(message5);

                        }
                    }
                });
            }

            if (fe1.val() != '') {
                var val = fe1.val();
                var url = 'site/check-data-exist?type=user_name&param=' + val;
                var parent = fe1.parent();

                $.ajax({

                    url: url, success: function (result) {
                        obj = JSON.parse(result);
                        if (obj['status'] == 1) {

                            // Error
                            var message = 'Tên tài khoản "' + val + '" đã tồn tại trong cơ sở dữ liệu của chúng tôi, vui lòng chọn một tên khác.';
                            //toastr.clear();
                            //toastr.error(message, 'Thông báo!');
                            parent.addClass('has-error has-danger').removeClass('validate-success');
                            parent.find('.help-block').text(message);

                        }
                    }
                });
            }
        });




    }


    if ($('.fancybox').length > 0) {

        $('.fancybox').on('click', function () {
            $.fancybox({
                href: this.href,
                type: "iframe",
                padding: 10,
                fitToView: false,
                autoSize: false,
                'width': parseInt($(window).width() * 0.8),
                'height': parseInt($(window).height() * 0.8)
            });
            return false
        });
    }

    if ($('.grouped-elements-fancybox').length > 0) {

        $('a.grouped-elements-fancybox').fancybox();

    }


    if ($('.visible-xs.box-xs').length > 0) {


        $('.visible-xs.box-xs').owlCarousel({
            itemsCustom: [
                [0, 1],
                [768, 3],
                [1024, 4]
            ],
            stopOnHover: false,
            paginationSpeed: 1000,
            goToFirstSpeed: 2000,
            autoHeight: true,
            navigation: false,
            afterMove: function (elem) {
                $('.visible-xs.box-xs .owl-controls').css({'top': $('#' + this.$userItems[this.currentItem].id).find('.video-ui-wrapper').height() + 40});

            }


        });

        $('.visible-xs.box-xs .owl-controls').css({'top': $('#item-1').find('.video-ui-wrapper').height() - 6});


        $(window).on('load resize change', function () {
            $('.visible-xs.box-xs .box-item').matchHeight();
            $('.visible-xs.box-xs .owl-controls').css({'top': $('.visible-xs.box-xs .video-ui-wrapper').height() + 40});
        });

    }

});

function saveSubcribeEmail(saveEmailUrl, email, type) {
    $('.mail-subcribe-loading').css('display', '');
    $('.mail-subcribe-error-response').css('display', 'none');
    $('.mail-subcribe-success-response').css('display', 'none');
    $.ajax({
        url: saveEmailUrl,
        data: {
            email: email,
            type: type
        },
        success: function (result) {

            arrData = JSON.parse(result);

            // Hiện message thành công
            if (arrData.status == 1) {

                $('.mail-subcribe-success-response').html(arrData.data.message);

                $('.mail-subcribe-success-response').css('display', '');
                $('.mail-subcribe-error-response').css('display', 'none');
                $('.mail-subcribe-loading').css('display', 'none');
            } else { // Hiện messsage không thành công

                $('.mail-subcribe-error-response').html(arrData.data.message);

                $('.mail-subcribe-error-response').css('display', '');
                $('.mail-subcribe-success-response').css('display', 'none');
                $('.mail-subcribe-loading').css('display', 'none');
            }
        }
    });
}
