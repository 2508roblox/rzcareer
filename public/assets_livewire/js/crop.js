window.addEventListener('DOMContentLoaded', function () {
    const image = document.getElementById('crop_image');
    const crop = document.getElementById('crop');
    const $progress = $('.progress');
    const $alert = $('.alert');
    const $modal = $('#modal');
    let cropper;
    const inputChangeAvatar = document.getElementById('changeAvatar');

    $('[data-toggle="tooltip"]').tooltip();

    const readFile = async (fileData, input) => {
        const done = async function (url) {
            input.value = '';
            image.src = url;
            await $alert.hide();
            await $modal.modal('show');
        };
        let reader;

        if (fileData) {
            if (URL) {
                await done(URL.createObjectURL(fileData));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = async function (e) {
                    await done(reader.result);
                };

                await reader.readAsDataURL(fileData);
            }
        }
    }

    inputChangeAvatar.addEventListener('change', (e) => {
        readFile(e.target.files[0], inputChangeAvatar);
    })

    $modal.on('shown.bs.modal', () => {
        cropper = new Cropper(image, {
            aspectRatio: 1, viewMode: 1, autoCropArea: 1
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    crop.addEventListener('click', () => {
        let canvas;

        $modal.modal('hide');

        if (cropper) {
            canvas = cropper.getCroppedCanvas({
                width: 1500, height: 300,
            });

            $progress.show();
            $alert.removeClass('alert-success alert-warning');
            canvas.toBlob((blob) => {
                const file = new File([blob], "avatar.png", {type: "image/png"});

                saveCroppedImage(file);
            }, 'image/png');
        }
    });

    const saveCroppedImage = (file) => {
        const formData = new FormData();
        formData.append('file', file);

        $.ajax({
            url: '/api/change-avatar',
            type: 'POST',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (res) {
                const obj = JSON.parse(res);

                if (obj.status == '1') {
                    $('.avatar').attr('src', obj.data);

                    colorgbJGrowl('bg-green', 'Thay đổi hình ảnh đại diện thành công');

                    return;
                }

                colorgbJGrowl('bg-warning', obj.data);
            }
        });
    }
});
