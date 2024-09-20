let avatarSelector, candidateID, cropper, detailX, detailY, detailWidth, detailHeight, detailRotate, detailScaleX,
    detailScaleY;
let urlApiSaveTempImage = '/api/ajax/save-temp-avatar'; // whenever users choose and image, save it as temp file
let urlApiSaveDefaultImage = '/api/ajax/save-default-avatar'; // when users delete avatar, save default avatar
let urlApiSaveCroppedImage = '/api/ajax/save-candidate-cropped-avatar'; // when users crop image, save cropped image as new avatar


function cropperStartLoader() {
    $('#save-image-btn').prop("disabled", true);
    $('#save-image-btn').html('<i class="fas fa-circle-notch fa-spin"></i> Đang tải ảnh lên...');

}
function cropperStopLoader() {
    $('#save-image-btn').prop("disabled", false);
    $('#save-image-btn').html('Lưu lại');  
}

// function to init cropper attrs
function createCropper(avatarIDSelector, stringCandidateID, adminDomain) {
    // set cv avatar selector id or class (should be unique)
    avatarSelector = avatarIDSelector;
    // candidate should save avatar
    candidateID = stringCandidateID;
    // uncomment these lines to init other api url to save images
    urlApiSaveTempImage = adminDomain + urlApiSaveTempImage;
    urlApiSaveDefaultImage = adminDomain + urlApiSaveDefaultImage;
    urlApiSaveCroppedImage = adminDomain + urlApiSaveCroppedImage;

    // add cv avatar overlay
    $(avatarSelector).parent().addClass('avatar-container');
    $('<div class="overlay">Đổi ảnh đại diện</div>').insertAfter(avatarSelector);
    // cv avatar container and overlay css
    $('.overlay').css({
        "position": "absolute",
        "bottom": "0",
        "background": "rgb(0, 0, 0)",
        "background": "rgba(0, 0, 0, 0.5)", /* Black see-through */
        "color": "#f1f1f1",
        "width": "100%",
        "transition": "0.5s ease",
        "opacity": "0",
        "color": "white",
        "padding": "10px",
        "text-align": "center"
    });
    // jquery hover $(selector).hover(inFunction,outFunction)
    $('.avatar-container').hover(function () {
        $('.overlay').css('opacity', "1");
    }, function () {
        $('.overlay').css('opacity', "0");
    });
    // pointer when hover cv avatar
    $('.avatar-container').hover(function () {
        $(this).css('cursor', 'pointer');
    });
    // cv avatar display
    $(avatarSelector).css({
        "width": "100%",
        "display": "block",
        "height": "100%",
    });
    // avatar container position
    $('.avatar-container').css({
        "position": "relative",
    });
    // when user click avatar to update new one
    $('.avatar-container').click(function () {
        // open cropper modal
        $('#avatarEditModal').modal('show');
    });

    // func to append avatar editor modal to dom body (css included)
    function createAvatarEditorModal() {
        $('body').append('<style>' +
            '     .big-avatar {' +
            '           padding: 0 0 30px 30px;' +
            '      }' +
            '     .cropper-container {' +
            '           width: 100% !important;' +
            '     }' +
            '    .function-buttons {' +
            '        margin-left: 15px;' +
            '    }' +
            '    .preview {' +
            '        overflow: hidden;' +
            '    }' +
            '    #avatarContentTable img {' +
            '        max-width: 100%;' +
            '    }' +
            '    #avatarContentTable .row {' +
            '        margin-bottom: 0 !important;' +
            '    }' +
            '    .btn-choose-image {' +
            '        display: inline-block;' +
            '        height: 300px;' +
            '        vertical-align: middle;' +
            '        line-height: 60px;' +
            '        margin-top: 0;' +
            '        width: 100%;' +
            '        color: #999;' +
            '        border: 2px dashed #0b85a1;' +
            '    }' +
            '    .btn-choose-image:hover {' +
            '        cursor: pointer;' +
            '    }' +
            '    .fa-picture-o:before {' +
            '        content: "\\f03e";' +
            '    }' +
            '    .btn-choose-image i {' +
            '        font-size: 50px;' +
            '        margin-top: 100px;' +
            '    }' +
            '    #changeImageBtn:before .avatar-dropzone {' +
            '        display: block;' +
            '    }' +
            '    #changeImageBtn:before .big-preview-avatar {' +
            '        display: none;' +
            '    }' +
            '</style>' +
            '<div id="avatarEditModal" class="modal bd-example-modal-lg" tabindex="-1" role="dialog"' +
            '     aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">' +
            '    <div class="modal-dialog modal-lg">' +
            '        <div class="modal-content">' +
            '            <table cellpadding="0" cellspacing="0" border="0" width="100%">' +
            '                <tr>' +
            '                    <td style="background-color: #0a68b4;text-align: center">' +
            '                        <h4 style="color: white;text-transform: uppercase;font-weight: bold; margin-top: .5rem;">Chỉnh sửa ảnh đại diện</h4>' +
            '                    </td>' +
            '                </tr>' +
            '            </table>' +
            '            <div id="avatarContentTable" class="container-fluid">' +
            '                <div class="row">' +
            '                    <div class="col col-8 col-sm-8 text-center">' +
            '                        <h4 class="heading-label" style="margin-top: .5rem">Ảnh gốc</h4>' +
            '                    </div>' +
            '                    <div class="col col-4 col-sm-4 text-center">' +
            '                        <h4 class="heading-label" style="margin-top: .5rem">Ảnh hiển thị trên CV</h4>' +
            '                    </div>' +
            '                </div>' +
            '                <div class="row">' +
            '                    <div class="col col-8 col-sm-8 text-center" style="padding-bottom: 20px">' +
            '                        <div class="avatar-dropzone">' +
            '                            <a class="btn-choose-image" style="position: relative">' +
            '                                <span id="dropzone-msg" style="position:absolute; left: 50%;top: 50%;transform: translate(-50%,-50%);">Click vào đây để tải lên!</span>' +
            '                            </a>' +
            '                        </div>' +
            '                        <div class="big-preview-avatar" style="display: none">' +
            '                            <img id="edittingAvatar" src="" height="350px" width="430px" style="padding-bottom: 3px">' +
            '                            <br>' +
            '                            <button class="btn btn-success function-buttons" onclick="zoomIn()" title="Phóng to"><i' +
            '                                        class="fa fa-search-plus"></i></button>' +
            '                            <button class="btn btn-success function-buttons" onclick="zoomOut()" title="Thu nhỏ"><i' +
            '                                        class="fa fa-search-minus"></i></button>' +
            '                            <button class="btn btn-success function-buttons" onclick="moveLeft()" title="Sang trái"><i' +
            '                                        class="fa fa-arrow-left"></i></button>' +
            '                            <button class="btn btn-success function-buttons" onclick="moveRight()" title="Sang phải"><i' +
            '                                        class="fa fa-arrow-right"></i></button>' +
            '                            <button class="btn btn-success function-buttons" onclick="moveUp()" title="Lên trên"><i' +
            '                                        class="fa fa-arrow-up"></i></button>' +
            '                            <button class="btn btn-success function-buttons" onclick="moveDown()" title="Xuống dưới"><i' +
            '                                        class="fa fa-arrow-down"></i></button>' +
            '                        </div>' +
            '                        <!--                        <button class="btn btn-success function-buttons" onclick="rotateLeft()"><i-->' +
            '                        <!--                                    class="fa fa-undo"></i></button>-->' +
            '                        <!--                        <button class="btn btn-success function-buttons" onclick="rotateRight()"><i-->' +
            '                        <!--                                    class="fa fa-repeat"></i></button>-->' +
            '                    </div>' +
            '                    <div class="col col-4 col-sm-4 text-center">' +
            '                        <div class="preview" style="width: 200px;height: 200px;margin: auto !important;"></div>' +
            '                        <br>' +
            '                        <div style="display: none">' +
            '                            <?php $form = ActiveForm::begin([]); ?>' +
            '                            <input type="file" class="form-control" id="changeImageBtn" name="candidate_temp_avatar"' +
            '                                   accept="image/*"' +
            '                                   value="0">' +
            '                            <?php ActiveForm::end(); ?>' +
            '                        </div>' +
            '                        <div class="btn-group d-flex" role="group" aria-label="Basic example">'+
            '                           <button class="btn btn-primary w-100" onclick="changeImage()"' +
            '                                style="margin-bottom: 3px">Đổi ảnh' +
            '                           </button>' +
            '                           <button class="btn btn-danger w-100" onclick="deleteImage()"' +
            '                                style="margin-bottom: 3px">Xóa ảnh' +
            '                           </button>' +
            '                        </div>'+
            '                        <button class="btn btn-success btn-block" id="save-image-btn" onclick="saveImage()"' +
            '                                style="margin-bottom: 3px">Lưu lại' +
            '                        </button>' +
            '                        <button class="btn btn-link w-100" onclick="closeModal()"' +
            '                                style="margin-bottom: 3px">Đóng' +
            '                            (không lưu)' +
            '                        </button>' +
            '                    </div>' +
            '                </div>' +
            '            </div>' +
            '        </div>' +
            '    </div>' +
            '</div>');
    }

    // create needed modals
    createAvatarEditorModal();
    
    // add modal events and dropArea event listener
    addCropperModalEventListener();
}

function addCropperModalEventListener() {
    // when loading avatar editor, show loading spinner
    $('#avatarEditModal').on('show.bs.modal', function () {
        
    });
    // hide spinner modal and init cropper
    $("#avatarEditModal").on('shown.bs.modal', function () {
        $('#edittingAvatar').attr('src', '');
        // get original (old) avatar
        var previewAvatar = $(avatarSelector).attr('src');
        // set to preview image
        $('#edittingAvatar').attr('src', previewAvatar);
        // hide editing image then show drop zone
        $('.avatar-dropzone').css('display', 'block');
        $('.big-preview-avatar').css('display', 'none');
        // initialize cropper
        initialCropper();
    });
    // drop area event handler
    var dropArea = $(".btn-choose-image");
    dropArea.on('click', function (e) {
        triggerUploadTempImage();
    });
}

// function to initialize cropper
function initialCropper() {
    $('.modal-backdrop').hide();
    var image = document.getElementById('edittingAvatar');
    var previews = document.querySelectorAll('.preview');
    var previewReady = false;
    // create cropper objects
    cropper = new Cropper(image, {
        viewMode: 2, // sketch image to fit the container
        aspectRatio: 1 / 1, // select area ratio 16:9, 4:3, 1:1, 2:3, free
        minCropBoxWidth: 150, // selection area min width
        minCropBoxHeight: 150, // selection area min height
        checkCrossOrigin: false, // avoid error "blocked by CORS policy: No 'Access-Control-Allow-Origin' header is present on the requested resource."
        // cropper ready, just create a default preview
        ready: function () {
            var clone = this.cloneNode();
            clone.className = '';
            clone.style.cssText = (
                'display: block;' +
                'width: 100%;' +
                'height: 200px;' +
                'min-width: 0;' +
                'min-height: 0;' +
                'max-width: none;' +
                'max-height: none;'
            );
            each(previews, function (elem) {
                elem.appendChild(clone.cloneNode());
            });
            previewReady = true;
        },
        // catch crop event
        crop: function (event) {
            detailX = event.detail.x;
            detailY = event.detail.y;
            detailWidth = event.detail.width;
            detailHeight = event.detail.height;
            detailRotate = event.detail.rotate;
            detailScaleX = event.detail.scaleX;
            detailScaleY = event.detail.scaleY;
            if (!previewReady) {
                return;
            }

            var data = event.detail;
            var cropper = this.cropper;
            var imageData = cropper.getImageData();
            var previewAspectRatio = data.width / data.height;
            // update preview view
            each(previews, function (elem) {
                var previewImage = elem.getElementsByTagName('img').item(0);
                var previewWidth = elem.offsetWidth;
                var previewHeight = previewWidth / previewAspectRatio;
                var imageScaledRatio = data.width / previewWidth;

                elem.style.height = previewHeight + 'px';
                previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';
            });
        },
    });
    addTempFileOnChangeListener();
}

// function to zoom in the picture
function zoomIn() {
    cropper.zoom(0.1);
}

// function to zoom out the picture
function zoomOut() {
    cropper.zoom(-0.1);
}

// function to rotate the picture to the left
function rotateLeft() {
    cropper.rotate(-45);
}

// function to rotate the picture to the right
function rotateRight() {
    cropper.rotate(45);
}

function moveLeft() {
    cropper.move(10, 0);
}

function moveRight() {
    cropper.move(-10, 0);
}

function moveUp() {
    cropper.move(0, 10);
}

function moveDown() {
    cropper.move(0, -10);
}

// function to save the image when user click submit ("Hoàn Thành")
function saveImage() {
    var avatarUrl = $('#edittingAvatar').attr('src');
    cropperStartLoader();
    // default avatar after deleting
    if (avatarUrl.toLowerCase().includes('img/male')) {
        $.ajax({
            type: "POST",
            url: urlApiSaveDefaultImage,
            data: {
                candidate_id: candidateID,
                avatar_url: avatarUrl,
            },    // multiple data sent using ajax
            success: function (response) {
                var arrResponse = $.parseJSON(response);
                if (arrResponse.status == 1) {
                    autohidenotify2('success', 'left bottom', 'Thông báo', arrResponse.message, 4000);
                    $(avatarSelector).attr('src', avatarUrl);
                    $('.modal-backdrop').hide();
                    // show dropzone and hide editing avatar
                    showAvatarDropzone();
                    // close modal
                    $('#avatarEditModal').modal('hide');
                    // destroy cropper
                    cropper.destroy();
                } else {
                    autohidenotify2('error', 'left bottom', 'Thông báo', arrResponse.message, 4000);
                }
            },
            complete: function() {
                cropperStopLoader();
            }
        });
    } else {
        // send image url and coordinations to API in order to save the cropped image
        $.ajax({
            type: "POST",
            url: urlApiSaveCroppedImage,
            data: {
                candidate_id: candidateID,
                avatar_url: avatarUrl,
                detail_x: detailX,
                detail_y: detailY,
                detail_width: detailWidth,
                detail_height: detailHeight,
                detail_rotate: detailRotate,
                detail_scale_x: detailScaleX,
                detail_scale_y: detailScaleY
            },
            success: function (response) {
                var arrResponse = $.parseJSON(response);
                if (arrResponse.status == 1) {
                    // inform success
                    autohidenotify2('success', 'left bottom', 'Thông báo', arrResponse.message, 4000);
                    // update avatar
                    $(avatarSelector).attr('src', arrResponse.data);

                    // show dropzone and hide editing avatar
                    showAvatarDropzone();
                    // close modal
                    $('#avatarEditModal').modal('toggle');
                    cropper.destroy();
                } else {
                    // inform errors
                    autohidenotify2('error', 'left bottom', 'Thông báo', arrResponse.message, 4000);
                }
            },
            complete: function() {
                cropperStopLoader();
            }
        });
    }
}

// function to close modal
function closeModal() {
    // reset src
    $('#edittingAvatar').attr('src', '');
    $('#modalPreviewAvatar').attr('src', '');
    // remove preview
    $('.preview').html('');
    cropper.destroy();
    $('#avatarEditModal').modal('toggle');
    
    $('.modal-backdrop').hide();
    // trigger modal reset
    $('#avatarEditModal').find('form').trigger('reset');
    // location.reload();
}

// function to delete existing image, set image to default
function deleteImage() {
    var edittingImage = $('#edittingAvatar');
    edittingImage.attr('src', 'https://employer.jobsgo.vn/media/img/male.jpg');
    // set default avatar to preview
    $('.preview').html('<img src="https://employer.jobsgo.vn/media/img/male.jpg">');
    // show dropzone and hide avatar editing
    showAvatarDropzone();
    cropper.destroy();
}

// function to change image to cropping
function changeImage() {
    triggerUploadTempImage();
}

function triggerUploadTempImage() {
    // click upload button
    $("#changeImageBtn").val(null);
    $('#changeImageBtn').trigger('click');
}

function addTempFileOnChangeListener() {
    // whenever users click change image button, save it to temp then update cropper
    $('input[name="candidate_temp_avatar"]').one('change', function(e) {
        // get input file
        $('#dropzone-msg').html('<i class="fas fa-circle-notch fa-spin"></i> Đang tải ảnh lên...');
        cropperStartLoader();
        var uploadFile = $('input[name="candidate_temp_avatar"]')[0].files;
        if (uploadFile.length === 0) {
            $('.modal-backdrop').hide();
            return;
        }
        showAvatarDropzone();
        var avatarFile = uploadFile[0];
        var filesList = new FormData();
        filesList.append('uploaded_file', avatarFile);
        filesList.append('candidate_id', candidateID);
        // send file to api in order to save it
        $.ajax({
            type: 'post',
            url: urlApiSaveTempImage,
            processData: false,
            contentType: false,
            data: filesList,
            beforeSend: function() {
                cropperStartLoader();
            },
            success: function (response) {
                $('.modal-backdrop').hide();
                // console.log(response);
                var arrResponseData = jQuery.parseJSON(response);
                if (arrResponseData.status === 1) {
                    showAvatarEditingZone();
                    // updating avatar preview
                    $('#edittingAvatar').attr('src', arrResponseData.data + '?' + new Date().getTime());
                    $('#modalPreviewAvatar').attr('src', arrResponseData.data);
                    $('.preview').html('');
                    // destroy old cropper
                    cropper.destroy();
                    // initialize a new cropper
                    initialCropper();
                } else {
                    autohidenotify2('error', 'left bottom', 'Thông báo', arrResponseData.message, 4000);
                }
            },
            complete: function () {
                $('#dropzone-msg').html('Click vào đây để tải lên!');
                cropperStopLoader();
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
}

// hide drop zone then display editing avatar
function displayBigPreviewAvatar() {
    // trigger click the button upload
    $('#changeImageBtn').trigger('click');
    // hide droparea and show editing avatar
    $('.avatar-dropzone').css('display', 'none');
    $('.big-preview-avatar').css('display', 'block');
}

// function to hide editing avatar and show dropzone
function showAvatarDropzone() {
    $('.avatar-dropzone').css('display', 'block');
    $('.big-preview-avatar').css('display', 'none');
}

// function to hide dopzone and show editing avatar
function showAvatarEditingZone() {
    $('.avatar-dropzone').css('display', 'none');
    $('.big-preview-avatar').css('display', 'block');
}

function each(arr, callback) {
    var length = arr.length;
    var i;
    for (i = 0; i < length; i++) {
        callback.call(arr, arr[i], i, arr);
    }
    return arr;
}
