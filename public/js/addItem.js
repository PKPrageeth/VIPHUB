$(document).ready(function () {
    var counts = 0;
    $("#add").click(function () {
        counts++;
        item = "<div class=\"card-body mb-3 item-card\" id=\"items" + counts + "\"><div class=\"row\">\n" +
            "\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class='mobile_label' for=\"validationCustom01\">Full Name 1</label>\n" +
            "                                    <input name='item[]' type=\"text\" class=\"form-control\" id=\"validationCustom01\" placeholder=\"ITEM\" required=\"\">\n" +
            "                                    <div class=\"invalid-feedback\">\n" +
            "                                        Please provide a valid Name.\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class='mobile_label' for=\"validationCustom01\">Full Name</label>\n" +
            "                                    <input name='make[]' type=\"text\" class=\"form-control\" id=\"validationCustom01\" placeholder=\"MAKE\" required=\"\">\n" +
            "                                    <div class=\"invalid-feedback\">\n" +
            "                                        Please provide a valid Name.\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class='mobile_label' for=\"validationCustom01\">Full Name</label>\n" +
            "                                    <input name='model[]' type=\"text\" class=\"form-control\" id=\"validationCustom01\" placeholder=\"MODEL\" required=\"\">\n" +
            "                                    <div class=\"invalid-feedback\">\n" +
            "                                        Please provide a valid Name.\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class='mobile_label' for=\"validationCustom01\">Full Name</label>\n" +
            "                                    <input name='value[]' type=\"text\" class=\"form-control\" data-type=\"currency\" pattern=\"^\\$\\d{1,3}(,\\d{3})*(\\.\\d+)?$\" placeholder=\"VALUE\" required=\"\">\n" +
            "                                    <div class=\"invalid-feedback\">\n" +
            "                                        Please provide a valid Name.\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class=\"form-check-label mobile_label\" for=\"flexSwitchCheckDefault\">FOR BURGLARY COVER UPTO RS:300,000/= (PLEASE TICK)</label>\n" +
            "                                    <div class=\"form-check form-switch\">\n" +
            "\n" +
            "                                        <input  class=\"form-check-input\" value='Yes' type=\"checkbox\" id=\"ch" + counts + "\" onclick=\"tick(" + counts + ")\">\n" +
            "                                       <input id='tik" + counts + "' type='hidden' value='0' name='tick[]'>" +
            "\n" +
            "                                    </div>" +
            "                                </div>\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                   <button type='button' onclick='remove(" + counts + ")' class=\"btn btn-danger btn-sm\">\n " +
            "                                               REMOVE\n" +
            "                                    </button>"
        "                                </div>\n" +
        "\n" +
        "                            </div></div>";

        $('#item-holder').append(item);

    });
    (function () {
        var uploader = document.createElement('input'),
            image = document.getElementById('img-result');

        uploader.type = 'file';
        uploader.accept = 'image/*';

        image.onclick = function () {
            uploader.click();
        }

        uploader.onchange = function () {
            var reader = new FileReader();
            reader.onload = function (evt) {
                image.classList.remove('no-image');
                image.style.backgroundImage = 'url(' + evt.target.result + ')';
                var request = {
                    itemtype: 'test 1',
                    brand: 'test 2',
                    images: [{
                        data: evt.target.result
                    }]
                };

                document.querySelector('.show-button').style.display = 'block';
                document.querySelector('.upload-result__content').innerHTML = JSON.stringify(request, null, '  ');
            }
            reader.readAsDataURL(uploader.files[0]);
        }

        document.querySelector('.hide-button').onclick = function () {
            document.querySelector('.upload-result').style.display = 'none';
        };

        document.querySelector('.show-button').onclick = function () {
            document.querySelector('.upload-result').style.display = 'block';
        };
    })();
});

function remove(id) {

    $("#items" + id).remove();
}

function tick(id) {

    var checkBox = document.getElementById("ch" + id);
    if (checkBox.checked == true) {
        $('#tik' + id).val("1");
    } else {
        $('#tik' + id).val("0");
    }

}

function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function readURLNICb(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap1').hide();

            $('.file-upload-image1').attr('src', e.target.result);
            $('.file-upload-content1').show();

            $('.image-title1').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload1();
    }
}

function readURLVehi(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap2').hide();

            $('.file-upload-image2').attr('src', e.target.result);
            $('.file-upload-content2').show();

            $('.image-title2').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload2();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-input').val("");
    $('.file-upload-content').hide();
    $('.file-upload-image').attr('src', "");
    $('.image-upload-wrap').show();
}

function removeUpload1() {
    $('.file-upload-input1').replaceWith($('.file-upload-input1').clone());
    $('.file-upload-input1').val("");
    $('.file-upload-content1').hide();
    $('.file-upload-image1').attr('src', "");
    $('.image-upload-wrap1').show();
}

function removeUpload2() {
    $('.file-upload-input2').replaceWith($('.file-upload-input2').clone());
    $('.file-upload-input2').val("");
    $('.file-upload-content2').hide();
    $('.file-upload-image2').attr('src', "");
    $('.image-upload-wrap2').show();
}

$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap1').bind('dragover', function () {
    $('.image-upload-wrap1').addClass('image-dropping');
});
$('.image-upload-wrap2').bind('dragover', function () {
    $('.image-upload-wrap2').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
$('.image-upload-wrap1').bind('dragleave', function () {
    $('.image-upload-wrap1').removeClass('image-dropping');
});
$('.image-upload-wrap2').bind('dragleave', function () {
    $('.image-upload-wrap2').removeClass('image-dropping');
});

function agree() {
    $('#terms').prop('checked', true);



}
