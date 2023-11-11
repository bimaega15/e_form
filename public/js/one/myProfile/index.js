// "use strict";
var url_myprofile = $(".url_myprofile").data("url");
function getData() {
    $.ajax({
        url: `${url_myprofile}`,
        dataType: "text",
        type: "get",
        success: function (data) {
            $("#output_data").html(data);
        },
    });
}
getData();

$(document).ready(function () {
    var body = $("body");

    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();

        showModalFormLarge(
            $(this).data("url"),
            { id: $(this).data("id") },
            "Ubah Data",
            "get"
        );
    });
});
