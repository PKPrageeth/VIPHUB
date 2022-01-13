$(document).ready(function () {
    var counts = 0;
    $("#add").click(function () {
        counts++;
        item = "<div class=\"card-body mb-3 item-card\" id=\"items" + counts + "\"><div class=\"row\">\n" +
            "\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class='mobile_label' for=\"validationCustom01\">Full Name 1</label>\n" +
            "                                    <input name='item[]' type=\"text\" class=\"form-control\" id=\"validationCustom01\" placeholder=\"Mark Anthony\" required=\"\">\n" +
            "                                    <div class=\"invalid-feedback\">\n" +
            "                                        Please provide a valid Name.\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class='mobile_label' for=\"validationCustom01\">Full Name</label>\n" +
            "                                    <input name='make[]' type=\"text\" class=\"form-control\" id=\"validationCustom01\" placeholder=\"Mark Anthony\" required=\"\">\n" +
            "                                    <div class=\"invalid-feedback\">\n" +
            "                                        Please provide a valid Name.\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class='mobile_label' for=\"validationCustom01\">Full Name</label>\n" +
            "                                    <input name='model[]' type=\"text\" class=\"form-control\" id=\"validationCustom01\" placeholder=\"Mark Anthony\" required=\"\">\n" +
            "                                    <div class=\"invalid-feedback\">\n" +
            "                                        Please provide a valid Name.\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class='mobile_label' for=\"validationCustom01\">Full Name</label>\n" +
            "                                    <input name='value[]' type=\"text\" class=\"form-control\" id=\"validationCustom01\" placeholder=\"Mark Anthony\" required=\"\">\n" +
            "                                    <div class=\"invalid-feedback\">\n" +
            "                                        Please provide a valid Name.\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "\n" +
            "                                <div class=\"col-md-4 col-lg-2 col-12 mb-3\">\n" +
            "                                    <label class=\"form-check-label mobile_label\" for=\"flexSwitchCheckDefault\">FOR BURGLARY COVER UPTO RS:300,000/= (PLEASE TICK)</label>\n" +
            "                                    <div class=\"form-check form-switch\">\n" +
            "\n" +
            "                                        <input  class=\"form-check-input\" value='Yes' type=\"checkbox\" id=\"ch"+counts+"\" onclick=\"tick("+counts+")\">\n" +
            "                                       <input id='tik"+counts+"' type='hidden' value='0' name='tick[]'>" +
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
});

function remove(id) {

    $("#items" + id).remove();
}

function tick(id){

    var checkBox = document.getElementById("ch"+id);
    if (checkBox.checked == true){
       $('#tik'+id).val("1");
    } else {
        $('#tik'+id).val("0");
    }

}
