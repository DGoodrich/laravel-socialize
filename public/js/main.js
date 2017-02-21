$(document).ready(function(){
    /* Home page well removal */
    $('.alert-close').on('click', function(c){
        $('.sign-up-agileinfo').fadeOut('slow', function(c){
            $('.sign-up-agileinfo').remove();
        });
    });

    $('.alert-close1').on('click', function(c){
        $('.sign-in-w3ls').fadeOut('slow', function(c){
            $('.sign-in-w3ls').remove();
        });
    });
    /* End of home page well removal */

    $( ".hasDatePicker" ).datepicker();

    $('[data-toggle="tooltip"]').tooltip();

    $(".alert").addClass("in").fadeOut(4500);

    /* swap open/close side menu icons */
    $('[data-toggle=collapse]').click(function(){
        // toggle icon
        $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
    });

    /* Links for datatables */
    $(document.body).on('click', '.on-default', function () {
        window.document.location = $(this).data("href");
    });

    $(document).on("click", ".remove-row", function () {
        postId = $(this).data('id');
        postType = $(this).data('type');

        $(".modal-footer input[name='id']").val(postId);
        $(".modal-footer input[name='type']").val(postType);
    });



//Input file change for image previewing and cropping
    $('input[type=file]').on('change', function () {
        var input = this;
        var output = $(this).data('image-output');
        var crop = $(this).data('image-crop');

        if (output == null || output == undefined) {
            return;
        }

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                if (crop) {
                    $('#crop').attr('src', e.target.result);

                    var modal = $('#pic-modal');
                    var cropper;

                    modal.modal('show');
                    modal.on('shown.bs.modal', function () {
                        var image = document.getElementById('crop');
                        cropper = new Cropper(image, {
                            aspectRatio: 1,
                            autoCropArea: 1,
                            viewMode: 0,
                            zoomOnWheel: true,
                            background: true,
                            modal: false,
                            highlight: false
                        });
                    });

                    $('#set-image').click(function () {

                        cropper.getCroppedCanvas().toBlob(function (blob) {
                            var urlCreator = window.URL || window.webkitURL;
                            var imageUrl = urlCreator.createObjectURL(blob);
                            $(output).css('background-image', 'url(' + imageUrl + ')');
                            $(output).attr('src', imageUrl);

                            var data = cropper.getData();
                            $(output).parent().append($('<input/>', {
                                type: 'hidden',
                                name: 'crop_values[size]',
                                value: data.width
                            }));
                            $(output).parent().append($('<input/>', {
                                type: 'hidden',
                                name: 'crop_values[x_offset]',
                                value: data.x
                            }));
                            $(output).parent().append($('<input/>', {
                                type: 'hidden',
                                name: 'crop_values[y_offset]',
                                value: data.y
                            }));
                        });

                    });

                    modal.on('hidden.bs.modal', function () {
                        cropper.destroy();
                    });

                    return;
                }

                // Don't Crop, Only Output
                $(output).css('background-image', 'url(' + e.target.result + ')');
                $(output).attr('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    $('.call-upload').click(function () {
        var target = $(this).data('target');
        if (target) {

            $(target).change(function () {
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
                $(this).siblings('.input-group').find('input').val(filename);
            });

            $(target).click();
        }
    });

});